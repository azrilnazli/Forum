<?php
/**
 * StaffInformation Controller
 * APP/controllers/staff_informations_controller.php
 * views | APP/views/staff_informations/*
 * @author "Azril Nazli Alias";
*/

Class StaffInformationsController extends AppController{

    var $name = 'StaffInformations';
    var $scaffold = 'admin'; // admin routing 
    var $components = array('Email');

    function beforeFilter(){
        parent::beforeFilter(); // inherit AppController punya beforeFilter
        $this->Auth->allow(array(
                        'signup' , 
                        'login',
                        'forgot_password',
                        'reset'
                        ));
    }
    
    function index(){
        // user's home after login
        $this->layout = 'forum';
    }
    
    
    function logout(){
        $this->Session->destroy();
        $this->Session->setFlash('Logged Out');
        $this->redirect('/');
    }

    
    // callback before cake fire up view
    function beforeRender(){
        // only display certain fields
        $fields = array('forum_role_id','username','biodata');// field name in table
        $this->set('scaffoldFields' ,  $fields); // send to view
    } // beforeRender()    
    
    
    
    function login() {
      $this->layout = 'forum'; // guna layout forum.ctp
      if( !(empty($this->data)) && $this->Auth->user() ){
          //$this->User->id = $this->Auth->user('id');
          //$this->User->saveField('last_login', date('Y-m-d H:i:s') );
          $this->redirect('index');
      }
    }  
      
    function signup(){
        $this->layout = 'forum';
        if( $this->RequestHandler->isPost() ){ // detect orang submit
        //debug($this->data);
            $whitelists = array('username' , 'biodata');
          
            if( $this->StaffInformation->save($this->data, $whitelists)  ){
                $this->StaffInformation->saveField('forum_role_id', 3 );
                $this->StaffInformation->saveField('password', $this->Auth->password(  $this->data['StaffInformation']['new_password']  ) );
                $this->Session->setFlash("You're registered.");
                $this->redirect('index');
            } // save()
        } // isPost()
    }
    
    /**
     * 1) User will provide Email to reset password
     * 2) If Exist, System will create new data on Ticket 
     *      with random character and user_id
     * 3) System will send an email to user with reset password link
     * 4) User will click the link ( /reset_password/<ticket_no> )
     * 5) System will check ticket_no with existing data in Ticket table
     * 6) System display change password form
     * 7) System accept user new password
     * 8) System redirect user to Login Page
    **/      
    function forgot_password(){
      $this->layout = 'forum';
      
      // user submit
      if( $this->RequestHandler->isPost()  ) {
          //debug(  $this->data );
            // start validation 
            $this->StaffInformation->set( $this->data );
       
            // validates submitted form
            if (  $this->StaffInformation->validates()  ) {
                  // check data is valid in DB
                  $email = $this->data['StaffInformation']['forgot_email'];
                  $options['conditions'] = array('email' => $email);
                  $options['recursive'] = -1;
                  $count = $this->StaffInformation->find('count' , $options);
                  //debug($count);
                  
                  // if $count == 0 gives error
                  if($count == 0){
                       // give error message
                       $this->Session->setFlash('Email does not exists in our database');
                       $this->redirect('forgot_password');
                  } // $count check
                  
                  // generate Ticket
                  $ticket = md5( md5( time() ) ); // create random string
                  
                  // find staff_information_id associated with the email
                  $options['fields'] = array('id');
                  
                  // reuse $options from above
                  $staff = $this->StaffInformation->find('first' , $options );                  
                  $staff_information_id =  $staff['StaffInformation']['id'];
                  
                  // now create new Ticket
                  $t['staff_information_id'] = $staff_information_id;
                  $t['ticket'] =  $ticket;
                  
                  // delete any ticket that older than 1 hour
                  
                  $this->StaffInformation->Ticket->create(); // force to create new data
                  if(  $this->StaffInformation->Ticket->save( $t )  ){
                  
                      // hantar Email
                      $this->send_ticket(  $this->StaffInformation->Ticket->id );
                      
                      
                      $this->Session->setFlash("Please check your email at $email");
                  } else {
                      $this->Session->setFlash("Unable to create new Ticket");
                  }
                  
                  $this->redirect('forgot_password');
 
            } // validates()
          
      } // isPost
      
    } // forgot_password()
    
    
  function send_ticket($ticket_id = null){
  
        // get Ticket information 
        $this->StaffInformation->Ticket->recursive = 1;
        $ticket =  $this->StaffInformation->Ticket->findById($ticket_id);
        //debug($ticket);
         // send to view
        $this->set('ticket', $ticket['Ticket']['ticket']);
  
  
        $this->Email->smtpOptions = array(
            'port' => '465',
            'timeout' => '30',
            'host' => 'ssl://smtp.gmail.com',
            'username' => 'cakephp.email@gmail.com',
            'password' => 'cakephp123'
            
        );

        $email =  $ticket['StaffInformation']['email'];
        $username =  $ticket['StaffInformation']['username'];
       
        $this->set('email', $email);
        $this->set('username', $username);
        
        $this->Email->delivery = 'smtp';
        $this->Email->sendAs = 'html';
        $this->Email->template = 'forgot_password';
        $this->Email->to = "$username <$email>";
        $this->Email->subject = 'Forum :: Forgot Password';
        $this->Email->from = 'CakePHP <cakephp.email@gmail.com>'; 
            
        $this->Email->send();
        // debug($this->Email->smtpError);
        //   $this->autoRender = FALSE;
  } // send_ticket() 
  
  
  // APP/views/staff_informations/reset.ctp
  function reset(){
    $this->layout = 'forum';
    // get $ticket from url
    $ticket = $this->passedArgs[  'ticket'  ];
    $this->set('ticket' , $ticket ); // guna dalam view
    
    // check if ticket is valid
    $this->StaffInformation->Ticket->recursive = 1;
    $data = $this->StaffInformation->Ticket->findByTicket( $ticket );
    
    if( empty(  $data  ) ){
        $this->Session->setFlash('Invalid Ticket');
        $this->redirect('forgot_password');
    }  
    
    // detect user submit
    if( $this->RequestHandler->isPost() ){ // isPost() | isPut() | isGet()
        //debug($this->data);
        $this->StaffInformation->set( $this->data );
       
        // validates submitted form
        if (  $this->StaffInformation->validates()  ) {        
            // change password
            $new_password = $this->data['StaffInformation']['new_password'];
            
            // get user_id
            $user_id = $data['StaffInformation']['id'];
            
            // set StaffInformation to user_id
            $staff['id'] =  $user_id;
            $staff['password'] = $this->Auth->password(  $new_password  );
            
            // save to StaffInformation
            if( $this->StaffInformation->save(  $staff  )  ){
            
                // delete the ticket
                $options = array('Ticket.ticket' => $ticket );
                $this->StaffInformation->Ticket->deleteAll( $options );
            
                $this->Session->setFlash('Password Changed');
                $this->redirect('login');
                
            } else {
                $this->Session->setFlash('Unable to change password');
                
            } // StaffInformation::save()
        } // validates()
            
    } // isPut()

  } // reset
 
} // StaffInformation
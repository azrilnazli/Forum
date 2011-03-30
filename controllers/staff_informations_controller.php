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
        $this->Auth->allow(array('signup' , 'login','forgot_password','email') );
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
                      $this->Session->setFlash("Please check your email at $email");
                  } else {
                      $this->Session->setFlash("Unable to create new Ticket");
                  }
                  
                  $this->redirect('forgot_password');
 
            } // validates()
          
      } // isPost
      
    } // forgot_password()
    
    
  function send_ticket($id = null){
/*
             $this->Email->smtpOptions = array(
              'port'=>'25',
              'timeout'=>'30',
              'host' => '127.0.0.1',
              'username'=>'xxx',
              'password'=>'xxx',
              'client' => 'xxx'
              );

            //$staff = $this->StaffInformation->read(null,$id);
            //$this->set('staff', $staff);
            
            $this->Email->to = 'azril.nazli@gmail.com';
            $this->Email->subject = 'Forum :: Forgot Password';
            $this->Email->from = 'azril.nazli@gmail.com';
            $this->Email->sendAs = 'html';
            $this->Email->template = 'forgot_passsword';
            //$this->set('User', $User);
            
*/

        $this->Email->smtpOptions = array(
            'port' => '465',
            'timeout' => '30',
            'host' => 'ssl://smtp.gmail.com',
            'username' => 'azril.nazli@gmail.com',
            'password' => 'xf86config77');
            $this->Email->delivery = 'smtp';
              $this->Email->sendAs = 'html';
            $this->Email->template = 'forgot_password';
        //$this->Email->to = $user['email'];
        $this->Email->to = 'Sir.B <azril.nazli@gmail.com>';
        $this->Email->subject = 'test';

        $this->Email->from = 'Sir.A <azril.nazli@gmail.com>'; 
            
           if(  $this->Email->send() ){
            echo 'lala';
            debug($this->Email->smtpError);
            } else {
              debug($this->Email->smtpError);
            }
      } 
      
      function email(){

          $this->send_ticket();
          $this->autoRender = FALSE;
      }
    
    
    
    
    
    
    
    
    
    
    
    
    
} // StaffInformation
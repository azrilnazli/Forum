<?php
class AppController extends Controller {
    var $helpers = array('Html','Form','Time','Session','SiteModule');
    var $components = array(
      'RequestHandler',// detect form submission
      
      'Session', // setFlash
      
      /** Authentication **/
      'Auth' => array(  
      
          /** enable isAuthorized **/
          'authorize' => 'controller', 
      
          /** use StaffInformation model **/
          'userModel' => 'StaffInformation',    
      
          /** Login Action **/
          'loginAction' => array(
                    'controller' => 'StaffInformations',
                    'action' => 'login',
                    'admin' => FALSE
            ), // loginAction
            
          /** Fields **/
          'fields' => array(
                    'username' => 'username', 
                    'password' => 'password'
          ), // fields    
          
          /** Auth Error **/
          'authError' => 'You are not permitted here',
          
          /** Login Error **/
          'loginError' => 'Username or Password incorrect',
          
          /** Auto Redirect **/
          'autoRedirect' => FALSE,
      
        ) // Auth      
  ); // components
  
  function beforeFilter(){
  
      # kalau user dah login
      if( $this->Auth->user() ){
          // Load Staff Information Model
          App::import('Model' , 'StaffInformation');
          $this->StaffInformation = new StaffInformation();
          
          $options['conditions'] = array('StaffInformation.id' => $this->Auth->user('id') );
          $options['recursive'] = 1;
          $options['fields'] = array(
                                          'StaffInformation.id',
                                          'StaffInformation.username', 
                                          //'StaffInformation.email'
                                          ); // fields
          
          // load Containable
          $this->StaffInformation->Behaviors->attach('Containable');
          $options['contain'] =  array(
              'ForumRole' => array(
                    'fields' => array('title')
              ) // ForumRole
          ); // Contain
          
          $user  = $this->StaffInformation->find( 'first' , $options );
          // daftar guna Configure 
          //debug($user);
          
          // guna Session
          if( !$this->Session->check('user') ){ // check kalau var $user wujud ?
              $this->Session->write('user', $user); // kalau tak wujud baru write
          } // check
          
          //Configure::write('user' , $user );
      } // Auth
      
      // check is user already logged in ?
      if(  $this->Auth->user()  ){
      
              // protect page from logged users
              $this->disAllow('StaffInformations', 'login' );
              $this->disAllow('StaffInformations', 'signup' );
              $this->disAllow('StaffInformations', 'forgot_password' );
              $this->disAllow('StaffInformations', 'reset' );
              
      } // check
      
      
 
  
  } // beforeFilter()
  
  /**
   * Disallow logged user to certain action
   **/
   function disAllow($controller = null, $action = null ){
   
      // get current Controller
      $curr_controller = $this->name;
      
      // get current Action
      $curr_action = $this->action;
      
      // checking
      if(  $curr_controller == $controller AND $curr_action == $action  ){
          $this->Session->setFlash("  You're not allowed  ");
          $this->redirect( '/' );
      } // checking
   } // disAllow()
   
   function isAuthorized(){
        return true;
       //debug($this->params);
        if(  isset( $this->params['admin'] ) && $this->params['admin']  == 1 ){
            //$this->Auth->deny();
            // check user status
            $user = $this->Session->read('user');
            $role  = strToLower(  $user['ForumRole']['title']  );
            if(  $role != 'admin' ){
                $this->Session->setFlash('Invalid Permission');
                $this->redirect( $this->referer() );
            }
        } else {
            return true;
        }
   }

  
  
} // AppController()

<?php
class AppController extends Controller {
    var $helpers = array('Html','Form','Time','Session','SiteModule');
    var $components = array(
      'RequestHandler',// detect form submission
      
      'Session', // setFlash
      
      /** Authentication **/
      'Auth' => array(  
      
          /** use StaffInformation model **/
          'userModel' => 'StaffInformation',    
      
          /** Login Action **/
          'loginAction' => array(
                    'controller' => 'StaffInformations',
                    'action' => 'login',
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
  
  }
  
}

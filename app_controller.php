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
  }
  
}

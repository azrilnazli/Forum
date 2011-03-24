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

    function beforeFilter(){
        parent::beforeFilter(); // inherit AppController punya beforeFilter
        $this->Auth->allow(array('signup' , 'login') );
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
            $whitelists = array('username' , 'password' , 'email', 'biodata');
          
            if( $this->StaffInformation->save($this->data, $whitelists)  ){
                $this->StaffInformation->saveField('forum_role_id', 3 );
                $this->Session->setFlash("You're registered.");
                $this->redirect('index');
            } // save()
        } // isPost()
    }
} // StaffInformation
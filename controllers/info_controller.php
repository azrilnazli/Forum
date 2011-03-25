<?php 
/**
 * viewPath | APP/views/info/*
 **/
Class InfoController extends AppController{
    var $name = 'Info';
    //var $uses = null; // no database call
    var $layout = 'forum'; // APP/views/layouts/forum.ctp
    var $helpers = array('SiteModule');
    var $viewPath = 'info'; // folder name in APP/views/info
    
    function beforeFilter(){
        // cara 1
        //$this->Auth->enabled = FALSE; // disablekan AUTH
        
        // cara 2
        $this->Auth->allow('contact_us', 'about_us');
    }
    
    function index(){}
    function about_us(){}
    
    function contact_us(){
    
        // check is user submit using POST method
        if( $this->RequestHandler->isPost() ) {
        
             // show the form contents
            debug($this->data);
            
            // start validation 
            $this->Info->set( $this->data );
       
            // validates submitted form
            if (  $this->Info->validates()  ) {
                // hantar email
            }   else {
                // ada error
                $errors = $this->Info->invalidFields();
                debug(  $errors );
            }
        }// isPost();
    
    } // contact_us()
    
    
    function faq(){}
}
<?php
/**
 * ForumRole Controller
 * APP/controllers/staff_informations_controller.php
 * views | APP/views/staff_informations/*
 * http://localhost/forum/ForumRoles
 * @author "Azril Nazli Alias";
*/

Class ForumRolesController extends AppController{

    var $name = 'ForumRoles';
    var $scaffold = 'admin'; // admin routing 
    
    // callback before cake fire up view
    function beforeRender(){
        // only display certain fields
        $fields = array('title','descriptions');// field name in table
        $this->set('scaffoldFields' ,  $fields); // send to view
    } // beforeRender()
    
} // ForumRole
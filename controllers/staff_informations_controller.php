<?php
/**
 * StaffInformation Controller
 * APP/controllers/staff_informations_controller.php
 * views | APP/views/staff_informations/*
 * @author "Azril Nazli Alias";
*/

Class StaffInformationsController extends AppController{

    var $name = 'StaffInformations';
    var $scaffold;
    // callback before cake fire up view
    
    function beforeRender(){
        // only display certain fields
        $fields = array('forum_role_id','username','biodata');// field name in table
        $this->set('scaffoldFields' ,  $fields); // send to view
    } // beforeRender()    
} // StaffInformation
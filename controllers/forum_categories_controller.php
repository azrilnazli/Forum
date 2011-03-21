<?php
/**
 * ForumCategories Controller
 * APP/controllers/forum_categories_controller.php
 * views | APP/views/forum_categories/*
 * http://localhost/forum/ForumCategories
 * @author "Azril Nazli Alias";
*/

Class ForumCategoriesController extends AppController{

    var $name = 'ForumCategories';
    var $scaffold = 'admin'; // admin routing 
    
    function beforeRender(){
        // only display certain fields
        $fields = array('staff_information_id','title','descriptions');// field name in table
        $this->set('scaffoldFields' ,  $fields); // send to view
    } // beforeRender()    
    
} // ForumCategories
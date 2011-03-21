<?php
/**
 * ForumReplies Controller
 * APP/controllers/forum_replies_controller.php
 * views | APP/views/forum_replies/*
 * http://localhost/forum/ForumReplies
 * @author "Azril Nazli Alias";
*/

Class ForumRepliesController extends AppController{

    var $name = 'ForumReplies';
    var $scaffold = 'admin'; // admin routing 
    
    function beforeRender(){
        // only display certain fields
        $fields = array('staff_information_id','forum_category_id','forum_topic_id', 'reply');// field name in table
        $this->set('scaffoldFields' ,  $fields); // send to view
    } // beforeRender()    

    
} // ForumReplies
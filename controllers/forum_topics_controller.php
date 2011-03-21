<?php
/**
 * ForumTopics Controller
 * APP/controllers/forum_topics_controller.php
 * views | APP/views/forum_topics/*
 * http://localhost/forum/ForumTopics
 * @author "Azril Nazli Alias";
*/

Class ForumTopicsController extends AppController{

    var $name = 'ForumTopics';
    var $scaffold;
    
    function beforeRender(){
        // only display certain fields
        $fields = array('staff_information_id','forum_category_id','title', 'descriptions');// field name in table
        $this->set('scaffoldFields' ,  $fields); // send to view
    } // beforeRender()    

    
} // ForumTopics
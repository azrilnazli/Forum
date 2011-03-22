<?php
/**
 * BoardController for displaying forum using
 * 960.gs CSS
 * FILE   | APP/controllers/board_controller.php
 * VIEW | APP/views/board/*
 * @author Azril Nazli Alias
 */ 
Class BoardController extends AppController {

    var $name = 'Board';
    var $uses = NULL; // no database yet
    var $layout = 'forum'; // APP/views/layouts/forum.ctp
 
    
    //var $uses = array('ForumCategory'); // load Model
    
    /**
     *  Displaykan muka depan Forum
     *  Senaraikan Category
     *  Senaraikan Topic
     *  Senaraikan Reply
     *  Senaraikan User
     *  @author Azril Nazli Alias
     **/
    function index(){
        $this->helpers[] = 'Time'; // load Time Helper
        # Load Model Dynamically
        # App::import('Model', 'ModelName') 
        App::import('Model', 'ForumCategory'); // import Model
        $this->ForumCategory = new ForumCategory(); // initialize kan object
    
        # Containable On The Fly
        $this->ForumCategory->Behaviors->attach('Containable');

        # senaraikan semua category
        $options['order']          = 'ForumCategory.id DESC'; // ordering
        $options['recursive']    = 3; // -1,0,1,2,3
        //$options['limit']             = 2;  // limitkan data
        $options['fields']           = 'ForumCategory.title';  // field yg perlu sahaja
        
        $options['contain'] = array(
     
               /* Staff Information */
              //'StaffInformation' => array(
              //    'fields' => array('username'),
              //), // StaffInformation

               /* ForumRole */
              //'StaffInformation.ForumRole' => array(
              //    'fields' => array('title'),
              //), //ForumRole
 
              /* ForumTopic */
              'ForumTopic' => array(
                  'fields' => array('id','title','created'),
                  'limit' => 10, // limitkan data 
              ), // ForumTopic
              
              /* ForumTopic.ForumReply */
              'ForumTopic.ForumReply' => array(
                  'fields' => array('created'),
                  'limit' => 1, // limitkan data 
                  'order' => 'id DESC'
              ), // ForumTopic
              
               /* ForumReply.StaffInformation */
              'ForumReply.StaffInformation' => array(
                  'fields' => array('username'),
                  //'limit' => 1, // limitkan data 
              ), // ForumTopic
              
               /* ForumTopic.StaffInformation */
              'ForumTopic.StaffInformation' => array(
                  'fields' => array('username'),
                  'limit' => 1, // limitkan data
              ),  /* ForumTopic.StaffInformation */
              
               /* ForumTopic.StaffInformation.ForumRole */
              //'ForumTopic.StaffInformation.ForumRole' => array(
            
              'StaffInformation.ForumRole' => array(
                   'fields' => array('title'),
                   'limit' => 1, // limitkan data
              ),  /* ForumTopic.StaffInformation.ForumRole */              
        ); // contain

       
        //$options['fields'] = 'ForumCategory.id,ForumCategory.title';
        
        $categories = $this->ForumCategory->find('all', $options);
        //debug($categories);
        
        # cara 1
        //$this->set('categories' , $categories);
        
        # cara 2, data berbentuk array sahaja
        $this->set(compact('categories'));
        
        # cara 3,
        //$this->data['categories'] = $categories;
        
        // Chaining
        //$topics = $this->ForumCategory->ForumTopic->find('all');
        //debug( $topics );
        
        //$replies =  $this->ForumCategory->ForumTopic->ForumReply->find('all');
        //debug($replies);
        
        //$staffs = $this->ForumCategory->StaffInformation->find('all');
        //debug($staffs);
        //pr()
        //var_dump();
    
    }

} // BoardController
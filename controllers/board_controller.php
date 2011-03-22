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
    //var $helpers = array('Cache');
    //var $cacheAction  = "1 hour";
 
    
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
        $this->helpers[] = 'Cache'; // load Cache Helper
        $this->cacheAction = "1 hour"; // set 1 hour cache

        
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
              
                   /* ForumTopic.StaffInformation */
              'ForumTopic.StaffInformation' => array(
                  'fields' => array('username'),
                  'limit' => 1, // limitkan data
              ),  /* ForumTopic.StaffInformation */
              
              
               /* ForumReply.StaffInformation */
              'ForumReply.StaffInformation' => array(
                  'fields' => array('username'),
                  //'limit' => 1, // limitkan data 
              ), // ForumTopic

               /* ForumTopic.StaffInformation.ForumRole */
              //'ForumTopic.StaffInformation.ForumRole' => array(
            
              //'StaffInformation.ForumRole' => array(
              //     'fields' => array('title'),
              //     'limit' => 1, // limitkan data
              //),  /* ForumTopic.StaffInformation.ForumRole */              
        ); // contain

        $categories = $this->ForumCategory->find('all', $options);
        
        // Statistics
        $stat['user'] = $this->ForumCategory->StaffInformation->find('count');
        $stat['category'] = $this->ForumCategory->find('count');
        $stat['topic'] = $this->ForumCategory->ForumTopic->find('count');
        $stat['reply'] = $this->ForumCategory->ForumTopic->ForumReply->find('count');
        
        // Last 5 Users
        $options['limit'] = 5;
        $options['order'] = 'StaffInformation.id DESC';
        $options['fields'] = 'id,username,created';
        $options['recursive'] = -1;
        $users = $this->ForumCategory->StaffInformation->find('all', $options);
        //debug($users);
        //debug($stat);
        
        // Last 10 topics
        unset($options); // reset $options
        $options['limit'] = 10;
        $options['order'] = 'ForumTopic.id DESC';
        $options['fields'] = 'ForumTopic.id, ForumTopic.title, ForumTopic.created';
        //$options['recursive'] = -1;
        $options['contain'] = array(
            'StaffInformation' => array(
                'fields' => array('id','username')
            ), // StaffInformation
            
            'ForumCategory' => array(
                'fields' => array('id','title','created'),
            )// ForumCategory
        
        ); // contain
        # Containable On The Fly
        $this->ForumCategory->ForumTopic->Behaviors->attach('Containable');

        $topics = $this->ForumCategory->ForumTopic->find('all', $options);
         //debug($topics);
        
        // Register to View
        $this->set(compact('categories','stat','users','topics'));
    }

} // BoardController
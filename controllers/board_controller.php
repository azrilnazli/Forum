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
    var $uses = 'ForumCategory'; // no database yet
    var $layout = 'forum'; // APP/views/layouts/forum.ctp
    var $helpers = array(
                            'Time', // Load Time Helper
                            'SiteModule' // Our custom Helpers
                            );
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
        //App::import('Model', 'ForumCategory'); // import Model
        //$this->ForumCategory = new ForumCategory(); // initialize kan object
    
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
        
        // Register to View
        $this->set(compact('categories'));
    }

   /**
     *  Displaykan Category
     *  Senaraikan Topic berdasarkan Category yang dipilih
     *  @author Azril Nazli Alias
     *  view | APP/views/board/category.ctp
     **/    
    function category(){
     // get passed id from URL
     $category_id = $this->passedArgs['category_id'];
     //debug($category_id);
     
     // search Model using given $category_id
     $options['conditions'] = array('ForumCategory.id' => $category_id );
     $count = $this->ForumCategory->find('count', $options);
     //debug($category);
     
     // check if $category is valid   
     if($count == 0 ){
          $this->Session->setFlash('Invalid Category');
          $this->redirect('index');
      } // check $category is valid
     
     // construct options for displaying Topic berdasarkan Category
     unset($options); // reset $options
     $options['order'] = 'ForumTopic.id DESC';
     $options['recursive'] = 2;
     $options['conditions'] =  array('ForumTopic.forum_category_id' => $category_id );
     $options['fields'] = array('id','title','created');
     
     // turn on Containable on ForumTopic
     $this->ForumCategory->ForumTopic->Behaviors->attach('Containable');
     // construct options for Containable
     $options['contain'] = array(
         
         /** ForumCategory **/
         'ForumCategory' => array(
            'fields' => array('title')
         ), 
         /** StaffInformation **/
         'StaffInformation' => array(
            'fields' => array('id','username')
         ),

         /** ForumReply **/
         'ForumReply' => array(
            'fields' => array('created'),
            'order' => 'id DESC' ,
            'limit' => 1
         ),         
         
         /** ForumReply.StaffInformation **/
          'ForumReply.StaffInformation' => array(
              'fields' => array('id','username'),
          )    
     ); // contain

     
     // get the data
     $topics =  $this->ForumCategory->ForumTopic->find('all' , $options);
     //debug($topics);
     
     // get category title only
     $this->ForumCategory->recursive = -1;
     $title = $this->ForumCategory->read('title', $category_id);
     //debug($title);
     $this->set('title', $title['ForumCategory']['title'] );
     
     // send to view
     $this->set(compact('topics'));
    } // category()

    /**
     * Displaykan topic dan juga reply yang berkaitan
     *
     *  @author Azril Nazli Alias
     *  view | APP/views/board/topic.ctp
     **/   
    function topic(){
     // get passed id from URL
     $topic_id = $this->passedArgs['topic_id'];
     
     // search Model using given $category_id
     $options['conditions'] = array('ForumTopic.id' => $topic_id );
     $count = $this->ForumCategory->ForumTopic->find('count', $options);

     
     // check if $category is valid   
     if($count == 0 ){
          $this->Session->setFlash('Invalid Topic');
          $this->redirect('index');
      } // check $category is valid    
   
    
      # breadcrumb data
      $options['recursive'] = 1;
      $options['conditions'] = array('ForumTopic.id' =>  $topic_id );
      $options['fields'] = array('ForumTopic.title' );
      
      # hidupkan Containable
      $this->ForumCategory->ForumTopic->Behaviors->attach('Containable');
      $options['contain'] = array(
          'ForumCategory' => array(
              'fields' => array('title')
          ) // ForumCategory
      ); // Contain
      
      $topic = $this->ForumCategory->ForumTopic->find('first', $options);
      //debug($topic);
      $category['title']  = $topic['ForumCategory']['title'] ;
      $category['id'] = $topic['ForumCategory']['id'] ;
      $this->set('category' , $category);
      $this->set('title' , $topic['ForumTopic']['title'] );
      
      
   } // topic()       
    
} // BoardController
<?php
/**
 * BoardController for displaying forum using
 * 960.gs CSS
 * FILE   | APP/controllers/board_controller.php
 * VIEW | APP/views/board/*
 * @author Azril Nazli Alias
 */ 
 
App::import('Sanitize'); // import Sanitize
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
    
    function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow(array('*') );
        
        // automatic
        $this->data = Sanitize::clean($this->data, array('encode' => false));
        //$this->data = Sanitize::paranoid($this->data);

    }
    
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
                  'order' => 'id DESC'
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
     //$topics =  $this->ForumCategory->ForumTopic->find('all' , $options);
     

     // setup pagination options  
     $this->paginate['limit'] = 3; // limit per page
     $this->paginate['fields'] = $options['fields'];
     $this->paginate['totallimit'] = 1000; // limit total results
     $this->paginate['conditions'] = $options['conditions']; // conditions
     $this->paginate['order'] =  $options['order']; // ordering
     $this->paginate['recursive'] =  $options['recursive']; // recursiveness
     $this->paginate['contain'] =  $options['contain']; // containable
     
     $topics =  $this->paginate('ForumTopic'); // get Topics
     
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
   

      # hidupkan Containable
      $this->ForumCategory->ForumTopic->Behaviors->attach('Containable');
      $options['contain'] = array(
         
          /** Forum Category **/
         'ForumCategory' => array(
              'fields' => array('id','title')
          ), // ForumCategory
          

          /** Staff Information **/
         'StaffInformation' => array(
              'fields' => array('id', 'username')
          ) // StaffInformation          
          
      ); // Contain
      

      
      $topic = $this->ForumCategory->ForumTopic->find('first', $options);
      //debug($topic);
      //$category['title']  = $topic['ForumCategory']['title'] ;
      //$category['id'] = $topic['ForumCategory']['id'] ;
      //$this->set('category' , $category);
      //$this->set('title' , $topic['ForumTopic']['title'] );
      
       $this->set('topic' , $topic);
      
      //debug($topic);
      
      /** Replies based on given topic_id **/
      /*******************************************/
      unset($options); // reset $options
      $options['recursive'] = 3;
      $options['order'] = 'ForumReply.id DESC';
      $options['conditions'] = array('ForumReply.forum_topic_id' =>  $topic_id );
      
      $options['fields'] = array(
                                  'ForumReply.reply',
                                  'ForumReply.created',
                                  'ForumReply.staff_information_id',
                                  );
                                  
      # hidupkan Containable
      $this->ForumCategory->ForumTopic->ForumReply->Behaviors->attach('Containable');
      $options['contain'] = array(
         
          /** Staff Information **/
         'StaffInformation' => array(
              'fields' => array('id', 'username')
          ), // StaffInformation      
          
        
        /** Staff Information > Forum Role **/
        'StaffInformation.ForumRole' => array(
                   'fields' => array('title'),
                   'limit' => 1, // limitkan data
              ),  /* ForumTopic.StaffInformation.ForumRole */                       
        ); // contain

      
      // execute the call
      //$replies = $this->ForumCategory->ForumTopic->ForumReply->find('all', $options);

     // setup pagination options  
     $this->paginate['limit'] = 3; // limit per page
     $this->paginate['fields'] = $options['fields'];
     $this->paginate['totallimit'] = 1000; // limit total results
     $this->paginate['conditions'] = $options['conditions']; // conditions
     $this->paginate['order'] =  $options['order']; // ordering
     $this->paginate['recursive'] =  $options['recursive']; // recursiveness
     $this->paginate['contain'] =  $options['contain']; // containable
     
     $replies =  $this->paginate('ForumReply'); // get Topics


     //debug($replies);
      $this->set(compact('replies'));

   } // topic()       
   
   /**
    * Untuk display form untuk create topic
    * Detect form submission untuk create topic
    * Mesti terima category_id
    **/
    
    function create_topic(){
    
        if(  $this->RequestHandler->isPost()  ){
        
          $this->ForumCategory->ForumTopic->set(  $this->data  ); // set from data for validation
          
          // checking form validation
          if(  $this->ForumCategory->ForumTopic->validates()  ){
              
              // save to db
              if( $this->ForumCategory->ForumTopic->save( $this->data )  ){
                  $this->Session->setFlash('Topic Successfully Created' );
                  
                  $this->ForumCategory->ForumTopic->saveField('forum_category_id',  $this->passedArgs['category_id'] ); 
                  $this->ForumCategory->ForumTopic->saveField('staff_information_id',  $this->Auth->user('id') ); 
                  
                  $options['controller'] = 'Board';
                  $options['action'] = 'topic';
                  $options['topic_id'] = $this->ForumCategory->ForumTopic->id;
                  $this->redirect( $options );
                  
              } // save()
          
          } // validates()
        
        } // detect Post
    
        // get category_id
        $category_id = $this->passedArgs['category_id'];
        
        // check category_id valid ?
        $options['conditions'] = array('ForumCategory.id' => $category_id);
        $count = $this->ForumCategory->find('count', $options);
        
        //debug( $count );
        if(  $count == 0  ){
            $this->Session->setFlash('Invalid Category');
            $this->redirect( $this->referer() );
        } // check
        
        // breadcrumb data
        $options['fields'] = array('ForumCategory.title', 'ForumCategory.id' );
        $options['recursive'] = -1;
        
        $category = $this->ForumCategory->find('first' , $options );
        //debug(  $category  );
        $this->set('category' , $category );
            
    
    } // create_topic()
    
    /**
     * Paparkan form untuk reply topic
     * Paparkan Topic yang ingin di reply
     *
     * kalau isPost() :
     *  1. Terima reply berdasarkan $topic_id
     *  2. Reply disusun mengikut reply latest duduk paling atas
     *  3. Jika tiada $topic_id redirect
     **/
    function create_reply() {
    
        // detect from submission
        if(  $this->RequestHandler->isPost() ){
        
            //debug(  $this->data  ); 
            // daftar nilai form masuk Model
            $this->ForumCategory->ForumTopic->set(  $this->data );
            
            // validation cara manual
           if(  empty(  $this->data['ForumReply']['reply']  )  ){  // check empty ?
              $this->ForumCategory->ForumTopic->ForumReply->invalidate('reply', 'Empty reply ?');  // invalidate reply field
            } // check
            
            // validation
            if(  $this->ForumCategory->ForumTopic->ForumReply->validates()  ){
                // save dalam ForumTopic
                  
                  
                // cleankan data
                //$this->data = Sanitize::clean($this->data, array('encode' => false));
                
                if( $this->ForumCategory->ForumTopic->ForumReply->save( $this->data )  ){
                  $this->Session->setFlash('Post successfully replied' );
                  
                  $this->ForumCategory->ForumTopic->ForumReply->saveField('forum_category_id',  $this->passedArgs['category_id'] ); 
                  
                  $this->ForumCategory->ForumTopic->ForumReply->saveField('forum_topic_id',  $this->passedArgs['topic_id'] ); 
                  
                  $this->ForumCategory->ForumTopic->ForumReply->saveField('staff_information_id',  $this->Auth->user('id') ); 
                  
                  $options['controller'] = 'Board';
                  $options['action'] = 'topic';
                  $options['topic_id'] = $this->passedArgs['topic_id']  ;
                  $this->redirect( $options );
                  
              } // save()
                
                
            }
        
        } // isPost()
    
        $topic_id = $this->passedArgs['topic_id']; // dapatkan nilai dari URL
        
        // check topic_id valid ?
        $options['conditions'] = array('ForumTopic.id' => $topic_id);
        // get topic count
        $count = $this->ForumCategory->ForumTopic->find('count', $options);
        
        //debug( $count );
        if(  $count == 0  ){
            $this->Session->setFlash('Invalid Topic'); // set error title
            $this->redirect( $this->referer() ); // redirect to previous page
        } // check
        
        // dapatkan nilai untuk breadcrumb
        $options['fields'] = array(
                                  'ForumTopic.title', 
                                  'ForumTopic.id',
                                  'ForumTopic.descriptions',
                                  'ForumCategory.title', 
                                  'ForumCategory.id'
                                  );
        // how many table join ?
        $options['recursive'] = 1;
        
        // use containable
        $this->ForumCategory->ForumTopic->Behaviors->attach('Containable');
        $options['contain'] = array('ForumCategory'); // only need ForumCategory
        
        $topic = $this->ForumCategory->ForumTopic->find('first' , $options );
        //debug(  $topic  );
        $this->set('topic' , $topic ); // send to view
    } // create_reply(0
    
    
    
    /**
     * Search by $query against Category, Topic and Reply
     * result must use Pagination
     **/
     function search(){
     //phpinfo();
     // debug($this->data);
        // query can be from $_POST and $passedArgs
        $query =  null;
        $type= null;
        $results = null;
        
        if(  $this->RequestHandler->isPost() ){
            // validation cara manual
           if(  empty(  $this->data['Search']['query']  )  ){  // check empty ?
                $this->Session->setFlash('Empty query');
                $this->redirect( 'search' );
            } // check       
            $query = $this->data['Search']['query'];
            $type = $this->data['Search']['type'];    
        }    
        if(  !empty(  $this->passedArgs['query']  )) $query = $this->passedArgs['query'];
        if(  !empty(  $this->passedArgs['type']  )) $type = $this->passedArgs['type'];
        

       
       switch( $type ){
       case 'category':       ################################## 
              $conditions = array(
                'OR' => array(
                  'ForumCategory.title LIKE'                   => "%{$query}%",
                  'ForumCategory.descriptions LIKE'      => "%{$query}%",
                ));
                
              $fields = array(
                  'ForumCategory.title',
                  'ForumCategory.descriptions',
                  'ForumCategory.created',
                );
                
              $order = 'ForumCategory.id DESC';
              
              $contain = array(
                                  'StaffInformation' => array('fields' => array('id','username') )                       
                               );
              // setup pagination options  
              $this->paginate['limit'] = 1; // limit per page
              $this->paginate['fields'] = $fields;
              $this->paginate['totallimit'] = 1000; // limit total results
              $this->paginate['conditions'] = $conditions; // conditions
              $this->paginate['order'] =  $order; // ordering
              $this->paginate['recursive'] = 1 ; // recursiveness
              $this->paginate['contain'] =  $contain; // containable
        
              # Containable On The Fly
              $this->ForumCategory->Behaviors->attach('Containable');
              $results =  $this->paginate('ForumCategory'); // get Topics   
              $this->set(compact('results'));              
             break; // topic  #################################        

            case 'topic':       ################################## 
              $conditions = array(
                'OR' => array(
                  'ForumTopic.title LIKE'                   => "%{$query}%",
                  'ForumTopic.descriptions LIKE'      => "%{$query}%",
                ));
                
              $fields = array(
                  'ForumTopic.title',
                  'ForumTopic.descriptions',
                   'ForumTopic.created',
                );
                
              $order = 'ForumTopic.id DESC';
              
              $contain = array( 
                                  'ForumCategory' => array('fields' => array('id','title') ) ,
                                  'StaffInformation' => array('fields' => array('id','username') )                       
                               );
               // setup pagination options  
              $this->paginate['limit'] = 1; // limit per page
              $this->paginate['fields'] = $fields;
              $this->paginate['totallimit'] = 1000; // limit total results
              $this->paginate['conditions'] = $conditions; // conditions
              $this->paginate['order'] =  $order; // ordering
              $this->paginate['recursive'] = 1 ; // recursiveness
              $this->paginate['contain'] =  $contain; // containable
              
              # Containable On The Fly
              $this->ForumCategory->ForumTopic->Behaviors->attach('Containable');
              $results =  $this->paginate('ForumTopic'); // get Topics   
               $this->set(compact('results'));              
             break; // topic  #################################    
             
            case 'reply':       ################################## 
              $conditions = array(
                'OR' => array(
                  'ForumReply.reply LIKE'                   => "%{$query}%",
                ));
                
              $fields = array(
                  'ForumReply.reply', 'ForumReply.created',
                );
                
              $order = 'ForumTopic.id DESC';
              
              $contain = array( 
                                  'ForumCategory' => array('fields' => array('id','title') ) ,
                                  'ForumTopic' => array('fields' => array('id','title') ) ,
                                  'StaffInformation' => array('fields' => array('id','username') )                       
                               );
               // setup pagination options  
              $this->paginate['limit'] = 1; // limit per page
              $this->paginate['fields'] = $fields;
              $this->paginate['totallimit'] = 1000; // limit total results
              $this->paginate['conditions'] = $conditions; // conditions
              $this->paginate['order'] =  $order; // ordering
              $this->paginate['recursive'] = 1 ; // recursiveness
              $this->paginate['contain'] =  $contain; // containable
              
              # Containable On The Fly
              $this->ForumCategory->ForumTopic->ForumReply->Behaviors->attach('Containable');
              $results =  $this->paginate('ForumReply'); // get Topics   
               $this->set(compact('results'));              
             break; // topic  #################################                 
             
        } // type
        

        //debug($results);
        //debug($query);
        $this->set('type' , $type);
        $this->set('query' , $query);
     
     
     } // search
     
     /**
      * Delete Topic based on :topic_id
     **/
     function delete_topic(){
          // check :topic_id
          $topic_id = $this->get_topic_id();

          // only admin can delete Topic, get logged_in user role
          $user = $this->Session->read('user'); // get $user from Session
          $role = strToLower(  $user['ForumRole']['title'] ); // get Role Title
          
          switch( $role ){
          
              case 'admin':
                  // admin can delete topic now
                  $this->ForumCategory->ForumTopic->delete( $topic_id );
              break;
          
          } // endSwitch
          
          // Give message and redirect to referer()
          $this->Session->setFlash(" Topic #$topic_id  deleted ");
          
          // redirect to category list
          $options['controller'] = 'Board';
          $options['action'] = 'category';
          $options['category_id']  = $this->passedArgs['category_id'];
          $this->redirect( $options );
          
          $this->autoRender = FALSE; // this action don't have view
        
      } // delete_topic
      
    /**
      * Edit Topic based on :topic_id
     **/
    function edit_topic(){      
        // detect post submission
        if(  $this->RequestHandler->isPost()  ){
        
            // set $this->data variable into Model
            $this->ForumCategory->ForumTopic->set( $this->data );
            
            // validates submmision
            if(  $this->ForumCategory->ForumTopic->validates()  ){
            
                //debug( $this->data );
                // update kena supply id topic, guna Session untuk dapatkan id
                $topic_id = $this->Session->read('topic_id');
                // assign topic_id kepada model->id
                $this->ForumCategory->ForumTopic->id = $topic_id;
                
                // sekarang baru boleh save
                if( $this->ForumCategory->ForumTopic->save(  $this->data ){
                
                    // delete session
                    $this->Session->delete('topic_id');
                    
                    // message
                    $this->Session->setFlash('Topic updated');
                    
                    // redirect ke view topic
                    $options['controller'] = 'Board';
                    $options['action'] = 'topic';
                    $options['topic_id']  = $topic_id;
                    $this->redirect( $options );
                
                } // save
            
            } // validates
            
        } // detect isPost()
    
    
        // get $topic_id
        $topic_id = $this->get_topic_id();
        $category_id = $this->passedArgs['category_id'];
        
        // breadcrumb
        $options['fields'] = array('ForumCategory.title', 'ForumCategory.id' );
        $options['recursive'] = -1;
        $options['conditions']['id'] = $category_id;     
        $category = $this->ForumCategory->find('first' , $options );
        //debug(  $category  );
        $this->set('category' , $category );
                
        // daftar $topic_id dalam Session
        $this->Session->write('topic_id' , $topic_id );
        
        // get $topic data and give to $this->data
        unset($options);
        $options['recursive'] = -1;
        $options['conditions']['id'] = $topic_id;        
        $this->data = $this->ForumCategory->ForumTopic->find('first', $options );
        //debug( $this->data );

    } // edit topic
    
    /**
     * Check :topic_id
     **/
    function get_topic_id(){
         // get :topic_id from URL and assign to $topic_id
          $topic_id = $this->passedArgs[  'topic_id'  ];
          // check topic_id valid ?
          $options['conditions'] = array('ForumTopic.id' => $topic_id);
          // get topic count
          $count = $this->ForumCategory->ForumTopic->find('count', $options);
        
          //debug( $count );
          if(  $count == 0  ){
              $this->Session->setFlash('Invalid Topic'); // set error title
              $this->redirect( $this->referer() ); // redirect to previous page
          } // check          
          
          return $topic_id;
    } // check_topic_id
    
} // BoardController
<?php
Class SiteModuleHelper extends AppHelper{
  
    // load Html Helper
    var $helpers = array('Html', 'Session');
    
   // UserPanel
   function userpanel(){
         // nak load Element function
        $this->View =& ClassRegistry::getObject('view');
        
        // display using element APP/views/elements/userpanel.ctp
        echo  $this->View->Element('userpanel' );   
   }
   
   // Show Menu
   function menu(){
        // nak load Element function
        $this->View =& ClassRegistry::getObject('view');
        
        // display using element APP/views/elements/menu.ctp
        echo  $this->View->element('menu' ); 
   } // menu()
   
   // Show Statistics
   function statistics(){
        // load Model ForumCategory
        App::import('Model', 'ForumCategory');
        
        // Initialize $this->ForumCategory object
        $this->ForumCategory = new ForumCategory();
        
        // get data
        $stat['user'] = $this->ForumCategory->StaffInformation->find('count');
        $stat['category'] = $this->ForumCategory->find('count');
        $stat['topic'] = $this->ForumCategory->ForumTopic->find('count');
        $stat['reply'] = $this->ForumCategory->ForumTopic->ForumReply->find('count');

        // generate HTML for statistics
        $html1 = "
        <div id='sidebar'>
        <h2>Statistics</h2>
        <ol style='list-style-type:none; margin-left:-20px'>
        "; // $html1
        
        // Foreach
        FOREACH($stat as $k=>$v):
            // generate <li>key : value</li> html tag
            $html2[] = $this->Html->tag('li', sprintf("%s : %s", ucFirst($k), $v));
        ENDFOREACH;
        // Convert Array to String using implode() | php.net/implode
        $html2 = implode(' ', $html2);
        
        $html3 = "
        </ol>
        </div>
        "; // $html3

        echo $html1 . $html2 . $html3; // combine all 3 variables and return
        
    } // statistics()
    
    /**
     * Display latest registered users
    */
    function users(){
         // load Model ForumCategory
        App::import('Model', 'ForumCategory');
        
        // Initialize $this->ForumCategory object
        $this->ForumCategory = new ForumCategory();

         // Last 5 Users
        $options['limit'] = 5;
        $options['order'] = 'StaffInformation.id DESC';
        $options['fields'] = 'id,username,created';
        $options['recursive'] = -1;
        
        $users = $this->ForumCategory->StaffInformation->find('all', $options);
        
        // Generate HTML
        $html1 = '<div id="sidebar">
        <h2>Users</h2>
        <ol> '; // $html1
        
        FOREACH($users as $k=>$v):
          $html2[] =  $this->Html->tag('li', $v['StaffInformation']['username']);
        ENDFOREACH;
        $html2 = implode(' ', $html2);        
        $html3 = '</ol></div>';
        
        echo $html1 . $html2 . $html3;

    } // users()
    
           
    /**
     * Display recent_topics
    */
    function recent_topics(){
    
        // load Model ForumCategory
        App::import('Model', 'ForumCategory');
        
        // Initialize $this->ForumCategory object
        $this->ForumCategory = new ForumCategory();
        
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
        
        // Containable On The Fly
        $this->ForumCategory->ForumTopic->Behaviors->attach('Containable');

        // get latest topics
        $topics = $this->ForumCategory->ForumTopic->find('all', $options);

        // nak load Element function
        $this->View =& ClassRegistry::getObject('view');
        
        // display using element APP/views/elements/recent_topics.ctp
        echo  $this->View->element('recent_topics', array('topics' => $topics)  ); 
    }
    
    /**
     * Display Create Topic link for logged user
     **/
     function link($title = null, $options = null){
        
        // Check if user logged in ?
        $user = $this->Session->read('user');
        
        // If logged in then display the link
        if(  !empty(  $user  )  ){
            echo $this->Html->link($title, $options);
        } // check
     
     } // link
     
     
     
    
}
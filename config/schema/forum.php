<?php 
/* SVN FILE: $Id$ */
/* forum schema generated on: 2011-03-21 02:03:47 : 1300674287*/
class forumSchema extends CakeSchema {
	var $name = 'forum';

	function before($event = array()) {
		return true;
	}

	function after($event = array()) {
	}
  
  // staff_informations
  // type [integer , string, text, boolean, date, datetime, float]
  var $staff_informations = array(
		'id' => array(
                        'type' => 'integer', 
                        'key' => 'primary'
                      ),
                      
    // belongsTo ForumRole
    'forum_role_id' => array('type' => 'integer'),    
		
    'username' => array('type' => 'string'),
    'password' => array('type' => 'string'),
    'email' => array('type' => 'string'),
    'biodata' => array('type' => 'text'),
    
    // cake automatic trail
    'created' => array('type' => 'datetime'),
    'modified' => array('type' => 'datetime'),
    
    // audit trail in AppModel.php
    'created_by' => array('type' => 'integer'),
    'modified_by' => array('type' => 'integer'),
    
  );  // staff_informations
  // cake schema create forum staff_informations

  
 var $forum_roles = array(
		'id' => array(
                        'type' => 'integer', 
                        'key' => 'primary'
                      ),
                      
    'title' => array('type' => 'string'),    
    'descriptions' => array('type' => 'text'),
    
    'created' => array('type' => 'datetime'),
    'modified' => array('type' => 'datetime'),
    
    'created_by' => array('type' => 'integer'),
    'modified_by' => array('type' => 'integer'),    

  );  // staff_informations
  // cake schema create forum staff_informations  
  
  
var $forum_categories = array(
		'id' => array(
                        'type' => 'integer', 
                        'key' => 'primary'
                      ),
    
    // ForumCategory belongsTo StaffInformation
    'staff_information_id' => array('type' => 'integer'),
    
    'title' => array('type' => 'string'),    
    'descriptions' => array('type' => 'text'),
    
    // general fields
    'created' => array('type' => 'datetime'),
    'modified' => array('type' => 'datetime'),
    'created_by' => array('type' => 'integer'),
    'modified_by' => array('type' => 'integer'),    

  );  // staff_informations
  
  
var $forum_topics = array(
		'id' => array(
                        'type' => 'integer', 
                        'key' => 'primary'
                      ),
    
    // ForumTopic belongsTo StaffInformation
    'staff_information_id' => array('type' => 'integer'),

    // ForumTopic belongsTo ForumCategory
    'forum_category_id' => array('type' => 'integer'),    
    
    'title' => array('type' => 'string'),    
    'descriptions' => array('type' => 'text'),
    
    // general fields
    'created' => array('type' => 'datetime'),
    'modified' => array('type' => 'datetime'),
    'created_by' => array('type' => 'integer'),
    'modified_by' => array('type' => 'integer'),    

  );  // staff_informations
  
  var $forum_replies = array(
		'id' => array(
                        'type' => 'integer', 
                        'key' => 'primary'
                      ),
    
    // ForumReply belongsTo StaffInformation
    'staff_information_id' => array('type' => 'integer'),

    // ForumReply belongsTo ForumCategory
    'forum_category_id' => array('type' => 'integer'),    
    
    // ForumReply belongsTo ForumTopic
    'forum_topic_id' => array('type' => 'integer'),       
    
    #'title' => array('type' => 'string'),    
    'reply' => array('type' => 'text'),
    
    // general fields
    'created' => array('type' => 'datetime'),
    'modified' => array('type' => 'datetime'),
    'created_by' => array('type' => 'integer'),
    'modified_by' => array('type' => 'integer'),    

  );  // staff_informations  
  
  
   var $tickets = array(
		'id' => array(
                        'type' => 'integer', 
                        'key' => 'primary'
                      ),
    
    // Ticket belongsTo StaffInformation
    'staff_information_id' => array('type' => 'integer'),
    'ticket' => array('type' => 'string'),
    'created' => array('type' => 'datetime'),
    );
  
  // cake schema create forum staff_informations  
  
  
  // Attachments
  var $attachments = array(
		'id' => array(
                        'type' => 'integer', 
                        'key' => 'primary'
                      ),
    
    // Attachment belongsTo StaffInformation
    'staff_information_id' => array('type' => 'integer'),
    
    // filename
    'name' => array('type' => 'string'),

    // mime
    'mime' => array('type' => 'string'),    
    
     // size
    'size' => array('type' => 'integer'),   

     // path
    'path' => array('type' => 'path'),   
    
    // general fields
    'created' => array('type' => 'datetime'),
    'modified' => array('type' => 'datetime'),    

  ); // attachments

}
?>
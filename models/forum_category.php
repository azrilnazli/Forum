<?php
/**
 * Model for ForumCategory
 * Forum Category
 * Admin | Moderator | User
 * http://phpdoc.org
 * @author Azril Nazli Alias <azril.nazli@gmail.com>
 */
Class ForumCategory extends AppModel{
    var $name = 'ForumCategory';
    var $useDbConfig = 'default'; // check in database.php
    var $useTable = 'forum_categories';
    var $primaryKey = 'id';
    
    /**
     * Model Relations
    **/
    var $hasMany = array(
        'ForumTopic' => array('dependent' => TRUE),
        'ForumReply' => array('dependent' => TRUE),
    ); // hasMany        
    
    var $belongsTo = array(
        'StaffInformation'
    ); // belongsTo

} // ForumCategory Model
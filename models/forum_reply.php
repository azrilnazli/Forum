<?php
/**
 * Model for ForumReply
 * Forum Category
 * Admin | Moderator | User
 * http://phpdoc.org
 * @author Azril Nazli Alias <azril.nazli@gmail.com>
 */
Class ForumReply extends AppModel{
    var $name = 'ForumReply';
    var $useDbConfig = 'default'; // check in database.php
    var $useTable = 'forum_replies';
    var $primaryKey = 'id';
    
    /**
     * Model Relations
    **/ 
    var $belongsTo = array(
        'StaffInformation',
        'ForumCategory',
        'ForumTopic',
    ); // belongsTo        

} // ForumReply Model

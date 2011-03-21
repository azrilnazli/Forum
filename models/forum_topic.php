<?php
/**
 * Model for ForumTopic
 * Forum Category
 * Admin | Moderator | User
 * http://phpdoc.org
 * @author Azril Nazli Alias <azril.nazli@gmail.com>
 */
Class ForumTopic extends AppModel{
    var $name = 'ForumTopic';
    var $useDbConfig = 'default'; // check in database.php
    var $useTable = 'forum_topics';
    var $primaryKey = 'id';

} // ForumTopic Model

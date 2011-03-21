<?php
/**
 * Model for ForumRole
 * Manage user role in Forum 
 * Admin | Moderator | User
 * http://phpdoc.org
 * @author Azril Nazli Alias <azril.nazli@gmail.com>
 */
Class ForumRole extends AppModel{
    var $name = 'ForumRole';
    var $useDbConfig = 'default'; // check in database.php
    var $useTable = 'forum_roles';
    var $primaryKey = 'id';

} // ForumRole Model
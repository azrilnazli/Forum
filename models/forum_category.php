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

} // ForumCategory Model
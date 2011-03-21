<?php
/**
 * Model for StaffInformation
 * http://phpdoc.org
 * @author Azril Nazli Alias <azril.nazli@gmail.com>
 */
Class StaffInformation extends AppModel{
    var $name = 'StaffInformation';
    var $useDbConfig = 'default'; // check in database.php
    var $useTable = 'staff_informations';
    var $primaryKey = 'id';
    
    // to show username in dropdown menu
    // dropdown , index [ scaffold ]
    var $displayField = 'username'; // field in table
    
    var $belongsTo = array(
        'ForumRole'
    ); // belongsTo 
    
    var $hasMany = array(
        'ForumCategory',
        'ForumTopic',
        'ForumReply'
    ); // hasMany
    
} // StaffInformationModel
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

} // StaffInformationModel
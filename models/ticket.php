<?php
Class Ticket extends AppModel {
    var $name = 'Ticket';
    var $belongsTo = array('StaffInformation');

}
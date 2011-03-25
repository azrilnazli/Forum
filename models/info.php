<?php
Class Info extends AppModel{
  var $name = 'Info';
  var $useTable = false;

    
  var $validate = array(
  
      /** Field : name **/
      'name' => array(
      
          /** Not Empty **/
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'message' => 'Please fill up your name',
              'last' => TRUE // stop validation if this rule not fulfilled
          ), // notEmpty
          
          /** Between **/
          'between' => array(
              'rule' => array('between', 5 , 15),
              'message' => 'Name must between 5 to15' 
          ) //  Between
      
      ) // Field :name      
  
  );// validate  
    
    
} // info()
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
    
  
  var $validate = array(

    /** Field : forgot_email **/
      'forgot_email' => array(
      
          /** Not Empty **/
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'message' => 'Please fill up your email',
              'last' => TRUE // stop validation if this rule not fulfilled
          ), // notEmpty
          
          /** Email **/
          'email' => array(
              'rule' => 'email',
              'message' => 'Invalid Email Format' ,
              'last' => TRUE // stop validation if this rule not fulfilled
          ), //  Email
            
      ), // Field forgot_email  
  
      /** Field : username **/
      'username' => array(
      
          /** Not Empty **/
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'message' => 'Please fill up your username',
              'last' => TRUE // stop validation if this rule not fulfilled
          ), // notEmpty
          
          
          /** AlphaNumeric **/
          'between' => array(
              'rule' => 'alphaNumeric',
              'message' => 'Invalid Username Format' ,
              'last' => TRUE // stop validation if this rule not fulfilled
          ), //  Between
          
          /** Between **/
          'between' => array(
              'rule' => array('between', 3 , 15),
              'message' => 'Username must between 3 to15' ,
              'last' => TRUE // stop validation if this rule not fulfilled
          ), //  Between

          /** isUnique **/
          'isUnique' => array(
              'rule' => array('isUnique'),
              'message' => 'Your username is taken' 
          ) //  isUnique
            
      ), // Field username      
      
        /** Field : email **/
      'email' => array(
      
          /** Not Empty **/
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'message' => 'Please fill up your email',
              'last' => TRUE // stop validation if this rule not fulfilled
          ), // notEmpty
          
          /** Email **/
          'email' => array(
              'rule' => 'email',
              'message' => 'Invalid Email Format' ,
              'last' => TRUE // stop validation if this rule not fulfilled
          ), //  Email

          /** isUnique **/
          'isUnique' => array(
              'rule' => array('isUnique'),
              'message' => 'Your email is taken' 
          ) //  isUnique
            
      ), // Field email            

      /** Field : new_password **/
      'new_password' => array(
      
          /** Not Empty **/
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'message' => 'Please fill up your password',
              'last' => TRUE // stop validation if this rule not fulfilled
          ), // notEmpty
          
          /** Between **/
          'between' => array(
              'rule' => array('between', 3 , 15),
              'message' => 'Password must between 3 to15' 
          ) //  Between
      
      ), // Field new_password       
  
      /** Field : biodata **/
      'biodata' => array(
      
          /** Not Empty **/
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'message' => 'Please fill up your biodata',
              'last' => TRUE // stop validation if this rule not fulfilled
          ), // notEmpty
          
          /** Between **/
          'between' => array(
              'rule' => array('between', 3 , 1000),
              'message' => 'Biodata must between 3 to1000' 
          ) //  Between
      
      ), // Field biodata 
    
  );// validate  
      
    
    
} // StaffInformationModel
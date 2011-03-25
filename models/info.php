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
      
      ), // Field :name      
      
      /** Field : nric **/
      'nric' => array(
      
          /** Not Empty **/
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'message' => 'Please fill up your NRIC',
              'last' => TRUE // stop validation if this rule not fulfilled
          ), // notEmpty
          
          /** Between **/
          'between' => array(
              'rule' => array('between', 12 , 12),
              'message' => 'NRIC must be 12 characters',
              'last' => TRUE              
          ), //  Between
          
          /** Numeric **/
          'numeric' => array(
              'rule' => array('numeric'),
              'message' => 'Please insert only integer',
              'last' => TRUE              
          ), //  Numeric

          /** JPN Customised Validation **/
          
           /** checkDob **/
          'checkDob' => array(
              'rule' => 'checkDob',
              'message' => 'Invalid Date Of Birth',
              'last' => TRUE              
          ), //  checkDob
          
           /** checkState **/
          'checkState' => array(
              'rule' => 'checkState',
              'message' => 'Invalid State',
              'last' => TRUE              
          ), //  checkDob          

      ), // Field : nric         
      
   /** Field : gender **/
      'gender' => array(
      
          /** Not Empty **/
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'message' => 'Please choose a gender',
              'last' => TRUE // stop validation if this rule not fulfilled
          ), // notEmpty
      ), // Field :gender
      
   /** Field : occupation **/
      'occupation' => array(
      
          /** Not Empty **/
          'notEmpty' => array(
              'rule' => 'notEmpty',
              'message' => 'Please choose a job',
              'last' => TRUE // stop validation if this rule not fulfilled
          ), // notEmpty
      ), // Field :occupation      
  
  );// validate  
  
  /**
   * To check valid birthdate for given NRIC
   * eg : 770309115027
   * take first 6 integers
   * check against php checkdate() function
   * @author Azril Nazli Alias
   * @param array $check
   * @return array $check 
   * @return array FALSE 
   **/
  
  function checkDob($check = null){
      // debug($check);
      // get first 6 integers
      // get the value for submitted dob
      $birthdate = $check['nric'];
      $year =     substr($birthdate, 0, 2); // position, how many string ?
      $month =  substr($birthdate, 2, 2);
      $day =      substr($birthdate, 4, 2);
      //debug($year);
      
      // validate the date using checkDate() function
      # checkdate(month,day,year) 
      if( checkdate($month, $day, $year) ) {
          return $check; // must return
      } else {
          return FALSE; 
      }
  } // checkDob()
  
  
    /**
   * To check valid sate for given NRIC
   * eg : 770309115027
   * take 8th to 9th value and check against allowed states
   * @author Azril Nazli Alias
   * @param array $check
   * @return array $check 
   * @return array FALSE 
   **/
  
  function checkState($check = null){
      $nric = $check['nric'];
      $user_state =     substr($nric, 6, 2); // position, how many string ?
      //debug($user_state);
      
      // construct array of allowed states
      $valid_states = array( // define valid states 
        '01', // johore
        '02',
        '03',
        '11' // terengganu
       ); // $valid_states
        
      
      // check againts valid states
      if(  in_array(  $user_state,  $valid_states  )  ) {
          return $check; // return if true
      } else {
          return FALSE;
      } // in_array

  } // checkState
    
    
} // info()
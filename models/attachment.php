<?php
Class Attachment extends AppModel{

    var $name = 'Attachment';
    var $belongsTo = array('StaffInformation');
    
    var $validate = array(
        'image' => array(
            
            // rule check_size
            'check_size' => array(
                        'rule' => array('check_size'),
                        'message' => 'File too big. Only 1mb allowed'
            ) ,
            // rule check_size
 
            // rule check_mime
            'check_mime' => array(
                        'rule' => array('check_mime'),
                        'message' => 'Invalid file. Only JPG,PNG allowed',
            ) , 
            // rule check_mime
        
        
        ) // field Attachment.name
    
    ); // $validate
    
    
    function check_size($check = null){
    
        //debug($check);
        $size = $check['image']['size'];
  
        $max_size = 1*1000*1000;  //  1MB 
        
        // check the uploaded size
        if(  $size > $max_size  ){
            // salah
            return FALSE;
        } else {
            // betul
            return $check;
        } // check the size
        
    } // check_size validation
    
    function check_mime($check = null){
        // submitted image
        $mime = $check['image']['type'];
        
        $allowed = array(
            // check google term 'mime types'
            'image/jpeg', // JPEG
            'image/jpg', // JPEG
            'image/png', // PNG
        ); // allowed files
        
        // check jika submitted image dalam senarai array 
        if(  in_array(   $mime , $allowed  )  ){
            // betul
            return $check;
        } else {
            // salah
            return FALSE;
        }
    
    } // check_mime
    

} // Attachment
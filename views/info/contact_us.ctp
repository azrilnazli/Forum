<div id="breadcrumb">
      <?php      
      $this->Html->addCrumb('Contact Us');
       echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>
<p></p>
<?php
// Link to online library
echo $this->Html->script('http://code.jquery.com/jquery-1.5.1.min.js');
?> 
<script>
$(document).ready(  function(){
    // Hide class other
    $('.other').hide();
    
    // selector for Gender
    /*
    If you wish to use any of the meta-characters ( such as !"#$%&'()*+,./:;<=>?@[\]^`{|}~ ) as a literal part of a name, you must escape the character with two backslashes: \\
    */
    // name = data['Info'][''gender]
    
    
    //function show_other(){
    function show_other(type ,event , fieldname){
    //################### show field
    //field = [name="data\\[Info\\]\\[gender\\]"]';

    field = type+'[name="data\\[Info\\]\\['+fieldname+'\\]"]';
    $(field).bind(event, function(){
            // show #other-job
            //$('#other-gender').show();
            //val = $("input:radio:checked").val();
            var selected = $(this).val(); 
 
  
            // if user choose 'other', show #other-gender
            if( selected == 'other' ){
                $('#other-'+fieldname+'').show();
            } else {
                $('#other-'+fieldname+'').hide(); 
            }
     }); // bind Gender
    //################### show field
    }// function
    
    show_other('input','click', 'gender');  
    show_other('select','change', 'occupation');  
    
    // Checkbox
    // id=InfoHobbiesOther
    $('#InfoHobbiesOther').bind('click', function(){
        //alert('checked');
        $('#other-hobbies').toggle();
    });
    
 
});//ready
</script>

<style>
.contact_us td { padding: 5px }
.contact_us label { font-size: 2.2em; }
.contact_us input[type=text] { width: 300px; height: 30px; border: 1px #000 solid }

/** Radio Button **/
.contact_us input[type=radio] { margin-right: 10px }
.contact_us .radio { font-size: 2.2em }


/** Checkbox **/
.contact_us input[type=checkbox] { margin-right: 20px }
.contact_us .checkbox { font-size: 1.0em }

/** Select **/
.contact_us select {
	clear: both;
	font-size: 2.2em;
	vertical-align: text-bottom;
}

.contact_us option {
	padding-left : 10px;
  width: 270px;
}

.contact_us #error { 
    color: white; 
    font-size: 1.8em;
    background-color: red;  
    height: 25px; 
    padding: 5px; 
    border: 2px #fff solid;
}
</style>
<div id = 'info' class="contact_us">
    <h1>Contact Us</h1>   
    <p>Fill up the form below</p>
    <?php
    $options['url']['controller'] = 'Info';
    $options['url']['action'] = 'contact_us';
    echo $this->Form->create('Info', $options);
    ?>
    <table>
        <?php ############################# name ?>
        <tr>
        <td><?php echo $this->Form->label('Name'); ?></td>
        <td>
        <?php
        unset($options);
        $options['type'] = 'text'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        //$options['before'] = 'JPN [ ';
        $options['error'] = FALSE;
        $options['div'] = false;
        $options['id'] = 'name';
        echo  $this->Form->input('name', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('name')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('name'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <?php ############################# name ?>
  
        <?php ############################# nric?>
        <tr>
        <td><?php echo $this->Form->label('NRIC'); ?></td>
        <td>
        <?php
        unset($options);
        $options['type'] = 'text'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        //$options['before'] = 'JPN [ ';
        $options['error'] = FALSE;
        $options['div'] = false;
        $options['id'] = 'nric';
        echo  $this->Form->input('nric', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('nric')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('nric'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <?php ############################# nric ?>  
   
        <?php ############################# email?>
        <tr>
        <td><?php echo $this->Form->label('Email'); ?></td>
        <td>
        <?php
        unset($options);
        $options['type'] = 'text'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        //$options['before'] = 'JPN [ ';
        $options['error'] = FALSE;
        $options['div'] = false;
        $options['id'] = 'email';
        echo  $this->Form->input('email', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('email')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('email'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <?php ############################# email ?>     
        
        <?php ############################# gender ?>
        <tr>
        <td><?php echo $this->Form->label('Gender'); ?></td>
        <td>
        <?php
        unset($options);
        $genders = array(
          'male' => 'Male',
          'female' => 'Female',
          'other' => 'Other',
        );
        $options['type'] = 'radio'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        $options['options'] = $genders;
        $options['legend'] = FALSE;
        $options['error'] = FALSE;
        $options['div'] = array('class' => 'radio' );
        $options['id'] = 'gender';
        echo  $this->Form->input('gender', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('gender')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('gender'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <tr class="other" id="other-gender" >
        <td>
            <?php echo $this->Form->label('Other Gender'); ?>
        </td>
        <td>
            <?php 
            unset($options);
            $options['type'] = 'text'; // text|radio|checkbox|select|textarea|password|file
            $options['label'] = FALSE;
            $options['error'] = FALSE;
            $options['id'] = 'other-gender-form';
            echo $this->Form->input('other_gender', $options); 
            ?>
        </td>
        
        </tr>
        <?php ############################# gender ?>             
        
        <?php ############################# occupation ?>
        <tr>
        <td><?php echo $this->Form->label('Occupation'); ?></td>
        <td>
        <?php
        unset($options);
        $occupations = array(
          'private' => 'Private',
          'government' => 'Government',
          'other' => 'Other',
        );
        $options['type'] = 'select'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        $options['options'] = $occupations;
       // $options['legend'] = FALSE;
        $options['error'] = FALSE;
        $options['div'] = array('class' => 'select' );
        $options['id'] = 'occupation';
        $options['empty'] = 'Please Select';
        echo  $this->Form->input('occupation', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('occupation')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('occupation'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        
        <tr class="other" id="other-occupation" >
        <td>
            <?php echo $this->Form->label('Other Occupation'); ?>
        </td>
        <td>
            <?php 
            unset($options);
            $options['type'] = 'text'; // text|radio|checkbox|select|textarea|password|file
            $options['label'] = FALSE;
            $options['error'] = FALSE;
            $options['id'] = 'other-occupation-form';
            echo $this->Form->input('other_occupation', $options); 
            ?>
        </td>
        
        </tr>
        <?php ############################# occupation ?>  
        
        
        
        <?php ############################# hobbies ?>
        <tr>
        <td><?php echo $this->Form->label('Hobbies'); ?></td>
        <td>
        <?php
        unset($options);
        $hobbies = array(
          'swimming' => 'Swimming',
          'gymnasium' => 'Gymnasium',
          'aerobic' => 'Aerobic',
          'tennis' => 'Tennis',
          'other' => 'Other',
   
        );
        $options['type'] = 'select'; // text|radio|checkbox|select|textarea|password|file
        $options['multiple'] = 'checkbox'; // checkbox | select
        $options['label'] = FALSE;
        $options['options'] = $hobbies;
       // $options['legend'] = FALSE;
        $options['error'] = FALSE;
        $options['div'] = array('class' => 'select' );
        $options['id'] = 'hobbies';
        $options['empty'] = 'Please Select';
        echo  $this->Form->input('hobbies', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('hobbies')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('hobbies'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <tr class="other" id="other-hobbies" >
        <td>
            <?php echo $this->Form->label('Other Hobbies'); ?>
        </td>
        <td>
            <?php 
            unset($options);
            $options['type'] = 'text'; // text|radio|checkbox|select|textarea|password|file
            $options['label'] = FALSE;
            $options['error'] = FALSE;
            $options['id'] = 'other-hobbies-form';
            echo $this->Form->input('other_hobbies', $options); 
            ?>
        </td>
        
        </tr>
        <?php ############################# hobbies ?>          
        
    </table>
    <?php 
    # submit button
    unset($options);
    $options['type'] = 'submit';
    echo $this->Form->button('Submit', $options); 
    ?>
    
    <?php 
    # reset button
    unset($options);
    $options['type'] = 'reset';
    echo $this->Form->button('Reset', $options); 
    ?>
    
    
    <?php echo $this->Form->end(); ?>
    
</div>
<div id="breadcrumb">
      <?php      
      $this->Html->addCrumb('Sign Up');
       echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>
<p></p>


<style>
.signup td { padding: 5px }
.signup label { font-size: 2.2em; }
.signup input[type=text] { width: 300px; height: 30px; border: 1px #000 solid; font-size: 2em }
.signup input[type=password] { width: 300px; height: 30px; border: 1px #000 solid; font-size: 2em }

.signup textarea {
border: 1px #000 solid;
width: 300px;
font-size: 2em;
font-weight:bold;
}
/** Radio Button **/
.signup input[type=radio] { margin-right: 10px }
.signup .radio { font-size: 2.2em }


/** Checkbox **/
.signup input[type=checkbox] { margin-right: 20px }
.signup .checkbox { font-size: 1.0em }

/** Select **/
.signup select {
	clear: both;
	font-size: 2.2em;
	vertical-align: text-bottom;
}

.signup option {
	padding-left : 10px;
  width: 270px;
}

.signup #error { 
    color: white; 
    font-size: 1.5em;
    background-color: red;  
    height: 25px; 
    padding: 5px; 
    border: 2px #fff solid;
}
</style>


<div id = 'info' class="signup">
    <h1>Sign Me Up</h1>   
    <?php
    $options['url']['controller'] = 'StaffInformations';
    $options['url']['action'] = 'signup';
    echo $this->Form->create('StaffInformation', $options);
    ?>
    <table>
        <?php ############################# username ?>
        <tr>
        <td><?php echo $this->Form->label('Username'); ?></td>
        <td>
        <?php
        unset($options);
        $options['type'] = 'text'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        //$options['before'] = 'JPN [ ';
        $options['error'] = FALSE;
        $options['div'] = false;
        $options['id'] = 'username';
        echo  $this->Form->input('username', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('username')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('username'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <?php ############################# username ?>
        
        
     <?php ############################# new_password ?>
        <tr>
        <td><?php echo $this->Form->label('Password'); ?></td>
        <td>
        <?php
        unset($options);
        $options['type'] = 'password'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        //$options['before'] = 'JPN [ ';
        $options['error'] = FALSE;
        $options['div'] = false;
        $options['id'] = 'username';
        echo  $this->Form->input('new_password', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('new_password')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('new_password'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <?php ############################# new_password ?>
        
      <?php ############################# email ?>
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
        $options['id'] = 'username';
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
           
           
        <?php ############################# biodata ?>
        <tr>
        <td><?php echo $this->Form->label('Biodata'); ?></td>
        <td>
        <?php
        unset($options);
        $options['type'] = 'textarea'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        //$options['before'] = 'JPN [ ';
        $options['error'] = FALSE;
        $options['div'] = false;
        $options['id'] = 'biodata';
        echo  $this->Form->input('biodata', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('biodata')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('biodata'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <?php ############################# biodata ?>
        
        <?php ############################# question ?>
        <tr>
        <td><?php echo $this->Form->label('Question'); ?></td>
        <td>
        <p>How many letters in "JPN" ?
        <?php
        unset($options);
        $options['type'] = 'text'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        //$options['before'] = 'JPN [ ';
        $options['error'] = FALSE;
        $options['div'] = FALSE;
        $options['id'] = 'question';
        $options['style'] = "width: 50px";
        $options['maxLength'] = 2;
        echo  $this->Form->input('question', $options);
        ?>
        </p>
        </td>
        <td>
        <?php IF(  $this->Form->isFieldError('question')  ): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('question'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <?php ############################# question ?>              
    </table>
    <?php 
    # submit button
    unset($options);
    $options['type'] = 'submit';
    echo $this->Form->button('Sign Me Up', $options); 
    ?>
    
    <?php 
    # reset button
    unset($options);
    $options['type'] = 'reset';
    echo $this->Form->button('Reset', $options); 
    ?>
    
    
    <?php echo $this->Form->end(); ?>
    
</div>

<div id="breadcrumb">
      <?php      
      $this->Html->addCrumb('Forgot Password');
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
    <h1>Forgot Password</h1>   
    <?php
    $options['url']['controller'] = 'StaffInformations';
    $options['url']['action'] = 'forgot_password';
    echo $this->Form->create('StaffInformation', $options);
    ?>
    <table>
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
        $options['id'] = 'forgot_email';
        echo  $this->Form->input('forgot_email', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('forgot_email')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('forgot_email'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <?php ############################# email ?>
    
              
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

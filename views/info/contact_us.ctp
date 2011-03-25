<div id="breadcrumb">
      <?php      
      $this->Html->addCrumb('Contact Us');
       echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>
<p></p>
<style>
.contact_us td { padding: 5px }
.contact_us label { font-size: 2.2em; }
.contact_us input[type=text] { width: 300px; height: 30px; border: 1px #000 solid }

/** Radio Button **/
.contact_us input[type=radio] { margin-right: 10px }
.contact_us .radio { font-size: 2.2em }

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
        
        <?php ############################# email?>
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
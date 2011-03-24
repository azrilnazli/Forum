<div id="breadcrumb">
      <?php      
      $this->Html->addCrumb('Login');
       echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>
<p></p>
<?php

?>
<div id = 'info'>
<h1>Login</h1>

<?php IF( $this->Session->check('Message.auth') ): ?>
<?php   echo $this->Session->flash('auth'); ?>
<?php ENDIF; ?>

<fieldset>
<?php
$options['url']['controller'] = 'StaffInformations';
$options['url']['action'] = 'login';
echo $this->Form->create('StaffInformation', $options);
?>
<?php
     $o['label'] = FALSE;
     $o['div'] = FALSE;
?>     
<?php echo $this->Form->input('username', $o); ?>
&nbsp;
<?php echo $this->Form->input('password', $o); ?>
&nbsp;
<?php echo $this->Form->submit('Login', $o); ?>
<?php echo $this->Form->end(); ?>
</fieldset>
</div>
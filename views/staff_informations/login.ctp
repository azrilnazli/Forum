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
<fieldset>
<legend>Login</legend>
<?php
$options['url']['controller'] = 'StaffInformations';
$options['url']['action'] = 'login';
echo $this->Form->create('StaffInformation', $options);
?>
<?php echo $this->Form->input('username'); ?>
<?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->end('Login'); ?>
</fieldset>
</div>
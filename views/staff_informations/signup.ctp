<div id="breadcrumb">
      <?php      
      $this->Html->addCrumb('Signup');
       echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>
<p></p>
<?php

?>
<div id = 'info'>
<fieldset>
<legend>Signup</legend>
<?php
$options['url']['controller'] = 'StaffInformations';
$options['url']['action'] = 'signup';
echo $this->Form->create('StaffInformation', $options);
?>
<?php echo $this->Form->input('username'); ?>
<?php echo $this->Form->input('password'); ?>
<?php echo $this->Form->input('email'); ?>
<?php echo $this->Form->input('biodata'); ?>
<?php echo $this->Form->end('Sign Me Up'); ?>
</fieldset>
</div>
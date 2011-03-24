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
<legend></legend>
<?php
$options['url']['controller'] = 'StaffInformations';
$options['url']['action'] = 'signup';
echo $this->Form->create('StaffInformation', $options);
?>
<?php
     $o['label'] = FALSE;
     $o['div'] = FALSE;
?>     

<table >
<tr>
<td><p>Username </p></td><td>: <?php echo $this->Form->input('username',$o); ?></td>
</tr>
<tr>
<td><p>Password </p></td><td>: <?php echo $this->Form->input('password',$o); ?></td>
</tr>

</table>

<p>Bio <br />
<?php echo $this->Form->input('biodata',$o); ?></p>
<?php echo $this->Form->end('Sign Me Up',$o); ?>
</fieldset>
</div>
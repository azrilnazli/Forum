<h1>Forgot Password</h1>

<p> Hi <strong><?php echo $username; ?></strong>. Recently you request to change your password. Please click the link below.
<br />
<br />
<?php
$url = "http://{$_SERVER['SERVER_NAME']}/forum/StaffInformations/reset/ticket:$ticket";
?>
Reset password : <?php echo $this->Html->link('Click Here', $url ); ?>

<hr />
<strong>Forum Administration Team</strong>

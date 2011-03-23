<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
echo $this->Html->tag('title' , 'Forum');
echo $this->Html->css( array(
                                      'reset',
                                      'text',
                                      '960',
                                     //'uncompressed/demo',
                                      'forum',
                                     'debug'
                                    ) ) ;

?>
</head>
<body>

<div class="container_12">

<div class="alpha omega grid_12" id="header">
<?php 
// discussion forum title
$header_link = $this->Html->link('Discussion Board', '/');
echo $this->Html->tag('h1', $header_link);
?>
</div>

<div class="grid_2 alpha" >
<div id="sidebar">
<h2>Sidebar</h2>
  <ul>
    <li>Home</li>
    <li>About Us</li>
    <li>Contact Us</li>

    <li>Forum Guidelines</li>
    <li>Search</li>
    <li>Sign Up</li>
    <li>Forgot Password</li>  
</ul>
</div>
  <p>&nbsp;</p>
  <div id="sidebar">
      <h2>Statistics</h2>
        <ol style="list-style-type:none; margin-left:-20px">
        <?php FOREACH($stat as $k=>$v): ?>
        <?php #echo $this->Html->tag('li', sprintf("%s : %s", ucFirst($k), $v)); ?>
        <li><?php echo ucfirst($k); ?> : <?php echo $v; ?></li>
        <?php ENDFOREACH; ?>
        </ol>
  </div>
  
  <p>&nbsp;</p>
  <div id="sidebar">
      <h2>Users</h2>
        <ol>
        <?php FOREACH($users as $k=>$v):?>
        <?php echo $this->Html->tag('li', $v['StaffInformation']['username']); ?>
        <?php ENDFOREACH; ?>
        </ol>
  </div>

  
</div>

<div class="grid_10 " id="content">
    <?php echo $content_for_layout; ?>
</div>

<div class="alpha omega grid_12" id="footer"></div>

<div class="clear"></div>
<?php echo $this->Element('sql_dump'); // show sql ?>


</body>

</html>
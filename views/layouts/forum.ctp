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
<div class="alpha omega grid_12" id="userpanel">
</div>

<div class="alpha omega grid_12" id="header">
    <div style="float:left"> 
          <?php 
          // discussion forum title
          $header_link = $this->Html->link('Discussion Board', '/');
          echo $this->Html->tag('h1', $header_link);
          ?>
    </div>
    <div id="userpanel" style="float:right"> 

    <?php 
        IF($this->Session->check('user')):
            $user = $this->Session->read('user'); // get from Session
             //debug($user);
    ?>
       Logged as 
       <?php echo $user['StaffInformation']['username'] ?>
       ( <?php echo $user['ForumRole']['title'] ?> )
       [ 
       <?php 
       $options['controller'] = 'StaffInformations';
       $options['action'] = 'logout';
       echo $this->Html->link('Logout' , $options ) 
       ?>
       ]
    <?php ELSE: ?>
     <?php
     // Display Login Form
     unset($options);
     $options['url']['controller'] = 'StaffInformations';
     $options['url']['action'] = 'login';
     echo $this->Form->create('StaffInformation', $options);
     ?>
     <?php
     $o['label'] = FALSE;
     $o['div'] = FALSE;
     ?>
    <?php echo $this->Form->input('username',$o) ?> 
    <?php echo $this->Form->input('password',$o) ?>
    <?php echo $this->Form->submit('Login', $o) ?>
    <?php echo $this->Form->end() ?>
    <?php ENDIF; // check Session?>
      </div>

</div>

<div class="grid_2 alpha" >

<?php $this->SiteModule->menu() ?>
<p>&nbsp;</p>
<?php $this->SiteModule->users() ?>
<p>&nbsp;</p>
<?php $this->SiteModule->statistics() ?>
</div>

<?php IF( $this->Session->check('Message.flash') ): ?>
      <!-- MESSAGE -->
      <div class="grid_10 ">
          <?php echo $this->Session->flash(); ?>
      </div>
      <!-- MESSAGE -->
<?php ENDIF; ?>

<div class="grid_10 " id="content">
    <?php echo $content_for_layout; ?>
</div>

<div class="alpha omega grid_12" id="footer">
<p>Copyright JPN</p>
</div>

<div class="clear"></div>
<?php echo $this->Element('sql_dump'); // show sql ?>


</body>

</html>
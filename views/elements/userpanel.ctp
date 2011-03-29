
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
     $o['error'] = FALSE;
     ?>
    <?php echo $this->Form->input('username',$o) ?> 
    <?php echo $this->Form->input('password',$o) ?>
    <?php echo $this->Form->submit('Login', $o) ?>
    <?php echo $this->Form->end() ?>
    <?php ENDIF; // check Session?>
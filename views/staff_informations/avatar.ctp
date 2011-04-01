<div id="breadcrumb">
      <?php      
      $this->Html->addCrumb('My Avatar');
       echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>
<p></p>


<div id = 'info' class="form">
    <h1>My Avatar</h1>   
    <?php 
    $options['controller'] = 'StaffInformations';
    $options['action'] = 'show_avatar';
    $options['id'] = 4;
    $options['height'] = 640;
    $options['width'] = 480;
    echo  $this->Html->image($options); 
    ?>
    
    
    <?php
    $options['url']['controller'] = 'StaffInformations';
    $options['url']['action'] = 'avatar';
    $options['type'] = 'file'; // untuk membolehkan form accpt file
    echo $this->Form->create('Attachment', $options) ;
    ?>
    <table>
        <tr>
        <td><?php echo $this->Form->label('Image'); ?></td>
        <td>
        <?php
        unset($options);
        $options['type'] = 'file'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        //$options['before'] = 'JPN [ ';
        $options['error'] = FALSE;
        $options['div'] = false;
        $options['id'] = 'image';
        echo  $this->Form->input('image', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('image')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('image'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <?php ############################# image ?>
    
              
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

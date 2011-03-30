

<?php echo $this->Html->css('topic') ?>
<div id="breadcrumb">
      <?php       
       $options['controller'] = 'Board';
       $options['action'] = 'category';
       $options['category_id'] = $category['ForumCategory']['id'];
       $this->Html->addCrumb($category['ForumCategory']['title'], $options);
      
      $this->Html->addCrumb('Create Topic');
       
       echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>
<p></p>
<div id = "info" class="form">

 <h1>Create Topic</h1>   
    <?php
    $options['url']['controller'] = 'Board';
    $options['url']['action'] = 'create_topic';
    $options['url']['category_id'] =  $category['ForumCategory']['id'];
    echo $this->Form->create('ForumTopic', $options);
    ?>
    <table>
        <?php ############################# title ?>
        <tr>
        <td><?php echo $this->Form->label('Title'); ?></td>
        <td>
        <?php
        unset($options);
        $options['type'] = 'text'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        //$options['before'] = 'JPN [ ';
        $options['error'] = FALSE;
        $options['div'] = false;
        $options['id'] = 'title';
        echo  $this->Form->input('title', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('title')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('title'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <?php ############################# title ?>
        <?php ############################# descriptions ?>
        <tr>
        <td><?php echo $this->Form->label('Topic'); ?></td>
        <td>
        <?php
        unset($options);
        $options['type'] = 'textarea'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        //$options['before'] = 'JPN [ ';
        $options['error'] = FALSE;
        $options['div'] = false;
        $options['id'] = 'title';
        echo  $this->Form->input('descriptions', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('descriptions')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('descriptions'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <?php ############################# descriptions ?>        
    </table>    
    <?php 
    # submit button
    unset($options);
    $options['type'] = 'submit';
    echo $this->Form->button('Post', $options); 
    ?>
    
    <?php 
    # reset button
    unset($options);
    $options['type'] = 'reset';
    echo $this->Form->button('Reset', $options); 
    ?>
    
    
    <?php echo $this->Form->end(); ?>
</div>


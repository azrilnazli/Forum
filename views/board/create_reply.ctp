

<?php echo $this->Html->css('topic') ?>
<div id="breadcrumb">
      <?php      
       // Category      
       $options['controller'] = 'Board';
       $options['action'] = 'category';
       $options['category_id'] = $topic['ForumCategory']['id'];
       $this->Html->addCrumb($topic['ForumCategory']['title'], $options);
       
        // Topic
       $options['controller'] = 'Board';
       $options['action'] = 'topic';
       $options['topic_id'] = $topic['ForumTopic']['id'];
       $this->Html->addCrumb($topic['ForumTopic']['title'], $options);
      
       // Post Reply      
       $this->Html->addCrumb('Post Reply');
       
       echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>
<p></p>
<div id = "info" class="form">

 <h1>Post Reply</h1>   
    <?php
    $options['url']['controller'] = 'Board';
    $options['url']['action'] = 'create_reply';
    $options['url']['category_id'] =  $topic['ForumCategory']['id'];
    $options['url']['topic_id'] =  $topic['ForumTopic']['id'];
    echo $this->Form->create('ForumReply', $options);
    ?>
    <table>

        <?php ############################# reply ?>
        <tr>
        <td>
        <?php
        unset($options);
        $options['type'] = 'textarea'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        //$options['before'] = 'JPN [ ';
        $options['error'] = FALSE;
        $options['div'] = false;
        $options['id'] = 'title';
        echo  $this->Form->input('reply', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('reply')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('reply'); ?>
        </div>
        <?php ENDIF; ?>
        </td>
        </tr>
        <?php ############################# reply ?>        
    </table>    
    <?php 
    # submit button
    unset($options);
    $options['type'] = 'submit';
    echo $this->Form->button('Reply', $options); 
    ?>
    
    <?php 
    # reset button
    unset($options);
    $options['type'] = 'reset';
    echo $this->Form->button('Reset', $options); 
    ?>
    
    
    <?php echo $this->Form->end(); ?>
</div>


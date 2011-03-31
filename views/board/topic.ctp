<?php echo $this->Html->css('topic') ?>
<div id="breadcrumb">
      <?php       
       $options['controller'] = 'Board';
       $options['action'] = 'category';
       $options['category_id'] = $topic['ForumCategory']['id'];
       $this->Html->addCrumb($topic['ForumCategory']['title'], $options);
      
      $this->Html->addCrumb($topic['ForumTopic']['title']);
       
       echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>
<p></p>

<!-- #topic | rujuk dalam APP/webroot/css/forum.css -->
<div id = "topic">
  
  <div class = "header">
      <table width="100%">
      <tr>
      <td>
          <span id="title"><?php echo $topic['ForumTopic']['title']; ?></span>
          <br />
          <span id="poster">  Posted by  <?php echo $topic['StaffInformation']['username']; ?></span>
          <span id="created"><?php echo $topic['ForumTopic']['created']; ?></span>
        </td>  
      </table>
  </div><!-- .header -->
  
  <div class = "body">
 
 <span id ="descriptions">
      <?php echo $topic['ForumTopic']['descriptions']; ?>
  </span>
  </div><!-- .body --> 
</div> <!-- #topic -->
<p></p>

<?php FOREACH( $replies as  $v ):
//debug($v);
 ?>
<div id = "reply">
  <div class="header">
  
  reply by
  <?php echo $v['StaffInformation']['username'] ?>
  <?php echo $v['ForumReply']['created'] ?>
  </div>
  <div class="body"> <?php echo $v['ForumReply']['reply'] ?></div>
</div><!-- #reply -->
<?php ENDFOREACH; ?>


<div id = "category">
<div id="pagination">
    <?php $this->SiteModule->paginate(); ?>
</div>

<div id="link">
<?php 
  unset($options);
  $options['controller'] = 'Board';
  $options['action'] = 'create_reply';
  $options['topic_id'] = $this->passedArgs['topic_id'];
  $this->SiteModule->link('Post Reply', $options );
?>  
</div>
</div>





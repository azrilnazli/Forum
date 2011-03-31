<div id="breadcrumb">
      <?php
       $this->Html->addCrumb($title);
       echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>
<p></p>
<div id ="category"> 
      <?php echo $this->Html->tag('h1', $title); ?>
      
  
      
      <?php 
      // display element from APP/views/elements/board/topic_index.ctp
      echo $this->Element(
          '/board/topic_index', // element file
          array(
              'topics' => $topics // passing variable to Element  
          )      
      ); 
      ?>

      <div id="pagination">
          <?php $this->SiteModule->paginate(); ?>
      </div>
      
      <div id="link">
      <?php 
        $options['controller'] = 'Board';
        $options['action'] = 'create_topic';
        $options['category_id'] = $this->passedArgs['category_id'];
        $this->SiteModule->link('Create Topic', $options );
      ?>  
      </div>


</div> <!-- #category -->
<p></p>
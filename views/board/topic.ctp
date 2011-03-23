<div id="breadcrumb">
      <?php       
       $options['controller'] = 'Board';
       $options['action'] = 'category';
       $options['category_id'] = $category['id'];
       $this->Html->addCrumb($category['title'], $options);
      
      $this->Html->addCrumb($title);
       
       echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>
<p></p>
<div id ="category">
 
</div> <!-- #category -->
<p></p>
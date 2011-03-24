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

<!-- #topic | rujuk dalam APP/webroot/css/forum.css -->
<div id = "topic">
  
  <div class = "header">
      <table width="100%">
      <tr>
      <td>
          <span id="title">Topic.title</span>
          <br />
          <span id="poster">Topic.poster</span>
          <br />
          <span id="created">Topic.created</span>
        </td>  
      </table>
  </div><!-- .header -->
  
  <div class = "body">
  isi kandung topik
  </div><!-- .body -->
  
</div> <!-- #topic -->


<p></p>
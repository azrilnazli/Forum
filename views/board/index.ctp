<div id="breadcrumb">
      <?php
       $this->Html->addCrumb('Index');
      echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>

<p></p>

<?php FOREACH($categories as $c): //debug($c); ?>

  <div id ="category"> 
  <h1>
  <?php 
  $options['controller'] = 'Board';
  $options['action'] = 'category';
  $options['category_id'] = $c['ForumCategory']['id']; // passing variable
  $options['category_title'] = Inflector::slug($c['ForumCategory']['title'], '-'); // passing variable
  
  echo $this->Html->link( 
                $c['ForumCategory']['title'], // title
                $options // options
                ) // link()
  ?>
  
  </h1>  
  
  
  <table>
      <tr>
          <th id="number">&nbsp;#</th>
          <th id="topic">Topic</th>
          <th id="last-reply">Last Reply</th>
      </tr>
    
   <?php FOREACH($c['ForumTopic'] as $k => $t): 
   //debug($t);
   ?>
   <tbody> 
      <tr>
          <td><?php echo $k+1; ?></td>
          <td><?php echo "<span id='title'>{$t['title']}</span> posted by <span id='last-poster'>{$t['StaffInformation']['username']}" ?></span></td>
          <td id="reply">
          <?php 
          if(!empty($t['ForumReply'][0])):
        
          echo sprintf (
              "<b>%s</b> on %s",
              
              Inflector::humanize($t['ForumReply'][0]['StaffInformation']['username']),
              $this->Time->format('d/m/Y',$t['ForumReply'][0]['created']) 
          );
          else:
          
            echo 'No reply yet';
          
          endif;// check ForumReply
          ?>
          </td>
      </tr>

    </tbody>   
    <?php ENDFOREACH; // $topic?>
  </table>  
  </div> <!-- #category -->
  <?php ENDFOREACH; // $categories?>

  <?php 
      // display recent topics
      $this->SiteModule->recent_topics(); 
  ?>
  

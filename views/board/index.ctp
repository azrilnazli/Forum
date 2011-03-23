<div id="breadcrumb">
      <?php
       $this->Html->addCrumb('Index');
      echo $this->Html->getCrumbs(' > ','FORUM');
      ?>
</div>

<p></p>

<?php FOREACH($categories as $c): //debug($c); ?>

  <div id ="category"> 
  <h1><?php echo $c['ForumCategory']['title'] ?></h1>  
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

  <div id ="category">
  <h1>Recent Posts</h1>
      <table>
          <tr>
              <th>#</th>
              <th>Topic</th>
              <th>Created</th>
          </tr>
          
          <?php FOREACH($topics as $k=> $v): 
          //debug($v);
          ?>
          <tr>
              <td><?php echo $k+1; ?></td>
              <td style="width:auto">
                <?php echo "
                        {$v['ForumTopic']['title']}
                        posted by {$v['StaffInformation']['username']}
                        
                        "; ?></td>
              <td style="width:200px">
              <?php 
                echo $this->Time->timeAgoInWords($v['ForumTopic']['created']) 
              ?>
              
              </td>
          </tr>          
          <?php ENDFOREACH; ?>
      </table>
  </div>
  
    </tbody>  
  </table>    
  </div>


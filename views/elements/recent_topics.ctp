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
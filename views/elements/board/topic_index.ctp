<?php //debug($topics); ?>
  <table>
      <tr>
          <th id="number">#</th>
          <th id="topic">Topic</th>
          <th id="last-reply">Last Reply</th>
      </tr>

   <?php FOREACH($topics as $k => $v): ?>   
   <tbody> 
      <tr>
          <td><?php echo $k+1;?></td>
          <td>
              <span id="title">
              <?php echo $v['ForumTopic']['title']; ?>
              </span> 
              posted by 
              <span id='last-poster'>
              <?php echo $v['StaffInformation']['username']; ?>
              </span>
              <br />
              <p style="font-size:10px">
              <?php echo $this->Time->timeAgoInWords($v['ForumTopic']['created']); ?>
              </p>
          </td>
          <td id="reply">
          <?php //debug($v); ?>
          by 
          <?php echo $v['ForumReply'][0]['StaffInformation']['username']; ?>
          <?php echo $this->Time->timeAgoInWords($v['ForumReply'][0]['created']); ?>
          </td>
      </tr>
    </tbody>   
    <?php ENDFOREACH ?>
    
  </table>  

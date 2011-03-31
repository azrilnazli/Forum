
<table>
<tr>
  <td>Category</td>
  <td>:</td>
  <td><?php echo $v['ForumCategory']['title']; ?></td>
</tr>  
<tr>
  <td>Title</td>
  <td>:</td>
  <td><?php echo $v['ForumTopic']['title']; ?></td>
</tr>  
<tr>
  <td>Reply</td>
  <td>:</td>
  <td><?php echo $v['ForumReply']['reply']; ?></td>
</tr>  
<tr>
  <td>Created By</td>
  <td>:</td>
  <td><?php echo $v['StaffInformation']['username']; ?></td>
</tr>  
<tr>
  <td>Created on</td>
  <td>:</td>
  <td><?php echo $v['ForumReply']['created']; ?></td>
</tr>  
</table>
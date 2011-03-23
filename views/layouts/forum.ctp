<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
echo $this->Html->tag('title' , 'Forum');
echo $this->Html->css( array(
                                      'reset',
                                      'text',
                                      '960',
                                     //'uncompressed/demo',
                                      'forum',
                                     'debug'
                                    ) ) ;

?>
</head>
<body>

<div class="container_12">

<div class="alpha omega grid_12" id="header">
<?php 
// discussion forum title
$header_link = $this->Html->link('Discussion Board', '/');
echo $this->Html->tag('h1', $header_link);
?>
</div>

<div class="grid_2 alpha" >
<div id="sidebar">
<h2>Sidebar</h2>
  <ul>
    <li>Home</li>
    <li>About Us</li>
    <li>Contact Us</li>

    <li>Forum Guidelines</li>
    <li>Search</li>
    <li>Sign Up</li>
    <li>Forgot Password</li>  
</ul>
</div>
  <p>&nbsp;</p>
  <div id="sidebar">
      <h2>Statistics</h2>
        <ol style="list-style-type:none; margin-left:-20px">
        <?php FOREACH($stat as $k=>$v): ?>
        <?php #echo $this->Html->tag('li', sprintf("%s : %s", ucFirst($k), $v)); ?>
        <li><?php echo ucfirst($k); ?> : <?php echo $v; ?></li>
        <?php ENDFOREACH; ?>
        </ol>
  </div>
  
  <p>&nbsp;</p>
  <div id="sidebar">
      <h2>Users</h2>
        <ol>
        <?php FOREACH($users as $k=>$v):?>
        <?php echo $this->Html->tag('li', $v['StaffInformation']['username']); ?>
        <?php ENDFOREACH; ?>
        </ol>
  </div>

  
</div>

<div class="grid_10 " id="content">

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
      </table
  
  </div>
  
    </tbody>  
  </table>    
  </div>




</div>





<div class="alpha omega grid_12" id="footer"></div>


<div class="clear"></div>
<?php echo $this->Element('sql_dump'); // show sql ?>


</body>

</html>
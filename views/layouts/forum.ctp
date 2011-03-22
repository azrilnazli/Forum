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
                                     // 'uncompressed/demo',
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

<div class="grid_2 alpha" id="sidebar">
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
  <p>&nbsp;</p>
</div>

<div class="grid_10 " id="content">

<?php FOREACH($categories as $c): ?>

  <div id ="category"> 
  <h1><?php echo $c['ForumCategory']['title'] ?></h1>  
  <table>
      <tr>
          <th></th>
          <th>Topic</th>
          <th>Last by</th>
      </tr>
    
   <?php FOREACH($c['ForumTopic'] as $k => $t): ?>
   <tbody> 
      <tr>
          <td><?php echo $k+1; ?></td>
          <td><?php echo $t['title']; ?></td>
          <td>
          <?php 
          echo sprintf (
              "<b>%s</b> [ %s ] on %s",
              
              Inflector::humanize($t['StaffInformation']['username']),
              Inflector::humanize($t['StaffInformation']['ForumRole']['title']),
              $this->Time->format('d/m/Y',$t['created']) 
          )
          ?>
          </td>
      </tr>

    </tbody>   
    <?php ENDFOREACH; // $topic?>
  </table>  
  </div> <!-- #category -->
  <?php ENDFOREACH; // $categories?>

    </tbody>  
  </table>    
  </div>




</div>





<div class="alpha omega grid_12" id="footer"></div>


<div class="clear"></div>
<?php echo $this->Element('sql_dump'); // show sql ?>


</body>

</html>
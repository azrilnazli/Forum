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
                                     // 'debug'
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
<div class="grid_6" id="content">
  <div id ="breadcrumb">
      <h2><strong>Forum &raquo; Home</strong></h2>
  </div
  
  <div id ="category" style="padding:5px;background:yellow">
  <h1>Category.title</h1>
  <table>
      <tr>
          <th>#</th>
          <th>Topic.title</th>
          <th>Topic.views</th>
          <th>Topic.replies</th>
          <th>Topic.info</th>
      </tr>
  
   <tbody> 
      <tr>
          <td>1</td>
          <td>jepun</td>
          <td>100</td>
          <td>33</td>
          <td>Last posted by Azril on 13/12/2011</td>
      </tr>
    </tbody>  
  </table>    
  </div>
  
  <div id ="category" style="padding:5px;background:yellow;margin-top:20px">

    <h1>Category.title</h1>
  <table>
      <tr>
          <th>#</th>
          <th>Topic.title</th>
          <th>Topic.views</th>
          <th>Topic.replies</th>
          <th>Topic.info</th>
      </tr>
  
   <tbody> 
      <tr>
          <td>1</td>
          <td>jepun</td>
          <td>100</td>
          <td>33</td>
          <td>Last posted by Azril on 13/12/2011</td>
      </tr>
    </tbody>  
  </table>    
  </div>



</div>


<div class="grid_4">
  <h2>Latest Users</h2>
  <ul>
    <li>Azril</li>
    <li>Fasha Sandha</li>
    <li>Angelina Jolie</li>
    <li>Rango</li>
</ul>

  <h2>Latest Topics</h2>
  <ul>
    
    <li>Jepun Gempa</li>
    <li>Jepun Gempa</li>
    <li>Jepun Gempa</li>
   </ul>
</div>



<div class="alpha omega grid_12" id="footer"></div>

</div>


</body>
<?php echo $this->Element('sql_dump'); // show sql ?>
</html>
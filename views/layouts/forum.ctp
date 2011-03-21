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
    <li>Lorem ipsum</li>
    <li>Aliquam mauris </li>
    <li>Vestibulum </li>

    <li>Nunc dignissim </li>
    <li>Cras ornare </li>
    <li>Vivamus</li>
    <li>Praesent </li>
    <li>Fusce </li>
    <li>Integer vitae .</li>

    <li>Vestibulum </li>
  </ul>
  <p>&nbsp;</p>
</div>
<div class="grid_6" id="content"><h1>Aenean dignissim pellentesque felis.</h1>
  <div id="short-para">
    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede.</p>
    <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet orci. Aenean dignissim pellentesque felis.</p>

    <p>Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.</p>
    <h4> Quisque a lectus.</h4>
    <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
    <p>Phasellus ultrices nulla quis nibh. Quisque a lectus. Donec consectetuer ligula vulputate sem tristique cursus. Nam nulla quam, gravida non, commodo a, sodales sit amet, nisi.</p>
    <p>Pellentesque fermentum dolor. Aliquam quam lectus, facilisis auctor, ultrices ut, elementum vulputate, nunc.</p>
    <p>Sed adipiscing ornare risus. Morbi est est, blandit sit amet, sagittis vel, euismod vel, velit. Pellentesque egestas sem. Suspendisse commodo ullamcorper magna.</p>

  </div>
</div>
<div class="grid_2" id="photos">
  <h2>Photo's</h2>
 
</div>

<div class="alpha omega grid_12" id="footer"></div>

</div>


</body>
<?php echo $this->Element('sql_dump'); // show sql ?>
</html>
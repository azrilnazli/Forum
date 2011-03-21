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
                                      'uncompressed/demo',
                                      'forum',
                                      'debug'
                                    ) ) ;

?>
</head>
<body>
<h1>
	<a href="http://960.gs/">960 Grid System</a>
</h1>
<div class="container_12">
	<h2>
		12 Column Grid
	</h2>
	<div class="grid_12">
		<p>
			940
		</p>
	</div>
	<!-- end .grid_12 -->
	<div class="clear"></div>
</div>
<!-- end .container_16 -->
</body>
<?php echo $this->Element('sql_dump'); // show sql ?>
</html>
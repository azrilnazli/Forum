<?php echo $this->Html->css('topic') ?>
<div id="breadcrumb">
<?php       
$this->Html->addCrumb('Search');  
 echo $this->Html->getCrumbs(' > ','Forum');
?>
</div>
<p></p>
<div id = "category">
<!-- #topic | rujuk dalam APP/webroot/css/forum.css -->
<div id = "search">
  
<?php  
$options['url']['controller'] = 'Board';
$options['url']['action'] = 'search';
$form_start = $this->Form->create('Search', $options);

unset($options);
$options['type'] = 'text';
$options['div'] = FALSE;
$options['label'] = FALSE;
$options['value'] = $query;
$search_field = $this->Form->input('query', $options);

$types = array(
    'category' => 'Category',
    'topic' => 'Topic',
    'reply' => 'Reply',
);
$options['type'] = 'select';
$options['options'] = $types;
$options['selected'] = $type;
$options['div'] = FALSE;
$options['label'] = FALSE;
$search_type= $this->Form->input('type', $options);


# submit button
unset($options);
$options['type'] = 'submit';
$search_button =  $this->Form->button('Search', $options); 



# reset button
unset($options);
$options['type'] = 'reset';
$reset_button =  $this->Form->button('Reset', $options); 


$form_end = $this->Form->end();

?>
<?php echo $form_start; ?>
<table>
<tr>
  <td>Search</td>
  <td><?php echo $search_type; ?></td>
  <td><?php echo $search_field; ?></td>
</tr>  
<tr>
  <td></td>
  <td></td>
  <td><?php echo $search_button; ?> &nbsp;<?php echo $reset_button; ?></td>
</tr>  
 
</table>
<?php echo $form_end; ?> 
<p></p> 
<?php 

IF(!empty($results)):

FOREACH( $results as  $v ):
      
    SWITCH( $type ):
    case 'category':
      echo $this->Element('/board/result_' . $type ,  array('v' => $v ) );
    break;
    
    case 'topic':
      echo $this->Element('/board/result_' . $type ,  array('v' => $v ) );
    break;
    
    case 'reply':
      echo $this->Element('/board/result_' . $type ,  array('v' => $v ) );
    break;
    ENDSWITCH;
        
ENDFOREACH; 

?>
</div> <!-- #topic -->
<p></p>



<div id = "category">
<div id="pagination">
    <?php 
    $parameter['query'] = $query;
    $parameter['type'] = $type;
    $this->Paginator->options(array('url' => $parameter ));
    
    $this->SiteModule->paginate(); 
    ?>
</div>
<?php ENDIF; ?>

</div>
</div>




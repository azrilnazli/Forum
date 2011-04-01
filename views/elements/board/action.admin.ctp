
<table>
<tr>

<td>
<div id="link">
<?php
echo $this->Html->link('Edit', $options['edit'] ); 
?>
</div>
</td>
<td></td>
<td>
<div id="link">
<?php
echo $this->Html->link('Delete', $options ['delete'] ,array('confirm' => 'Are you sure ?' ) ); 
?>
</div>
</td>

</tr>
</table

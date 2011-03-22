<?php
// Link to online library
echo $this->Html->script('http://code.jquery.com/jquery-1.5.1.min.js');
?> 
<script>
$(document).ready(  function(){
    // Hide #other-job
    $('#other-job').hide();
    // selector
    $('#JobOther').bind('click', function(){
            // show #other-job
            $('#other-job').show();
 
        } // click
    ) // bind
 
});//ready
</script>

<h2>Jquery Example</h2>
<?php

$jobs = array(
    'pilot' => 'pilot',
    'engineer' => 'engineer',
    'other' => 'other',
);
$o['options'] =  $jobs;
$o['type'] =  'radio';
$o['legend'] =  'Job';
echo $this->Form->input('job', $o);
?>

<div id="other-job">
<?php
$o['type'] =  'text';
$o['label'] =  'Other Job';
echo $this->Form->input('other_job', $o);
?>
</div>

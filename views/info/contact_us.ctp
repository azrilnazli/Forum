<div id="breadcrumb">
      <?php      
      $this->Html->addCrumb('Contact Us');
       echo $this->Html->getCrumbs(' > ','Forum');
      ?>
</div>
<p></p>
<style>
.contact_us td { padding: 5px }
.contact_us label { font-size: 2.2em; }
.contact_us input[type=text] { width: 300px; height: 30px; border: 1px #000 solid }
.contact_us #error { 
    color: white; 
    font-size: 1.8em;
    background-color: red;  
    height: 25px; 
    padding: 5px; 
    border: 2px #fff solid;
}
</style>
<div id = 'info' class="contact_us">
    <h1>Contact Us</h1>   
    <p>Fill up the form below</p>
    <?php
    $options['url']['controller'] = 'Info';
    $options['url']['action'] = 'contact_us';
    echo $this->Form->create('Info', $options);
    ?>
    <table>
        <tr>
        <td><?php echo $this->Form->label('Name'); ?></td>
        <td>
        <?php
        unset($options);
        $options['type'] = 'text'; // text|radio|checkbox|select|textarea|password|file
        $options['label'] = FALSE;
        //$options['before'] = 'JPN [ ';
        $options['error'] = FALSE;
        $options['div'] = false;
        $options['id'] = 'name';
        echo  $this->Form->input('name', $options);
        ?>
        </td>
        <td>
        <?php IF($this->Form->isFieldError('name')): // check error ?>
        <div id="error">
        <?php echo $this->Form->error('name'); ?>
        </div>
        <?php ENDIF; ?>
        
        </td>
        </tr>
    </table>
    <?php 
    # submit button
    unset($options);
    $options['type'] = 'submit';
    echo $this->Form->button('Submit', $options); 
    ?>
    
    <?php 
    # reset button
    unset($options);
    $options['type'] = 'reset';
    echo $this->Form->button('Reset', $options); 
    ?>
    
    
    <?php echo $this->Form->end(); ?>
    
</div>
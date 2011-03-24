<div id="sidebar">
    <h2>Menu</h2>
    <ul>
   
      <?php 
       $options['controller'] = 'Board';
       $options['action'] = 'index';
       $home = $this->Html->link('Home', $options);
      echo $this->Html->tag('li', $home); 
            
       $options['controller'] = 'Info';
       $options['action'] = 'about_us';
       $about_us = $this->Html->link('About Us', $options);
      echo $this->Html->tag('li', $about_us);  
      
      ?>
      <li>Contact Us</li>

      <li>Forum Guidelines</li>
      <li>Search</li>
      <li>Sign Up</li>
      <li>Forgot Password</li>  
    </ul>
</div>      
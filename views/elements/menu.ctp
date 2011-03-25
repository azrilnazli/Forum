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

       $options['controller'] = 'Info';
       $options['action'] = 'contact_us';
       $contact_us = $this->Html->link('Contact Us', $options);
      echo $this->Html->tag('li', $contact_us);  

      
       $options['controller'] = 'StaffInformations';
       $options['action'] = 'signup';
       $signup = $this->Html->link('Sign Up', $options);
      echo $this->Html->tag('li', $signup);  
      
      
       $options['controller'] = 'StaffInformations';
       $options['action'] = 'login';
       $login = $this->Html->link('Login', $options);
      echo $this->Html->tag('li', $login);        
      ?>


      <li>Forum Guidelines</li>
      <li>Search</li>

      <li>Forgot Password</li>  
    </ul>
</div>      
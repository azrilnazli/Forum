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


       $options['controller'] = 'StaffInformations';
       $options['action'] = 'forgot_password';
       $login = $this->Html->link('Forgot Password', $options);
      echo $this->Html->tag('li', $login);   

       $options['controller'] = 'Board';
       $options['action'] = 'search';
       $login = $this->Html->link('Search', $options);
      echo $this->Html->tag('li', $login);      


       $options['controller'] = 'StaffInformations';
       $options['action'] = 'avatar';
       $login = $this->Html->link('Avatar', $options);
      echo $this->Html->tag('li', $login);               
      

       $options['controller'] = 'StaffInformations';
       $options['action'] = 'index';
       $options['admin'] = true;
       $login = $this->Html->link('Administration', $options);
      echo $this->Html->tag('li', $login);       
      ?>



    </ul>
</div>      
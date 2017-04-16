<?php

     $page_title = "Login";

    include 'includes/header.php';

    require_once("includes/class.user.php");
    $login = new USER();



if (array_key_exists('login', $_POST)){
        #Cache errors
        $errors = [];
   


   if(empty($_POST['uname_email'])){

        $errors['email'] = "please enter email or username";

       }


      if(empty($_POST['password'])){

        $errors['password'] = "please enter password";


      }


      if(empty($errors)){

        $uname = strip_tags($_POST['uname_email']);
        $umail = strip_tags($_POST['uname_email']);
        $upass = strip_tags($_POST['password']);
    
        if($login->doLogin($uname,$umail,$upass))
        {
          $login->redirect('index.php');
        }
        else
            {
          $_SESSION['logged'] = false;
          redirect('login2.php?message=Invalid details');
            } 

        }   

   }  
        

    


   ?>

   <div class="main">
    <div class="login-form">
    <?php if(isset($_GET['message'])){ echo  $_GET['message'] ;}?>


      <form class="def-modal-form" method="post" action="index.php">
        <div class="cancel-icon close-form"></div>



        <label for="login-form" class="header"><h3>Login</h3></label>


         <?php if(isset($errors['email'])){echo '<span class="form-error">'.$errors['email']. '</span>' ; } ?>
        <input type="text" class="text-field" placeholder="Enter Email or Username" name="uname_email">

         <?php if(isset($errors['password'])){echo '<span class="form-error">'.$errors['password']. '</span>' ; } ?>
        <input type="password" class="text-field password" placeholder="Password" name="password">
      
       
        <input type="submit" class="def-button login" value="Login" name="login" />
      </form>
    </div>
  </div>
  <!-- footer starts here-->
  <div class="footer">
    <p class="copyright">&copy; copyright 2016</p>
  </div>
</body>
</html>



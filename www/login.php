<?php 


$page_title = "Login";

 include 'includes/db.php';

 include 'includes/function.php';


 include 'includes/header.php';





 if(array_key_exists('login', $_POST)){
    #Cache errors
    $errors = [];
   


   if(empty($_POST['email'])){

        $errors['email'] = "please enter email";

    }


      if(empty($_POST['password'])){

        $errors['password'] = "please enter password";


      }
      if(empty($errors)){


      //acess database
      $clean = array_map('trim', $_POST);


       doUserLogin($conn, $clean);
      }
      


   }






 ?>



  <!-- main content starts here -->
  <div class="main">
    <div class="login-form">
    <?php if(isset($_GET['message'])){ echo  $_GET['message'] ;}?>


      <form class="def-modal-form" method="post" action="login.php">
        <div class="cancel-icon close-form"></div>



        <label for="login-form" class="header"><h3>Login</h3></label>


         <?php if(isset($errors['email'])){echo '<span class="form-error">'.$errors['email']. '</span>' ; } ?>
        <input type="text" class="text-field email" placeholder="Email" name="email">

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

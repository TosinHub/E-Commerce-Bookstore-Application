<?php 
# test.php sandbox
/*define('DBNAME','bookstore');
define('DBUSER','root');
define('DBPASS','papa2657');



try{

#Prepare a PDO instance
$conn = new PDO('mysql:host = localhost;dbname='.DBNAME, DBUSER, DBPASS);

#set verbose error modes
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);


}
catch(PDOException $e){


  echo $e->getMessage();
}

*/

define('MAXIMUM SIZE', "2097152")

if(array_key_exists('save', $_POST)){
  #BE SURE A FILE IS SELECTED
  if(empty($_FILES['pic']['name'])){

    
  }


  print_r($_FILES);
}
?>
<form id="register" method="POST" enctype="multipart/form-data">
<p>Please upload a file</p>
<input type="file" name="pic"/>
<input type="submit" name="save" value="submit">
  


</form>

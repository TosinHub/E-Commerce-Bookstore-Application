<?php 

 include 'includes/function.php';
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

 

   // print_r($_FILES);

    if(array_key_exists('save', $_POST))



                  {

        $error = [];
  #BE SURE A FILE IS SELECTED

        
fileUpload($_FILES,$error,'pic');
       


        if(empty($error))
                 {
                  echo "Done";
                 }

             else
                 
                {
                    
                    foreach ($error as $err) 
                     {


                 echo $err. "</br>";
                
                     }




               }

}
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
<form id="register" method="POST" enctype="multipart/form-data">
<p>Please upload a file</p>
<input type="file" name="pic"/>
<input type="submit" name="save" value="submit" />
  


</form>
</body>
</html>


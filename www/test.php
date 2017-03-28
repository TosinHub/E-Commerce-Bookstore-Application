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

define('MAX_FILE_SIZE', "2097152");
#allowed extentions

$ext = ["image/jpg","image/jpeg","image/png"];

if(array_key_exists('save', $_POST)){

        $error = [];
  #BE SURE A FILE IS SELECTED
        if(empty($_FILES['pic']['name'])){
            $error[] = "Please choose a file";


       }
  #Check file size

        if($_FILES['pic']['size'] > MAX_FILE_SIZE)
                  {
                        $error[] = "File exceeds maximum. Maximum:" . MAX_FILE_SIZE;
                  }

  #check file type/extention
                  if(!in_array($_FILES['pic']['type'], $ext)){

                        $error = "Invalid file type";

                  }


        if(empty($error))
                {
                  echo "Done";
                }else
                

                        {
                foreach ($error as $err) {
                              # code...
                              echo $err. "</br>";
                        }




               }

}
?>
<form id="register" method="POST" enctype="multipart/form-data">
<p>Please upload a file</p>
<input type="file" name="pic"/>
<input type="submit" name="save" value="submit">
  


</form>

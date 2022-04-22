<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>   
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="file"> <br><br>
<input type="submit" name="upload" value="upload">
</form>
<?php
if(!isset($_SESSION['user_Gallery']))
{
    $_SESSION['user_Gallery'] = array();
}
if(isset($_POST['upload']))
{
    $file_name= $_FILES['file']['name'];
   $file_loc = $_FILES['file']['tmp_name'];
   $file_store = "upload/".$file_name;
   if( move_uploaded_file($file_loc, $file_store)){
       echo "file uploaded succesfully";
    array_push($_SESSION['user_Gallery'], $file_store);
}
}
?>
</body>
<div>
    <?php
    foreach ($_SESSION['user_Gallery'] as $key => $value) {
        echo "<img src=".$value."  width='170px' height='170px'/>";      
    }
    ?>
  </div>
</html>



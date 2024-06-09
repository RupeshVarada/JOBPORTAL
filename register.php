<?php

if(isset($_POST['send']))
{
$fullname=$_POST['fullname'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['pass'];
$industry=$_POST['option'];
// $comp = $_POST['comp'];
$status=$_POST['status'];
if($_FILES["my_image"]["error"] === 4)
{
    echo "<script> alert('Image does not exist'); </script>";
}
else
{
$image_name=$_FILES['my_image']['name'];
$image_tmp_name = $_FILES['my_image']['tmp_name'];
$image_folder = 'uploads/'.$image_name;
} 

//Database Connection
$conn = new mysqli('localhost','root','','test1');
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);
}
else{
    
    $insert="insert into register(Fullname,Email,Mobile,Password,Preferences,Workstatus,Folder) values ('$fullname','$email','$mobile','$password','$industry','$status','$image_name')";
    // $s->bind_param("ssissss",$fullname,$email,$mobile,$password,$industry,$status,$image_name);
    // $u=$s->execute();
    
    $upload = mysqli_query($conn,$insert);
    if($upload)
    {
       move_uploaded_file($image_tmp_name, $image_folder);
       echo '<script>alert("you are registered successfully");</script>';
       echo '<script>window.location.replace("login.php");</script>';
    }
    else{
        echo '<script>alert("try again please");</script>';
    }


    $conn->close();
    
}
}
?>


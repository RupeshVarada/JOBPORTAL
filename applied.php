<?php



if(isset($_POST['send']))
{
$email=$_POST['email'];
$done = 0;
$comp = $_POST['comp'];

$img = 0;
if(isset($_POST['stat']))
{
    $status=$_POST['stat'];
}
else{
    
    echo '<script>alert("Please select experience!")</script>';
    echo '<script>window.location.replace("apply.php")</script>';
    exit();
}

if($_FILES["my_image"]["error"] === 4)
{
    echo "<script> alert('Image does not exist'); </script>";
}
else
{
$image_name=$_FILES['my_image']['name'];
$image_tmp_name = $_FILES['my_image']['tmp_name'];
$image_folder = 'uploads/'.$image_name;
$img = 1;
} 

//Database Connection
$conn = new mysqli('localhost','root','','test1');
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);
}
else{
    
    $s = "SELECT * FROM applied where Email = '$email'";
    $res = mysqli_query($conn,$s);
    if(mysqli_num_rows($res) > 0)
    {
        while($r = mysqli_fetch_assoc($res))
        {
            if($comp == $r['Company'])
            {
                $done=1;
                break;
            }
        }
    }
    if($_POST['comp'] == 'sel')
    {
        echo '<script>alert("Please select company!")</script>';
        echo '<script>window.location.replace("apply.php")</script>';
        exit();
    }
    if($img == 0)
    {
        $image_name = "No img";
    }
    if($done == 1)
    {
        echo '<script>alert("Already applied to this company!")</script>';
        echo '<script>window.location.replace("index.php")</script>';
        exit();
    }
    $insert="insert into applied(Email,Company,Workstatus,Folder) values ('$email','$comp','$status','$image_name')";
    // $s->bind_param("ssissss",$fullname,$email,$mobile,$password,$industry,$status,$image_name);
    // $u=$s->execute();
    
    if($img == 1)
    {
    $upload = mysqli_query($conn,$insert);
    if($upload)
    {
       move_uploaded_file($image_tmp_name, $image_folder);
       echo '<script>alert("Applied successfully!");</script>';
       echo '<script>window.location.replace("index.php");</script>';

    }
    else{
        echo '<script>alert("Oops, Please try again!");</script>';
    }
    }


    $conn->close();
    
}
}
else{
    echo '<script> alert("error") </script>';
}
?>


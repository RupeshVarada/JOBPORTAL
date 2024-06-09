<?php
// $image=$_POST['image'];
$email=$_POST['email'];
$title=$_POST['title'];
$location=$_POST['location'];
$region=$_POST['region'];
$jobtype=$_POST['jobtype'];
$jobdesc=$_POST['jobdesc'];
$companyname=$_POST['company'];
$tagline=$_POST['tagline'];
$companydesc=$_POST['companydesc'];
$website=$_POST['website'];
$fb=$_POST['fb'];
$tweet=$_POST['tweet'];
$linkedin=$_POST['linkedin'];
// $logo=$_POST['logo'];


if($_FILES["image"]["error"] === 4)
{
    echo "<script> alert('Image does not exist'); </script>";
}
else
{
$image_name=$_FILES['image']['name'];
$image_tmp_name = $_FILES['image']['tmp_name'];
$image_folder = 'uploads/'.$image_name;
} 

if($_FILES["logo"]["error"] === 4)
{
    echo "<script> alert('Image does not exist'); </script>";
}
else
{
$logo_name=$_FILES['logo']['name'];
$logo_tmp_name = $_FILES['logo']['tmp_name'];
$logo_folder = 'uploads/'.$logo_name;
} 
//Database Connection
$conn = new mysqli('localhost','root','','test1');
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);
}
else{
    
    $insert="insert into postjob(FeaturedImage,Email,JobTitle,Location,JobRegion,JobType,JobDescription,CompanyName,TagLine,CompanyDescription,Website,FacebookId,TwitterId,LinkedInId,Logo) values ('$image_name','$email','$title','$location','$region','$jobtype','$jobdesc','$companyname','$tagline','$companydesc','$website','$fb','$tweet','$linkedin','$logo_name')";
    // $s->bind_param("ssissss",$fullname,$email,$mobile,$password,$industry,$status,$image_name);
    // $u=$s->execute();
    
    $upload = mysqli_query($conn,$insert);
    if($upload)
    {
       move_uploaded_file($image_tmp_name, $image_folder);
       move_uploaded_file($logo_tmp_name, $logo_folder);

       echo '<script>alert("job posted successfully");</script>';
       echo '<script>window.location.replace("index.php");</script>';
    }
    else{
       echo 'could not add the product';
    }


    $conn->close();
    
}
?>


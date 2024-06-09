<?php
$company_name=$_POST['company'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$password=$_POST['pass'];
$contact_person=$_POST['contact'];
$jobaddress=$_POST['jobAddress'];


$conn = new mysqli('localhost','root','','test1');
if($conn->connect_error){
    die('Connection Failed  : '.$conn->connect_error);
}
else{
    $s=$conn->prepare("insert into eregister (CompanyName,ContactPersonName,PhoneNumber,Email,Password,JobAddress) values (?, ?, ?, ?, ?, ?)");
    $s->bind_param("ssisss",$company_name,$contact_person,$mobile,$email,$password,$jobaddress);
    $s->execute();

    // echo "Registration Successful....";
    echo '<script>alert("you are registered successfully");</script>';
    echo '<script>window.location.replace("login.php");</script>';
    $s->close();
    $conn->close();
}
?>
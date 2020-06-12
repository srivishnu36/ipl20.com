<?php
$link=mysqli_connect('localhost','root','vishnu','users');
if(mysqli_connect_error())
{
  die("Error in Server connection...");
}
$name=mysqli_real_escape_string($link,$_POST['name']);
$age=mysqli_real_escape_string($link,$_POST['age']);
$email=mysqli_real_escape_string($link,$_POST['email']);
$password=mysqli_real_escape_string($link,$_POST['password']);

$query=" SELECT * FROM ipldata WHERE email='$email' ";
$res=mysqli_query($link,$query);
if(mysqli_num_rows($res)>0)
{
  sleep(2);
  echo "<script>alert('Email id already exists.Try again.');window.location.href='iplregister.html';</script>";
}
else
{
  $querynext=" INSERT INTO ipldata(name,age,email,password) VALUES ('$name','$age','$email','$password') ";
  $result=mysqli_query($link,$querynext);
  if($result)
  {
    sleep(3);
    echo "<script>alert('Registration Successful.');window.location.href='iplhome.html';</script>";
  }
  else
  {
    sleep(2);
    echo "<script>alert('Error in registration. Try again.');window.location.href='iplregister.html';</script>";
  }
}

?>

<?php
$connection = mysqli_connect('localhost','root','','project') or die("could not connect to database");
$name=$_POST['name'];
$email=$_POST['email'];
$id=$_POST['id1'];
$q4="INSERT INTO lottery values('$id','$name','$email')";
$result3=mysqli_query($connection,$q4);
if($result3){
	echo'User registered Sucessfully';
}
else{
	echo'Error';
}
?>
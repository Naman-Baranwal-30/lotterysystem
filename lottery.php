<!DOCTYPE html>
<html>
<style>
body{
  background-image: url('https://img.freepik.com/free-vector/abstract-minimal-orange-background-simple-background-with-halftone_95668-112.jpg');
   background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
   background-size: 100% 100%;

}
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<body>
<div align="center">
<h1 align="center" style="font-family:verdana; font-size:80px; color:Red;">Winner Declaration</h1>

<form method="post" action="lottery.php">
<input type="submit" class="button" id="button1" name="button1" value="Get Winner">
 </form>
</div>
</body>
</html>
<?php

if(isset($_POST['button1'])){
$connection = mysqli_connect('localhost','root','','project') or die("could not connect to database");
$query = mysqli_query($connection,"SELECT id FROM lottery");

$array = array();


$c=0;
while($row = mysqli_fetch_assoc($query)){

  $array[$c] = $row['id'];
  $c=$c+1;

 


}


#print_r($array); 
#echo json_encode($array);
$counts = array_count_values($array);
$array1=array();
foreach ($array as $value){
if($counts[$value]==5 and in_array($value, $array1)==False){
	for ($x = 0; $x <= 2; $x++) {
    array_push($array1,$value);


}
}
else if($counts[$value]!=3 and in_array($value, $array1)==False){

    array_push($array1,$value);
}

}
#print_r($array1) ;
#echo json_encode($array);
#echo json_encode($array1);
$random=array_rand($array1);
$randval=$array1[$random];
#echo $randval;
$query1 = mysqli_query($connection,"SELECT * FROM lottery WHERE id='$randval' LIMIT 1 ");
while($row = mysqli_fetch_assoc($query1)){
	echo '<br><br><br><br><div style="font-family:verdana; font-size:50px; color:blue;" align="center">Winner:<br> ID:'.$row['id'].'<br> Name:'.$row['name'].'<br> Email:'.$row['email'].'</div>';
}
}
?>
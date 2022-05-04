<?php
$connection=mysqli_connect('localhost','root');

if($connection){
	echo("database connected");
}
else{
	echo("database not connected");
}
mysqli_select_db($connection,'contactinfo');

$name=$_POST['Name'];
$email=$_POST['Email'];
$mobile=$_POST['Mobile'];
$hometown=$_POST['Hometown'];

// echo("$name ,$email ,$mobile,$hometown");

$data = "INSERT INTO info(Name, Email, Mobile, Hometown) VALUES ('$name','$email','$mobile','$hometown')";
mysqli_query($connection,$data);
header('location:successful.html');

if(isset($_POST['submit'])){
		$name=$_POST['Name'];
		$email=$_POST['Email'];
		$phone=$_POST['Mobile'];
		$msg=$_POST['Hometown'];

		$to='darshanam275@gmail.com'; // Receiver Email ID, Replace with your email ID
		$subject='Form Submission';
		$message="Name :".$name."\n"."Phone :".$phone."\n"."Wrote the following :"."\n\n".$msg;
		$headers="From: ".$email;

		if(mail($to, $subject, $message, $headers)){
			echo "<h1>Sent Successfully! Thank you"." ".$name.", We will contact you shortly!</h1>";
		}
		else{
			echo "Something went wrong!";
		}
	}


?>

<?php
if(!empty($_COOKIE["deve_db"])){
//ある
	if($_COOKIE["deve_db"]=="xampp"){
		setcookie('deve_db','mamp',time()+60*6000*365);
	}else{
		setcookie('deve_db','xampp',time()+60*6000*365);
	}
}else{
		setcookie('deve_db','xampp',time()+60*6000*365);
}
header("location:developer.php");
?>
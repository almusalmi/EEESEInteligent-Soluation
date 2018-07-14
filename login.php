<?php 
ob_start();
session_start();
$pageTitel='Login';
if(isset($_SESSION['user'])){
header('location:index.php');
}

include 'init.php'; 

if(isset($_POST['login'])){
$user=$_POST['user'];
$password=$_POST['pass'];
$hashedPass=sha1($password);
$stmt=$con->prepare("select UserID, Username,Password from users where Username=? and password=?");
$stmt->execute(array($user,$hashedPass));
$get=$stmt->fetch();
$count=$stmt->rowCount();
if($count>0){
$_SESSION['user']=$user;
$_SESSION['uid']=$get['UserID'];
header('location:index.php');
exit();
//print_r($_SESSION);
}else{$formError= "re-try again";}
}



else if (isset($_POST['signup'])){

	$formError=array();

	$user=$_POST['user'];
	$email=$_POST['email'];
	$pass=$_POST['pass'];
	$pass2=$_POST['pass2'];



	if(isset($user)){
		$filterUser=filter_var($user,FILTER_SANITIZE_STRING);
		if(strlen($filterUser)<4){
			$formError[]='the name must be more than 4 character';
		}
	    }

		if(isset($pass) && isset($pass2)){
		    if(empty($pass)){
            $formError[]='sorry the password cant be empty';
            } 
 				if(sha1($pass) !== sha1($pass2)){
			$formError[]='sorry the password is not match';
		 }
	     }

	    if(isset($email)){
		$filterEmail=filter_var($email,FILTER_SANITIZE_EMAIL);
		if(filter_var($filterEmail ,FILTER_VALIDATE_EMAIL) != true ){
			$formError[]='sorry this email is not valide';
		}
	    }
				if(empty($formError)){
				 
				$check= checkitem("Username","users",$user);
				 if($check==1){
				 $formError[]='sorry this user is exist';
				 }else{
				 
				 $stmt=$con->prepare("insert into users (Username,Password,Email,RegStatus,Date)values (:zuname,:zpass,:zmail,0,now())");
				 $stmt->execute(array(
				 'zuname'=>$user,
				 'zpass'=>sha1($pass),
				 'zmail'=>$email
				  
				 ));
				  $formsuccess='conglutation you have been sucess now you can signin';
				 
				  
				 }}else{


				if(!empty($formError)){
				foreach ($formError as $error ) {
					echo '<div class="the-error text-center alert alert-danger">'.$error.'</div><br/>';
				 
				}
				}
				if(isset($formsuccess)){
					 
				echo '<div class="alert alert-info">'.$formsuccess.'</div>';
				}
				 
				echo "</div></div>";
				
				 }
}



?>
<div class="container login-page">
 <h1 class="text-center"><span class=" selcted" data-class="login"> Login</span>|<span data-class="signup"> SignUp</span></h1>

<form class="login" action="login.php" method="POST">
<input class="form-control input-lg" type="text" name="user" placeholder="UserName"  autocomplete="off"/>
<input class="form-control input-lg"  type="password" name="pass" placeholder="Password" autocomplete="off" />
<input class="btn btn-primary btn-block btn-lg" type="submit" name="login" value="Login"/>
</form>

<form class="signup" action="login.php" method="POST">
<input class="form-control input-lg" type="text" name="user" placeholder="type UserName" required="required" pattern=".{4,}" title="the user name must be more than 4 chars"  autocomplete="off"/>
<input class="form-control input-lg"  type="password" milength="4" required="required" name="pass" placeholder="type complex Password" autocomplete="off" />
<input class="form-control input-lg"  type="password" milength="4" required="required" name="pass2" placeholder="type the Password again" autocomplete="off" />
<input class="form-control input-lg" type="email" name="email" placeholder="type valide email"  autocomplete="off"/>
<input class="btn btn-success btn-block btn-lg" type="submit" name="signup" value="SignUp"/>
</form>


 
 


<?php include $tpl.'footer.php';
ob_end_flush();
?>
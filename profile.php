<?php
session_start();
$pageTitel='profile';
 include 'init.php';
if(isset($_SESSION['user'])){
	$getUser=$con->prepare("select * from users where Username=?");
	$getUser->execute(array($sessinoUser));
	$info=$getUser->fetch();
	 
 ?>
<h1 class="text-center">My Profile</h1>
<div class="information block">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">My Information</div>
			<div class="panel-body">
				<ul class="list-unstyled">
				<li><i class="fa fa-unlock-alt fa-fw"></i><span>Name </span>:<?php echo $info['Username']; ?></li>
				<li><i class="fa fa-envelope-o fa-fw"></i><span>Email</span>:<?php echo $info['Email']; ?></li>
				<li><i class="fa fa-user fa-fw"></i><span>Full-Name</span>:<?php echo $info['Fulname']; ?></li>
				<li><i class="fa fa-calendar fa-fw"></i><span>Register-Date</span>:<?php echo $info['Date']; ?><br/>
				<li><i class="fa fa-tags fa-fw"></i><span>Fav Category</span>:<?php echo $info['Username']; ?></li>
				</ul>
				<a href="#" onclick="myFunction()" class="btn btn-default my-Button">Start Chating</a>
			</div>
		</div>
	</div>

	<script>
function myFunction() {
	var myWindow = window.open("chat/server.php", "", "width=550,height=600");
     
}
</script>
	
</div>

<div id="my-ads" class="Lastes-Ads block">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">My Advartising</div>
			<div class="panel-body">
				<div class="row">

					<?php
					if(!empty(getItem('Member_ID',$info['UserID']))){
					foreach (getItem('Member_ID',$info['UserID'],'1') as $item ) {
					echo '<div class="col-sm-6 col-md-3">';
					echo '<div class="thumbnail item-box">';
					if ($item['Approve']==0) {
						echo '<span class="approve-status">waiting for Approval</span>';
					}


					$categories=$item['Cat_ID'];

					$stmt=$con->prepare("select * from categories where  ID='".$categories."' ");
					$stmt->execute();
					$rows =$stmt->fetchAll();

					foreach($rows as $row){
					$categoriesName= $row['Name'];
					}

					echo '<span class="price-tag">'.$categoriesName .'</span>';
					 
					echo '<img class="img-responsive" src="post2.png" alt="">';
					echo '<div class="caption">';
					echo '<h3><a href="items.php?itemid='.$item['Item_ID'].'">'. $item['Name'] .'</a></h3>';
					

					if ($item['Status']==1) {
 					echo '<p>Techer</p>';
					}
					else if ($item['Status']==2) {
 					echo '<p>Student</p>';
					}
					else if ($item['Status']==3) {
 					echo '<p>Employee</p>';
					}

					 
					echo '<div class="date">'. $item['Add_Date'] .'</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>';
					}
					    }else{
                     	echo "there is no Ads to show create <a href='newads.php'>New Ads</a>";
                     }

					?>

					</div>
			</div>
		</div>
	</div>
	
</div>

<div class="Lastes-Comment block">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">My Comment</div>
			<div class="panel-body">
					<?php
					$stmt=$con->prepare("select comment from comments where User_id=?");
					$stmt->execute(array($info['UserID']));
					$comments =$stmt->fetchAll();
                     if(!empty($comments)){
 						foreach ($comments as $comment ) {
 							echo '<p>'.$comment['comment'].'</p>';
 						}
                     }else{
                     	echo "there is no comments to show";
                     }

					?>
			</div>
		</div>
	</div>
	
</div>
 
 

<?php
}else{
	header('Location:login.php');
	exit();
}
 include $tpl.'footer.php'; ?>
}


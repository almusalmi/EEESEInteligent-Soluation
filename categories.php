<?php 
session_start();
include 'init.php';
if(isset($_SESSION['user'])){



/*
///////////////////////////////////////////////////////////////////////////////////////////////
this is Categories mangment page
 content all avilable fetures by the folling arrengment
  select
  ,add,
  delete,
  upadte
   and approve

   ///////////////////////////////////////////////////////////////////////////////////////////////

*/




	
?>
 <div class="container">

 	<h1 class="text-center"> Show Department</h1> 

<div class="row">


<?php

 
$categories=$_SESSION['uid'];

$stmt=$con->prepare("select * from users where  UserID='".$categories."' ");
$stmt->execute();
$rows =$stmt->fetchAll();

foreach($rows as $row){
$categoriesName= $row['Category'];
}



$category=isset($_GET['pageid'])&&is_numeric($_GET['pageid'])? intval($_GET['pageid']):0;

$stmtt=$con->prepare("select * from items where Cat_ID={$category} and Approve=1 and Member_ID='".$categories."' ");
$stmtt->execute();
$getitem =$stmtt->fetchAll();
//$getitem=getAllFromm("*","items","where Cat_ID={$category} and Approve=1"," or Cat_ID='".$categoriesName."' and //Member_ID='".$categories."'  ","Item_ID");
foreach ($getitem as $item ) {
	 echo '<div class="col-sm-6 col-md-3">';
	 echo '<div class="thumbnail item-box">';
 

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
						else if ($item['Status']==4) {
 					echo '<p>Admin</p>';
					}
	 echo '<div class="date">'. $item['Add_Date'] .'</div>';
	 echo '</div>';
     echo '</div>';
     echo '</div>';
}




?>

</div>
</div>

<?php
}else{
	header('Location:login.php');
	exit();
}
 include $tpl.'footer.php';

  ?>
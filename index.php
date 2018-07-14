<?php
session_start();
$pageTitel='homepage';
 include 'init.php';

 if(isset($_SESSION['user'])){










/*
///////////////////////////////////////////////////////////////////////////////////////////////
this is Login mangment page
 content all avilable fetures by the folling arrengment
 and auth

   ///////////////////////////////////////////////////////////////////////////////////////////////

*/

 
 ?>


 <div class="container">
 <div class="row">

<?php

 

$categories=$_SESSION['uid'];

$stmt=$con->prepare("select * from users where  UserID='".$categories."' ");
$stmt->execute();
$rows =$stmt->fetchAll();

foreach($rows as $row){
$categoriesName= $row['Category'];
}

$allitems=getAllFrom('items','Item_ID','where Approve=1 and Cat_ID="'.$categoriesName.'" or Member_ID="'.$categories.'" and Approve=1  ');
foreach ($allitems as $item ) {
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
 }
 else{
 	header('Location:login.php');
	exit();
 }
 include $tpl.'footer.php';
ob_end_flush();
 ?>


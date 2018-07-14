<?php
ob_start();
session_start();
$pageTitel='Show Items';
 include 'init.php';

$itemid=isset($_GET['itemid'])&&is_numeric($_GET['itemid'])? intval($_GET['itemid']):0;
$stmt=$con->prepare("select items.*,categories.Name as category_name ,users.Username from items inner join 
	                  categories  on categories.ID =items.Cat_ID inner join users on users.UserID=items.Member_ID where Item_ID=? and Approve=1");
$stmt->execute(array($itemid));
$count=$stmt->rowCount();

if($count>0){
$item =$stmt->fetch();
 ?>


<h1 class="text-center"><?php echo $item['Name'] ?></h1>
 <div class="container">
 	<div class="row">
 		<div class="col-md-3">
 			<img class="img-responsive img-thumbnail center-block" src="post2.png" alt=""/>
 		</div>
 		<div class="col-md-9 item-info ">
 		 <h2><?php echo $item['Name'] ?></h2>
 		 <p><?php echo $item['Description'] ?></p>
 		 <ul class="list-unstyled">

 		 <li><i class="fa fa-calendar fa fa-fw"></i><span>Added Date</span> : <?php echo $item['Add_Date'] ?></li>
  		 <li><i class="fa fa-tags fa fa-fw"></i><span> Department </span> :
 		 <a href="categories.php?pageid=<?php echo $item['Cat_ID'] ?>" >            <?php echo $item['category_name'] ?> </a></li>
 		 <li><i class="fa fa-user fa fa-fw"></i><span> Added By </span> :<a href="#"><?php echo $item['Username'] ?></a></li>

 		 <li class="tags-item"><i class="fa fa-tags fa fa-fw"></i><span> Tags </span> 
 		 	<?php
 		 		$allTags=explode(",", $item['Tags']);
 		 		foreach ($allTags as $tag ) {
 		 			$tag=str_replace(' ','',$tag);
 		 			$tolower=strtolower($tag);
 		 			if (!empty($tag)) {
 		 				# code...
 		 			
 		 			echo "<a href='tags.php?name={$tolower}'>". $tag."</a>";
 		 		}}
 		 	?>
 		 </li>

         </ul>

 		</div>
 	</div>


 	 	<hr class="custom-hr">
 	 			<?php 
				$stmt=$con->prepare("select comments.* ,users.* from comments inner join users on users.UserID=comments.User_id 
				where Item_ID =? and Status=1	order by C_id DESC");
				$stmt->execute(array($item['Item_ID']));
			    $comments =$stmt->fetchAll();

		?>


		 
 
 
 	
        <?php 
		    foreach ($comments as $comment) { ?>
		    <div class="comment-box">
			    <div class="row">
			    <div class="col-sm-2 text-center">
             <?php
			    if($comment['Avatar']>0){
                   echo "<img class='img-responsive img-thumbnail img-circle center-block' src='admin\uploads\avatars/".$comment['Avatar']."' alt=''>";

                }else{
 					 
 					 echo "<img class='img-responsive img-thumbnail img-circle center-block' src='img.ico' alt=''>";
				}
                 ?>


			    <?php echo $comment['Username']; ?> 
			    </div>
			    <div class="col-sm-10">
			    <p class="lead">	<?php echo $comment['Comment']; ?> </p>
			    </div>		
			    </div>
		    </div>
		    <hr class="custom-hr">

       <?php } ?>
 	

 </div>
 

 	<hr class="custom-hr">
 	<?php if(isset($_SESSION['user'])){ ?>
 	<div class="row">
 		<div class="col-md-offset-3">
 			<div class="add-comment">
 			<h3>Add Your Comment</h3>
 			<form action="<?php echo $_SERVER['PHP_SELF'].'?itemid='.$item['Item_ID'] ?>" method="POST">
 			<textarea name="comment" required="required"></textarea>
 			<input class="btn btn-primary" type="submit" name="add" value="Add Comment">
 			</form>
 			<?php
 			if ($_SERVER['REQUEST_METHOD']=='POST') {
 				$comment=filter_var($_POST['comment'], FILTER_SANITIZE_STRING );
 				$itemid= $item['Item_ID'];
 				$userid=$_SESSION['uid'];
 				
 				if (! empty($comment)) {
 					$stmt=$con->prepare("insert into comments(Comment ,Status,Comment_date,Item_id,User_id) values (:zcomment , 1 , NOW() , :zitemid , :zuserid)");
 					$stmt->execute(array(
 					'zcomment'=>$comment,
 					'zitemid'=>$itemid,		
 					'zuserid'=>$userid		
 					));
 					if($stmt){
 						echo '<div class="alert alert-success"> Comment Added </div>';
 					}else{
 						echo '<div class="alert alert-danger"> there are error  </div>';
 					}
 				}
 			}
 			?>
 		</div>
 		</div>
 	</div>
    <?php } else{
    	echo '<a href="login.php"> login </a> or <a href="login.php"> Rigester </a> to comment';
    } 
    ?>


 
 
 

<?php
 }
 else {
 echo '<div class="container">';
echo '<div class="alert alert-danger">there\'s No such ID or the Prodect Waiting for Approve</div>';
echo '</div>';
 }

 include $tpl.'footer.php'; 
ob_end_flush();
 ?>



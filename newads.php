<?php
session_start();
$pageTitel='CREATE NEW ITEM';
 include 'init.php';
if(isset($_SESSION['user'])){


	/*
///////////////////////////////////////////////////////////////////////////////////////////////
this is New Ads and Postes mangment page
 content all avilable fetures by the folling arrengment
  select
  ,add,
 

   ///////////////////////////////////////////////////////////////////////////////////////////////

*/
 
  
 if($_SERVER['REQUEST_METHOD']=='POST'){
 	$formErrors=array();






 	$name 			=filter_var($_POST['name'],FILTER_SANITIZE_STRING);
 	$description 	=filter_var($_POST['description'],FILTER_SANITIZE_STRING);
  	$category 		=filter_var($_POST['category'],FILTER_SANITIZE_NUMBER_INT);
 	$tags 		    =filter_var($_POST['tags'],FILTER_SANITIZE_STRING);
 	

 	 if(strlen($name)<4){
 	 	$formErrors[]="the title must be more than 4 chars";
 	 }
 	 	 if(strlen($description)<10){
 	 	$formErrors[]="the description must be more than 10 chars";
 	 }
  
 	  	 if(empty($category)){
 	 	$formErrors[]="the category not be empty";
 	 }
 
		if(empty($formErrors)){

						 

			$ss=$_SESSION['uid'];

			$stmt=$con->prepare("select * from users where GroupID !=1 and UserID='".$ss."' ");
			$stmt->execute();
			$rows =$stmt->fetchAll();

			foreach($rows as $row){
			$ss= $row['Statuss'];
			}

			//echo $ss;
			 




		$stmt=$con->prepare("insert into items (Name,Description,Price,Add_Date,Country_Made,Status,Cat_ID,Member_ID,Tags)values
		(:zname,:zdescrption,:zprice,now(),:zcountry,:zstatus,:zcat,:zmember,:ztags)");
		$stmt->execute(array(
		'zname'=>$name,
		'zdescrption'=>$description,
		'zprice'=>100,
		'zcountry'=>'sudan',
		'zstatus'=>$ss,
		'zcat'=>$category,
		'ztags'=>$tags,
		'zmember'=>$_SESSION['uid']
		));

		 if($stmt){
		 	$formsuccess= "the Ads has been Added";
		 }
		}
 }
	 
 ?>
<h1 class="text-center">Create New Ads</h1>
<div class="information block">
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">Create New Ads</div>
			<div class="panel-body">
		 		<div class="row">
		 			<div class="col-md-8">
							<form class="form-horizontal " action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">





							<div class="form-group form-group-lg"  >
							<label class="col-sm-3  control-label">Title</label>
							<div class="col-sm-10 col-md-9">
							<input type="text" name="name"  class="form-control live" required="required" placeholder="insert Items name" data-class=".live-titel"/>
							</div>
							</div>

							<div class="form-group form-group-lg">
							<label class="col-sm-3  control-label">Body</label>
							<div class="col-sm-10 col-md-9">
							<textarea name="description" required="required" class="form-control" required="required"  placeholder="insert Body"></textarea>
							</div>
							</div>

					 

							  

							<div class="form-group form-group-lg">
							<label class="col-sm-3  control-label">Department</label>
							<div class="col-sm-10 col-md-9">
							<select class="form-control"  name="category"> 
							<option value="0">....</option>
							<?php
							foreach (getAllFrom('categories','ID') as $cat) {
							echo "<option value='".$cat['ID']."'>".$cat['Name']."</option>";
							}
							?>
							</select>
							</div>
							</div>



				



							<div class="form-group form-group-lg">
							<label class="col-sm-3  control-label">Tags</label>
							<div class="col-sm-10 col-md-9">
							<input type="text" name="tags" class="form-control" placeholder="please sprate tags with column"  />
							</div>
							</div>


							<div class="form-group form-group-lg">
							<div class="col-sm-offset-3 col-sm-10">
							<input type="submit"  value="Add Items" name="save" class="btn btn-primary btn-larg" />
							</div>
							</div>







							</form>
		 	
		 		</div>      
							<?php 
							if(!empty($formErrors)){
								
							foreach ($formErrors as $error ) {
								echo '<div class="alert alert-danger text-center">';
							echo $error .'<br/>';
							echo '</div>';
							}
							
							}
									if(isset($formsuccess)){
									echo '<div class="alert alert-success">'.$formsuccess.'</div>';
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


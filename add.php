<?php
include('db_connect.php');

	$email = $title = $ingredients ='';
	$errors = array('email'=>'', 'title'=>'', 'ingredients'=>'' );
	if(isset($_POST['submit'])){
		//echo htmlspecialchars($_POST['email']);
		//echo htmlspecialchars($_POST['title'] );
		//echo htmlspecialchars($_POST['ingredients']);
		if(empty($_POST['email'])){
	      $errors['email']= "An EMAil is required! <br/>";
	    }else {
	      $email = $_POST['email'];
	      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	        $errors['email']= "Email must be valid <br/>";
	      }
	        }
	    //check title
	    if(empty($_POST['title'])){
	      $errors['title']= "An title is required! <br/>";
	    }else {
	      //echo htmlspecialchars($_POST['title']); to prevent typing anyHTML tags or links
	      $title = $_POST['title'];
	      if(!preg_match('/^[a-zA-Z\s]+$/',$title)){
	        $errors['title']= 'Title must be letters';
	      }
	    }
	    //check ingredients
	    if(empty($_POST['ingredients'])){
	      $errors['ingredients']= "An ingredients is required! <br/>";
	    }else {
	    	$ingredients=$_POST['ingredients'];
	      	if(!preg_match('/^[a-zA-Z\s]+(,\s*[a-zA-Z\s]*)*$/',$ingredients)){
	        $errors['ingredients']= 'Ingredients must be a comma separated list';
	      }	    }
	      if(array_filter($errors)){
	      	//  echo 'errors in the form';
	      } else{
	      	header('location: index.php');
	      }
  } //end of post check





?>
<!DOCTYPE html>
<html lang="en">
<?php include ('template/header.php');?>
<section class="container grey-text">
<h4 class="center">Add a Pizza</h4> 
<form class="white" action="add.php" method="POST">
	<label>Your Email:</label>
	<input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>">
	<div class="red-text"><?php echo $errors['email']; ?></div>
	<label>Pizza Title:</label>
	<input type="text" name="title" value=" <?php echo htmlspecialchars($title) ?>"
		<div class="red-text"><?php echo $errors['title']; ?></div>

	<label>Ingredients (comma separated):</label>
	<input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">
	<div class="red-text"><?php echo $errors['email']; ?></div>

	<div class="center">
		<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
	</div>
</form> 
</section>
<?php include ('template/footer.php'); ?>
</html>
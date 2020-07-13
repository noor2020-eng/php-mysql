
<?php

 

include('db_connect.php');
 

//write query for all pizzas
$sql = 'SELECT id,title,ingredients FROM pizzas';

 

// make query & get result
$result = mysqli_query($conn, $sql) or die("Error: " . mysqli_error($conn));

 

//fetch the result row as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

 

//free result from memory
mysqli_free_result($result);

 

//close connections
mysqli_close($conn);


 

 

//print_r($pizzas);
 ?>

 

<!DOCTYPE html>

 

<html>

 

  <?php include('template/header.php'); ?>
  <h4 class="center grey-text"> Pizzas! </h4>
  <div class="container">
    <div class="row">

 

      <?php foreach ($pizzas as $pizza){ ?>
        <div class="col s6 md3">
          <div class="card z-depth-0">
            <div class="card-content center">
              <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
              <div><ul>
                <?php foreach (explode(',', $pizza['ingredients']) as $ing): ?>
                  <li><?php echo htmlspecialchars($ing); ?></li>
                <?php endforeach; ?>
              </ul>
              </div>
            </div>
            <div class="card-action right-align">
              <a class="brand-text" href="#">more info!</a>
            </div>
          </div>
        </div>
      <?php } ?>
      <?php if(count($pizzas) >= 2){ ?>
        <p>there are two or more pizzas</p>
      <?php }else { ?>
        <p>there are less than two pizzas</p>
      <?php  } ?>

    </div>
  </div>

 

  <?php include('template/footer.php'); ?>

 

</html>
 
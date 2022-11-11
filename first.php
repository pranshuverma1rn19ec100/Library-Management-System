<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Library Books</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php

$conn = mysqli_connect('localhost','root','','library') or die('connection failed');

?>   
<?php include 'header.php'; ?>

<section class="products">

   <h1 class="title">Books</h1>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `books`") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
     <img src="data:image/jpg;charset=utf8;base64, <?php echo base64_encode($fetch_products['image']); ?>"width="260" height="250"alt="" /> 
      <div class="name"><?php echo $fetch_products['bname']; ?></div>
      <div class="name"><?php echo $fetch_products['author']; ?></div>
      <div class="name"><?php echo $fetch_products['subject']; ?></div>
      <div class="author"><?php echo $fetch_products['publish_date']; ?></div>
     
      
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
      ?>
   </div>

</section>
</body>
</html>
<?php
$conn = mysqli_connect('localhost','root','','library') or die('connection failed');

if(isset($_POST['add_book'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $author = $_POST['author'];
   $subject = $_POST['subject'];
   $pdate=$_POST['pdate'];
//    $image = $_FILES['image']['name'];
//    $image_size = $_FILES['image']['size'];
//    $image_tmp_name = $_FILES['image']['tmp_name'];
//    $image_folder = 'uploaded_img/'.$image;
$fileName = basename($_FILES["image"]["name"]); 
    $image = $_FILES['image']['tmp_name']; 
    $imgContent = addslashes(file_get_contents($image));
   $select_book_name = mysqli_query($conn, "SELECT bname FROM `books` WHERE bname = '$name'") or die('query failed');

   if(mysqli_num_rows($select_book_name) > 0){
      $message[] = 'Book name already added';
   }else{
      $add_book_query = mysqli_query($conn, "INSERT INTO `books`(bname,author,subject,publish_date, image) VALUES('$name', '$author','$subject','$pdate', '$imgContent')") or die('query failed');
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Book Entry</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'header.php'; ?>

<!-- product CRUD section starts  -->

<section class="add-products">

   <h1 class="title">Book Entry</h1>

   <form action="" method="post" enctype="multipart/form-data">
      <h3>add product</h3>
      <input type="text" name="name" class="box" placeholder="Enter Book Title" required>
      <input type="text"  name="author" class="box" placeholder="Enter Author name" required>
      <input type="text"  name="subject" class="box" placeholder="Enter Subject" required>
      <input type="date"  name="pdate" class="box" placeholder="Enter Publish Date" required>
      <input type="file" name="image" accept="image/jpg, image/jpeg, image/png" class="box" required>
      <input type="submit" value="add book" name="add_book" class="btn">
   </form>
</body>
</html>
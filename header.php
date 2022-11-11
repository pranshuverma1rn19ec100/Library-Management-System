<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<header class="header">
   <div class="header-2">
      <div class="flex">
         <a href="home.php" class="logo">Book Collections</a>

         <nav class="navbar">
            <a href="first.php">Home</a>
            <a href="addbooks.php">Add Books</a>
         </nav>
      </div>
   </div>

</header>
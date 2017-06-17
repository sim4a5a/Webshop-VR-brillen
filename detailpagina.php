<?php
include('includes/header.php');

$connect = mysqli_connect("localhost", "root", "Lente_2017", "tut");
$query = "SELECT description FROM products";
$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
    ?>
    <form method="post" action="">
    <img src="<?php echo $row["image"]; ?>">
    <?php echo $row["description"];

  }
}
?>




<?php
include('includes/footer.php');
?>

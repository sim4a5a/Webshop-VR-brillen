<?php
session_start();
include('includes/header.php');

$con = mysqli_connect("localhost", "root", "Lente_2017", "tut");
$product = $_GET['id'];
$query = "SELECT * FROM products WHERE id=" . $product;
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
    ?>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <form class="col-12" method="post" action="<?php echo $row["id"]; ?>">
    <div class="col-2"></div>
    <img src="<?php echo $row["image"]; ?>">
    <div class="col-3"><?php echo $row["description"]; ?></div>
    <div class="col-2"><b>€ <?php echo $row["price"]; ?></b></div>
    <div class="col-5"></div>
    <div class="col-7"><a href="producten.php" class="continue">terug naar producten</a></div>
    </form>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <div class="col-12"></div>
    <div class="col-12"></div>


<?php
  }
}

?>
<?php
include('includes/footer.php');
?>

<?php
session_start();
include('includes/header.php');

$con = mysqli_connect("localhost", "root", "Lente_2017", "tut");
$product = $_GET['id'];
$query = "SELECT description FROM products WHERE id=" . $product;
$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_array($result))
  {
    ?>
    <form method="post" action="">
    <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
    <h5 class="text-danger">€ <?php echo $row["price"]; ?></h5>
    <img src="<?php echo $row["image"]; ?>">
    <?php echo $row["description"]; ?>
    </form>

<?php
  }
}

?>
<?php
include('includes/footer.php');
?>

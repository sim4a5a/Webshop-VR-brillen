<?php
session_start();
include ("includes/header.php");
$connect = mysqli_connect("localhost", "root", "Lente_2017", "tut");
?>
<!-- <h2>Mijn Winkelmandje</h2> -->
<div class="content2">
<div class="col-12"></div>
<div class="col-2"></div>
<div class="cart col-11 col-m-12">
<center><h2>Mijn Winkelmandje</h2></center>
<table>
<tr>
<th>Product Naam</th>
<th>Aantal</th>
<th>Prijs</th>
<th>Totaal</th>
<th>Verwijder</th>
</tr>
<?php
if(!empty($_SESSION["cart"]))
{
$total = 0;
foreach($_SESSION["cart"] as $keys => $values)
{
  ?>
        <tr>
        <td><?php echo $values["item_name"]; ?></td>
        <td><input type="text" value="<?php echo $values["item_quantity"]; ?>"</td>
        <td>€ <?php echo $values["product_price"]; ?></td>
        <td>€ <?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?></td>
        <td><a href="winkelmandje.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span><img style="width:20px;" src="images/delete.png"></span></a></td>
        </tr>
        <?php
  $total = $total + ($values["item_quantity"] * $values["product_price"]);
}
?>
    <tr>
    <td colspan="3" align="right">Totaal</td>
    <td align="right">€ <?php echo number_format($total, 2); ?></td>
    <td></td>
    </tr>

    <?php
}
?>

</table>
<br><br>
  <a href="producten.php" class="continue">Verder winkelen</a>
</div>
</div>
<div class="col-12"></div>
<div class="col-12"></div>
<div class="col-12"></div>
<div class="col-12"></div>
</body>
</html>

<!--winkelmandje-->
<?php
if(isset($_POST["add"]))
{
if(isset($_SESSION["cart"]))
{
$item_array_id = array_column($_SESSION["cart"], "product_id");
if(!in_array($_GET["id"], $item_array_id))
{
  $count = count($_SESSION["cart"]);
  $item_array = array(
  'product_id' => $_GET["id"],
  'item_name' => $_POST["hidden_name"],
  'product_price' => $_POST["hidden_price"],
  'item_quantity' => $_POST["quantity"]
  );
  $_SESSION["cart"][$count] = $item_array;
  echo '<script>window.location="winkelmandje.php"</script>';
}
else
{
  echo '<script>alert("Product staat al in winkelmandje")</script>';
  echo '<script>window.location="winkelmandje.php"</script>';
}
}
else
{
$item_array = array(
'product_id' => $_GET["id"],
'item_name' => $_POST["hidden_name"],
'product_price' => $_POST["hidden_price"],
'item_quantity' => $_POST["quantity"]
);
$_SESSION["cart"][0] = $item_array;
}
}

//delete product
if(isset($_GET["action"]))
{
   if($_GET["action"] == "delete")
  {
    foreach($_SESSION["cart"] as $keys => $values)
  {
    if($values["product_id"] == $_GET["id"])
  {
    unset($_SESSION["cart"][$keys]);
    echo '<script>alert("Product is verwijderd uit uw winkelmandje!")</script>';
    echo '<script>window.location="winkelmandje.php"</script>';
  }
}
}
}

//Update winkelmandje

if(isset($_GET["update"])) {
  $arrQuantity = $_POST["quantity"];
  $cart = unserialize ( serialize ( $_SESSION["cart"]));
  for($i = 0; $i < count ($cart); $i++) {
    $cart[$i]->quantity = $arrQuantity[i];
  }
  $_SESSION ["cart"] = $cart;

}

// if(isset($_POST['update_cart'])) {
// $quantities = $_POST['item_quantity'];
// foreach($quantities as $id => $quantity) {
//     $_SESSION['shopping_cart'][$id]['quantity'] = $quantity;
//     echo "ID: $id - Quantity: $quantity <br />";
// }
// }



include ("includes/footer.php");

?>

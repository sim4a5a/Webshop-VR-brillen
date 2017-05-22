

<?php
session_start();
$connect = mysqli_connect("localhost", "root", "Lente_2017", "tut");
include('includes/header.php');
?>


<!--Producten-->
<div class="row">
<div class="col-12 col-m-3">
	<h2 align="center">Producten</h2>
    <?php
	$query = "SELECT * FROM products ORDER BY id ASC";
	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div class="col-m-3">
            <form method="post" action="producten.php?action=add&id=<?php echo $row["id"]; ?>">
            <div align="center">
            <img src="<?php echo $row["image"]; ?>">
            <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
            <h5 class="text-danger">€ <?php echo $row["price"]; ?></h5>
            <input type="text" name="quantity" class="form-control" value="1">
            <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>"><br>
            <input type="submit" name="add" style="margin-top:5px;" class="submitbutton" value="+ in winkelmandje">
            </div>
            </form>
            </div>
            <?php
		}
	}
	?>
</div>

    <!-- <h2>Mijn Winkelmandje</h2> -->
    <div class="cart col-10 col-m-12">
		<h2>Mijn Winkelmandje</h2>
    <table style="border collapse:collapse; border:1px solid black;">
    <tr>
    <th width="30%">Product Naam</th>
    <th width="10%">Aantal</th>
    <th width="20%">Prijs</th>
    <th width="15%">Totaal</th>
    <th width="5%">Verwijder</th>
		<th width="5%">Voeg toe</th>
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
            <td><input type="text" name="quantity" <?php echo $values["item_quantity"]?></td>
            <td>$ <?php echo $values["product_price"]; ?></td>
            <td>$ <?php echo number_format($values["item_quantity"] * $values["product_price"], 5); ?></td>
            <td><a href="producten.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span class="text-danger">X</span></a></td>
						<!-- <td><input type='submit' class='button' name='update_cart' value='Update' /></td> -->
						<td><a href="producten.php?action=update&id=<?php echo $values["item_quantity"]; ?>"><span class="text-danger">+</span></a></td>
            </tr>
            <?php
			$total = $total + ($values["item_quantity"] * $values["product_price"]);
		}
		?>
        <tr>
        <td colspan="3" align="right">Totaal</td>
        <td align="right">€ <?php echo number_format($total, 10	); ?></td>
        <td></td>
        </tr>
        <?php
	}
	?>
    </table>
    </div>
    </div>
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
			echo '<script>window.location="producten.php"</script>';
		}
		else
		{
			echo '<script>alert("Products already added to cart")</script>';
			echo '<script>window.location="producten.php"</script>';
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
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["cart"] as $keys => $values)
		{
			if($values["product_id"] == $_GET["id"])
			{
				unset($_SESSION["cart"][$keys]);
				echo '<script>alert("Product has been removed")</script>';
				echo '<script>window.location="producten.php"</script>';
			}
		}
	}
}

if(isset($_POST['update_cart'])) {
    $quantities = $_POST['item_quantity'];
    foreach($quantities as $id => $quantity) {
        $_SESSION['shopping_cart'][$id]['quantity'] = $quantity;
        echo "ID: $id - Quantity: $quantity <br />";
    }
}

if(isset($_GET["update"]))
{
	$quantities = $_POST["cart"];
}

include('includes/footer.php');
?>

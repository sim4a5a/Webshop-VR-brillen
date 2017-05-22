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
            <form method="post" action="winkelmandje.php?action=add&id=<?php echo $row["id"]; ?>">
            <div align="center">
            <img src="<?php echo $row["image"]; ?>">
            <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
            <h5 class="text-danger">€ <?php echo $row["price"]; ?></h5>
            <input type="text" name="quantity" class="form-control" value="1">
            <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>"><br>
            <input type="submit" name="add" style="margin-top:5px;" class="submitbutton" value="+ In winkelmandje">

            <!--<form method="post" action="detailspagina.php?action=add&id=<?php //echo $row["description"];?>">-->
            <input type="submit" name="details" class="detailbutton" value="Details">
            <!--</form>-->

            </div>
            </form>

            </div>
            <?php
		}
	}
	?>
</div>



<?php

include('includes/footer.php');
?>

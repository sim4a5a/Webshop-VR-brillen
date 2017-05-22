
<!--Header-->
<?php
session_start();
$connect = mysqli_connect("localhost", "root", "Lente_2017", "tut");
include('includes/header.php');
 ?>
<!--Banner-->
<div class="row">
<div class="col-12 col-m-12 banner">
    <img src="images/banner3.png">
</div>
</div>
<!--Content-->
<div class="row">
<div class="col-1 col-m-1">&nbsp;</div>
<div id='content' class="col-10 col-m-10 content">
<center><h2>Nieuwste producten!</h2></center>
<div class='col-12 col-m-12'>
</div>
<div class="col-1"></div>
<div class=''>
<?php
	$query = "SELECT * FROM products ORDER BY id DESC LIMIT 2";
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
            <input type="hidden" name="quantity" class="form-control" value="1">
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
<div class='col-12 col-m-12'><br></div>

<!--Footer-->


</body>
<?php
include('includes/footer.php');
 ?>
</html>

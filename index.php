
<!--Header-->
<?php
session_start();
$con = mysqli_connect("localhost", "root", "Lente_2017", "tut");
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
<div class="col-2 col-m-1">&nbsp;</div>
<div id='content' class="col-9 col-m-10 content">
<center><h2>Nieuwste producten!</h2></center>
<div class='col-12 col-m-12'>
</div>
<div class="col-1"></div>

<?php
	$query = "SELECT * FROM products ORDER BY id DESC LIMIT 3";
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) > 0)
	{
		while($row = mysqli_fetch_array($result))
		{
			?>
            <div class="col-m-3">
            <form method="post" action="detailpagina.php?action=add&id=<?php echo $row["id"]; ?>">
            <div align="center">
            <img src="<?php echo $row["image"]; ?>">
            <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
            <h5 class="text-danger">€ <?php echo $row["price"]; ?></h5>
            <input type="hidden" name="quantity" class="form-control" value="1">
            <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>"><br>
            <input type="submit" name="detail" style="margin-top:5px;" class="submitbutton" value="Lees meer">
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

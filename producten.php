<?php
session_start();
include('includes/header.php');

?>

<!--Producten-->
<div class="row">
<div class="col-12 col-m-3">
	<h2 align="center">Producten</h2>
    <?php
		$connect = mysqli_connect("localhost", "root", "Lente_2017", "tut");
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
						<a href="detailpagina.php?id='.$row['id'].'"></a>
            <h5 class="text-info"><?php echo $row["p_name"]; ?></h5>
            <h5 class="text-danger">€ <?php echo $row["price"]; ?></h5>
            <select type="dropdown" name="quantity" class="form-control dropdownselect">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
								<option value="6">6</option>
								<option value="7">7</option>
								<option value="8">8</option>
								<option value="9">9</option>
								<option value="10">10</option>
            </select>
            <input type="hidden" name="hidden_name" value="<?php echo $row["p_name"]; ?>">
            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>"><br>
            <input type="submit" name="add" style="margin-top:5px;" class="submitbutton" value="+ In winkelmandje">

						<a href="detailpagina.php?action=add&id=<?php echo $row["id"];"</a>" ?>";



            <!-- <form method="post" action="detailspagina.php?action=add&id=<?php //echo $row["description"];?>"> -->

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

<?php
session_start();
include('includes/header.php');
?>

<?php
// Establish Connection to the Database
$con = mysqli_connect("localhost", "root", "Lente_2017", "tut");
//Records per page
$per_page=10;
if (isset($_GET['page'])) {
$page = $_GET['page'];
} else {
$page=1;
}
// Page will start from 0 and Multiple by Per Page
$start_from = ($page-1) * $per_page;

//Selecting the data from table but with limit
$query = "SELECT * FROM products LIMIT $start_from, $per_page";
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($result)) {
?>
<div class="col-m-3">
            <form method="post" action="winkelmandje.php?action=add&id=<?php echo $row["id"]; ?>">
            <div align="center">
              <div><a class="descrip" href="detailpagina.php?action=add&id=<?php echo $row["id"]; $row["description"];"</a>" ?>"></div>
            <img src="<?php echo $row["image"]; ?>">
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


            </div>
            </form>
           </div>

<?php
}

?>
<div class="page" >
<?php

//Now select all from table
$query = "SELECT * FROM products";
$result = mysqli_query($con, $query);
// Count the total records
$total_records = mysqli_num_rows($result);

//Using ceil function to divide the total records on per page
$total_pages = ceil($total_records / $per_page);

//Going to first page
echo "<div class='pages'<center><a href='producten.php?page=1'>".'First Page'."</a>";

for ($i=1; $i<=$total_pages; $i++) {

echo "<a href='producten.php?page=".$i."'>".$i."</a> ";
};
// Going to last page
echo "<a href='producten.php?page=$total_pages'>".'Last Page'."</a></div> ";
?>

</div>


<?php
include('includes/footer.php');
?>

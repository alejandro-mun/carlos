<?php
$orderby=$_GET['orderby'];	//Document... is there a variable on the URL called orderby? if yes, put it's value into $orderby

function mark_selected($opt){			//mark the last option in Jump Menu as the selected 
	if (isset($_GET['orderby'])){
	$orderby=$_GET['orderby'];
	}
	else{
		$orderby=1;
	}
	
	if ($orderby==$opt){
	echo 'selected="selected" ' ;
	}
}

switch($orderby){				//Find out what to order by.
		case "1":
		$sql_order='item_name';
		break;
		
		case "2":
		$sql_order='item_collection';
		break;
	default:
		$sql_order='item_id';
}

require( "config.php" );
$sql_get_all = "SELECT * FROM crud_tbl ORDER BY $sql_order";		//Compose query
$result = $makeconnection->query( $sql_get_all );				//Send query, but answer int $results

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
	<meta content="width=device-width,initial-scale=1.0" name="viewport">
<title>Carlos Tamayo || Home</title>	
<link href="style.css" rel="stylesheet" type="text/css">
<script src="https://kit.fontawesome.com/80cdf29f61.js" crossorigin="anonymous"></script>        

<script>

function JS_delete_item(item_id){
	if (confirm('Are you sure you want to delete this item?')) {
		window.location.href = 'delete.php?id='+item_id;
	}
}		
	function jumpMenu(selObj){ 													//what to do when select is selected.
  window.location.href =selObj.options[selObj.selectedIndex].value;			//take me to : the select, from all its options, the selected one, find out its value
}	

</script>

</head>
<body>
	<div id="container">
        <header>
		<nav class="nav">
                <div class="nav-center">
                    <div class="nav-header">
                        <button class="nav-btn">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <!--Nav links-->
                    <ul class="nav-links">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="contact.html">contact</a></li>
                    </ul>
                </div>
            </nav>
			<div class="logo">
                <img src="item_images/CTLOGO.PNG" alt="carlos tamayo">
			</div>
			
            <!--End of nav bar-->

            <!--sidebar-->
            <aside class="sidebar">
                <div>
                    <button class="close-button">
                        <i class="fas fa-times"></i>
                    </button>
                    <ul class="sidebar-links">
                        <li><a href="index.html">home</a></li>
                        <li><a href="about.html">about</a></li>
                        <!-- <li><a href="work.html">work</a></li> -->
                        <li><a href="contact.html">contact</a></li>
                    </ul>
                </div>
            </aside>

		</header>

		<main>
			<p><a href="add.php">Add Art</p>

		<div id="item_catalog" class="art-catelog">
			<?php while ($row = $result->fetch_assoc()) { ?>
			
			<div class="item_small">

				<a href="item_detail.php?id=<?php echo $row["item_id"]; ?>">

				<div class="small_img_holder">
					<img src="item_images/<?php echo $row["item_img"];?>" alt="<?php echo $row["item_name"]; ?>">
				</div>
				<h3 class="item_name"><?php echo $row["item_name"]; ?></h3>
				<h3 class="item_name"><?php echo $row["item_collection"]; ?></h3>

				</a>
				<p class="art-buttons"><a href="modify.php?id=<?php echo $row["item_id"]; ?>">Modify</a></p>
				<p class="art-buttons"><a href="javascript:JS_delete_item(<?php echo $row['item_id']; ?>);">Delete</a></p>
			</div>
			
			<!--end item small-->
		
			<?php } //end while?>
			
			</div>
		<!--end item catalog-->
		
		<div class="myclear"></div>
		
		</main>
		<!--end main-->

		<footer class="footer">
			<p>&copy; <span id="date"></span> Carlos Tamayo. All rights reserved</p>
	
		</footer>
	
	</div>
	<!--end container-->
</body>
<script src="js/app.js"></script>

</html>
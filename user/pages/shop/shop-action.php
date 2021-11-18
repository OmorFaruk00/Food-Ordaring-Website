<?php
include "../dbconnection.php"; 
if(isset($_POST['category_list'])){	
	$sql = "SELECT * FROM `category` WHERE status=1";
	$result = $conn->query($sql);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			echo '<ul><li><input type="checkbox" onclick="select_category()" value="'.$row["id"].'">'.$row["category"].'</li></ul>';
		}
	}	
}

if(isset($_POST['selected_category'])){
	if($_POST['selected_category'] ==''){
		$sql ="SELECT * FROM `dish` WHERE status=1";
	}
	else{
		$selected_category = implode(",",$_POST['selected_category']);
		$sql ="SELECT * FROM `dish` WHERE `category_id` IN (".$selected_category .") AND status=1";
	}
	$result = $conn->query($sql);
	?>
	<div class="grid-list-product-wrapper">
		<div class="product-grid product-view pb-20">
			<div class="row">
				<?php while($dish_row = $result->fetch_assoc()){  ?> 

					<div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30 shadow"  >                
						<div class="product-wrapper" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);"> 
							<div class="product-img">                                        
								<img src="../admin/.<?php echo $dish_row['image']; ?>" alt="Image Not Found" width="auto"; height= "200px">
								
							</div>
							<div class="product-content p-3">
								<form id="dish_detailes_form">
									<h5><?php echo $dish_row["dish"]; ?></h5>				                                       
									<div class="product-price-wrapper d-flex justify-content-between">
										<h5>Price</h5>
										<h5><span>&#2547;</span> <?php echo $dish_row["price"]; ?></h5>
									</div>									
									<button type="button"class="add-to-cart btn btn-danger btn-block mt-3"   data-id="<?php echo $dish_row["id"]; ?>"><i class="fa fa-cart-plus mr-3 fx-5"></i>  Add To Cart</button>									
								</div> 
							</form>                                 
						</div>
					</div>
				<?php } ?>
			</div>
		</div>                            
	</div>
	<?php
}

?>
<script src="assets/js/cart.js"></script>



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
				<?php while($product_row = $result->fetch_assoc()){  ?> 

					<div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">                
						<div class="product-wrapper"> 
							<div class="product-img">                                        
								<img src="../admin/.<?php echo $product_row['image']; ?>" alt="Image Not Found" width="auto"; height= "200px">                                    
								
							</div>
							<div class="product-content">
								<form id="dish_detailes">
								<h5><?php echo $product_row["dish"]; ?></h5>				                                       
								<div class="product-price-wrapper">
									<?php
									$dish_detailes ="SELECT * FROM  `dish detailes` WHERE `dish_id` ='".$product_row['id']."' AND status=1"; 
									$result1 = $conn->query($dish_detailes);
									while($detailes_row = $result1->fetch_assoc()){  ?>									
										<label class="radio-inline mr-2">
											<input type="radio" name="radio_attr<?php echo $product_row['id']; ?>" id="radio" value='<?php echo $detailes_row["id"]; ?>' class="mr-1"><span><?php echo $detailes_row["attribute"]; ?>(<?php echo $detailes_row["price"]; ?>)</span>
										</label>
									<?php } ?>									
								</div>
								<div class="d-flex justify-content-end w-100 mt-3">
								 <label class="pt-2 text-danger h6">Qty:</label>										
										<select class="select w-25" id="qty<?php echo $product_row['id']; ?>">
										 <?php for($i=1; $i <=10; $i++){ 
										 	echo '<option>'.$i.'</option>';
										 } ?>											
										</select>
									
									<button type="button"class="btn btn-danger ml-3 w-75" id="cart" onclick="add_to_cart('<?php echo $product_row['id']; ?>')"><i class="fa fa-cart-plus mr-3 fx-5"></i>  Add To Cart</button>
								</div>
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



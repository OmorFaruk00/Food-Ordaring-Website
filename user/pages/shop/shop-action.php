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
				<?php while($row = $result->fetch_assoc()){  ?> 

					<div class="product-width pro-list-none col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30">                
						<div class="product-wrapper"> 
							<div class="product-img">                                        
								<img src="../admin/.<?php echo $row['image']; ?>" alt="Image Not Found" width="auto"; height= "300px">                                        
								<div class="product-action">
									<div class="pro-action-left">
										<a title="Add Tto Cart" href="#"><i class="ion-android-cart"></i> Add Tto Cart</a>
									</div>
									<div class="pro-action-right">
										<a title="Wishlist" href="wishlist.html"><i class="ion-ios-heart-outline"></i></a>
										<a title="Quick View" data-toggle="modal" data-target="#exampleModal" href="#"><i class="ion-android-open"></i></a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h4><?php echo $row["dish"]; ?></h4>                                       
								<div class="product-price-wrapper">
									<span>$200.00</span>
								</div>
							</div>                                   
						</div>
					</div>
				<?php } ?>
			</div>
		</div>                            
	</div>
	<?php
}

?>

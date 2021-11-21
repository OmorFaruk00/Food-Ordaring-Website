<?php
 include "../dbconnection.php";?>        
            <h4 class="text-center font-weight-bold mt-3">All Orders</h4>            
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                            <th>ORDER No.</th>
                            <th>Dish Details</th>
                            <th>QTY.</th>
                            <th>Total Amount</th>
                            <th>Customer Details</th>
                            <th>Order Date</th>                            
                            <th>Delivery Date</th>                            
                            <th>Payment Status</th>
                            <th>Delivery Status</th>
                            </thead>
                            <tbody>
                           <?php
                           // echo $user_id = $_SESSION['user_id'];
                           $sql = "SELECT * FROM `order_dish`"; 
                           $result = $conn->query($sql);
                           if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                            ?>
                                <tr>
                                    <td><?php echo $row['order_id']; ?></td>
                                    <td>
                                    <?php
                                    $dish_code = array_filter(explode(',',$row['dish_id']));
                                    $dish_qty = array_filter(explode(',',$row['dish_qty']));
                                       for($p=0;$p<count($dish_code);$p++){ ?>
                                        <b>Dish Code: </b><?php echo $dish_code[$p]; ?>
                                        <b>Quantity: </b><?php echo $dish_qty[$p]; ?>
                                        <br>
                                    <?php } ?>
                                    </td>
                                    <td><?php echo array_sum($dish_qty); ?></td>
                                    <td><span>&#2547;</span> <?php echo $row['total_amount']; ?></td>
                                    <td>
                                        <b>ID : </b><?php echo $row['user_id']; ?><br>
                                        <b>Name : </b><?php echo $row['user_name']; ?><br>
                                        <b>Address : </b><?php echo $row['user_address']; ?><br>                                        
                                    </td>
                                    <td><?php echo $row['order_date']; ?></td>                                    
                                    <td><?php echo $row['delivery_date']; ?></td>                                    
                                    <td>pending</td>                                    
                                    <td class=" d-flex justify-content-between">
                                        <?php
                                            if($row['status'] == '1'){ ?>
                                                <span class="text-success">Delivered</span>
                                        <?php }else{ ?>
                                                <a class="btn btn-sm btn-primary order_complete" href="" data-id="<?php echo $row['order_id']; ?>">Pending</a>
                                        <?php } ?>                                       
                                    </td>                                    
                                </tr>
                            <?php } 
                            ?>
                            </tbody>
                        </table>
                    <?php
                }else { ?>
                        <div class="">!!! No Orders Found !!!</div>
            
                <?php } ?>
                
        


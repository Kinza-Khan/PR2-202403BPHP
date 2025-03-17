<?php
include("php/query.php");
include("components/header.php");
?>
  <!-- Blank Start -->
  <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded p-3 justify-content-center mx-0">
                    <div class="col-md-12">
                        <h3>This is View Category page</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Decription</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    $query = $pdo->query("select products.* , categories.name as cName from products inner join categories on products.c_id = categories.id");
                                    $allProducts = $query->fetchAll(PDO::FETCH_ASSOC);
                                    // print_r($allCategories);
                                    foreach($allProducts as $product){
                                    ?>
                                <tr>
                                    <td><?php echo $product['name']?></td>
                                    <td><?php echo $product['description']?></td>                                
                                    <td><?php echo $product['price']?></td>
                                    <td><?php echo $product['qty']?></td>
                                    <td><?php echo $product['cName']?></td>
                                    <td><img height="100px" src="images/<?php echo $product['image']?>" alt=""></td>
                                    <td><a class="btn btn-primary" href="editProduct.php?productId=<?php echo $product['id']?>">Edit</a></td>
                                    <td><a class="btn btn-danger" href="?pId=<?php echo $product['id']?>">Delete</a></td>
                               
                            </tr>

                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->


<?php

include("components/footer.php");
?>
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
                                    <th>Image</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    $query = $pdo->query("select * from categories");
                                    $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                                    // print_r($allCategories);
                                    foreach($allCategories as $Category){
                                    ?>
                                <tr>
                                    <td><?php echo $Category['name']?></td>
                                    <td><?php echo $Category['description']?></td>
                                    <td><img height="100px" src="images/<?php echo $Category['image']?>" alt=""></td>
                                    <td><a class="btn btn-primary" href="editCategory.php?categoryId=<?php echo $Category['id']?>">Edit</a></td>
                                    <td><a class="btn btn-danger" href="">Delete</a></td>
                               
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
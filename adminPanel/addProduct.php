
<?php
include("php/query.php");
include("components/header.php");
if(!isset($_SESSION['adminEmail'])){
    echo "<script>location.assign('../login.php')</script>"; 
}

?>
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  p-5 justify-content-center mx-0">
                <div class="col-sm-12 col-xl-10">
                 
                        <div class="bg-light rounded h-100 p-4">
                            <h2 class="mb-4">Add Product </h2>
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input value="<?php echo $productName?>" name="pName" type="text" class="form-control" id="floatingInput"
                                    placeholder="Enter Product Name">
                                <label for="floatingInput">Product Name</label>
                                <small class="text-danger"><?php  echo $productNameErr?></small>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Product Image</label>
                                <input name="pImage" class="form-control" type="file" id="formFile">
                             
                                <small  class="text-danger"><?php echo $productImageNameErr?></small>
                            </div>
                          
                            <div class="form-floating mb-3">
                                <textarea name="pDes" class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea" style="height: 150px;"><?php echo $productDes?></textarea>
                                <label for="floatingTextarea">Description</label>
                                <small class="text-danger"><?php echo $productDesErr?></small>
                            </div>
                            <div class="form-floating mb-3">
                                <input value="<?php echo $productPrice?>" name="pPrice" type="text" class="form-control" id="floatingInput"
                                    placeholder="Enter Product Price">
                                <label for="floatingInput">Product Price</label>
                                <small class="text-danger"><?php // echo $categoryNameErr?></small>
                            </div>
                            <div class="form-floating mb-3">
                                <input value="<?php echo $productQty?>" name="pQty" type="text" class="form-control" id="floatingInput"
                                    placeholder="Enter Product Quantity">
                                <label for="floatingInput">Product Quantity</label>
                                <small class="text-danger"><?php // echo $categoryNameErr?></small>
                            </div>
                            <div class="form-floating mb-3">
                              <div class="form-group">
                                <label for="">Select</label>
                                <select class="form-control" name="categoryId" id="">
                                  <option>Select Category</option>
                                  <?php
                                  $query = $pdo->query("select * from categories");
                                  $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                                  foreach($allCategories as $category){
                                  ?>
                                  <option value="<?php echo $category['id']?>" ><?php echo $category['name']?></option>
                                <?php
                                }
                                ?>
                                </select>
                              </div>
                            </div>
                            <button name="addProduct" class="btn btn-primary m-2">Add Product</button>
                            </form>

                        </div>
                    
                    </div>
                </div>
            </div>
            <!-- Blank End -->


       
         <?php
         include("components/footer.php");
         ?>
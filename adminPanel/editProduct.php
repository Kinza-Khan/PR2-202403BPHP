
<?php
include("php/query.php");
include("components/header.php");
?>
<?php
if(isset($_GET['productId'])){
    $productId = $_GET['productId'];
    $query = $pdo->prepare("select products.* , categories.name as cName , categories.id as cId from products inner join categories on products.c_id = categories.id where products.id = :pId ");
    $query->bindParam('pId',$productId);
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);
    print_r($product);
    
}

?>
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  p-5 justify-content-center mx-0">
                <div class="col-sm-12 col-xl-10">
                 
                        <div class="bg-light rounded h-100 p-4">
                            <h2 class="mb-4">Edit Product </h2>
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-floating mb-3">
                                <input value="<?php echo $product['name']?>" name="pName" type="text" class="form-control" id="floatingInput"
                                    placeholder="Enter Product Name">
                                <label for="floatingInput">Product Name</label>
                                <small class="text-danger"><?php  //echo $productNameErr?></small>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Product Image</label>
                                <input name="pImage" class="form-control" type="file" id="formFile">
                             <img height="100px" src="images/<?php echo $product['image']?>" alt="">
                                <small  class="text-danger"><?php //echo $productImageNameErr?></small>
                            </div>
                          
                            <div class="form-floating mb-3">
                                <textarea name="pDes" class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea" style="height: 150px;"><?php echo $product['description']?></textarea>
                                <label for="floatingTextarea">Description</label>
                                <small class="text-danger"><?php// echo $productDesErr?></small>
                            </div>
                            <div class="form-floating mb-3">
                                <input value="<?php echo $product['price']?>" name="pPrice" type="text" class="form-control" id="floatingInput"
                                    placeholder="Enter Product Price">
                                <label for="floatingInput">Product Price</label>
                                <small class="text-danger"><?php // echo $categoryNameErr?></small>
                            </div>
                            <div class="form-floating mb-3">
                                <input value="<?php echo $product['qty']?>" name="pQty" type="text" class="form-control" id="floatingInput"
                                    placeholder="Enter Product Quantity">
                                <label for="floatingInput">Product Quantity</label>
                                <small class="text-danger"><?php // echo $categoryNameErr?></small>
                            </div>
                            <div class="form-floating mb-3">
                              <div class="form-group">
                                <label for="">Select</label>
                                <select class="form-control" name="categoryId" id="">
                                  <option value="<?php echo $product['cId']?>"><?php echo $product['cName']?></option>
                                  <?php
                                  $query = $pdo->prepare("select * from categories where name != :cName");
                                  $query->bindParam('cName',$product['cName']);
                                  $query->execute();
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
                            <button name="updateProduct" class="btn btn-primary m-2">update Product</button>
                            </form>

                        </div>
                    
                    </div>
                </div>
            </div>
            <!-- Blank End -->


       
         <?php
         include("components/footer.php");
         ?>
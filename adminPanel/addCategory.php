
<?php
include("components/header.php");
?>


            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  p-5 justify-content-center mx-0">
                <div class="col-sm-12 col-xl-10">
                 
                        <div class="bg-light rounded h-100 p-4">
                            <h2 class="mb-4">Add Category </h2>
                            <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input name="cName" type="text" class="form-control" id="floatingInput"
                                    placeholder="Enter Category Name">
                                <label for="floatingInput">Category Name</label>
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Category Image</label>
                                <input name="cImage" class="form-control" type="file" id="formFile">
                            </div>
                          
                            <div class="form-floating">
                                <textarea name="cDes" class="form-control" placeholder="Leave a comment here"
                                    id="floatingTextarea" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>
                            <button name="addCategory" class="btn btn-primary m-2">Add Category</button>
                            </form>

                        </div>
                    
                    </div>
                </div>
            </div>
            <!-- Blank End -->


       
         <?php
         include("components/footer.php");
         ?>
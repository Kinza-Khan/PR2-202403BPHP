<?php
include("dbcon.php");
$categoryName =  $categoryDes =  $categoryImageName = "" ;
$categoryNameErr =  $categoryDesErr =  $categoryImageNameErr = "" ;
if(isset($_POST['addCategory'])){
    $categoryName = $_POST['cName'];
    $categoryDes = $_POST['cDes'];
    $categoryImageName = $_FILES['cImage']['name'];
    $categoryImageTmpName = $_FILES['cImage']['tmp_name'];
    $extension = pathinfo($categoryImageName,PATHINFO_EXTENSION);
    $destination =  "images/".$categoryImageName ;
    $categoryImageSize = $_FILES['cImage']['size'];
    if(empty($categoryName)){
        $categoryNameErr = "Category Name is Required";
    }
    if(empty($categoryImageName)){
        $categoryImageNameErr = "Category Image is Required";
    }
    else{
        $format = ["jpg" , "png" , "jpeg" , "webp"] ;
        if(!in_array($extension,$format)){
            $categoryImageNameErr = "invalid Extension";
        }
    }
    if(empty($categoryDes)){
        $categoryDesErr = "Category Description is Required";
    }      
    if(empty($categoryNameErr) && empty($categoryDesErr) && empty($categoryImageNameErr)){
            if(move_uploaded_file($categoryImageTmpName,$destination)){
                    $query = $pdo->prepare("insert into categories(name , description, image) values (:cName , :cDes , :cImage)");
                    $query->bindParam('cName',$categoryName);
                    $query->bindParam('cDes',$categoryDes);
                    $query->bindParam('cImage',$categoryImageName);
                    $query->execute();
                    echo "<script>alert('category added');location.assign('addCategory.php')</script>";

            }
    }
  

   

}

// update category 
if(isset($_POST['updateCategory'])){
    $categoryName  = $_POST['cName'];
    $categoryDes = $_POST['cDes'];
    $categoryId = $_GET['categoryId'];
    if(empty($categoryName)){
        $categoryNameErr = "name is requried";
    }
    if(empty($categoryDes)){
            $categoryDesErr = "description is required" ;
    }
    $query = $pdo->prepare("update categories set name = :cName , description = :cDes where id = :cId");
    if(!empty($_FILES['cImage']['name'])){
            $categoryImageName = $_FILES['cImage']['name'];
            $categoryImageTmpName = $_FILES['cImage']['tmp_name'];
            $extension = pathinfo($categoryImageName,PATHINFO_EXTENSION);
            $destination = "images/".$categoryImageName ;
            $format = ["jpg" , "png" , "jpeg" ,"webp"];
            if(in_array($extension,$format)){
                    if(move_uploaded_file($categoryImageTmpName,$destination)){
                        $query = $pdo->prepare("update categories set name = :cName , description = :cDes ,image = :cImage where id = :cId");
                        $query->bindParam('cImage',$categoryImageName);
                    }
            }
            else{
                $categoryImageNameErr = "Invalid extension";
            }          
    }
    $query->bindParam('cName',$categoryName);
    $query->bindParam('cDes',$categoryDes);
    $query->bindParam('cId',$categoryId);
    $query->execute();

}
// delete Category 
if(isset($_GET['cId'])){
    $cId = $_GET['cId'];
    $query = $pdo->prepare("delete from categories where id = :cId");
    $query->bindParam('cId',$cId);
    $query->execute();
    echo "<script>alert('category deleted');location.assign('viewCategory.php')</script>";
}
// add product Work
$productName =  $productDes = $productPrice  =  $productQty =  $categoryId =  $productImageName ="";
$productNameErr =  $productDesErr = $productPriceErr  =  $productQtyErr =  $categoryIdErr =  $productImageNameErr ="";

if(isset($_POST['addProduct'])){
    $productName = $_POST['pName'];
    $productDes = $_POST['pDes'];
    $productPrice = $_POST['pPrice'];
    $productQty = $_POST['pQty'];
    $categoryId = $_POST['categoryId'];
    $productImageName = $_FILES['pImage']['name'];
    $productImageTmpName = $_FILES['pImage']['tmp_name'];
    $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
    $destination =  "images/".$productImageName ;
    $categoryImageSize = $_FILES['pImage']['size'];
    if(empty($productName)){
        $productNameErr = "Product Name is Required";
    }
    if(empty($productImageName)){
        $productImageNameErr = "product Image is Required";
    }
    else{
        $format = ["jpg" , "png" , "jpeg" , "webp"] ;
        if(!in_array($extension,$format)){
            $productImageNameErr = "invalid Extension";
        }
    }
    if(empty($productDes)){
        $productDesErr = "product Description is Required";
    }      
    if(empty($productNameErr) && empty($productImageNameErr) && empty($productDesErr)){
            if(move_uploaded_file($productImageTmpName,$destination)){
                    $query = $pdo->prepare("insert into products(name , description, image ,price, qty , c_id) values (:pName , :pDes , :pImage , :pPrice , :pQty , :cId )");
                    $query->bindParam('pName',$productName);
                    $query->bindParam('pDes',$productDes);
                    $query->bindParam('pImage',$productImageName);
                    $query->bindParam('pPrice',$productPrice);
                    $query->bindParam('pQty',$productQty);
                    $query->bindParam('cId',$categoryId);
                    $query->execute();
                    echo "<script>alert('product added');location.assign('addProduct.php')</script>";

            }
    }
  

   

}
// update product
if(isset($_POST['updateProduct'])){
    $productName = $_POST['pName'];
    $productDes = $_POST['pDes'];
    $productPrice = $_POST['pPrice'];
    $productQty = $_POST['pQty'];
    $categoryId = $_POST['categoryId'];
    $productId = $_GET['productId'];
    if(empty($productName)){
        $productNameErr = "Product Name is Required";
    }
    if(empty($productImageName)){
        $productImageNameErr = "product Image is Required";
    }
    else{
        $format = ["jpg" , "png" , "jpeg" , "webp"] ;
        if(!in_array($extension,$format)){
            $productImageNameErr = "invalid Extension";
        }
    }
    if(empty($productDes)){
        $productDesErr = "product Description is Required";
    }      
    $query = $pdo->prepare("update products set name = :pName , description = :pDes , price = :pPrice , qty = :pQty , c_id = :cId where id = :pId");
    if(!empty($_FILES['pImage']['name'])){
            $productImageName = $_FILES['pImage']['name'];
            $productImageTmpName = $_FILES['pImage']['tmp_name'];
            $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
            $destination = "images/".$productImageName ;
            $format = ["jpg" , "png" , "jpeg" ,"webp"];
            if(in_array($extension,$format)){
                    if(move_uploaded_file($productImageTmpName,$destination)){
                        $query = $pdo->prepare("update products set name = :pName , description = :pDes , price = :pPrice , qty = :pQty , c_id = :cId ,image = :pImage where id = :pId");
                        $query->bindParam('pImage',$productImageName);
                    }
            }
            else{
                $productImageNameErr = "Invalid extension";
            }          
    }
                    $query->bindParam('pName',$productName);
                    $query->bindParam('pDes',$productDes);
                    $query->bindParam('pPrice',$productPrice);
                    $query->bindParam('pQty',$productQty);
                    $query->bindParam('cId',$categoryId);
                    $query->bindParam('pId',$productId);
                    $query->execute();
                    echo "<script>alert('product updated');location.assign('viewProduct.php')</script>";

}
?>
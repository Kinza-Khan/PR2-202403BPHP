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
            if(!in_array($extension,$format)){
                $categoryImageNameErr = "Invalid extension";
            }
           

    }


    $query->bindParam('cName',$categoryName);
    $query->bindParam('cDes',$categoryDes);
    $query->bindParam('cId',$categoryId);
    $query->execute();

}
?>
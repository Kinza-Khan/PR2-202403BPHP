<?php
include("dbcon.php");

$userName = $userEmail = $userPassword = $userConfirmPassword = "" ;
$userNameErr = $userEmailErr = $userPasswordErr = $userConfirmPasswordErr = "" ;

if(isset($_POST['registerUser'])){
    $userName = $_POST['uName'];
    $userEmail = $_POST['uEmail'];
    $userPassword = $_POST['uPassword'];
    $userConfirmPassword = $_POST['uConfirmPassword'];
    if(empty($userName)){
        $userNameErr = "name is required" ;
    }
    if(empty($userEmail)){
        $userEmailErr = "email is required";
    }
    else{
        $query = $pdo->prepare("select * from users where email = :uEmail");
        $query->bindParam('uEmail' , $userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        // print_r($user);
        // die();
        if($user){
            $userEmailErr = "email is already exist";
        }
    }
    if(empty($userPassword)){
        $userPasswordErr = "password is required";
    }
    if(empty($userConfirmPassword)){
        $userConfirmPasswordErr = "comnfirm is required";
    }
    else{
        if( $userConfirmPassword != $userPassword){
            $userConfirmPasswordErr = "password does not matched";
        }
    }
    if(empty($userNameErr) && empty($userEmailErr) && empty($userPasswordErr) && empty($userConfirmPasswordErr)){
            $query = $pdo->prepare("insert into users(name,email,password) values (:uName, :uEmail , :uPassword)");
            $query->bindParam('uName',$userName);
            $query->bindParam('uEmail',$userEmail);
            $query->bindParam('uPassword',$userPassword);
            $query->execute();
            echo "<script>alert('user Register');location.assign('signup.php')</script>";
    }
}


?>
<?php
include("dbcon.php");
session_start();

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


if(isset($_POST['userLogin'])){
    $userEmail = $_POST['uEmail'];
    $userPassword = $_POST['uPassword'];
    if(empty($userEmail)){
        $userEmailErr = "required email";
    }
    else{
        $query = $pdo->prepare("select * from users where email = :uEmail");
        $query->bindParam('uEmail',$userEmail);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC);
        // print_r($user);
        // die();
        if($user){

                    if($user['password'] == $userPassword ){
                        if($user['role_id']==1){
                                $_SESSION['adminId'] = $user['id'];
                                $_SESSION['adminName'] = $user['name'];
                                $_SESSION['adminEmail'] = $user['email'];
                                $_SESSION['adminRoleId'] = $user['role_id'];
                            echo "<script>location.assign('login.php?success=admin login')</script>";
                        }
                        else if($user['role_id'] == 2){
                            $_SESSION['userId'] = $user['id'];
                            $_SESSION['userName'] = $user['name'];
                            $_SESSION['userEmail'] = $user['email'];
                            $_SESSION['userRoleId'] = $user['role_id'];
                            echo "<script>location.assign('login.php?success=user login')</script>";
                        }
                       
                    }
                    else{
                        // echo "<script>location.assign('login.php?error=password not matched')</script>";
                        $userPasswordErr =  'password not matched';
                    }      
        }
        else{
            // echo "<script>location.assign('login.php?error=not found')</script>"; 
            $userEmailErr =  'user not found';  
        }
    }
    if(empty($userPassword)){
        $userPasswordErr = "password is required";
    }

}


?>
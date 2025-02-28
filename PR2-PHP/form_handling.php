<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
   <div class="container">
    <form action="" method="GET">
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" name="userName" id="" class="form-control" placeholder="" aria-describedby="helpId">       
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="text" name="userEmail" id="" class="form-control" placeholder="" aria-describedby="helpId">      
        </div>
        <button class="btn btn-info"  type="submit" name="addUser">Submit</button>
    </form>
   </div>
  </body>
</html>
<?php
// if(isset($_POST['addUser'])){
//     $userName = $_POST['userName'];
//     $userEmail = $_POST['userEmail'];
//     echo $userName . " " . $userEmail ;
// }
if(isset($_GET['addUser'])){
    $userName = $_GET['userName'];
    $userEmail = $_GET['userEmail'];
    echo $userName . " " . $userEmail ;
}

?>
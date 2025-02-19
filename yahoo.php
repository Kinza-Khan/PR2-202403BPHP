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
        <div class="container p-5 mt-5">
            <form action="" method="post">
            <div class="form-group">
              <label for="">Enter Email</label>
              <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
            </div>
            <button name="sub" class="btn btn-info">Submit</button>
            </form>
        </div>     
            <?php
            if(isset($_POST['sub'])){
                $userEmail = $_POST['email'];
                $restrictedDomain = "yahoo.com";
                $userEmailArray = explode('@',$userEmail);
                print_r($userEmailArray);
                $userEmailLastIndex = $userEmailArray[count($userEmailArray)-1];
                echo $userEmailLastIndex . "<br>" ;
                $final = strcmp($userEmailLastIndex, $restrictedDomain);
                echo $final . "<br>";
                if($final==0){
                    echo "restricted yahoo domain ";
                }
                else{
                    echo "allowed";
                }

            }
            
            ?>
  </body>
</html>
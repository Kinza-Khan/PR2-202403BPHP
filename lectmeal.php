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
      
  <div class="container mt-5 p-5">
    <form action="" method="post">
  <div class="form-group">
      <label for="">Select Day</label>
      <select class="form-control" name="selectDay" id="">
        <option >Select</option>
        <option >Monday</option>
        <option>Tuesday</option>
        <option>Wednesday</option>
        <option >Thursday</option>
        <option >Friday</option>
        <option>Saturday</option>
        <option>Sunday</option>
      </select>
    </div>
    <button name="sub" class="btn btn-info">Submit</button>
    
</form>
  </div>
     </body>
</html>
<?php
if(isset($_POST['sub'])){
    $selectDay = $_POST['selectDay'];
    // echo $selectDay ;
    switch ($selectDay) {
        case 'Monday':     
            echo "Your Monday Meal is Biryani";
            break;
        case 'Tuesday':
                echo "Your Tuesday Meal is Sabzi";
            break;
        case 'Wednesday':
           
             echo "Your Wednesday Meal is Alo Qeema";
             break;
         case 'Thursday':
              
                echo "Your Thursday Meal is Alo Qeema";
                break; 
        case 'Friday':               
                    echo "Your Friday Meal is Daal Chawal";
              break;  
        case 'Saturday':
               
                echo "Your Saturday Meal is BBQ";
                break;
        case 'Sunday':
                
                    echo "Your Wednesday Meal is Alo Gosht";
                    break;  
        default:
          
            echo "None";
            break;
    }
}

?>
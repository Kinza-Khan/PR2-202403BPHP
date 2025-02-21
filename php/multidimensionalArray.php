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
        <?php
        $allStudents = [
             ["ali" , 21 , "karachi" ,] ,
             ["hamza" , 22 , "lahore"] ,
             ["rafiya" , 23 , "karachi" , "rafiya@gmail.com"] 
        ];
        // var_dump($allStudents);
        // echo "<br>";
        ?>        
           <!-- <h1>Hello</h1> -->
        <?php
        // print_r($allStudents);
        ?>
        <table border="1px">
          <thead>
            <tr>
              <th>Name</th>
              <th>Age</th>
              <th>City</th>
            </tr>
          </thead>
          <tbody>
                <?php                     
                foreach($allStudents as $std){
                      ?>
                        <tr>
                          <td><?php echo  $std[0]?></td>
                          <td><?php echo  $std[1]?></td>
                          <td><?php echo  $std[2]?></td>
                        </tr>
                      <?php
                }
                ?>
          </tbody>
        </table>


        <h2>BY fOR loop</h2>

        <table border="1px">
          <tbody>
            <?php           
            for($i = 0 ; $i<count($allStudents) ; $i++){
                ?>
                  <tr>
                    <?php
                      for($j = 0 ; $j<count($allStudents[$i]) ; $j++){
                        ?>
                          <td><?php echo $allStudents[$i][$j]?></td>
                        <?php
                      }
                    ?>
                  </tr>
             <?php
            }
            ?>
          </tbody>
        </table>

   </body>
</html>
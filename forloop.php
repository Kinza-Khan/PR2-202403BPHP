<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>for Loop</title>
    <style>
        td{
            padding : 5px 10px ;
        }
    </style>
</head>
<body>
        <table border="1px">
            <tbody>
               <?php
               for($i =1 ; $i<=10 ; $i++){
                ?>
                     <tr>
                    <td><?php echo 16?></td>
                    <td><?php echo 'x'?></td>
                    <td><?php echo $i?></td>
                    <td><?php echo '='?></td>
                    <td><?php echo 16*$i?></td>
                </tr>

                <?php
               }
               ?>
            </tbody>
        </table>
</body>
</html>
<?php
include('php/query.php');
include("components/header.php");
?>

      <div class="container p-5 mt-5">
        <div class="col-md-10">            <form action="" method="post">
             
              <div class="form-group">
                <label for="">Email</label>
                <input type="text" name="uEmail" value="<?php echo $userEmail ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo $userEmailErr?></small>
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="text" name="uPassword"  value="<?php echo $userPassword ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                <small id="helpId" class="text-danger"><?php echo $userPasswordErr?></small>
              </div>
             
              <button name="userLogin" class="btn btn-info">Login</button>
            </form>
            </div>

</div>
            <?php

include("components/footer.php");
?>
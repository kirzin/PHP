<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://cdn4.iconfinder.com/data/icons/black-cat-pattern/94/cat2-512.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
    <title>Catto</title>
</head>
<style>
    .glassmorph {
      padding: 2rem;
      border-radius: 1rem;
      background: rgba(255, 255, 255, 0.29);
      border-radius: 16px;
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(5.8px);
      -webkit-backdrop-filter: blur(5.8px);
      border: 1px solid rgba(255, 255, 255, 0.07);
    }
</style>
<body>



    <!-- navbar  -->
<nav class="navbar">
    <h1 class="brand">Catto</h1>
    <div class="toggle-btn">
        <span></span>
        <span></span>
    </div>
    <ul class="links-container">
        <li class="links-item"><a href="index.php" style="color: white"  class="link">home</a></li>
        <li class="links-item"><a href="adopt.php" style="color: white"  class="link active">adopt</a></li>
        <li class="links-item"><a href="about.php" style="color: white"  class="link">about</a></li>
        <li class="links-item"><a href="contacts.php" style="color: white"  class="link">contact</a></li>
        <li class="links-item"><a href="login.php" style="color: white"  class="link">log in</a></li>
    </ul>
</nav>

<?php
include_once('config1.php');
if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
    echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User name is mandatory field!</div>';
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
    echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User email is mandatory field!</div>';
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
    echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> User phone is mandatory field!</div>';
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
    echo    '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
    echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
}
?>

<div class="container mt-5">
    <div class="glassmorph card">
        <div class="container">
            <div class="row">
              <div class="col-5">
                <div class="card">
                  <img src="img/paw.png">
                </div>
              </div>
              <div class="col-7">
                     <?php
                  if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
                      extract($_REQUEST);
                      if($First_Name==""){
                          header('location:'.$_SERVER['PHP_SELF'].'?msg=un');
                          exit;
                      }elseif($Last_Name==""){
                          header('location:'.$_SERVER['PHP_SELF'].'?msg=ue');
                          exit;
                      }elseif($Street==""){
                          header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
                          exit;
                      }elseif($City==""){
                          header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
                          exit;
                      }elseif($State==""){
                          header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
                          exit;
                      }elseif($Phone_Num==""){
                          header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
                          exit;
                      }elseif($Cat_Name==""){
                          header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
                          exit;
                      }elseif($Cat_Id==""){
                          header('location:'.$_SERVER['PHP_SELF'].'?msg=up');
                          exit;
                      }else{
                          $data   =   array(
                                          'First_Name'=>$First_Name,
                                          'Last_Name'=>$Last_Name,
                                          'Street'=>$Street,
                                          'City'=>$City,
                                          'State'=>$State,
                                          'Phone_Num'=>$Phone_Num,
                                          'Cat_Name'=>$Cat_Name,
                                          'Cat_Id'=>$Cat_Id,
                                          );
                          $insert =   $db->insert('catApplication',$data);
                          if($insert){
                              header('location:'.$_SERVER['PHP_SELF'].'?msg=ras');
                              exit;
                          }else{
                              header('location:'.$_SERVER['PHP_SELF'].'?msg=rna');
                              exit;
                          }
                      }
                  }
                  ?>
                <!--action="adopt2.php" method="post"-->
                  <form method="post">
                    <div class="container">
                    <div class="row">
                      <div class="col">
                          <h6><b>Pet parent</b></h6>
                          <input type="text" class="form-control" placeholder="First Name" required id="First_Name" name="First_Name"> 
                      </div> 
                      <div class="col">
                          <h6 style="color: white"><b>.</b></h6>
                          <input type="text" class="form-control"placeholder="Last Name" id="Last_Name" required name="Last_Name">
                     </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col">
                        <h6><b>Address</b></h6>
                        <input type="text" class="form-control" id="Street" name="Street" required>
                        <p>Street</p>
                      </div>
                      <div class="col">
                        <h6 style="color: white"><b>.</b></h6>
                        <input type="text" class="form-control" id="City" name="City" required>
                        <p>City</p>

                      </div>
                    </div>
                     <div class="row">
                      <div class="col">
                        <input type="text" class="form-control"  id="State" name="State" required>
                        <p>State/Province</p>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col">
                        <h6><b>Phone Number</b></h6><input type="text" class="form-control" id="Phone_Num" name="Phone_Num" required>
                      </div>
                    </div>
                    <br>
                    <div class="row">
                      <div class="col">
                        <h6><b>Name of pet you wish to Adopt</b></h6>
                        <input type="text" class="form-control" id="Cat_Name" name="Cat_Name" required>
                      </div>
                      <div class="col">
                        <h6><b>Cat Id No.</b></h6>
                        <input type="text" class="form-control" id="Cat_Id" name="Cat_Id" required>
                      </div>
                    </div> <br>
                    <div class="row">
                      <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i> Add</button>
                      <a href="browse-user.php" class="btn btn-danger mt-3"><i class="fa fa-fw fa-sync"></i> Browse Info</a>

                    </div>
                  </div>
                </form>
                <!--End of Form-->
              </div>
        </div>
    </div>
</div>



<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- need toh-->




</body>
</html> 
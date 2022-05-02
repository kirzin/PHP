<?php
include_once('config1.php');
    if(isset($_REQUEST['editId']) and $_REQUEST['editId']!=""){
        $row    =   $db->getAllRecords('catApplication','*',' AND id="'.$_REQUEST['editId'].'"');
    }
     
    if(isset($_REQUEST['submit']) and $_REQUEST['submit']!=""){
        extract($_REQUEST);
        if($First_Name==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=un&editId='.$_REQUEST['editId']);
            exit;
        }elseif($Last_Name==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
            exit;
        }elseif($Street==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=up&editId='.$_REQUEST['editId']);
            exit;
        }elseif($City==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
            exit;
        }elseif($State==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
            exit;
        }elseif($Phone_Num==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
            exit;
        }elseif($Cat_Name==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
            exit;
        }elseif($Cat_Id==""){
            header('location:'.$_SERVER['PHP_SELF'].'?msg=ue&editId='.$_REQUEST['editId']);
            exit;
        }
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
        $update =   $db->update('catApplication',$data,array('id'=>$editId));
        if($update){
            header('location: browse-user.php?msg=rus');
            exit;
        }else{
            header('location: browse-user.php?msg=rnu');
            exit;
        }
    }
?>
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
                <form method="POST">
                    <div class="container">
                    <div class="row">
                          <div class="col">
                              <h6><b>Pet parent</b></h6>
                               <input type="text" name="First_Name" id="First_Name" class="form-control" value="<?php echo $row[0]['First_Name']; ?>" placeholder="Enter first name" required>
                          </div> 

                          <div class="col">
                              <h6 style="color: white"><b>.</b></h6>
                              <input type="text" name="Last_Name" id="Last_Name" class="form-control" value="<?php echo $row[0]['Last_Name']; ?>" placeholder="Enter first name" required>
                         </div>
                    </div>  

                    <br>
                    <div class="row">
                      <div class="col">
                        <h6><b>Address</b></h6>
                        <input type="text" name="Street" id="Street" class="form-control" value="<?php echo $row[0]['Street']; ?>" placeholder="Enter first name" required>
                        <p>Street</p>
                      </div>
                      <div class="col">
                        <h6 style="color: white"><b>.</b></h6>
                        <input type="text" name="City" id="City" class="form-control" value="<?php echo $row[0]['City']; ?>" placeholder="Enter first name" required>
                        <p>City</p>
                      </div>
                    </div>
                      <div class="row">
                      <div class="col">
                        <input type="text" name="State" id="State" class="form-control" value="<?php echo $row[0]['State']; ?>" placeholder="Enter first name" required>
                        <p>State/Province</p>
                      </div>
                    </div>
                     <div class="row">
                      <div class="col">
                        <h6><b>Phone Number</b></h6><input type="text" class="form-control" id="Phone_Num" name="Phone_Num" value="<?php echo $row[0]['Phone_Num']; ?>" placeholder="Enter first name" required>
                      </div>
                    </div>
                    <br>
                     <div class="row">
                      <div class="col">
                        <h6><b>Name of pet you wish to Adopt</b></h6>
                        <input type="text" class="form-control" id="Cat_Name" name="Cat_Name" value="<?php echo $row[0]['Cat_Name']; ?>" placeholder="Enter first name"  required>
                      </div>
                      <div class="col">
                        <h6><b>Cat Id No.</b></h6>
                        <input type="text" class="form-control" id="Cat_Id" name="Cat_Id" value="<?php echo $row[0]['Cat_Id']; ?>" placeholder="Enter first name" required>
                      </div>
                    </div> <br>
                    <div class="form-group">
                    <input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">

                    <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary d-block w-100"><i class="fa fa-fw fa-plus-circle"></i> Update</button>
                    <a href="browse-user.php" class="btn btn-danger mt-3 d-block "><i class="fa fa-fw fa-sync"></i> Browse Info</a>
                    
                </div>


                   </div>
                </form>


            </div>
                
        </div>

           <!--<div class="col-sm-6">
            <h5 class="card-title">Fields with <span class="text-danger">*</span> are mandatory!</h5>
            <form method="post">

                <div class="form-group">
                    <label>First Name <span class="text-danger">*</span></label>
                    <input type="text" name="First_Name" id="First_Name" class="form-control" value="<?php echo $row[0]['First_Name']; ?>" placeholder="Enter first name" required>
                </div>
                <div class="form-group">
                    <label>Last Name <span class="text-danger">*</span></label>
                    <input  name="Last_Name" id="Last_Name" class="form-control" value="<?php echo $row[0]['Last_Name']; ?>" placeholder="Enter lastname">
                </div>
                <div class="form-group">
                    <label>Cat Id <span class="text-danger">*</span></label>
                    <input type="tel" name="Cat_Id" id="Cat_Id" maxlength="12" class="form-control" value="<?php echo $row[0]['Cat_Id']; ?>" placeholder="Enter cat id" required>
                </div>
                <div class="form-group">
                    <input type="hidden" name="editId" id="editId" value="<?php echo $_REQUEST['editId']?>">
                    <button type="submit" name="submit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Update User</button>


                    <a href="browse-user.php">Browse INfo</a>
                    
                </div>
            </form>
        </div>-->
        </div>
    </div>
</div>



<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- need toh-->




</body>
</html> 
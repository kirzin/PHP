<?php
    include_once('config1.php');
    $condition  =   '';
    if(isset($_REQUEST['First_Name']) and $_REQUEST['First_Name']!=""){
        $condition  .=  ' AND First_Name LIKE "%'.$_REQUEST['First_Name'].'%" ';
    }
    if(isset($_REQUEST['Last_Name']) and $_REQUEST['Last_Name']!=""){
        $condition  .=  ' AND Last_Name LIKE "%'.$_REQUEST['Last_Name'].'%" ';
    }
    if(isset($_REQUEST['Cat_Id']) and $_REQUEST['Cat_Id']!=""){
        $condition  .=  ' AND Cat_Id LIKE "%'.$_REQUEST['Cat_Id'].'%" ';
    }
        if(isset($_REQUEST['df']) and $_REQUEST['df']!=""){
 
        $condition  .=  ' AND DATE(dt)>="'.$_REQUEST['df'].'" ';
 
    }
    if(isset($_REQUEST['dt']) and $_REQUEST['dt']!=""){
 
        $condition  .=  ' AND DATE(dt)<="'.$_REQUEST['dt'].'" ';
 
    }
    $userData   =   $db->getAllRecords('catApplication','*',$condition);
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

<?php
include_once('config1.php');
if(isset($_REQUEST['msg']) and $_REQUEST['msg']=="un"){
    echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> First Name is mandatory field!</div>';
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ue"){
    echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Last Name is mandatory field!</div>';
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="up"){
    echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Cat ID is mandatory field!</div>';
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="ras"){
    echo    '<div class="alert alert-success"><i class="fa fa-thumbs-up"></i> Record added successfully!</div>';
}elseif(isset($_REQUEST['msg']) and $_REQUEST['msg']=="rna"){
    echo    '<div class="alert alert-danger"><i class="fa fa-exclamation-triangle"></i> Record not added <strong>Please try again!</strong></div>';
}
?>

<div class="container mt-5">
    <div class="card">
        <div class="container">
            <div class="col-sm-12">
              <h5 class="card-title"><i class="fa fa-fw fa-search"></i> Find User</h5>
                <form method="get">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label style="color: black">First Name</label>
                                <input type="text" name="First_Name" id="First_Name" class="form-control" value="<?php echo isset($_REQUEST['First_Name'])?$_REQUEST['First_Name']:''?>" placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label style="color: black">Last Name</label>
                                <input type="text" name="Last_Name" id="Last_Name" class="form-control" value="<?php echo isset($_REQUEST['Last_Name'])?$_REQUEST['Last_Name']:''?>" placeholder="Enter Last Name">
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label style="color: black">Cat ID</label>
                                <input type="tel" class="tel form-control" name="Cat_Id" id="Cat_Id" x-autocompletetype="tel" value="<?php echo isset($_REQUEST['Cat_Id'])?$_REQUEST['Cat_Id']:''?>" placeholder="Enter Cat ID">
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label> </label>
                                <div>
                                    <button type="submit" name="submit" value="search" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-search"></i> Search</button>
                                    <a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Clear</a>
                                    <a href="add-users.php" class="btn btn-danger"><i class="fa fa-fw fa-sync"></i> Add</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!--end-->
                <table class="table table-striped table-bordered mt-4" style="border-radius: 30px;">
                <thead>
                    <tr class="bg-dark text-white">
                        <th>Sr#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Phone Number</th>
                        <th>Cat Name</th>
                        <th>Cat Id</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(count($userData)>0){
                        $s  =   '';
                        foreach($userData as $val){
                            $s++;
                    ?>
                    <tr>
                        <td><?php echo $s;?></td>
                        <td><?php echo $val['First_Name'];?></td>
                        <td><?php echo $val['Last_Name'];?></td>
                        <td><?php echo $val['Street'];?></td>
                        <td><?php echo $val['City'];?></td>
                        <td><?php echo $val['State'];?></td>
                        <td><?php echo $val['Phone_Num'];?></td>
                        <td><?php echo $val['Cat_Name'];?></td>
                        <td><?php echo $val['Cat_Id'];?></td>
                        <td align="center">
                            <a href="edit-users.php?editId=<?php echo $val['id'];?>" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> | 
                            <a href="delete1.php?delId=<?php echo $val['id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</a>
                        </td>
             
                    </tr>
                    <?php
                        }
                    }else{
                    ?>
                    <tr><td colspan="6" align="center">No Record(s) Found!</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- need toh-->




</body>
</html> 
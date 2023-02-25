<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sturecmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
 $SectionName=$_POST['sname'];
 $year=$_POST['year'];
 $semester = $_POST['semester'];
 $groupName = $_POST['groupName'];
 $eid=$_GET['editid'];

$sql="update tblclass set SectionName=:sname,year=:year,semester=:semester,groupName=:groupName where ID=:eid";
$query=$dbh->prepare($sql);
$query->bindParam(':sname',$SectionName,PDO::PARAM_STR);
$query->bindParam(':year',$year,PDO::PARAM_STR);
$query->bindParam(':semester',$semester,PDO::PARAM_STR);
$query->bindParam(':groupName',$groupName,PDO::PARAM_STR);
$query->bindParam(':eid',$eid,PDO::PARAM_STR);
 $query->execute();
  echo '<script>alert("Section has been updated")</script>';
}

  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>MIET BR ADMIN || Manage Section</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/select2/select2.min.css">
    <link rel="stylesheet" href="vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css" />
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
     <?php include_once('includes/header.php');?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
      <?php include_once('includes/sidebar.php');?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Manage Section </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Manage Section</li>
                </ol>
              </nav>
            </div>
            <div class="row">
          
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align: center;">Manage Section</h4>
                   
                    <form class="forms-sample" method="post">
                      <?php
$eid=$_GET['editid'];
$sql="SELECT * from  tblclass where ID=$eid";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>  
                      <div class="form-group">
                        <label for="exampleInputName1">Section Name</label>
                        <input type="text" name="sname" value="<?php  echo htmlentities($row->SectionName);?>" class="form-control" required='true'>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Year</label>
                        <select  name="year" class="form-control" required='true'>
                          <option value="<?php  echo htmlentities($row->year);?>"><?php  echo htmlentities($row->year);?></option>
                          <option value="1 year">1 Year</option>
                          <option value="2 year">2 Year</option>
                          <option value="3 year">3 Year</option>
                          <option value="4 year">4 Year</option>
                          
                        </select>
                      </div><?php $cnt=$cnt+1;}} ?>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Semester</label>
                        <select  name="semester" class="form-control" required='true'>
                          <option value="<?php  echo htmlentities($row->semester);?>"><?php  echo htmlentities($row->semester);?></option>
                          <option value="odd">Odd Semester</option>
                          <option value="even">Even Semester</option>
                          
                          
                        </select>
                      </div><?php $cnt=$cnt+1;}{ ?>
                      <?php }?>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Group Name</label>
                        <select  name="groupName" class="form-control" required='true'>
                          <option value="<?php  echo htmlentities($row->groupName);?>"><?php  echo htmlentities($row->groupName);?></option>
                          <option value="G1">G1</option>
                          <option value="G2">G2</option>
                          
                          
                        </select>
                      </div><?php $cnt=$cnt+1;{} ?>
                      
                      <button type="submit" class="btn btn-primary mr-2" name="submit">Update Section</button>
                     
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         <?php include_once('includes/footer.php');?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/select2/select2.min.js"></script>
    <script src="vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/typeahead.js"></script>
    <script src="js/select2.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
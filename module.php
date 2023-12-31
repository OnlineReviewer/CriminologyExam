<?php
include ('connector.php');
if(isset($_GET['classid']))
{
  $classid = $_GET["classid"];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Assessment</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Roboto', sans-serif;
}
.table-responsive {
    margin: 40px 0;
}
.table-wrapper {
    width: 850px;
    background: #fff;
    margin: 0 auto;
    padding: 30px 40px 15px;
    box-shadow: 0 0 1px 0 rgba(0,0,0,.25);
}
.table-title .btn-group {
    float: right;
}
.table-title .btn {
    min-width: 50px;
    border-radius: 2px;
    border: none;
    padding: 6px 12px;
    font-size: 105%;
    outline: none !important;
    height: 50px;
}
.table-title {
    min-width: 110%;
    border-bottom: 1px solid #e9e9e9;
    padding-bottom: 15px;
    margin-bottom: 5px;
    background: rgb(0, 50, 74);
    margin: -20px -31px 10px;
    padding: 15px 30px;
    color: #fff;
}
.table-title h2 {
    margin: 2px 0 0;
    font-size: 24px;
}
table.table {
    min-width: 100%;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
table.table tr th:first-child {
    width: 50px;
}
table.table tr th:last-child {
    width: 110px;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table td a {
    color: #2196f3;
}
table.table td .btn.manage {
    padding: 6px 10px;
    background: #37BC9B;
    color: #fff;
    border-radius: 5px;
}
table.table td .btn.manage:hover {
    background: #2e9c81;    
}
</style>
<script>
$(document).ready(function(){
  $(".btn-group .btn").click(function(){
    var inputValue = $(this).find("input").val();
    if(inputValue != 'all'){
      var target = $('table tr[data-status="' + inputValue + '"]');
      $("table tbody tr").not(target).hide();
      target.fadeIn();
    } else {
      $("table tbody tr").fadeIn();
    }
  });
  // Changing the class of status label to support Bootstrap 4
    var bs = $.fn.tooltip.Constructor.VERSION;
    var str = bs.split(".");
    if(str[0] == 4){
        $(".label").each(function(){
          var classStr = $(this).attr("class");
            var newClassStr = classStr.replace(/label/g, "badge");
            $(this).removeAttr("class").addClass(newClassStr);
        });
    }
});
</script>
<?php include_once('user-header.php');?><br>
  
      <div class="container-fluid page-body-wrapper">
        
        <?php include_once('sidebar.php');?>
        
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Subject topics </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> View Subject topics</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
<body>
                    <div class="container-xl">
                      <div class="table-responsive">
                          <div class="table-wrapper">
                              <table class="table table-striped table-hover">
                                    <thead>
                                      <tr>

                                          <th>Subject topics</th>                                  
                                          <th>Action</th>
                                      </tr>
                                  </thead>
                                   <tbody><?php 
                                  $studid = $_SESSION['studid'];
                                  $sql = "SELECT * FROM `subject` where classid = $classid ";
                                  $result = $conn->query($sql) or trigger_error($conn->error."[$sql]"); 
                                  while($row = $result->fetch_array(MYSQLI_ASSOC))
                                  {
                                     $classid = $row['classid'];
                                     $subid = $row['subid'];
                                     $teachid = $row['assigntid'];
                                     ?>
                                      <tr data-status="passed">
                                          <td><?php echo $row['subname']; ?></td>
                                          <td><a href="moduleAvideo.php?subid=<?php echo $row['subid'];?>" class="btn btn-sm manage">Open Modules</a></td>
                                      </tr><?php 

                                  } ?>
                                  </tbody>
                              </table>
                          </div> 
                      </div>   
                    </div>
                  </div>
                </div>
              </div>
            </div>
                 
         <?php include_once('footer.php');?>
          
        </div>
      </div>
    </div>
   <?php   ?>
</body>
</html>


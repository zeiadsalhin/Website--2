<?php
include 'connect_db.php';
$searchErr = '';
$employee_details='';
if(isset($_POST['save']))
{
    if(!empty($_POST['search']))
    {
        $search = $_POST['search'];
        $stmt = $con->prepare("select * from emails where name like '%$search%' or email like '%$search%'");
        $stmt->execute();
        $employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($employee_details);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
 
?>
<html>
<head>
<title>Search Students</title>
<link rel="stylesheet" href="bootstrap.css" crossorigin="anonymous">

<style>
.container{
    width:70%;
    height:30%;
    padding:10px;
    background: fixed;
    background-color: lightblue;
}
</style>
</head>
 
<body>
    <div class="container ">
    <h3><u>PHP MySQL search database</u></h3>
    <br/><br/>
    <form class="form-horizontal" action="#" method="post">
    <div class="row">
        <div class="form-group">
            <label class="control-label col-sm-4" for="email"><b>Search Students Information:</b>:</label>
            <div class="col-sm-4">
              <input type="text" class="form-control" name="search" placeholder="search here">
            </div>
            
            <div class="col-form-label">
              <button type="submit" name="save" class="btn btn-primary">Submit</button>
            </div>
        </div>
        
         
    </div>
    </form>
    <br/><br/>
    <h3><u>Results</u></h3><br/>
    <div class="table-responsive">          
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Student Name</th>
            <th>email</th>
            <th>Level</th>
            <th>Scores</th>
            <th>DisplayScores</th>
          </tr>
        </thead>
        <tbody>
                <?php
                 if(!$employee_details)
                 {
                    echo '<tr>No data found</tr>';
                 }
                 else{
                    foreach($employee_details as $key=>$value)
                    {
                        ?>
                    <tr>
                        <td><?php echo $key+1;?></td>
                        <td><?php echo $value['name'];?></td>
                        <td><?php echo $value['email'];?></td>
                        
                    </tr>
                         
                        <?php
                    }
                     
                 }
                ?>
             
         </tbody>
      </table>
    </div>
</div>
<script src="jquery-3.2.1.min.js"></script>
<script src="bootstrap.min.js"></script>
</body>
</html>
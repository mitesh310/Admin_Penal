<?php
include("../include/header.php");
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getalltasks',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));
$response = curl_exec($curl);
$resultarray = json_decode($response,true);
curl_close($curl);
 ?>

<?php
if (isset($_GET['id'])) {

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/deletetaskbyid/' . $_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
header("location:task.php");
// echo $response;
}
?>
<style>
    button {
        border: transparent;
        padding: 5px 15px;
        color: white;
        background: #7571F9;
        border-radius: 5px;
    }
    h6 {
        margin-top: 10px;
    }
</style>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../pms/index.php">Dashboard</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">View Task</h4>
                            </div>
                            <div class="col-md-2">
                                <a href="../pms/addtask.php" class="btn mb-1 btn-primary btn-lg">Add Task</a>
                            </div>
                        </div>
                        <div class="row mt-5">
                        <?php   
                            foreach ($resultarray['data'] as $emp) {
                                ?>
                        <div class="col-lg-3 col-sm-6 employee">
                                <a href="">
                                    <div class="card" style="border:1px solid gray;" >
                                        <div class="card-body">
                                        <div class="row">                                                
                                                <div class="col-1">
                                                    <a href="addtask.php?id=<?php echo $emp['taskId']; ?>">
                                                        <img src="../images/edit.png"></img>
                                                    </a>
                                                </div>
                                                <div class="col-1">
                                                    <a href="?id=<?php echo $emp['taskId']; ?>"
                                                        onclick="return confirm('Are you sure you want to delete.')"
                                                        rel="noopener">
                                                        <img src="../images/delete.png"></img>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-8">
                                                    <h5 class="mt-3 mb-1"><?php echo $emp['projectName'][0]['ProjectName']; ?></h5>
                                                    <h6 class="m-0"><?php echo $emp['taskName']; ?></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6 mt-3">
                                                    <h6><b>Tak Assign To:</b> </br> <?php echo $emp['assignedTo'][0]['name']; ?> </h6>
                                                </div>
                                                <div class="col-6 mt-3">
                                                    <h6><b>Report To:</b> </br> <?php echo $emp['reportTo'][0]['name']; ?> </h6>
                                                </div>
                                            <div class="col-6 mt-3">
                                                    <h6><b>Start Date:</b> </br>  <?php echo date("d-m-Y", strtotime($emp['startDate'])); ?></h6>
                                                </div>
                                                <div class="col-6 mt-3">
                                                    <h6><b>End Date:</b> </br> <?php echo date("d-m-Y", strtotime($emp['endDate'])); ?> </h6>
                                                </div>
                                                <div class="col-12">
                                                    <h6><b>Task Description :</b> </br><?php echo $emp['taskDescription']; ?> </h6>
                                                </div>
                                                <div class="col-6 mt-3">
                                                    <h6><b>Task priority:</b> <span style="color:<?php 
                                                        if($emp['priority']=="High") {
                                                            echo "red";
                                                        } elseif ($emp['priority']=="Medium") {
                                                            echo "orange";
                                                        } elseif ($emp['priority']=="Low") {
                                                            echo "green";
                                                        } else {
                                                            echo "black"; // Default color if priority is not recognized
                                                        }
                                                    ?>;font-weight: bold;text-transform:capitalize; font-size:17px;">
                                                    <?php echo $emp['priority']; ?></span></h6>
                                                </div>
                                                <div class="col-6 mt-4">
                                                    <button>Task Document </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("../include/footer.php");
?>
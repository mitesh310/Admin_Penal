<?php
include("../ajax/projectexcel.php");
include("../include/header.php")
    ?>
<?php
$curl = curl_init();
curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => 'http://localhost:8080/getallprojects',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    )
);
$response = curl_exec($curl);
curl_close($curl);
$resultarray = json_decode($response, true);
$len = count($resultarray);
?>
<?php
if (isset($_GET['id'])) {
    $curl = curl_init();
    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => 'http://localhost:8080/deleteprojectbyid/' . $_GET['id'],
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        )
    );
    $response = curl_exec($curl);
    curl_close($curl);
    header("location:project.php");
}
?>

<style>
    .btn,
    .btn:hover {
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
                            <div class="col-md-8">
                                <h4 class="card-title">View Project</h4>
                            </div>
                            <div class="col-md-2">
                                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                    <button type="submit" id="export_data" name='export_data'
                                        style="color:white;float:right;" value="Export to excel"
                                        class="btn mb-1 btn-success btn-lg">Export Project</button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <a href="../pms/addproject.php" style="float: right"
                                    class="btn mb-1 btn-primary btn-lg">Add Project</a>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <?php
                            $key = 1;
                            foreach ($resultarray['data'] as $emp) {
                                ?>
                                <div class="col-lg-3 col-sm-6 employee">
                                    <!-- <a href=""> -->
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-7"></div>
                                                <div class="col-1">
                                                <a href="../img/about.pdf" download>
                                                        <img src="../images/document.png"></img>
                                                    </a>
                                                </div>
                                                <?php
                                                    $taskmodalId = "modal-contact$key";
                                                    
                                                    $curl = curl_init();

                                                    curl_setopt_array($curl, array(
                                                    CURLOPT_URL => 'http://localhost:8080/gettasksbyprojectid/'.$emp['projectId'],
                                                    CURLOPT_RETURNTRANSFER => true,
                                                    CURLOPT_ENCODING => '',
                                                    CURLOPT_MAXREDIRS => 10,
                                                    CURLOPT_TIMEOUT => 0,
                                                    CURLOPT_FOLLOWLOCATION => true,
                                                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                                                    CURLOPT_CUSTOMREQUEST => 'GET',
                                                    ));

                                                    $response = curl_exec($curl);
                                                    $resulatarray= json_decode($response,true);

                                                    curl_close($curl);
                                                    
                                                    ?>
                                                <div class="col-1">
                                                    <a href="javascript:void(0)>" data-toggle="modal"
                                                        data-target="#<?php echo $taskmodalId; ?>">
                                                        <img src="../images/task.png"></img>
                                                    </a>
                                                    <div class="modal fade" id="<?php echo $taskmodalId; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-end border-bottom-0">
                <button type="button" class="btn-close-icon" data-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>

            <div class="modal-body pt-0">
                <div class="table-responsive mb-5">
                    <table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                                <th>Task Name</th>
                                <th>Assign To</th>
                                <th>Report To</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($resulatarray['data'] as $projecttask) 
                            {
                            ?>
                            <tr>
                                <td><?php echo $projecttask['taskName']; ?></td>
                                <td><?php echo $projecttask['assignedTo']['name']; ?></td>
                                <td><?php echo $projecttask['reportTo']['name']; ?></td>
                                <td><?php if($projecttask['startDate']!="") { echo date('d-m-Y',strtotime($projecttask['startDate'])); } ?></td>
                                <td><?php if($projecttask['endDate']!="") { echo date('d-m-Y',strtotime($projecttask['endDate'])); } ?></td>
                                <td><?php echo ucwords($projecttask['status']); ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
                                                </div>
                                                <div class="col-1">
                                                    <a href="addproject.php?id=<?php echo $emp['projectId']; ?>">
                                                        <img src="../images/edit.png"></img>
                                                    </a>
                                                </div>
                                                <div class="col-1">
                                                    <a href="?id=<?php echo $emp['projectId']; ?>"
                                                        onclick="return confirm('Are you sure you want to delete.')"
                                                        rel="noopener">
                                                        <img src="../images/delete.png"></img>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <h5 class="mt-3 mb-1">
                                                        <?php echo ucwords($emp['ProjectName']); ?>
                                                    </h5>

                                                </div>
                                                <div class="col-6 mt-3">
                                                    <?php
                                                    $modalId = "myModal$key";
                                                    ?>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#<?php echo $modalId; ?>">
                                                        View Employee
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="<?php echo $modalId; ?>" tabindex="-1"
                                                        role="dialog" aria-labelledby="<?php echo $modalId; ?>Label"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="<?php echo $modalId; ?>Label">
                                                                        <?php echo $emp['ProjectName']; ?>
                                                                    </h5>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- Display dynamic value -->
                                                                    <?php
                                                                    foreach ($emp['allParticiepants'] as $value) {
                                                                        echo implode(",", $value);
                                                                        echo "<br>";
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    ?>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-6 mt-3">
                                                    <h6><b>Start Date:</b> </br>
                                                        <?php echo date("d-m-Y", strtotime($emp['startDate'])); ?>
                                                    </h6>
                                                </div>
                                                <div class="col-6 mt-3">
                                                    <h6><b>End Date:</b> </br>
                                                        <?php echo date("d-m-Y", strtotime($emp['endDate'])); ?>
                                                    </h6>
                                                </div>
                                                <div class="col-12">
                                                    <h6><b>Project Description :</b> </br>
                                                        <?php echo $emp['projectDescription']; ?>
                                                    </h6>
                                                </div>
                                                <div class="col-12">
                                                    <h6><b>Total Task :</b>
                                                        <?php echo $emp['totalTasks']; ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- </a> -->
                                </div>
                                <?php
                                $key++;
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Modal -->

<?php
include("../include/footer.php");
?>
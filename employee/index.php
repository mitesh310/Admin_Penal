<?php
include("../ajax/employeeexcel.php");
include("../include/header.php");

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8080/getusers',
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

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:8080/deleteemployeebyid/'. $_GET['id'],
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
    // echo $response;
    header("location:index.php");
}
?>

<style>
    .card {
        margin-bottom: 30px;
        border: 0px;
        border-radius: 0.625rem;
        box-shadow: 6px 1px 41px -20px #a99de7;
    }
</style>


<div class="content-body">

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h4 class="card-title">View Employee</h4>
                            </div>
                            <div class="col-md-2">
                                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                                    <button type="submit" id="export_data" name='export_data'
                                        style="color:white;float:right;" value="Export to excel"
                                        class="btn mb-1 btn-success btn-lg">Export Employee</button>
                                </form>
                            </div>
                            <div class="col-md-2">
                                <a href="../employee/addemployee.php" style="float: right"
                                    class="btn mb-1 btn-primary btn-lg">Add Employee</a>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <?php
                            foreach ($resultarray['data'] as $emp) {

                                ?>
                                <div class="col-lg-3 col-sm-6 employee">
                                    
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <img src="../images/users/8.jpg" class="rounded-circle col-4" alt=""
                                                        width="70px">
                                                    <div class="col-8">
                                                        <h5 class="mt-3 mb-1">
                                                            <?php echo $emp['name']; ?>
                                                        </h5>
                                                        <h6 class="m-0">
                                                            <?php echo $emp['designation']; ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 mt-3">
                                                        <h6>
                                                            <i class="fa-solid fa-phone"></i>
                                                            <?php echo $emp['mobileNumber']; ?>
                                                        </h6>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <h6>
                                                            <i class="fa-solid fa-envelope"></i>
                                                            <?php echo $emp['email']; ?>
                                                        </h6>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6 mt-3">
                                                        <a href="addemployee.php?id=<?php echo $emp['employeeId']; ?>">
                                                            <button class="btn mb-1 btn-success" style='color:white'>Edit
                                                                Employee</button>
                                                        </a>
                                                    </div>
                                                    <div class="col-6 mt-3">
                                                        <a href="?id=<?php echo $emp['employeeId']; ?>">
                                                            <button class="btn mb-1 btn-danger" onclick="return confirm('Are you sure you want to delete.')" rel="noopener">Delete Employee</button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
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
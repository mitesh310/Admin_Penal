<?php
include("../include/header.php")
?>

<!-- Get all policy -->
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getallpolicies',
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


<!-- Delete policy -->
<?php
if (isset($_GET['id'])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/deletepolicy/' . $_GET['id'],
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
header("location:index.php");

}
?>



<div class="content-body">
    
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">Policy</h4>
                            </div>   
                            <div class="col-md-2">
                            <a href="../policy/addpolicy.php" class="btn mb-1 btn-primary btn-lg">Add Policy</a>
                            </div>    
                        </div>
                    </div>
                    <div class="table-responsive mb-5">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Sr.No</th>
                                                <th>Policy Name</th>
                                                <th>Policy Description</th>
                                                <th>Policy Violation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php   
                                        $i = 1;
                                        foreach ($resultarray['data'] as $emp) {
                                            ?>
                                            <tr>
                                                <td><?php echo $i ?></td>
                                                <td><?php echo $emp['policyName']; ?></td>
                                                <td><?php echo $emp['policyDescription']; ?></td>
                                                <td><?php echo $emp['policyViolation']; ?></td>
                                                <td>
                                                    <a href="addpolicy.php?id=<?php echo $emp['policyId']; ?>">
                                                        <img src="../images/edit.png"></img>
                                                    </a>
                                                    <a href="?id=<?php echo $emp['policyId']; ?>" 
                                                        onclick="return confirm('Are you sure you want to delete.')"rel="noopener">
                                                        <img src="../images/delete.png"></img>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
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


<?php
    include("../include/footer.php");
?>
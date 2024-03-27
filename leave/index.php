<?php
include("../include/header.php")
?>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getleavesoftoday',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$todayleave = json_decode($response, true);
curl_close($curl);
?>


<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">Upcomming Leave Person</h4>
                            </div>   
                        </div>
                    </div>
                    <div class="table-responsive mb-5">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Employee Name</th>
                                    <th>Leave Type</th>
                                    <th>Days</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <!-- <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $i = 1;
                                foreach ($todayleave['data'] as $req) {
                                    ?>
                                <tr>
                                
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <?php echo $req['leavesDetail']['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $req['leaveType']; ?>
                                        </td>
                                        <td>
                                            <?php echo $req['noOfDays']; ?>
                                        </td>
                                        <td>
                                            <?php echo date('d-m-Y', strtotime($req['startDate'])); ?>
                                        </td>
                                        <td>
                                            <?php echo isset($req['endDate']) ? date('d-m-Y', strtotime($req['endDate'])) : 'N/A'; ?>
                                        </td>
                                        <!-- <td><a href="" onclick="return confirm('Are you sure you want to Approve.')" rel="noopener" style='color:white' class="btn mb-1 btn-success">Approve</a>
                                            <a href="" onclick="return confirm('Are you sure you want to Reject.')" rel="noopener" style='color:white' class="btn mb-1 btn-danger">Reject</a>
                                        </td> -->
                                    </tr>
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
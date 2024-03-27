<?php
include("../include/header.php");
include("../include/notifications.php");
?>

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getleaverequests',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$leave = json_decode($response, true);
curl_close($curl);
?>

<?php
if(isset($_GET['type']))
{
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/approveleave',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
  "update":"'.$_GET['type'].'",
    "leaveId": "'.$_GET['reqId'].'"   
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
addnotification($_GET['reqId'],"Leave","Leave Request",$_GET['type']);
header("location:../inbox/leave.php");
echo $response;
}
?>




<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">Leave Request</h4>
                            </div>   
                        </div>
                    </div>
                    <div class="table-responsive mb-5">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Employee Name</th>
                                    <th>Leave Type</th>
                                    <th>Days</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                foreach ($leave['data'] as $req) {
                                    ?>
                                    <tr>
                                        <td><?php echo $i; ?></td>
                                        <td>
                                            <?php echo $req['leaveRequestBy']['name']; ?>
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
                                            <?php echo date('d-m-Y', strtotime($req['endDate'])); ?>
                                        </td>
                                        <td><a href="?type=approve&reqId=<?php echo $req['leaveId']; ?>" onclick="return confirm('Are you sure you want to Approve.')" rel="noopener" style='color:white' class="btn mb-1 btn-success">Approve</a>
                                            <a href="?type=reject&reqId=<?php echo $req['leaveId']; ?>" onclick="return confirm('Are you sure you want to Reject.')" rel="noopener" style='color:white' class="btn mb-1 btn-danger">Reject</a>
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
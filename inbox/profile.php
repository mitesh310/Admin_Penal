<?php
include("../include/header.php");
include("../include/notifications.php");

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getrequestsbytype',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "type":"update_employee"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
$resultArray = json_decode($response,true);
$status = $resultArray['status'];
curl_close($curl);
?>

<?php
if(isset($_GET['type']))
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:8080/updaterequest',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
      "requestId":"'.$_GET['reqId'].'",
      "update":"'.$_GET['type'].'",
      "type":"update_employee"
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    addnotification($_GET['reqId'],"Profile","Profile Request",$_GET['type']);
    header("location:../inbox/profile.php");
    curl_close($curl);
}
?>
<style>
    .all {
        background-color: white;
    }

    .all .all-txt {
        padding: 10px;
        font-size: 16px;
    }

    .all .all-txt label {
        margin-left: 10px;
    }
    .date {
        margin-left: 40px;
        font-size: 15px;
    }

    .detail {
        background-color: white;
        padding: 20px !important;
        

        /* height: 100px; */
    }
    button{
        color: white;
        font-size: 15px !important;
        padding: 4px 14px;
    }

    .accept{
        background: green;
    }
    .reject{
        background-color: red
    }

    h5{
        font-size: 20px;
        margin-bottom: 0;
    }
    p{
        margin-bottom: 0;
    }
  
</style>



<div class="content-body">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h4 class="card-title">Attendance</h4>
                                    </div>   
                                    <!-- <div class="col-md-2">
                                        <label class="form-label">Date</label>
                                        <input type="date" class="form-control" required>
                                    <a href="../employee/addemployee.php" class="btn mb-1 btn-primary btn-lg">Add Employee</a>
                                    </div>     -->
                                </div>

                                
                            </div>
                            <div class="table-responsive mb-5">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Employee Name</th>
                                                <th>Title</th>
                                                <th>Value</th>
                                                <th>Reason</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            if($status==200)
                                            {
                                                $i = 1;
                                            foreach($resultArray['data'] as $req)
                                            {
                                            ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $req['employeeName']; ?></td>
                                                <td><?php echo $req['keyname']; ?></td>
                                                <td><?php echo $req['value']; ?></td>
                                                <td><?php echo $req['description']; ?></td>
                                                <td><a href="?type=approve&reqId=<?php echo $req['requestId']; ?>" onclick="return confirm('Are you sure you want to Approve.')" rel="noopener" style='color:white' class="btn mb-1 btn-success">Approve</a>
                                                <a  href="?type=reject&reqId=<?php echo $req['requestId']; ?>" onclick="return confirm('Are you sure you want to Reject.')" rel="noopener" style='color:white' class="btn mb-1 btn-danger">Reject</a>
                                            </td>
                                            </tr>                                   
                                        <?php
                                        $i++;
                                            }
                                            
                                        }
                                        ?>
                                        </tbody>
                                        
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
</div>

<?php
include("../include/footer.php");
?>
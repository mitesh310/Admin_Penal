<?php
include("../include/header.php");
include("../include/notifications.php");
?>
<?php
$policyName = "";
$policyDescription = "";
$policyViolation = "";


if(isset($_POST['submit']))
{
    $policyName =  $_POST['policyName'];
    $policyDescription =  $_POST['policyDescription'];
    $policyViolation =  $_POST['policyViolation'];

    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:8080/createpolicy',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "policyName":"'.$policyName.'",
        "policyDescription":"'.$policyDescription.'",
        "policyViolation":"'.$policyViolation.'"
    }',
      CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
      ),
    ));
    
    $response = curl_exec($curl);
    addnotification("0","policy",$policyName,$policyDescription);
    curl_close($curl);
    echo $response;
header("location:index.php");
// echo $response;
}
?>

<!-- update  -->

<?php
if(isset($_POST['update']))
{
    $policyName =  $_POST['policyName'];
    $policyDescription =  $_POST['policyDescription'];
    $policyViolation =  $_POST['policyViolation'];


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/updatepolicy'.$_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
    'policyId' => $_GET['id'],
    'policyName' => $policyName,
    'policyDescription' => $policyDescription,
    'policyViolation' => $policyViolation),
));

$response = curl_exec($curl);
header("location:index.php");
curl_close($curl);
}
?>


<!-- id get  -->
<?php
if (isset($_GET['id'])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getallpoliciesbyid/'.$_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

$result = json_decode($response, true);
$policyName = $result['data'][0]['policyName'];
$policyDescription = $result['data'][0]['policyDescription'];
$policyViolation = $result['data'][0]['policyViolation'];

curl_close($curl);
// echo $response;
}
?>


<style>
    .form-control{
        border-radius: 5px;
    }
 
    .form-control{
        border-radius: 5px;
    }
    .error {
        color: #FF0000 !important;
    }

</style>




        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../policy/index.php">View Policy</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card">
                            <h4 class="mt-4 ml-4">Add Policy</h4>
                            <form method="post" class="row g-3 ml-4 mr-4" id="project_form" enctype="multipart/form-data">
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Policy Name</label>
                                    <input type="text" class="form-control" name="policyName" value="<?php echo $policyName; ?>">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Policy Description</label>
                                    <input type="text" class="form-control" name="policyDescription" value="<?php echo $policyDescription; ?>">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Policy Violation</label>
                                    <input type="text"  class="form-control" name="policyViolation" value="<?php echo $policyViolation; ?>">
                                </div>

                                <div class="col-12 mt-4 mb-4">
                                    <button class="btn btn-primary" type="submit" name="<?php
                                    if(isset($_GET['id']))
                                    {
                                        echo "update";
                                    }
                                    else{
                                       echo "submit";             
                                    }
                                    ?>">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>





<?php
    include("../include/footer.php");
?>

<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
        $("#project_form").validate({
            rules: {
                policyName: {
                    required: true,
                },
                policyDescription: {
                    required: true
                },
                policyViolation: {
                    required: true
                }
            },
        });
    });
</script>
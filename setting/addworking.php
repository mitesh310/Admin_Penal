<?php
include("../include/header.php")
?>

<?php
$workingHours = "";

if (isset($_POST['submit'])) {

    $workingHours = $_POST['workingHours'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/createworkinghours',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('workingHours' => $workingHours),
));

$response = curl_exec($curl);

curl_close($curl);
header("location:../setting/working.php");

}
?>


<?php
if (isset($_POST['update'])) {

    $workingHours = $_POST['workingHours'];

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/updateworkinghours',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('timingId' => $_GET['id'],'workingHours' => $workingHours),
));

$response = curl_exec($curl);

curl_close($curl);
header("location:../setting/working.php");


}
?>



<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../setting/working.php">View Working Hourse</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <h4 class="mt-4 ml-4">Add Working Hourse</h4>
                    <form class="row g-3 ml-4 mr-4 needs-validation" method="post" id="holiday_form"
                        enctype="multipart/form-data">
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Working Hourse</label>
                            <input type="text" class="form-control" name="workingHours" value="<?php echo $workingHours; ?>">
                        </div>
                        <div class="col-12 mt-4 mb-4">
                            <button class="btn btn-primary" name="<?php if (isset($_GET['id'])) {
                                echo "update";
                            } else {
                                echo "submit";
                            } ?>" type="submit">Submit</button>
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
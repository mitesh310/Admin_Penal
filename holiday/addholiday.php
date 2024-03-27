<?php
include("../include/header.php");
include("../include/notifications.php");
?>
<?php
$holidayType = "";
$holidayName = "";
$holidayDescription = "";
$holidayDate = "";

if (isset($_GET['id'])) {
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getholidaysbyid/'. $_GET['id'],
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
$holidayType = $result['data'][0]['holidayType'];
$holidayName = $result['data'][0]['holidayName'];
$holidayDescription = $result['data'][0]['holidayDescription'];
$holidayDate = $result['data'][0]['holidayDate'];

curl_close($curl);
}
?>

<?php
if (isset($_POST['submit'])) {

    $holidayType = $_POST['holidayType'];
    $holidayName = $_POST['holidayName'];
    $holidayDescription = $_POST['holidayDescription'];
    $holidayDate = $_POST['holidayDate'];

    $filename = $_FILES["holiImage"]["name"];
    $tempname = $_FILES["holiImage"]["tmp_name"];
    $size = $_FILES["holiImage"]["size"];

    $foler = "";
         if ($filename != "") {
             $folder = "../img/" . $filename;
             if ($tempname != "") {
                 move_uploaded_file($tempname, $folder);
             }
         } else {
            $folder = "";
         }


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/createholiday',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
                'holidayType' => $holidayType,
                'holidayName' => $holidayName,
                'holidayDescription' => $holidayDescription,
                'holidayDate' => $holidayDate,
                'holidayDocs'=> new CURLFILE($folder)
                ),
));

$response = curl_exec($curl);
echo $response;
addnotification("0","holiday",$holidayName,$holidayDescription);
curl_close($curl);
header("location:../holiday/");

}
?>
<?php
if (isset($_POST['update'])) {

    $holidayType = $_POST['holidayType'];
    $holidayName = $_POST['holidayName'];
    $holidayDescription = $_POST['holidayDescription'];
    $holidayDate = $_POST['holidayDate'];

    $filename = $_FILES["holiImage"]["name"];
    $tempname = $_FILES["holiImage"]["tmp_name"];
    $size = $_FILES["holiImage"]["size"];

    $foler = "";
         if ($filename != "") {
             $folder = "../img/" . $filename;
             if ($tempname != "") {
                 move_uploaded_file($tempname, $folder);
             }
         } else {
            $folder = "";
         }

         $curl = curl_init();

         curl_setopt_array($curl, array(
           CURLOPT_URL => 'http://localhost:8080/updateholiday',
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_ENCODING => '',
           CURLOPT_MAXREDIRS => 10,
           CURLOPT_TIMEOUT => 0,
           CURLOPT_FOLLOWLOCATION => true,
           CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
           CURLOPT_CUSTOMREQUEST => 'POST',
           CURLOPT_POSTFIELDS => array(
            'holidayId' => $_GET['id'],
            'holidayType' => $holidayType,
            'holidayName' => $holidayName,
            'holidayDescription' => $holidayDescription,
            'holidayDate' => $holidayDate,
            'holidayDocs'=> new CURLFILE($folder)
        ),
         ));
         
         $response = curl_exec($curl);
         
         curl_close($curl);
    header("location:index.php");
    // echo $response;
}
?>
<style>
    .form-control {
        border-radius: 5px;
    }

    .error {
        color: red;
    }
</style>
<div class="content-body">
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../holiday/index.php">View Holiday</a></li>
            </ol>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <h4 class="mt-4 ml-4">Add Holiday</h4>
                    <form class="row g-3 ml-4 mr-4 needs-validation" method="post" id="holiday_form"
                        enctype="multipart/form-data">
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="holiImage">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Holiday Type</label>
                            <select class="form-control" id="holiday" name="holidayType">
                            <option Value="">Choose...</option>
                            <option Value="holiday"<?php
                                if($holidayType=="holiday")
                                {
                                    echo "selected";
                                }
                                ?>>Holiday</option>
                            <option Value="weekend"<?php
                                if($holidayType=="weekend")
                                {
                                    echo "selected";
                                }
                                ?>>Weekend</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Holiday Name</label>
                            <input type="text" class="form-control" name="holidayName" value="<?php echo $holidayName; ?>">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="holidayDate" value="<?php
                            if ($holidayDate != "") {
                                echo date('Y-m-d', strtotime($holidayDate));
                            }
                            ?>">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="holidayDescription" value="<?php echo $holidayDescription; ?>">
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
</script>
<script>
    $(document).ready(function () {
        $("#holiday_form").validate({
            rules: {
                holiImage: {
                    required: true,
                },
                holidayName: {
                    required: true,
                },
                holidayDate: {
                    required: true
                },
                holidayDescription: {
                    required: true
                },
                holidayType:{
                    required: true
                },
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "projectDocs") {
                    error.appendTo("#file_error");
                }
                else if (element.attr("name") == "participants[]") {
                    error.appendTo("#participateErrror");
                }
                else {
                    error.insertAfter(element)
                }
            },

        });
    });
</script>
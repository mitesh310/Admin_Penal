<?php
include("../include/header.php");
include("../include/notifications.php");
    ?>
<?php
$title = "";
$announcement_date = "";
$message = "";

if (isset($_GET['id'])) {
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:8080/getannouncementbyid/' . $_GET['id'],
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

    $result = json_decode($response, true);
    $title = $result['data'][0]['title'];
    $announcement_date = $result['data'][0]['announcement_date'];
    $message = $result['data'][0]['message'];
    addnotification("0","Announcement",$title,$message);
    curl_close($curl);

}
?>



<?php
if (isset($_POST['submit'])) {

    $announcement_name = $_POST['announcement_name'];
    $announcement_date = $_POST['announcement_date'];
    $announcement_description = $_POST['announcement_description'];


    $filename = $_FILES["announce_image"]["name"];
    $tempname = $_FILES["announce_image"]["tmp_name"];
    $size = $_FILES["announce_image"]["size"];

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
        CURLOPT_URL => 'http://localhost:8080/addannouncements',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('type' => 'event', 'title' => $announcement_name, 'message' => $announcement_description, 'announcements_docs' => ""),
    )
    );

    $response = curl_exec($curl);

    curl_close($curl);

    header("location:../announcement/");
}
?>
<?php
if (isset($_POST['update'])) {

    $announcement_name = $_POST['announcement_name'];
    $announcement_description = $_POST['announcement_description'];
    $announcement_date = $_POST['announcement_date'];

    $filename = $_FILES["announce_image"]["name"];
    $tempname = $_FILES["announce_image"]["tmp_name"];
    $size = $_FILES["announce_image"]["size"];

    $folder = "";
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
        CURLOPT_URL => 'http://localhost:8080/editannouncements',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
                'announcementId' => $_GET['id'],
                'type' => 'announcement',
                'title' => $announcement_name,
                'message' => $announcement_description,
                'announcement_date' => $announcement_date,
                'announcements_docs' => new CURLFILE($folder)
            ),
    )
    );

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
                <li class="breadcrumb-item"><a href="../announcement/index.php">View Announcement</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xl-12">
                <div class="card">
                    <h4 class="mt-4 ml-4">Add Announcement</h4>
                    <form class="row g-3 ml-4 mr-4 needs-validation" method="post" id="holiday_form"
                        enctype="multipart/form-data">
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="announce_image">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Announcement Name</label>
                            <input type="text" class="form-control" name="announcement_name"
                                value="<?php echo $title; ?>">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control" name="announcement_date" value="<?php
                            if ($announcement_date != "") {
                                echo date('Y-m-d', strtotime($announcement_date));
                            }
                            ?>">
                        </div>
                        <div class="col-md-6 mt-2">
                            <label class="form-label">Description</label>
                            <input type="text" class="form-control" name="announcement_description"
                                value="<?php echo $message; ?>">
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
                announce_image: {
                    required: true,
                },
                announcement_name: {
                    required: true,
                },
                announcement_date: {
                    required: true
                },
                announcement_description: {
                    required: true
                }
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
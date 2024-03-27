<?php
include("../include/header.php");
include("../include/notifications.php");
?>
<?php
$projectName = "";
$projectDescription = "";
$startDate = "";
$endDate = "";
$participants = "";
$totalTasks = "";
$status = "";
if(isset($_GET['id']))
{
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getprojectbyid/'.$_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

$result = json_decode($response,true);
$projectName = $result['data'][0]['ProjectName'];
$projectDescription = $result['data'][0]['projectDescription'];
$startDate = $result['data'][0]['startDate'];
$endDate = $result['data'][0]['endDate'];
$participants = $result['data'][0]['participants'];
$totalTasks = $result['data'][0]['totalTasks'];
$array = explode(",", $participants);
$status = $result['data'][0]['status'];
curl_close($curl);
}
?>


<?php
if (isset($_POST['submit'])) {

    $project_name = $_POST['project_name'];
    $project_decription = $_POST['project_decription'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $participants = $_POST['participants'];
    $particiapntarray = implode(',', $participants);
    $total_task = $_POST['total_task'];

    $filename = $_FILES["projectDocs"]["name"];
    $tempname = $_FILES["projectDocs"]["tmp_name"];
    $size = $_FILES["projectDocs"]["size"];

    $folder = "../img/" . $filename;
    if ($tempname != "") {
        move_uploaded_file($tempname, $folder);
    }
    
    for($i=0;$i<count($participants);$i++)
    {
        addnotification($participants[$i],"Project",$project_name,"You have Assigned New Project");
    }    

    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:8080/addproject',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array(
      'ProjectName' =>  $project_name,
      'projectDescription' => $project_decription,
      'startDate' => $start_date,
      'endDate' => $end_date,
      'participants' => $particiapntarray,
      'totalTasks' => $total_task ,
      'completedTasks' => '0',
      'projectDocs'=> new CURLFILE($folder)),
    ));
    
    $response = curl_exec($curl);
    
    curl_close($curl);
 header("location:project.php");
    

}
?>
<?php
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
));
$response = curl_exec($curl);
curl_close($curl);
$resultemparray = json_decode($response,true);
?>
<?php
if (isset($_POST['update'])) {

    $project_name = $_POST['project_name'];
    $project_decription = $_POST['project_decription'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $participants = $_POST['participants'];
    $particiapntarray = implode(',', $participants);
    
    $total_task = $_POST['total_task'];

    $filename = $_FILES["projectDocs"]["name"];
    $tempname = $_FILES["projectDocs"]["tmp_name"];
    $size = $_FILES["projectDocs"]["size"];

    $foler = "";
    if($filename!="")
    {
        $folder = "../img/" . $filename;
        if ($tempname != "") {
            move_uploaded_file($tempname, $folder);
        }
    }
    else{
       $folder ="";     
    }


    $curl = curl_init();
    
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:8080/editproject',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array(
      'projectId' => $_GET['id'],
      'ProjectName' =>  $project_name,
      'projectDescription' => $project_decription,
      'startDate' => $start_date,
      'endDate' => $end_date,
      'participants' => $particiapntarray,
      'totalTasks' => $total_task ,
      'completedTasks' => '0',
      'status' => $status,
      'projectDocs'=> new CURLFILE($folder)),
    ));
    
    $response = curl_exec($curl);
    curl_close($curl);
 header("location:project.php");
    

}
?>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .form-control{
        border-radius: 5px;
    }
    .error {
        color: #FF0000 !important;
    }

</style>
        <div class="content-body">
            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../pms/project.php">Project</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    
                    <div class="col-lg-12 col-xl-12">
                        <div class="card">
                            <h4 class="mt-4 ml-4">Add Project</h4>
                            <form class="row g-3 ml-4 mr-4 " method="post" id="project_form" enctype="multipart/form-data">
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Project Name</label>
                                    <input type="text" class="form-control" name="project_name" value="<?php echo $projectName; ?>">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" value="<?php
                                    if($startDate!="")
                                    {
                                        echo date('Y-m-d',strtotime($startDate));
                                    }
                                    ?>">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">End Date</label>
                                    <input type="date"  class="form-control" name="end_date" value="<?php
                                    if($endDate!="")
                                    {
                                        echo date('Y-m-d',strtotime($endDate));
                                    }
                                      ?>">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Project Description</label>
                                    <textarea class="form-control" name="project_decription"><?php echo $projectDescription; ?></textarea>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Total Task</label>
                                    <input type="text" class="form-control" name="total_task" value="<?php echo $totalTasks; ?>">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Select Employee</label>
                                    <select class="form-control js-example-basic-multiple" name="participants[]" multiple="multiple">
                                    <?php
                                         foreach ($resultemparray['data'] as $emp)
                                         {
                                            
                                        ?>
                                            <option value="<?php echo $emp['employeeId']; ?>"
                                            <?php
                                            if(isset($_GET['id']))
                                            {
                                             if (in_array($emp['employeeId'],$array))
                                             {
                                               echo "selected";
                                             }
                                            }
                                             ?>><?php echo $emp['name']; ?></option>
                                        <?php
                                        }
                                    ?>
                                    </select>
                                    <div id="participateErrror"></div>
                                </div>
                                
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Project Docs</label>
                                    <div class="file-upload">
                                        <div class="file-select">
                                            <div class="file-select-button" id="fileName">Choose File</div>
                                            <div class="file-select-name" id="noFile">No file chosen...</div> 
                                            <input type="file" name="projectDocs" id="chooseFile">
                                            
                                        </div>
                                        <div id="file_error"></div>
                                        </div>
                                </div>
                                <div class="col-12 mt-4 mb-4">
                                    <button class="btn btn-primary" name="<?php if(isset($_GET['id']))
{
    echo "update";
}
else{
    echo "submit";
} ?>" type="submit">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    include("../include/footer.php");
?>


<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
</script>
<script>
    $(document).ready(function () {
        $("#project_form").validate({
            rules: {
                project_name: {
                    required: true,
                },
                start_date: {
                    required: true
                },
                end_date: {
                    required: true
                },
                project_decription: {
                    required: true
                },
                participants: {
                    required: true
                },
                projectDocs: {
                    required: true
                },
                total_task: {
                    required: true
                },
                total_task: {
                    required: true
                },
                'participants[]': {
                required: true
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "projectDocs") {
                    error.appendTo("#file_error");
                }
                else if(element.attr("name") == "participants[]")
                {
                error.appendTo("#participateErrror");
                }
                else {
                    error.insertAfter(element)
                }
            },

        });
    });
</script>






<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
    </script>
    <script>
$(document).ready(function(){
    $("#project_form").validate({
        rules: {
            project_name :{
            required: true
           },
           password :{
            required: true
           },
        },
        errorPlacement: function (error, element) {
            if(element.attr("name") == "email")
            {
              error.appendTo("#emailError");
            }
            else if(element.attr("name") == "password")
            {
              error.appendTo("#passError");
            }
             else {
                error.insertAfter(element)
            }
        },
     
});
  });
        </script>
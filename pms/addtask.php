<?php
include("../include/header.php");
include("../include/notifications.php");

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getallprojects',
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
// echo $response;
$resultarray = json_decode($response,true);
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
if(isset($_POST['submit']))
{
    $projectId =  $_POST['projectId'];
    $taskName = $_POST['taskName'];
    $taskDescription = $_POST['taskDescription'];
    $priority = $_POST['priority'];
    $report_to = $_POST['report_to'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $participants = $_POST['participants'];

    $filename = $_FILES["tasksDocs"]["name"];
    $tempname = $_FILES["tasksDocs"]["tmp_name"];  
    $size = $_FILES["tasksDocs"]["size"]; 

    $folder = "../img/".$filename;
    if($tempname!="")
    {
        move_uploaded_file($tempname, $folder);
    }
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/addtask',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array('taskDescription' => $taskDescription,'taskName' => $taskName,'projectId' =>$projectId,'priority' => $priority,'startDate' => $start_date,'endDate' => $end_date,'assignedTo' =>$participants,'reportTo' => $report_to,'taskDocs'=> new CURLFILE($folder)),
));

$response = curl_exec($curl);
addnotification($participants,"Task",$taskName,"You have Assigned New Task");
header("location:task.php");
if (curl_errno($curl)) {
    echo 'FCM request failed: ' . curl_error($curl);
}
curl_close($curl);
$resultemparray = json_decode($response,true);

}
?>
<?php
$taskDescription = "";
$taskName = "";
$projectId = "";
$assignedTo = "";
$reportTo = "";
$priority = "";
$startDate = "";
$endDate = "";
if(isset($_GET['id']))
{
    
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/gettaskbyid/'.$_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$resultEdittask = json_decode($response,true);
$taskName = $resultEdittask['data'][0]['taskName'];
$taskDescription = $resultEdittask['data'][0]['taskDescription'];
$projectId = $resultEdittask['data'][0]['projectId'];
$assignedTo = $resultEdittask['data'][0]['assignedTo'];
$reportTo = $resultEdittask['data'][0]['reportTo'];
$priority = $resultEdittask['data'][0]['priority'];
$startDate = $resultEdittask['data'][0]['startDate'];
$endDate = $resultEdittask['data'][0]['endDate'];
curl_close($curl);
}
?>
<?php
if(isset($_POST['update']))
{
    $projectId =  $_POST['projectId'];
    $taskName = $_POST['taskName'];
    $taskDescription = $_POST['taskDescription'];
    $priority = $_POST['priority'];
    $report_to = $_POST['report_to'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $participants = $_POST['participants'];

    $filename = $_FILES["tasksDocs"]["name"];
    $tempname = $_FILES["tasksDocs"]["tmp_name"];  
    $size = $_FILES["tasksDocs"]["size"]; 

    if($filename!="")
    {
        $folder = "../img/".$filename;
        if($tempname!="")
        {
            move_uploaded_file($tempname, $folder);
        }
    }
    else{
        $folder = "";
    }
    
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/edittask',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => array(
    'taskId' => $_GET['id'],
    'taskDescription' => $taskDescription, 'taskName' => $taskName,'projectId' =>$projectId,'priority' => $priority,'startDate' => $start_date,'endDate' => $end_date,'assignedTo' =>$participants,'reportTo' => $report_to,'taskDocs'=> new CURLFILE($folder)),
));

$response = curl_exec($curl);
header("location:task.php");
if (curl_errno($curl)) {
    echo 'FCM request failed: ' . curl_error($curl);
}
curl_close($curl);
$resultemparray = json_decode($response,true);

}
?>
<style>
    .form-control{
        border-radius: 5px;
    }
    .error {color: #FF0000 !important;}
</style>

        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../pms/task.php">Task</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <div class="card">
                            <h4 class="mt-4 ml-4">Add Task</h4>
                            <form class="row g-3 ml-4 mr-4 needs-validation" enctype="multipart/form-data" method="post" id="task_form">
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Project Name</label>
                                    <select id="inputState" class="form-control" name="projectId">
                                        <option value="">Choose...</option>
                                        <?php
                                         foreach ($resultarray['data'] as $project) 
                                         {
                                        ?>
                                            <option value="<?php echo $project['projectId']; ?>"
                                            <?php
                                            if($project['projectId']==$projectId)
                                            {
                                                echo "selected";
                                            }
                                            ?>
                                            ><?php echo $project['ProjectName']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Task Name</label>
                                    <input type="text" class="form-control" name="taskName"  value="<?php echo $taskName; ?>">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Task Description</label>
                                    <textarea class="form-control" rows="2" name="taskDescription"><?php echo $taskDescription; ?></textarea>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="inputState">Task Assign To</label>
                                    <select class="form-control js-example-basic-multiple" name="participants" >
                                    <option value="">Choose...</option>
                                    <?php
                                         foreach ($resultemparray['data'] as $emp) 
                                         {
                                        ?>
                                            <option value="<?php echo $emp['employeeId']; ?>"
                                            <?php
                                            if($emp['employeeId']==$assignedTo)
                                            {
                                                echo "selected";
                                            }
                                            ?>
                                            ><?php echo $emp['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <div id="participateErrror"></div>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="inputState">Priority</label>
                                    <select  class="form-control" name="priority">
                                        <option value="">Choose...</option>
                                        <option value="High" <?php
                                            if("High"==$priority)
                                            {
                                                echo "selected";
                                            }
                                            ?>>High</option>
                                        <option value="Medium"  <?php
                                            if("Medium"==$priority)
                                            {
                                                echo "selected";
                                            }
                                            ?>>Medium</option>
                                        <option value="Low" <?php
                                            if("Low"==$priority)
                                            {
                                                echo "selected";
                                            }
                                            ?>>Low</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="inputState">Report To</label>
                                    <select class="form-control" name="report_to">
                                        <option value="">Choose...</option>
                                        <?php
                                         foreach ($resultemparray['data'] as $emp) 
                                         {
                                        ?>
                                            <option value="<?php echo $emp['employeeId']; ?>"
                                            <?php
                                            if($emp['employeeId']==$reportTo)
                                            {
                                                echo "selected";
                                            }
                                            ?>
                                            ><?php echo $emp['name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" value="<?php
                                        if($startDate!="")
                                        {
                                    echo date('Y-m-d',strtotime($startDate));
                                         } ?>">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">End Date</label>
                                    <input type="date"  class="form-control" name="end_date" value="<?php 
                                    if($endDate!="")
                                    {
                                    echo date('Y-m-d',strtotime($endDate));
                                    } ?>">
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Tasks Docs</label>
                                    <div class="file-upload">
                                        <div class="file-select">
                                            <div class="file-select-button" id="fileName">Choose File</div>
                                            <div class="file-select-name" id="noFile">No file chosen...</div> 
                                            <input type="file" name="tasksDocs" id="chooseFile">
                                        </div>
                                        </div>
                                        <div id="tasksError"></div>
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
        </div>

<?php
    include("../include/footer.php");
?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

</script>
<script src=
"https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
      </script>
<script>
$(document).ready(function(){
    $("#task_form").validate({
        ignore: ".ignore",
        rules: {
            projectId :{
            required: true
           },
           taskName :{
            required: true
           },
           taskDescription:{
            required: true
           },
           priority:{
            required: true
           },
           report_to:{
            required: true 
           },
           start_date:{
            required: true 
           },
           end_date:{
            required: true 
           },
           tasksDocs:{
            required: true 
           },
           participants:{
            required: true 
           },
       
        },
        errorPlacement: function (error, element) {
            if(element.attr("name") == "participants[]")
            {
              error.appendTo("#participateErrror");
            }
            else if(element.attr("name") == "tasksDocs")
            {
              error.appendTo("#tasksError");
            }
             else {
                error.insertAfter(element)
            }
        },
     
});
  });
        </script>
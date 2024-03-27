<?php
include("../include/header.php");
if(isset($_POST['submit']))
{
    $degreeName = $_POST['degreeName'];
    $passingYear = $_POST['passingYear'];
    $percentage = $_POST['percentage'];

    $filename = $_FILES["degreeCertificate"]["name"];
    $tempname = $_FILES["degreeCertificate"]["tmp_name"];  
    $size = $_FILES["degreeCertificate"]["size"]; 
    


    $folder = "../img/".$filename;
    if($tempname!="")
    {
        move_uploaded_file($tempname, $folder);
    }
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:8080/addeducation',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('employeeId' => $_GET['addid'],
      'degreeName' => $degreeName,
      'passingYear' => $passingYear,
      'percentage' => $percentage,
      'degreeCertificate'=> new CURLFILE($folder)),
    ));
    
    $response = curl_exec($curl);
    
    $emp_id= $_GET['addid'];
    curl_close($curl);
    header("location:adddocument.php?addid=$emp_id");
}

if(isset($_POST['update']))
{
    $degreeName = $_POST['degreeName'];
    $passingYear = $_POST['passingYear'];
    $percentage = $_POST['percentage'];

    $filename = $_FILES["degreeCertificate"]["name"];
    $tempname = $_FILES["degreeCertificate"]["tmp_name"];  
    $size = $_FILES["degreeCertificate"]["size"]; 
    


    $folder = "../img/".$filename;
    if($tempname!="")
    {
        move_uploaded_file($tempname, $folder);
    }
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'http://localhost:8080/editeducation',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS => array('employeeId' => $_GET['id'],
      'degreeName' => $degreeName,
      'passingYear' => $passingYear,
      'percentage' => $percentage,
      'degreeCertificate'=> new CURLFILE($folder)),
    ));
    
    $response = curl_exec($curl);
    
    
    curl_close($curl);
    $id = $_GET['id'];
    header("location:addeducation.php?id=$id");
}

$degreeName = "";
$passingYear = "";
$percentage = "";

if(isset($_GET['id']))
{
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getemployeeeducationbyid/'.$_GET['id'],
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
$resultarray = json_decode($response,true);
$degreeName = $resultarray['data'][0]['degreeName'];
$passingYear = $resultarray['data'][0]['passingYear'];
$percentage = $resultarray['data'][0]['percentage'];


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
            <li class="breadcrumb-item"><a href="../pms/project.php">Project</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row">
    <div class="col-lg-4 col-xl-3">
                        <div class="card">
                            <?php
                            if(isset($_GET['id']))
                            {
                            ?>
                            <div class="card-body">
                            <a href="addemployee.php?id=<?php echo $_GET['id']; ?>"><p>Personal</p></a>
                                <hr>
                                <h5>Education</h5>
                                <hr>
                                <a href="adddocument.php?id=<?php echo $_GET['id']; ?>"><p>Document</p></a>
                            </div>
                            <?php
                            }
                            else
                            {
                                ?>
                                 <div class="card-body">
                                <h5>Personal</h5>
                                <hr>
                                <p>Education</p>
                                <hr>
                                <p>Document</h5>
                            </div>
                                <?php
                            }
                            ?>
                        </div>  
                    </div>
                    <div class="col-lg-8 col-xl-9">
            <div class="card">
                <h4 class="mt-4 ml-4">Add Education</h4>
                <form class="row g-3 ml-4 mr-4 " enctype="multipart/form-data" method="post" id="education_form" style="margin-bottom:3%;">
                <div class="col-md-4 mt-2">
                                            <label class="form-label">Degree Name</label>
                                            <input type="text" class="form-control" name="degreeName" value="<?php echo $degreeName; ?>">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="form-label">Passing Year</label>
                                            <input type="text" class="form-control" name="passingYear"  value="<?php echo $passingYear; ?>">
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <label class="form-label">Percentage</label>
                                            <input type="text"  class="form-control" name="percentage" value="<?php echo $percentage; ?>">
                                        </div>
             
                                        <div class="col-md-4 mt-2">
                                            <label class="form-label">Degree Certificate</label>
                                            <div class="file-upload">
                                            <div class="file-select">
                                            <div class="file-select-button" id="fileName">Choose File</div>
                                            <div class="file-select-name" id="noFile">No file chosen...</div> 
                                            <input type="file" name="degreeCertificate" id="chooseFile">
                                            
                                        </div>
                                        </div>
                                        <div id="file_error"></div>
                                        </div>
                                      
                                        <div class="col-12 mt-4 mb-4">
                                    <button class="btn btn-primary" name="<?php
                                    if(isset($_GET['id']))
                                    {
                                        echo "update";    
                                    }
                                    else {
                                      echo "submit";  
                                    }
                                    ?>" type="submit">Submit</button>
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
<script src=
"https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
      </script>
<script>
$(document).ready(function(){
    $("#education_form").validate({
        rules: {
            degreeName :{
            required: true
           },
           passingYear :{
            required: true
           },
           percentage:{
            required: true
           },
           degreeCertificate:{
            required:true
           }
        },
        errorPlacement: function (error, element) {
            if(element.attr("name") == "degreeCertificate")
            {
              error.appendTo("#file_error");
            }
             else {
                error.insertAfter(element)
            }
        },
     
});
  });
        </script>
<script>
    $('#experience').on('change', function() {
        var value = this.value;
        if(value=="Fresher" || value=="")
        {
            $("#salary_slip").hide();
            $("#exp_certificate").hide();
            $("#pre_title").hide();
            
        }
        else{
            $("#salary_slip").show();
            $("#exp_certificate").show();
            $("#pre_title").show();
        }
    });
$('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
$('#chooseFile1').bind('change', function () {
  var filename = $("#chooseFile1").val();
  if (/^\s*$/.test(filename)) {
    $("#noFile1").text("No file chosen..."); 
  }
  else {
   
    $("#noFile1").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
$('#chooseFile2').bind('change', function () {
  var filename = $("#chooseFile2").val();
  if (/^\s*$/.test(filename)) {
    $("#noFile2").text("No file chosen..."); 
  }
  else {
    $("#noFile2").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
    </script>

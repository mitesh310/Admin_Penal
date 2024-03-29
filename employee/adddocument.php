<?php
include ("../include/header.php");
if (isset($_POST['submit'])) {
  $filename = $_FILES["bankPassbook"]["name"];
  $tempname = $_FILES["bankPassbook"]["tmp_name"];
  $size = $_FILES["bankPassbook"]["size"];

  $aadhar_filename = $_FILES["aadharCard"]["name"];
  $aadhar_tempname = $_FILES["aadharCard"]["tmp_name"];
  $aadhar_size = $_FILES["aadharCard"]["size"];

  $pan_filename = $_FILES["panCard"]["name"];
  $pan_tempname = $_FILES["panCard"]["tmp_name"];
  $pan_size = $_FILES["panCard"]["size"];

  $voter_filename = $_FILES["voterId"]["name"];
  $voter_tempname = $_FILES["voterId"]["tmp_name"];
  $voter_size = $_FILES["voterId"]["size"];

  $driving_filename = $_FILES["drivingLicense"]["name"];
  $driving_tempname = $_FILES["drivingLicense"]["tmp_name"];
  $driving_size = $_FILES["drivingLicense"]["size"];

  $folder = "../img/" . $filename;
  if ($tempname != "") {
    move_uploaded_file($tempname, $folder);
  }

  $aadhar_folder = "../img/" . $aadhar_filename;
  if ($aadhar_tempname != "") {
    move_uploaded_file($aadhar_tempname, $aadhar_folder);
  }

  $pan_folder = "../img/" . $pan_filename;
  if ($pan_tempname != "") {
    move_uploaded_file($pan_tempname, $pan_folder);
  }

  $voter_folder = "../img/" . $voter_filename;
  if ($voter_tempname != "") {
    move_uploaded_file($voter_tempname, $voter_folder);
  }

  $driving_folder = "../img/" . $driving_filename;
  if ($driving_tempname != "") {
    move_uploaded_file($driving_tempname, $driving_folder);
  }

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8080/adddocumets',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
        'employeeId' => $_GET['addid'],
        'passbook' => new CURLFILE($folder),
        'aadharcard' => new CURLFILE($aadhar_folder),
        'pancard' => new CURLFILE($pan_folder),
        'voterId' => new CURLFILE($voter_folder),
        'drivingLiscence' => new CURLFILE($driving_folder)
      ),
  )
  );

  $response = curl_exec($curl);

  curl_close($curl);
  echo $response;
  header("location:index.php");




}
?>
<style>
  .form-control {
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
      <div class="col-lg-4 col-xl-3">
        <div class="card">
          <?php
          if (isset($_GET['id'])) {
            ?>
            <div class="card-body">
              <a href="addemployee.php?id=<?php echo $_GET['id']; ?>">
                <p>Personal</p>
              </a>
              <hr>
              <a href="addeducation.php?id=<?php echo $_GET['id']; ?>">
                <p>Education</p>
              </a>
              <hr>
              <h5>Document</h5>
            </div>
            <?php
          } else {
            ?>
            <div class="card-body">
              <p>Personal</p>
              <hr>
              <p>Education</p>
              <hr>
              <h5>Document</h5>
            </div>
            <?php
          }
          ?>
        </div>
      </div>
      <div class="col-lg-8 col-xl-9">
        <div class="card">
          <h4 class="mt-4 ml-4">Add Document</h4>
          <form class="row g-3 ml-4 mr-4 " enctype="multipart/form-data" method="post" id="document_form"
            style="margin-bottom:3%;">
            <div class="col-md-4 mt-2">
              <label class="form-label">Bank Passbook</label>
              <div class="file-upload">
                <div class="file-select">
                  <div class="file-select-button" id="fileName">Choose File</div>
                  <div class="file-select-name" id="noFile">No file chosen...</div>
                  <input type="file" name="bankPassbook" id="chooseFile">
                </div>
              </div>
              <div id="file_error"></div>
            </div>
            <div class="col-md-4 mt-2">
              <label class="form-label">Aadhar Card</label>
              <div class="file-upload">
                <div class="file-select">
                  <div class="file-select-button" id="fileName">Choose File</div>
                  <div class="file-select-name" id="noFile1">No file chosen...</div>
                  <input type="file" name="aadharCard" id="chooseFile1">

                </div>
              </div>
              <div id="aadhar_file_error"></div>
            </div>
            <div class="col-md-4 mt-2">
              <label class="form-label">Pan Card</label>
              <div class="file-upload">
                <div class="file-select">
                  <div class="file-select-button" id="fileName">Choose File</div>
                  <div class="file-select-name" id="noFile2">No file chosen...</div>
                  <input type="file" name="panCard" id="chooseFile2">

                </div>
              </div>
              <div id="pan_file_error"></div>
            </div>
            <div class="col-md-4 mt-2">
              <label class="form-label">Voter ID</label>
              <div class="file-upload">
                <div class="file-select">
                  <div class="file-select-button" id="fileName">Choose File</div>
                  <div class="file-select-name" id="noFile3">No file chosen...</div>
                  <input type="file" name="voterId" id="chooseFile3">

                </div>
              </div>
              <div id="voter_file_error"></div>
            </div>
            <div class="col-md-4 mt-2">
              <label class="form-label">Driving License</label>
              <div class="file-upload">
                <div class="file-select">
                  <div class="file-select-button" id="fileName">Choose File</div>
                  <div class="file-select-name" id="noFile4">No file chosen...</div>
                  <input type="file" name="drivingLicense" id="chooseFile4">

                </div>
              </div>
              <div id="driving_file_error"></div>
            </div>

            <div class="col-12 mt-4 mb-4">
              <button class="btn btn-primary" name="submit" type="submit">Submit</button>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include ("../include/footer.php");
?>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
</script>
<script>
  $(document).ready(function () {
    $("#document_form").validate({
      rules: {
        bankPassbook: {
          required: true
        },
        aadharCard: {
          required: true
        },
        panCard: {
          required: true
        },
        voterId: {
          required: true
        },
        drivingLicense: {
          required: true
        }
      },
      errorPlacement: function (error, element) {
        if (element.attr("name") == "bankPassbook") {
          error.appendTo("#file_error");
        }
        else if (element.attr("name") == "aadharCard") {
          error.appendTo("#aadhar_file_error");
        }
        else if (element.attr("name") == "panCard") {
          error.appendTo("#pan_file_error");
        }
        else if (element.attr("name") == "voterId") {
          error.appendTo("#voter_file_error");
        }
        else if (element.attr("name") == "drivingLicense") {
          error.appendTo("#driving_file_error");
        }
        else {
          error.insertAfter(element)
        }
      },

    });
  });
</script>
<script>
  $('#experience').on('change', function () {
    var value = this.value;
    if (value == "Fresher" || value == "") {
      $("#salary_slip").hide();
      $("#exp_certificate").hide();
      $("#pre_title").hide();

    }
    else {
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
  $('#chooseFile3').bind('change', function () {
    var filename = $("#chooseFile3").val();
    if (/^\s*$/.test(filename)) {
      $("#noFile3").text("No file chosen...");
    }
    else {
      $("#noFile3").text(filename.replace("C:\\fakepath\\", ""));
    }
  });
  $('#chooseFile4').bind('change', function () {
    var filename = $("#chooseFile4").val();
    if (/^\s*$/.test(filename)) {
      $("#noFile4").text("No file chosen...");
    }
    else {
      $("#noFile4").text(filename.replace("C:\\fakepath\\", ""));
    }
  });
</script>
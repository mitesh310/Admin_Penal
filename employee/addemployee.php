<?php
include("../include/header.php");
$name = "";
$email = "";
$mobileNumber = "";
$altmobileNumber ="";
$gender = "";
$date_of_birth = "";
$marital_status = "";
$address = "";
$date_of_joining = "";
$salary = "";
$companyEmail = "";
$password = "";
$designation = "";
$ExperienceType = "";
if (isset($_POST['submit'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $mobileNumber = $_POST['mobileNumber'];
    $alt_mobileNumber = $_POST['alt_mobileNumber'];
    $gender = $_POST['gender'];
    $dateofbirth = date("Y-m-d", strtotime($_POST['dateofbirth']));
    $martialstatus = $_POST['martialstatus'];

    $filename = $_FILES["userImage"]["name"];
    $tempname = $_FILES["userImage"]["tmp_name"];
    $size = $_FILES["userImage"]["size"];

    $address = $_POST['address'];
    $dateofjoining = date("Y-m-d", strtotime($_POST['dateofjoining']));
    $designation = $_POST['designation'];
    $current_salary = $_POST['current_salary'];
    $company_email = $_POST['company_email'];
    $password = $_POST['password'];
    $experience = $_POST['experience'];

    $filename1 = $_FILES["salary_slip"]["name"];
    $tempname1 = $_FILES["salary_slip"]["tmp_name"];
    $size1 = $_FILES["salary_slip"]["size"];

    $filename2 = $_FILES["exp_certificate"]["name"];
    $tempname2 = $_FILES["exp_certificate"]["tmp_name"];
    $size2 = $_FILES["exp_certificate"]["size"];

    $folder = "../img/" . $filename;
    if ($tempname != "") {
        move_uploaded_file($tempname, $folder);
    }

    $folder1 = "";
    if ($tempname1 != "") {
        $folder1 = "../img/" . $filename1;
        move_uploaded_file($tempname1, $folder1);
    }

    $folder2 = "";
    if ($tempname2 != "") {
        $folder2 = "../img/" . $filename2;
        move_uploaded_file($tempname2, $folder2);
    }


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:8080/createemployee',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
                'name' => $fullName,
                'ExperienceType' => $experience,
                'email' => $email,
                'companyEmail' => $company_email,
                'password' => $password,
                'gender' => $gender,
                'marital_status' => $martialstatus,
                'mobileNumber' => $mobileNumber,
                'altmobileNumber' => $alt_mobileNumber,
                'address' => $address,
                'date_of_birth' => $dateofbirth,
                'date_of_joining' => $dateofjoining,
                'designation' => $designation,
                'salarySlip' => $folder1 == "" ? "" : new CURLFILE($folder1),
                'experienceLetter' => $folder2 == "" ? "" : new CURLFILE($folder2),
                'profilePic' => new CURLFILE($folder),
                'salary' => $current_salary
            ),
    )
    );

    $response = curl_exec($curl);
   
    $resulatarray = json_decode($response,true);
    $emp_id = $resulatarray['data']['newemployeeId']['LAST_INSERT_ID()'];
    curl_close($curl);
    header("location:addeducation.php?addid=$emp_id");
}
if(isset($_GET['id']))
{
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getemployeebyid/'.$_GET['id'],
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$resultEditEmp = json_decode($response,true);
$name = $resultEditEmp['data'][0]['name'];
$email = $resultEditEmp['data'][0]['email'];
$mobileNumber = $resultEditEmp['data'][0]['mobileNumber'];
$altmobileNumber = $resultEditEmp['data'][0]['altmobileNumber'];
$gender =  $resultEditEmp['data'][0]['gender'];
$date_of_birth =  $resultEditEmp['data'][0]['date_of_birth'];
$marital_status =  $resultEditEmp['data'][0]['marital_status'];
$address =  $resultEditEmp['data'][0]['address'];
$date_of_joining =  $resultEditEmp['data'][0]['date_of_joining'];
$designation =  $resultEditEmp['data'][0]['designation'];
$salary =  $resultEditEmp['data'][0]['salary'];
$companyEmail = $resultEditEmp['data'][0]['companyEmail'];
$password = $resultEditEmp['data'][0]['password'];
$ExperienceType = $resultEditEmp['data'][0]['ExperienceType'];
curl_close($curl);
}
?>
<?php
if (isset($_POST['update'])) {
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $mobileNumber = $_POST['mobileNumber'];
    $alt_mobileNumber = $_POST['alt_mobileNumber'];
    $gender = $_POST['gender'];
    $dateofbirth = date("Y-m-d", strtotime($_POST['dateofbirth']));
    $martialstatus = $_POST['martialstatus'];

    $filename = $_FILES["userImage"]["name"];
    $tempname = $_FILES["userImage"]["tmp_name"];
    $size = $_FILES["userImage"]["size"];

    $address = $_POST['address'];
    $dateofjoining = date("Y-m-d", strtotime($_POST['dateofjoining']));
    $designation = $_POST['designation'];
    $current_salary = $_POST['current_salary'];
    $company_email = $_POST['company_email'];
    $password = $_POST['password'];
    $experience = $_POST['experience'];

    $filename1 = $_FILES["salary_slip"]["name"];
    $tempname1 = $_FILES["salary_slip"]["tmp_name"];
    $size1 = $_FILES["salary_slip"]["size"];

    $filename2 = $_FILES["exp_certificate"]["name"];
    $tempname2 = $_FILES["exp_certificate"]["tmp_name"];
    $size2 = $_FILES["exp_certificate"]["size"];

    $folder = "../img/" . $filename;
    if ($tempname != "") {
        move_uploaded_file($tempname, $folder);
    }

    $folder1 = "";
    if ($tempname1 != "") {
        $folder1 = "../img/" . $filename1;
        move_uploaded_file($tempname1, $folder1);
    }

    $folder2 = "";
    if ($tempname2 != "") {
        $folder2 = "../img/" . $filename2;
        move_uploaded_file($tempname2, $folder2);
    }


    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:8080/editemployee',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
                'employeeId' => $_GET['id'],
                'name' => $fullName,
                'ExperienceType' => $experience,
                'email' => $email,
                'companyEmail' => $company_email,
                'password' => $password,
                'gender' => $gender,
                'marital_status' => $martialstatus,
                'mobileNumber' => $mobileNumber,
                'altmobileNumber' => $alt_mobileNumber,
                'address' => $address,
                'date_of_birth' => $dateofbirth,
                'date_of_joining' => $dateofjoining,
                'designation' => $designation,
                'salarySlip' => $folder1 == "" ? "" : new CURLFILE($folder1),
                'experienceLetter' => $folder2 == "" ? "" : new CURLFILE($folder2),
                'profilePic' => new CURLFILE($folder),
                'salary' => $current_salary
            ),
    )
    );

    print_r( array(
        'employeeId' => $_GET['id'],
        'name' => $fullName,
        'ExperienceType' => $experience,
        'email' => $email,
        'companyEmail' => $company_email,
        'password' => $password,
        'gender' => $gender,
        'marital_status' => $martialstatus,
        'mobileNumber' => $mobileNumber,
        'altmobileNumber' => $alt_mobileNumber,
        'address' => $address,
        'date_of_birth' => $dateofbirth,
        'date_of_joining' => $dateofjoining,
        'designation' => $designation,
        'salarySlip' => $folder1 == "" ? "" : new CURLFILE($folder1),
        'experienceLetter' => $folder2 == "" ? "" : new CURLFILE($folder2),
        'profilePic' => new CURLFILE($folder),
        'salary' => $current_salary
    ));

    $response = curl_exec($curl);
    echo $response;
    curl_close($curl);
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
                            if(isset($_GET['id']))
                            {
                            ?>
                            <div class="card-body">
                                <h5>Personal</h5>
                                <hr>
                                <a href="addeducation.php?id=<?php echo $_GET['id']; ?>"><p>Education</p></a>
                                <hr>
                                <a href="adddocument.php?id=<?php echo $_GET['id']; ?>"><p>Document</h5></a>
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
                    <h4 class="mt-4 ml-4">Add Employee</h4>
                    <form class="row g-3 ml-4 mr-4 " enctype="multipart/form-data" method="post" id="employee_form"
                        style="margin-bottom:3%;">
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="fullName" value="<?php echo $name; ?>">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" name="mobileNumber" value="<?php echo $mobileNumber; ?>">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Alternate Mobile Number</label>
                            <input type="name" class="form-control" name="alt_mobileNumber" value="<?php echo $altmobileNumber; ?>">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Gender</label>
                            <select class="form-control" name="gender">
                                <option value="">Select Gender</option>
                                <option value="Male" <?php
                                if($gender=="Male")
                                {
                                    echo "selected";
                                }
                                ?>>Male</option>
                                <option value="Female" <?php
                                if($gender=="Female")
                                {
                                    echo "selected";
                                }
                                ?>>Female</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Date Of Birth</label>
                            <input type="date" class="form-control" name="dateofbirth" value="<?php
                             if($date_of_birth!="")
                             {
                             echo date('Y-m-d',strtotime($date_of_birth));
                             } ?>">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="inputState">Marital Status</label>
                            <select class="form-control" name="martialstatus">
                                <option Value="">Choose...</option>
                                <option value="Married" <?php
                                if($marital_status=="Married")
                                {
                                    echo "selected";
                                }
                                ?>>Married</option>
                                <option value="Unmarried" <?php
                                if($marital_status=="Unmarried")
                                {
                                    echo "selected";
                                }
                                ?>>Unmarried</option>next action-button
                            </select>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Cover Image</label>
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName">Choose File</div>
                                    <div class="file-select-name" id="noFile">No file chosen...</div>
                                    <input type="file" name="userImage" id="chooseFile">

                                </div>
                            </div>
                            <div id="file_error"></div>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Address</label>
                            <textarea class="form-control" name="address"><?php echo $address; ?></textarea>
                        </div>
                        <div class="col-md-12 mt-2">
                            <h4 class="fs-title" style="margin-top:1%">Company Information</h4>
                        </div>

                        <div class="col-md-4 mt-2">
                            <label class="form-label">Date OF Joining</label>
                            <input type="date" class="form-control" name="dateofjoining" value="<?php 
                            if($date_of_joining!="")
                            {
                                echo date('Y-m-d',strtotime($date_of_joining));
                            }
                             ?>">
                        </div>
                        <div class="col-md-4 mt-2">
                            <!-- <label class="form-label">Designation</label>
                            <input type="name" class="form-control" name="designation" value="<?php echo $designation; ?>"> -->
                            <label for="inputState">Designation</label>
                            <select class="form-control" id="designation" name="designation">
                                <option Value="">Choose...</option>
                                <option value="Web devlopment" <?php
                                if($designation=="Web devlopment")
                                {
                                    echo "selected";
                                }
                                ?>>Web devlopment</option>
                                <option value="Ui/UX" <?php
                                if($designation=="Ui/UX")
                                {
                                    echo "selected";
                                }
                                ?>>Ui/UX</option>
                                <option value="App Devlopment"  <?php
                                if($designation=="App Devlopment")
                                {
                                    echo "selected";
                                }
                                ?>>App Devlopment</option>
                                <option value="HR"  <?php
                                if($designation=="HR")
                                {
                                    echo "selected";
                                }
                                ?>>HR</option>
                                <option value="QA Tester"  <?php
                                if($designation=="QA Tester")
                                {
                                    echo "selected";
                                }
                                ?>>QA Tester</option>
                            </select>
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Current Salary</label>
                            <input type="name" class="form-control" name="current_salary" value="<?php echo $salary; ?>">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Company Email</label>
                            <input type="name" class="form-control" name="company_email" value="<?php echo $companyEmail; ?>">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label class="form-label">Password</label>
                            <input type="name" class="form-control" name="password" value="<?php echo $password; ?>">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="inputState">Experience</label>
                            <select class="form-control" id="experience" name="experience">
                                <option Value="">Choose...</option>
                                <option value="Fresher" <?php
                                if($ExperienceType=="Fresher")
                                {
                                    echo "selected";
                                }
                                ?>>Fresher</option>
                                <option value="Experirence"  <?php
                                if($ExperienceType=="Experirence")
                                {
                                    echo "selected";
                                }
                                ?>>Experirence</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-2" id="pre_title" style="display:none">
                            <h4 class="fs-title" style="margin-top:1%">Previous Company Information</h4>
                        </div>
                        <div class="col-md-4 mt-2" id="salary_slip" style="display:none">
                            <label class="form-label">Salary Slip</label>
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName">Choose File</div>
                                    <div class="file-select-name" id="noFile1">No file chosen...</div>
                                    <input type="file" name="salary_slip" id="chooseFile1">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-2" id="exp_certificate" style="display:none">
                            <label class="form-label">Experience Certificates</label>
                            <div class="file-upload">
                                <div class="file-select">
                                    <div class="file-select-button" id="fileName">Choose File</div>
                                    <div class="file-select-name" id="noFile2">No file chosen...</div>
                                    <input type="file" name="exp_certificate" id="chooseFile2">
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4 mb-4">
                            <button class="btn btn-primary" name="<?php
                            if(isset($_GET['id']))
                            {
                                echo "update";
                            }
                            else{
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
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
</script>
<script>
    $(document).ready(function () {
        $("#employee_form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                fullName: {
                    required: true
                },
                mobileNumber: {
                    required: true
                },
                alt_mobileNumber: {
                    required: true
                },
                gender: {
                    required: true
                },
                dateofbirth: {
                    required: true
                },
                martialstatus: {
                    required: true
                },
                userImage: {
                    required: true
                },
                address: {
                    required: true
                },
                dateofjoining: {
                    required: true
                },
                designation: {
                    required: true
                },
                current_salary: {
                    required: true
                },
                company_email: {
                    required: true
                },
                password: {
                    required: true
                },
                experience: {
                    required: true
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "userImage") {
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
</script>
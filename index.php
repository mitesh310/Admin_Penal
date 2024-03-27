<?php
ob_start();
session_start();
$error = "";
$success = "";
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://localhost:8080/adminlogin',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => '{
        "email":"' . $email . '",
        "password":"' . $password . '"
    }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    )
    );

    $response = curl_exec($curl);

    curl_close($curl);
    //echo $response;
    $resultArray = json_decode($response, true);
    if ($resultArray['status'] != '200') {
        $error = $resultArray['error'];
    } else {
        $_SESSION['loginStatus'] = "true";
        header("location:dashboard/");
        $success = "success";
    }


}
?>
<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>ERP Weblock</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicona.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="css/login.css" rel="stylesheet">
    <link href="plugins/toastr/css/toastr.min.css" rel="stylesheet">


</head>

<body class="h-100">

    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>

    <style>
        .error {
            color: #FF0000 !important;
        }
    </style>

    <div class="container">
        <div class="login_box">
            <h1>Admin Login</h1>

            <form method="post" id="login_form">
                <div class="input_box">
                    <input type="text" name="email"
                        value="<?php if (isset($_POST['email'])) {
                            echo $_POST['email'];
                        } ?>">
                    <label for="">Email</label>
                    <img src="images/email.png" height="58%" class="icon">
                </div>
                <div id="emailError"></div>
                <br>
                <div class="input_box">
                    <input type="password" name="password" id="id_password">
                    <label for="">Password</label>
                    <img src="images/vision.png" height="58%" class="icon" id="togglePassword">
                </div>
                <div id="passError"></div>
                <div class="login">
                    <button type="submit" name="submit">Log in </button>
                </div>
            </form>
        </div>
    </div>


    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


    <script>
        const togglePassword =
            document.querySelector('#togglePassword');

        const password =
            document.querySelector('#id_password');

        togglePassword.
            addEventListener('click', function (e) {

                // Toggle the type attribute 
                const type = password.getAttribute(
                    'type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);

                // Toggle the eye slash icon 
                if (togglePassword.src.match(
                    "images/vision.png")) {
                    togglePassword.src =
                        "images/hide.png";
                } else {
                    togglePassword.src =
                        "images/vision.png";
                }
            }); 
    </script>
</body>

</html>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
</script>
<script>
    $(document).ready(function () {
        $("#login_form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true
                },
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "email") {
                    error.appendTo("#emailError");
                }
                else if (element.attr("name") == "password") {
                    error.appendTo("#passError");
                }
                else {
                    error.insertAfter(element)
                }
            },

        });
    });
</script>
<script src="plugins/toastr/js/toastr.min.js"></script>
<!-- <script src="plugins/toastr/js/toastr.init.js"></script> -->

<?php
if ($error != "") {
    ?>
    <script>

        toastr.error("Invalid email or Password", "Error",
            {
                timeOut: 5e3, closeButton: !0, debug: !1, newestOnTop: !0, progressBar: !0,
                positionClass: "toast-top-right", preventDuplicates: !0, onclick: null,
                showDuration: "300", hideDuration: "1000", extendedTimeOut: "1000", showEasing: "swing",
                hideEasing: "linear", showMethod: "fadeIn", hideMethod: "fadeOut", tapToDismiss: !1
            });
    </script>
    <?php
}
?>
<?php
if ($success != "") {
    ?>
    <script>

        toastr.success("Login Successfully", "Success",
            {
                timeOut: 5e3, closeButton: !0, debug: !1, newestOnTop: !0, progressBar: !0,
                positionClass: "toast-top-right", preventDuplicates: !0, onclick: null,
                showDuration: "300", hideDuration: "1000", extendedTimeOut: "1000", showEasing: "swing",
                hideEasing: "linear", showMethod: "fadeIn", hideMethod: "fadeOut", tapToDismiss: !1
            });
    </script>
    <?php
}
?>
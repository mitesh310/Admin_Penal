<?php
include("../include/header.php");
include("../include/notifications.php");
?>
<?php

if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    addnotification("0","notify",$title,$description);
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
                            <h4 class="mt-4 ml-4">Send Notification</h4>
                            <form method="post" class="row g-3 ml-4 mr-4" id="project_form" enctype="multipart/form-data">
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" >
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" name="description">
                                </div>
                               

                                <div class="col-12 mt-4 mb-4">
                                    <button class="btn btn-primary" type="submit" name="submit">Submit</button>
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
                title: {
                    required: true,
                },
                description: {
                    required: true
                }
            },
        });
    });
</script>
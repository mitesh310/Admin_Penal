<?php
include ("../include/header.php")
    ?>

<div class="content-body">


    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="card-title">Employee Late In </h4>
                            </div>
                            <div class="col-md-2">
                                <input type="date" class="form-control" required>
                            </div>
                        </div>


                    </div>
                    <div class="table-responsive mb-5">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Date</th>
                                    <th>Clock In Time</th>
                                    <th>Late In Time</th>
                                    <th>Late In Reason</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>



<?php
include ("../include/footer.php");
?>
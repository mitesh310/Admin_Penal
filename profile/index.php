<?php
include("../include/header.php")
?>


<style>
    .form-control{
        border-radius: 5px;
    }
</style>




        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="media align-items-center mb-4">
                                    <img class="mr-3" src="../images/avatar/11.png" width="80" height="80" alt="">
                                    <div class="media-body">
                                        <h3 class="mb-0">Pikamy Cha</h3>
                                        <p class="text-muted mb-0">Canada</p>
                                    </div>
                                </div>
                                
                                <ul class="card-profile__info">
                                    <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span>01793931609</span></li>
                                    <li><strong class="text-dark mr-4">Email</strong> <span>name@domain.com</span></li>
                                </ul>

                                
                            </div>
                        </div>  
                    </div>
                    <div class="col-lg-8 col-xl-9">
                        <div class="card">
                            <h4 class="mt-4 ml-4">Basic Information</h4>
                            <form class="row g-3 ml-4 mr-4 needs-validation" novalidate>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Employee ID</label>
                                    <input type="text" class="form-control" required>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Joining Date</label>
                                    <input type="date"  class="form-control" required>
                                </div>


                                <div class="col-md-4 mt-2">
                                    <label class="form-label">First Name</label>
                                    <input type="name" class="form-control" required>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Middle Name</label>
                                    <input type="name" class="form-control" required>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Last Name</label>
                                    <input type="name" class="form-control" required>
                                </div>


                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Date Of Birth</label>
                                    <input type="date"  class="form-control" required>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="inputState">Gender</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label for="inputState">Married Status</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>Married</option>
                                        <option>Unmarried</option>
                                    </select>
                                </div>


                                <h4 class="col-md-12 mt-4">Family Information</h4>

                                <div class="col-md-4 mt-2">
                                    <label for="inputState">Relationship</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choose...</option>
                                        <option>Father</option>
                                        <option>Mother</option>
                                        <option>Brother</option>
                                    </select>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Name</label>
                                    <input type="name" class="form-control" required>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Date Of Birth</label>
                                    <input type="date"  class="form-control" required>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Occupation</label>
                                    <input type="name" class="form-control" required>
                                </div>


                                <h4 class="col-md-12 mt-4">Contact</h4>
                                
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Phone Number</label>
                                    <input type="name" class="form-control" required>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Home Phone Number</label>
                                    <input type="name" class="form-control" required>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Work Email</label>
                                    <input type="email" class="form-control" required>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Personal Email</label>
                                    <input type="email" class="form-control" required>
                                </div>
                                <div class="col-md-4 mt-2">
                                    <label class="form-label">Current Address</label>
                                    <input type="email" class="form-control" required>
                                </div>

                                <div class="col-12 mt-4 mb-4">
                                    <button class="btn btn-primary" type="submit">Submit</button>
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
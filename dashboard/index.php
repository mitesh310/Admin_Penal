<?php
include ("../include/header.php");


?>

<!--  Get Holiday API -->
<?php

$curl = curl_init();

curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => 'http://localhost:8080/getallholidays',
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
$resultArray = json_decode($response, true);

curl_close($curl);
// echo $response;
?>

<!-- Get Birthday API -->
<?php

$curl = curl_init();

curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => 'http://localhost:8080/getbirthdays',
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

curl_close($curl);
$resultbirthArray = json_decode($response, true);
?>


<!-- Get Work Anniversary API -->
<?php

$curl = curl_init();

curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => 'http://localhost:8080/getanniversaries',
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

curl_close($curl);
$resultanniversaryArray = json_decode($response, true);
?>

<!-- Get Absent API -->
<?php

$curl = curl_init();

curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => 'http://localhost:8080/getabsents',
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

curl_close($curl);
$resultabsenarray = json_decode($response, true);

?>

<!-- Get Leave For Today API -->
<?php

$curl = curl_init();

curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => 'http://localhost:8080/getleavesoftoday',
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
$resultleavearray = json_decode($response, true);
curl_close($curl);
?>

<!-- Get Pending Request API -->
<?php

$curl = curl_init();

curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => 'http://localhost:8080/getpendingrequests',
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
$resultpendingrequestarray = json_decode($response, true);

curl_close($curl);
// echo $response;
?>

<!-- Present emplooye for today -->

<?php

$currentDate = date("Y-m-d");

$curl = curl_init();

curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => 'http://localhost:8080/presenttoday',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(array("date" => $currentDate)),
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
    )
);

$response = curl_exec($curl);
$resultpresentarray = json_decode($response, true);
curl_close($curl);

?>







<style>
    .card-widget__subtitle {
        font-size: 20px;
    }

    #activity {
        height: 250px;
        overflow-x: hidden;
        overflow-y: auto;
        text-align: justify;
    }

    #activity::-webkit-scrollbar {
        display: none;
    }

    #activity {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    hr.style3 {
        border-top: 1px dashed #8c8b8b;
    }
</style>
<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Today Present Employee</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">
                                <?php echo count($resultpresentarray['data']); ?>
                            </h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Today Absent Employee</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">
                                <?php echo count($resultabsenarray['data']); ?>
                            </h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Requests for Approval</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">
                                <?php echo count($resultpendingrequestarray['data']); ?>
                            </h2>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="fa fa-money"
                                aria-hidden="true"></i></span>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Requests for Approval (
                            <?php echo count($resultpendingrequestarray['data']); ?>)
                        </h4>
                        <hr class="style3">
                        <?php if (count($resultpendingrequestarray['data']) > 0): ?>
                            <div id="activity">
                                <?php foreach ($resultpendingrequestarray['data'] as $request): ?>
                                    <div class="media border-bottom-1 pt-3 pb-3">
                                        <div class="media-body">
                                            <h5>
                                                <?php echo ucwords($request['reuestby']['name']); ?>
                                            </h5>
                                            <h6>
                                                <?php echo ucwords($request['type']); ?>
                                            </h6>
                                            <p class="mb-0">
                                                <?php echo ucwords($request['description']); ?>
                                            </p>
                                        </div>
                                        <span class="text-muted ">
                                            <?php echo ucwords($request['keyname']); ?>
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <h6 class="text-center mt-5">No pending requests for approval.</h6>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Upcomming Leave Person (
                            <?php echo count($resultleavearray['data']); ?>)
                        </h4>
                        <hr class="style3">
                        <?php if (count($resultleavearray['data']) > 0): ?>
                            <div id="activity">
                                <?php foreach ($resultleavearray['data'] as $absent): ?>
                                    <div class="media border-bottom-1 pt-3 pb-3">
                                        <img width="35" src="../images/avatar/1.jpg" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h5>
                                                <?php echo ucwords($absent['leavesDetail']['name']); ?>
                                            </h5>
                                            <p class="mb-0">
                                                <?php echo ucwords(($absent['leaveType'])); ?>
                                            </p>
                                            <p class="mb-0">Start Date :
                                                <?php echo date("d-m-Y", strtotime($absent['startDate'])); ?>
                                            </p>
                                            <p class="mb-0">End Date :
                                                <?php echo isset($absent['endDate']) ? date('d-m-Y', strtotime($absent['endDate'])) : 'N/A'; ?>
                                            </p>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <h6 class="text-center mt-5">No Employee On Leave.</h6>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Absent Today (
                            <?php echo count($resultabsenarray['data']); ?>)
                        </h4>
                        <hr class="style3">
                        <?php if (count($resultabsenarray['data']) > 0): ?>
                            <div id="activity">
                                <?php foreach ($resultabsenarray['data'] as $absent): ?>
                                    <div class="media border-bottom-1 pt-3 pb-3">
                                        <img width="35" src="../images/avatar/1.jpg" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h5>
                                                <?php echo ucwords($absent['name']); ?>
                                            </h5>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <h6 class="text-center mt-5">No Employee Absent Today.</h6>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Present Employee (
                            <?php echo count($resultpresentarray['data']); ?>)
                        </h4>
                        <hr class="style3">
                        <?php if (count($resultpresentarray['data']) > 0): ?>
                            <div id="activity">
                                <?php foreach ($resultpresentarray['data'] as $tpresent): ?>
                                    <div class="media border-bottom-1 pt-3 pb-3">
                                        <img width="35" src="../images/avatar/1.jpg" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h5>
                                                <?php echo ucwords($tpresent['employee']['name']); ?>
                                            </h5>
                                            <!-- <p class="mb-0">Software Developer</p> -->
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <h6 class="text-center mt-5">No Employee Absent Today.</h6>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Upcoming Holiday (
                            <?php echo count($resultArray['data']); ?>)
                        </h4>
                        <hr class="style3">
                        <?php if (count($resultArray['data']) > 0): ?>
                            <div id="activity">
                                <?php foreach ($resultArray['data'] as $holiday): ?>
                                    <div class="media border-bottom-1 pt-3 pb-3">
                                        <!-- <img width="35" src="../images/avatar/1.jpg" class="mr-3 rounded-circle"> -->
                                        <div class="media-body">
                                            <h5>
                                                <?php echo $holiday['holidayName']; ?>
                                            </h5>
                                        </div><span style='font-weight:bold;font-size:17px;'>
                                            <?php echo date("d-m-Y", strtotime($holiday['holidayDate'])); ?>
                                        </span>
                                    </div>


                                <?php endforeach; ?>
                            </div>

                        <?php else: ?>
                            <h6 class="text-center mt-5">No Holiday .</h6>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Birthday In This Month (
                            <?php echo count($resultbirthArray['data']); ?>) <i class="fa fa-birthday-cake"
                                aria-hidden="true"></i>
                        </h4>
                        <hr class="style3">
                        <?php if (count($resultbirthArray['data']) > 0): ?>
                            <div id="activity">
                                <?php foreach ($resultbirthArray['data'] as $birth): ?>
                                    <div class="media border-bottom-1 pt-3 pb-3">
                                        <img width="35" src="../images/avatar/1.jpg" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h5>
                                                <?php echo ucfirst($birth['name']); ?>
                                            </h5>
                                        </div><span style='color:#e83e8c;font-weight:bold;font-size:17px;'>
                                            <?php echo date("d-m-Y", strtotime($birth['date_of_birth'])); ?>
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <h6 class="text-center mt-5">No Birthday This Month.</h6>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Work Anniversary This Month (
                            <?php echo count($resultanniversaryArray['data']); ?>)
                        </h3>
                        <hr class="style3">
                        <?php if (count($resultanniversaryArray['data']) > 0): ?>
                            <div id="activity">
                                <?php foreach ($resultanniversaryArray['data'] as $ann): ?>
                                    <?php
                                    $date1 = new DateTime(date("Y-m-d", strtotime($ann['date_of_joining'])));
                                    $date2 = new DateTime(date("Y-m-d"));
                                    $interval = $date1->diff($date2);
                                    ?>
                                    <div class="media border-bottom-1 pt-3 pb-3">
                                        <img width="35" src="../images/avatar/1.jpg" class="mr-3 rounded-circle">
                                        <div class="media-body">
                                            <h5>
                                                <?php echo ucfirst($ann['name']); ?>
                                            </h5>
                                            <td class="text-right">
                                                <?php echo date("d-m-Y", strtotime($ann['date_of_joining'])); ?>
                                            </td>
                                        </div>
                                        <span style='color:green;font-weight:bold;font-size:17px;'>
                                            <?php echo $interval->y . " years"; ?>
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <h6 class="text-center mt-5">No work anniversary this month .</h6>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            



        </div>
    </div>
    <!-- #/ container -->
</div>
<!--**********************************
            Content body end
        ***********************************-->
<?php
include ("../include/footer.php");
?>
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js">
</script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js">
</script>

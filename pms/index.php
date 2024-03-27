<?php
include("../include/header.php");


// Get active project API
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getactiveprojects',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$resultActiveProjects = json_decode($response,true);
curl_close($curl);

?>

<!-- Get Due project API -->
<?php
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getdueprojects',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$resultDueProjects = json_decode($response,true);
curl_close($curl);
?>

<!-- Get All project API -->
<?php

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
$allproject = json_decode($response, true);
curl_close($curl);
?>

<!-- get ALL Task API -->
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getalltasks',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$alltask = json_decode($response, true);
curl_close($curl);
?>

<!-- Get active task API -->
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getactivetasks',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$activetask = json_decode($response, true);
curl_close($curl);
?>

<!-- Get due task API -->

<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getduetasks',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$duetask = json_decode($response, true);
curl_close($curl);
?>

<style>
    .card-widget__subtitle{
        font-size:20px; 
    }
    #activity{
        height: 350px;
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
 </style>
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                                <div class="card card-widget">
                                    <div class="card-body gradient-3">
                                        <div class="media">
                                            <span class="card-widget__icon"><i class="icon-home"></i></span>
                                            <div class="media-body">
                                                <h2 class="card-widget__title"><?php echo count($allproject['data']); ?></h2>
                                                <h5 class="card-widget__subtitle">All Projects</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
            </div>
            <div class="col-3">
                 <div class="card card-widget">
                    <div class="card-body gradient-4">
                       <div class="media">
                            <span class="card-widget__icon"><i class="icon-tag"></i></span>
                             <div class="media-body">
                                <h2 class="card-widget__title"><?php echo count($alltask['data']); ?></h2>
                               <h5 class="card-widget__subtitle">All Tasks</h5>
                       </div>
                     </div>
                    </div>
                 </div>
            </div>
            <div class="col-3">
              <div class="card card-widget">
                                <div class="card-body gradient-4">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="icon-emotsmile"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title"><?php echo count($activetask['data']); ?></h2>
                                            <h5 class="card-widget__subtitle">Active Task</h5>
                                        </div>
                                    </div>
                                </div>
               </div>
            </div>
            <div class="col-3">
            <div class="card card-widget">
                                <div class="card-body gradient-9">
                                    <div class="media">
                                        <span class="card-widget__icon"><i class="icon-ghost"></i></span>
                                        <div class="media-body">
                                            <h2 class="card-widget__title"><?php echo count($duetask['data']); ?></h2>
                                            <h5 class="card-widget__subtitle">Due Task </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>         
            </div>
                      
        </div>   
        <div class="row">
             <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Tasks</h4>
                                <div id="activity">
                                <?php
                                foreach($alltask['data'] as $active)
                                {
                                ?>
                                    <div class="media border-bottom-1 pt-3 pb-3">
                                        <div class="media-body">
                                            <h5><?php echo ucwords($active['projectName'][0]['ProjectName']); ?></h5>
                                            <p class="mb-0"><?php echo ucwords($active['taskDescription']); ?></p>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-6">
                        <div class="card">
                            <div class="card-body">
                                <h3>Active Projects</h3>
                                <div id="activity">
                                <?php
                                foreach($resultActiveProjects['data'] as $active)
                                {
                                ?>
                                <a href="project.php">
                                <div class="media border-bottom-1 pt-3 pb-3">
                                        <div class="media-body">
                                            <h5><?php echo ucwords($active['ProjectName']); ?></h5>
                                        </div><span class="text-muted "><?php echo date('d-m-Y',strtotime($active['endDate']));  ?></span>
                                    </div>
                                </a>
                                <?php
                                }
                                ?>    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Due Projects</h4>
                                <div id="activity">
                                <?php
                                foreach($resultDueProjects['data'] as $active)
                                {
                                ?>
                                <a href="project.php">
                                <div class="media border-bottom-1 pt-3 pb-3">
                                        <div class="media-body">
                                            <h5><?php echo ucwords($active['ProjectName']); ?></h5>
                                        </div><span class="text-muted "><?php echo date('d-m-Y',strtotime($active['endDate']));  ?></span>
                                    </div>
                                </a>
                                <?php
                                }
                                ?>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="row">
           
                    <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Active Tasks</h4>
                                <div id="activity">
                                <?php
                                foreach($activetask['data'] as $active)
                                {
                                ?>
                                     <div class="media border-bottom-1 pt-3 pb-3">
                                        <div class="media-body">
                                            <h5><?php echo ucwords($active['projectName'][0]['ProjectName']); ?></h5>
                                            <p class="mb-0"><?php echo ucwords($active['taskDescription']); ?></p>
                                        </div><span class="text-muted "><?php echo date('d-m-Y',strtotime($active['endDate']));  ?></span>
                                    </div>
                                
                                <?php
                                }
                                ?> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6 col-sm-6 col-xxl-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Due Tasks</h4>
                                <div id="activity">
                                <?php
                                foreach($duetask['data'] as $active)
                                {
                                ?>
                                     <div class="media border-bottom-1 pt-3 pb-3">
                                        <div class="media-body">
                                            <h5><?php echo ucwords($active['projectName'][0]['ProjectName']); ?></h5>
                                            <p class="mb-0"><?php echo ucwords($active['taskDescription']); ?></p>
                                        </div><span class="text-muted "><?php echo date('d-m-Y',strtotime($active['endDate']));  ?></span>
                                    </div>
                                
                                <?php
                                }
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
        </div>    
    </div>   
</div>
<?php
    include("../include/footer.php");
?>
<?php
include("../include/header.php")
?>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/getworkinghours',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);
$resultarray = json_decode($response,true);
curl_close($curl);
?>

<?php
if(isset($_GET['id'])){
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/deleteworkinghours/'.$_GET['id'],
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
header("location:working.php");

}
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
                                <h4 class="card-title">Working Hours</h4>
                            </div>   
                            <div class="col-md-2">
                            <a href="../setting/addworking.php" class="btn mb-1 btn-primary btn-lg">Add Working Hourse</a>
                            </div>    
                        </div>
                    </div>
                    <div class="table-responsive mb-5">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Sr.No</th>
                                    <th>Working Hourse</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i=1;
                            foreach ($resultarray['data'] as $working) 
                            {
                            ?>
                            
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $working['workingHours']; ?></td>
                                    <td><a href="addworking.php?id=<?php echo $working['timingId']; ?>">
                                            <img src="../images/edit.png"></img>
                                        </a>
                                        <a href="?id=<?php echo $working['timingId']; ?>"
                                            onclick="return confirm('Are you sure you want to delete.')"
                                            rel="noopener">
                                            <img src="../images/delete.png"></img>
                                        </a>
                                    </td>
                                </tr>
                                
                            <?php
                            $i++;
                            }
                            ?>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
    include("../include/footer.php");
?>
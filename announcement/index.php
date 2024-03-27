<?php
include("../include/header.php");
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8080/getannouncements',
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
$resultarray = json_decode($response, true);
curl_close($curl);


if(isset($_GET['id']))
{

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://localhost:8080/deleteannouncementbyid/'.$_GET['id'],
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
echo $response;
header("location:../announcement/");
}

?>




<div class="content-body">

    <!-- <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../dashboard">Dashboard</a></li>
            </ol>
        </div>
    </div> -->
    <!-- row -->

    <div class="container-fluid">
        <div class="card-body">
            <div class="row">
                <div class="col-md-10">
                    <h4 class="card-title">View Announcement</h4>
                </div>
                <div class="col-md-2">
                    <a href="../announcement/addannouncement.php" class="btn mb-1 btn-primary btn-lg">Add
                        Announcement</a>
                </div>
            </div>


            <div class="table-responsive mb-5">
                <table class="table table-striped table-bordered zero-configuration">
                    <thead>
                        <tr>
                            <th>Sr. No</th>
                            <th>Announcement Name</th>
                            <th>Description</th>
                            <th>Announcement Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($resultarray['data'] as $holiday) {
                            ?>
                            <tr>
                                <td>
                                    <?php echo $i; ?>
                                </td>
                                
                                <td>
                                    <?php echo $holiday['title']; ?>
                                </td>
                                <td>
                                    <?php echo $holiday['message']; ?>
                                </td>
                                <td>
                                    <?php echo date('d-m-Y', strtotime($holiday['announcement_date'])); ?>
                                </td>
                                <td><a href="addannouncement.php?id=<?php echo $holiday['announcementId']; ?>">
                                        <img src="../images/edit.png"></img>
                                    </a>
                                    <a href="?id=<?php echo $holiday['announcementId']; ?>" onclick="return confirm('Are you sure you want to delete.')" rel="noopener">
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
    <!-- #/ container -->
</div>
<?php
include("../include/footer.php");
?>
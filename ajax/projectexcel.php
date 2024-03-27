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
curl_close($curl);
$resultarray = json_decode($response,true);
if(isset($_POST["export_data"])) {	 
    $output = "";
         
    $output .= '<table class="table table-bordered" border="1">  
                <tr>  
                      <th scope="col">Sr. no.</th>
                      <th scope="col">Project Name</th>
                      <th scope="col">Start Date</th>
                      <th scope="col">End Date</th>
                      <th scope="col">Total Tasks</th>
                </tr>';
         
                $i=1;    
                foreach ($resultarray['data'] as $campaign) {
$output .= '<tr>  
                     <td>'.$i.'</td>   
                     <td>'.$campaign['ProjectName'].'</td> 
                     <td>'.date('d-m-Y',strtotime($campaign['startDate'])).'</td>  
                     <td>'.date('d-m-Y',strtotime($campaign['endDate'])).'</td>  
                     <td>'.$campaign['totalTasks'].'</td> 
                </tr>';
                $i++;  
                }
                $output .= '</table>';
    
                $filename = "project_list".date('Ymdh:i:s') . ".xls";         
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");  
                echo $output;
                exit;  
    }
?>
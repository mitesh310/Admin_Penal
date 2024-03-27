<?php
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:8080/getusers',
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
                      <th scope="col">Full Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Mobile Number</th>
                      <th scope="col">Designation</th>
                </tr>';
         
                $i=1;    
                foreach ($resultarray['data'] as $campaign) {
$output .= '<tr>  
                     <td>'.$i.'</td>   
                     <td>'.$campaign['name'].'</td> 
                     <td>'.$campaign['email'].'</td>  
                     <td>'.$campaign['mobileNumber'].'</td>  
                     <td>'.$campaign['designation'].'</td> 
                </tr>';
                $i++;  
                }
                $output .= '</table>';
    
                $filename = "employee_list".date('Ymdh:i:s') . ".xls";         
                header("Content-Type: application/vnd.ms-excel");
                header("Content-Disposition: attachment; filename=\"$filename\"");  
                echo $output;
                exit;  
    }
?>
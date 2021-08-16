<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Details</title>
</head>
<body>
<?php
    //$i = 1;
    $userdata1 = $this->session->all_userdata();
    echo var_dump($userdata1);
    //echo $userdata1["data"]["FirstName"];
    $userdata = $userdata1["data"];
    // print_r($userdata);
    // die();
    echo "<table>";
    foreach($userdata as $row)
    {
      //echo $row->FirstName;
      // echo "View is working. <br>";
      
      echo "Welcome " . $row->FirstName . " " . $row->MiddleName . " " . $row->LastName . "!<br>";
      echo "<table>";
      echo "<tr><th>Email Address</th><th>Phone Number</th><th>Alternative Phone Number</th><th>Address</th><th>Pincode</th><th>State</th></tr>";

      echo "<br><tr><td>" . $row->emailAddress . "</td><td>" . $row->PhoneNumber . "</td><td>" . $row->AltPhoneNumber . "</td><td>" . $row->Address . "</td><td>" . $row->Pincode . "</td><td>" . $row->State . "</td></tr";
      echo "</table>";

      echo '<table>';
      echo '<tr><th>Gender</th><th>Marital Status</th><th>Date of Birth</th><th>Occupation</th>';

      echo "<br><tr><td>" . $row->Gender . "</td><td>" . $row->MaritalStatus . "</td><td>" . $row->DateOfBirth . "</td><td>" . $row->Occupation . "</td></tr";
      echo "</table>";
      echo '<table>';
      echo '<tr><th>Aadhaar Number</th><th>Pan Number</th><th>Aggregate Result</th><th>Desired Job</th><th>Years of Experience</th>';

      echo "<br><tr><td>" . $row->AadhaarNumber . "</td><td>" . $row->PanNumber . "</td><td>" . $row->Result . "</td><td>" . $row->DesiredJob . "</td><td>" . $row->ExperienceYears . "</td></tr";
      echo "</table>";
    }
    echo "</table>";
    $this->session->unset_userdata("data");
    // echo var_dump($userdata1);
    // echo $row->FirstName;

//   //echo 'php working';
//   //echo $data;
// }
?>
<!-- <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">London</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Paris</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
</div>

<div id="London" class="tabcontent">
  <h3>London</h3>
  <p>London is the capital city of England.</p>
</div>

<div id="Paris" class="tabcontent">
  <h3>Paris</h3>
  <p>Paris is the capital of France.</p> 
</div>

<div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div> -->

</body>
</html>

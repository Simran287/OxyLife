<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  }
  th, td {
  padding: 5px;
  text-align: left;
  }
</style>
  <title>Document</title>
</head>
<body>
  <?php
    //echo "<h3>London</h3> <p>London is in England.</p>";
    // $userdata = $this->session->all_userdata();
    // echo var_dump($userdata);
    $approveduser = $this->session->userdata('ApprovedUsers');
    //echo var_dump($approveduser);
    if(isset($approveduser))
    {
      foreach($approveduser as $row)
      {
      echo "<h4>Details of " . $row->FirstName . " " . $row->MiddleName . " " . $row->LastName . ".</h4>";
      echo "<table style='width:100%'>";
      echo "<tr><th>User ID</th><td>" . $row->UserID . "</td></tr>";
      echo "<tr><th>E-Mail Address</th><td>" . $row->emailAddress . "</td></tr>";
      echo "<tr><th>Phone Number</th><td>" . $row->PhoneNumber . "</td></tr>";
      echo "<tr><th>Alternative Phone Number</th><td>" . $row->AltPhoneNumber . "</td></tr>";
      echo "<tr><th>Address</th><td>" . $row->Address . "</td></tr>";
      echo "<tr><th>State</th><td>" . $row->State . "</td></tr>";
      echo "<tr><th>Pincode</th><td>" . $row->Pincode . "</td></tr>";
      echo "<tr><th>Gender</th><td>" . $row->Gender . "</td></tr>";
      echo "<tr><th>Date of Birth</th><td>" . $row->DateOfBirth . "</td></tr>";
      echo "<tr><th>Occupation</th><td>" . $row->Occupation . "</td></tr>";
      echo "<tr><th>Marital Status</th><td>" . $row->MaritalStatus . "</td></tr>";
      echo "<tr><th>Aadhaar Number</th><td>" . $row->AadhaarNumber . "</td></tr>";
      echo "<tr><th>Pan Card Number</th><td>" . $row->PanNumber . "</td></tr>";
      echo "<tr><th>Result</th><td>" . $row->Result . "</td></tr>";
      echo "<tr><th>Job Desired</th><td>" . $row->DesiredJob . "</td></tr>";
      echo "<tr><th>Years of Experience</th><td>" . $row->ExperienceYears . "</td></tr>";
      // echo "<tr><th>Status</th><td>" . $row->Status . "</td></tr>";
      echo "<tr><th>Status</th><td>" . "<form action='' method='post' name='selectstatus'><select name='status' onchange='this.form.submit();'><option value=" . $row->Status . ">" . $row->Status . "</option><option value='Pending'>Pending</option><option value='Rejected'>Rejected</option></select></form>" . "</td></tr>";
      echo "</table>";
      $this->session->set_userdata('updateUserID',$row->UserID);
      }
    }
    else
    {
      echo "There are no Approved Users.";
    }
  ?>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {box-sizing: border-box}
body {font-family: "Lato", sans-serif;}

/* Style the tab */
.tab {
  float: left;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: inherit;
  color: black;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #ccc;
  width: 70%;
  border-left: none;
  height: 300px;
}
</style>
</head>
<body>
<div class="tab">
  <button class="tablinks" onclick="openData(event, 'UserData')" id="defaultOpen">Profile</button>
  <?php
    $check = $this->session->userdata('Admin');
    //echo $check;
    if($check == true)
    { ?>
      <button class="tablinks" onclick="openData(event, 'ApprovedUsers')">Approved Users</button>
      <button class="tablinks" onclick="openData(event, 'PendingUsers')">Pending Users</button>
      <button class="tablinks" onclick="openData(event, 'RejectedUsers')">Rejected Users</button>
    <?php }
  ?>
  <!-- <button class="tablinks" onclick="openData(event, 'Tokyo')">Tokyo</button> -->
</div>

<div id="UserData" class="tabcontent">
  <?php include 'userdata.php'; ?>
</div>

<div id="ApprovedUsers" class="tabcontent">
  <?php include 'approveduser.php'; ?>
</div>

<div id="PendingUsers" class="tabcontent">
  <?php include 'pendinguser.php'; ?>
</div>

<div id="RejectedUsers" class="tabcontent">
  <?php include 'rejecteduser.php'; ?>
</div>

<!-- <div id="Tokyo" class="tabcontent">
  <h3>Tokyo</h3>
  <p>Tokyo is the capital of Japan.</p>
</div> -->

<script>
function openData(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 

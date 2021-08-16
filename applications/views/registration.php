<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <meta charset="utf-8">
        <style>
            #myHeadings{
                font-family: inherit;
                font-size: 500%;
                text-align: center;
                color: black;
                padding: inherit
                }
            #form{
                font-family: fantasy;
                font-size: inherit;
                text-align: left;
                color: brown;
                padding: inherit;
            }
            #formhead{
                text-align: center;
                font-size: 35px;
                color: black;
            }
        </style>
    </head>
    <body style="background-color: beige">
        <h1 id="myHeadings">Registration Form</h1>
        <p style="text-align: center; font-family: serif; font-size: 20px;">This is where the candidates fill out all their details.</p>
        <form id="form" autocomplete="on" name="registrationform" action="" method="post">
            <fieldset>
                <legend id="formhead">Personal Details</legend>
                Name:<br>
                <input type="text" name="fname" placeholder="First name" maxlength="20" required><br><br>
                Middle Name:<br>
                <input type="text" name="mname" placeholder="Middle name" maxlength="20"><br><br>
                Last Name:<br>
                <input type="text" name="lname" placeholder="Last name" maxlength="20" required><br><br>
                Username:
                <input type="text" name="username" placeholder="Username to Login" maxlength="30" required><br><br>
                Password:
                <input type="text" name="password" maxlength="30" required><br><br>
                Date of Birth:<br>
                <input type="date" name="dob" max="01-01-2004" min="01-01-1990"><br><br>
                Gender:<br>
                <div>
                    <input type="radio" name="gender" value="male">Male
                    <input type="radio" name="gender" value="female" checked>Female
                    <input type="radio" name="gender" value="other">Other
                </div>
                <br>
                State:<br>
                <select name="state">
                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                    <option value="Daman and Diu">Daman and Diu</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Lakshadweep">Lakshadweep</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Orissa">Orissa</option>
                    <option value="Pondicherry">Pondicherry</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttaranchal">Uttaranchal</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="West Bengal" selected>West Bengal</option>
                </select><br><br>
                Pincode:
                <input type="number" name="pincode" pattern="[0-9]{6}" placeholder="Pincode"><br><br>
                Marital Status:<br>
                <input type="text" name="maritalstatus"  maxlength="30"><br><br>
                <!-- Nationality:<br>
                <input type="radio" name="nationality" value="indian" checked>Indian
                <input type="radio" name="nationality" value="nri">Non-Indian Resident
                <br><br> -->
                Occupation:<br>
                <input type="text" name="occupation"  maxlength="30"><br><br>
            </fieldset>
            <br><br>
            <fieldset>
                <legend id="formhead">Official Details</legend>
                Aggregate Result:<br>
                <input type="number" name="result" step=0.01 min="0" max="10" ><br><br>
                Aadhaar Number:<br>
                <input type="number" name="aadhaarno" pattern="[0-9]{16}" placeholder="16-Digit Aadhaar Number"><br><br>
                Pan Card Number:<br>
                <input type="number" name="panno" pattern="[0-9]{16}" placeholder="16-Digit Pan Card Number"><br><br>
                Desired Job:<br>
                <input type="text" name="desiredjob" maxlength="20"><br><br>
                Experience Years:
                <input type="number" name="experiencey" min="0" placeholder="Years of Experience"><br><br>
            </fieldset>
            <br><br>
            <fieldset>
                <legend id="formhead">Contact Information</legend>
                Phone Number:<br>
                <input type="number" name="num1" pattern="[0-9]{10}" required placeholder="Mandatory"><br>
                <input type="number" name="num2" pattern="[0-9]{10}" placeholder="Alternate Phone Number"><br>
                Email Address:<br>
                <input type="email" name="mail" placeholder="xyz@hotmail.com"><br>
                Permanent Address:<br>
                <input type="text" name="peradd" placeholder="Required." required maxlength="50" size="40"><br>
                <!-- Temporary Address:<br>
                <input type="text" name="tempadd" placeholder="Optional" maxlength="50" size="40"><br> -->
            </fieldset>
            <br>
            <span style="text-align: center;">
                <input type="submit" name="save" value="Submit" >
                <input type="submit" name="cancel" value="Cancel" href="Home%20Page.html">
            </span>
        </form>
        <?php 
            if(isset($_SESSION['message']))
            {
                echo '<script type="text/JavaScript"> 
                alert("You have been registered.");
                </script>';
                $this->session->unset_userdata('message');
                redirect('signin');
            }
        ?>
    </body>
</html>
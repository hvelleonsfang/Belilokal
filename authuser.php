<?php

function generateRandomString($length = 4) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function createId(){
    $rndStr = generateRandomString(7);
    $new_id = "B".$rndStr;
    return $new_id;
}

function checker($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

include("../static/database.php");
$db = new Database();

clearstatcache();

$firstError = $emailError = $passwdError = $confpwError = $phoneError = null;
$userId = $first = $last = $email = $pw = $confpw = $address = $phone = $temp_phone = $date_of_birth = $gender = null;
$able_submit = true;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["saveButton"])) {
        
        #region Primary Checker
        
        // Check First Name
        if (empty($_POST["fname"])) {
            $firstError = "Must not empty";
            $able_submit = false;
        } else {
            $first = checker($_POST["fname"]);
        }
        
        // Check Last Name
        if (empty($_POST["lname"])) {
            $last = "";
        } else {
            $last = checker($_POST["lname"]);
        }
        
        // Check Email Field
        if (empty($_POST["email"])) {
            $emailError = "Require email to login your account";
            $able_submit = false;
        } else {
            $temp_email = checker($_POST["email"]);
            if (!filter_var($temp_email, FILTER_VALIDATE_EMAIL)) {
                $emailError = "Invalid email format";
                $able_submit = false;
            } else {
                $email = $temp_email;
            }
        }
        
        // Check Password
        if (empty($_POST["password"])) {
            $passwdError = "Password needed.";
        } else {
            $pw = checker($_POST["password"]);
            
            // Check Confirmation Password
            if (empty($_POST["confirmedPassword"])) {
                $confpwError = "Confirmation needed";
            } else if ($pw != $_POST["confirmedPassword"]) {
                $confpwError = "Password not match";
                $able_submit = false;
            } else {
                $confpw = hash("sha256", hash("md5", $pw));
            }
        }
        
        // Check Address
        $address = checker($_POST["address"]);
        
        // Check Phone Number
        if (empty($_POST["phoneNumber"])) {
            $phoneError = "Invalid phone number";
            $able_submit = false;
        } else {
            $temp_phone = checker($_POST["phoneNumber"]);
            if (preg_match("/^0/", $temp_phone)) {
                $temp_phone = substr($temp_phone, 1);
            }
            $phone = $_POST["phone"].$temp_phone;
        }
        
        // Insert Birth Date
        $date_of_birth = $_POST["day"]."-".$_POST["month"]."-".$_POST["year"];
        
        // Insert Gender
        $gender = $_POST["gender"];
        
        #endregion
        
        #region Secondary Checker
        
        // Create ID and Check if Exist
        $userId = createId();
        while (true) {
            $alreadyIn = $db -> get("SELECT uid FROM user WHERE uid = '$userId';");
            if (!$alreadyIn) {
                break;
            } else {
                $userId = createId();
            }
        }
        
        // Check if Email already exist
        $emailExist = $db -> get("SELECT email FROM user WHERE email = '$email'");
        if ($emailExist) {
            $emailError = "Email already used";
            $able_submit = false;
        }
        
        #endregion
        
        // Submission
        if ($able_submit){
            $sql = "INSERT INTO user VALUES ('$userId', '$confpw', '$first', '$last', null, STR_TO_DATE('$date_of_birth', '%d-%m-%Y'), $gender, $phone, '$email', FALSE, '$address');";
            $db -> execute($sql);
            setcookie('REGISTERED', "Successfully registered, now you can login.", time() + 3600, "../belilokal.com/");
            echo '<script>window.location = "http://www.belilokal.com/authuserlogin" </script>';
        }
    }
}

?>
<html>
    <head>
        <title>Belilokal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="sy-styles.css"/>
        <link rel="icon" href="Images/favicon.PNG">
        <style>
            #signin {
                display: none;
            }
            .req {
                color: red;
            }
            .hrcolor {
                border-color: darkgray;
            }
            .showhidepass {
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }
            .showhidepass:hover {
                background-color: #212121;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                color: white;
            }
            .adhvacc {
                background-color: #cddeee;
                border-color: #6699cc;
                border-style: solid;
                border-width: 1px;
                padding: 10px;
            }
            select {
                border-style: solid;
                border-width: 1px;
                border-color: #212121;
                outline: none;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }
            h2 {
                font-family: Segoe UI Black, Segoe UI;
                font-size: 50px;
                font-weight: 900;
            }
            input {
                font-size: 15px;
                border-style: solid;
                border-width: 1px;
                border-color: #212121;
                outline: none;
                padding: 4px 6px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }
            .submit-btn {
                font-size: 15px;
                outline: none;
                border-style: solid;
                border-width: 1px;
                border-color: #212121;
                border-radius: 10px;
                padding: 8px;
                width: 400px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }
            .submit-btn:hover {
                font-size: 15px;
                background-color: #212121;
                border-style: solid;
                border-width: 1px;
                border-color: #212121;
                outline: none;
                color: white;
                padding: 8px;
                width: 400px;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }
            .errorBox {
                border-style: solid;
                border-color: red;
                border-width: 1px;
                background-color: #FA8072;
            }
            
            /* Mobile Menu : */
            .mobileDropdown {
                position: relative;
                display: inline-block;
            }
            .mobileDropdown-content {
                display: none;
                position: absolute;
                background-color: #555;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                min-width: 200px;
                padding: 12px 16px;
                z-index: 1;
                top: 60px;
                left: -3px;
            }
            .mobileDropdown:hover .mobileDropdown-content {
                display: block;
            }
            .mobileBtn {
                background-color: transparent;
                font-family: Segoe UI;
                border-style: none;
                color: white;
            }
            .mobileBtn:hover {
                color: black;
            }
            
            /* Error Messages */
            #firstNameError {
                display: none;
            }
            #emailError {
                display: none;
            }
            #pswdError {
                display: none;
            }
            #confPswdError000 {
                display: none;
            }
            #confPswdError001 {
                display: none;
            }
            #phoneNumberError {
                display: none;
            }
        
            /* Navigation */
            .nav-btns {
	            background-color: transparent;
	            color: white;
	            border-style: none;
	            font-family: Segoe UI Symbol;
	            outline: none;
	            font-size: 20px;
            }
            .nav-btns:hover {
	            background-color: transparent;
	            color: gray;
	            border-style: none;
	            font-family: Segoe UI Symbol;
	            outline: none;
            }
            .nav2-btns {
	            background-color: darkgray;
	            color: black;
	            border-style: none;
	            border-radius: 5px;
                padding: 10px;
	            font-family: Segoe UI Symbol;
	            font-weight: normal;
	            outline: none;
            }
            .nav2-btns:hover {
	            background-color: gray;
	            color: black;
	            border-style: none;
	            border-radius: 5px;
                padding: 10px;
	            font-family: Segoe UI Symbol;
	            font-weight: bold;
	            outline: none;
            }
            .nav-btns3 {
	            background-color: transparent;
	            color: white;
	            border-style: none;
	            font-family: Segoe UI Symbol;
	            outline: none;
	            font-size: 15px;
            }
            .nav-btns3:hover {
	            background-color: transparent;
	            color: gray;
	            border-style: none;
	            font-family: Segoe UI Symbol;
	            outline: none;
            }
        
            /* Content Display and Screen Adaptation */
            #mobile {
                display: none;
            }
            #eng {
                display: none;
            }
            @media only screen and (max-width: 500px) {
                .table-padder {
                    padding-left: 5px;
                }   
                #insurance {
                    font-size: 6px;
                }
                #brands {
                    font-size: 6px;
                }
                #delivery {
                    font-size: 6px;
                }
                #recycle {
                    font-size: 6px;
                }
                .nav-btns {
                    font-size: 25px;
                }
                .heading1 {
                    padding-left: 10px;
                }
                .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f9f9f9;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    min-width: 75px;
                    font-size: 7px;
                    padding: 12px 16px;
                    z-index: 1;
                }
                #mobile {
                    display: inline;
                }
                #desktop {
                    display: none;
                }
                .nav-btns3 {
                    font-size: 10px;
                }
                .p-agreement {
                    font-size: 10px;
                }
                .submit-btn {
                    font-size: 15px;
                    outline: none;
                    border-style: solid;
                    border-width: 1px;
                    border-color: #212121;
                    border-radius: 10px;
                    padding: 8px;
                    width: 350px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                }
                .submit-btn:hover {
                    font-size: 15px;
                    background-color: #212121;
                    border-style: solid;
                    border-width: 1px;
                    border-color: #212121;
                    outline: none;
                    color: white;
                    padding: 8px;
                    width: 350px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                }
            }
        </style>
        <script src="translator.js"></script>
        <script src="authuser.js"></script>
    </head>
    <body>
    <div class="uppermost">
        <br/>
            <div id="desktop">
                <table width="100%" border="0">
                    <tr>
                        <td style="width: 1px;padding-left: 130px;"><a href="index"><img src="Images/logoreal.png" width="200px" height="40px"></a></td>
                        <td style="width: 1px;padding-left: 670px;"><button class="nav-btns" onclick="javascript:indexTranslator()"></button></td>
                        <td style="width: 1px;"><button class="nav-btns">🔍</button></td>
                        <td style="width: 1px;"><button class="nav-btns" onclick="javascript:location.href='authuserlogin'">👤</button></td>
                        <td style="width: 1px;"><button class="nav-btns">♥</button></td>
                        <td style="width: 1px;"><button class="nav-btns"></button></td>
                    </tr>
                </table>
            </div>
            <div id="mobile">
                <table width="100%" border="0">
                    <tr>
                        <td style="width: 1px;">
                            <div class="mobileDropdown">
                                <button class="nav-btns" onclick="javascript:mobileMenuKeepOpen()">≡</button>
                                <div class="mobileDropdown-content" id="mobileDropdown-content">
                                    <table>
                                        <tr>
                                            <td><button class="mobileBtn" onclick="javascript:location.href='authuserlogin'">Login/Sign Up</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="mobileBtn">Search Products</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="mobileBtn">Favorite Products</button></td>
                                        </tr>
                                        <tr>
                                            <td><button class="mobileBtn">Shopping Cart</button></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </td>
                        <td style="width: 1px;"><button class="nav-btns" onclick="javascript:indexTranslator()">译</button></td>
                        <td style="width: 1px;"><a href="index"><img src="Images/logoreal.png" width="200px" height="40px"></a></td> 
                    </tr>
                </table>
            </div>
        <br/>
    </div>
    <div id="signup-eng">
        <h2 align="center">Sign Up</h2>
        <p align="center">Please fill the form to create an account.</p>
        <div align="center" class="adhvacc"><b>Already have an account? <a href="authuserlogin.php">Sign In here.</a></b></div>
        <hr width="98%">
        <div id="register" align="center">
            <form id="contactId" name="contactForm" method="POST" action="/authuser">
                <table>
                    <tr>
                        <td>
                            <!-- First Name -->
                            <div><label for="fname"><b>First Name<d class="req">*</d></b></label></div>
                            <div><input type="text" id="fname" name="fname" size="30" placeholder="First Name" value="<?php echo $first;?>" required></div><?php echo $firstError; ?>
                            <!-- Last Name -->
                            <div><label for="lname"><b>Last Name</b></label></div>
                            <div><input type="text" id="lname" name="lname" size="30" placeholder="Last Name" value="<?php echo $last;?>"/></div>
	                        <!-- E-Mail -->
                            <div><label for="email"><b>E-Mail<d class="req">*</d></b></label></div>
	                        <div><input type="email" id="email" name="email" size="30" placeholder="E-Mail" value="<?php echo $email;?>" required></div><?php echo $emailError;?>
	                        <!-- Passwords -->
                            <div><label for="password"><b>Password<d class="req">*</d></b></label></div>
	                        <div>
	                            <input type="password" id="pasuwarudo" name="password" size="30" placeholder="Password" required>
	                            <input type="button" class="showhidepass" value="👁" onclick="formPasswordShowHide()"/>
	                        </div><?php echo $passwdError;?>
                            <div><label for="confirmedPassword"><b>Confirmed Password<d class="req">*</d></b></label></div>
	                        <div><input type="password" id="confirmedPassword" name="confirmedPassword" size="30" placeholder="Confirmed Password" required></div><?php echo $confpwError;?>
                            <hr class="hrcolor">
                            <!-- Address -->
                            <div><label for="address"><b>Home Address</b></label></div>
	                        <div><input type="text" id="address" name="address" size="30" placeholder="Home Address" value="<?php echo $address;?>"></div>
	                        <!-- Phone Number -->
                            <div><label for="phoneNumber"><b>Phone Number</b><d class="req">*</d></label></div>
	                        <div><select id="phone" name="phone"><option value="+62">Indonesia(+62)</option></select><input type="tel" id="phoneNumber" name="phoneNumber" size="16" placeholder="Phone Number" value="<?php echo $temp_phone;?>" required></div><?php echo $phoneError;?>
                            <hr class="hrcolor">
	                        <!-- Date Of Birth -->
	                        <div><label for="day"><b>Date Of Birth</b><d class="req">*</d></label></div>
	                        <select id="day" name="day">
	                            <option value="01">1</option>
	                            <option value="02">2</option>
	                            <option value="03">3</option>
	                            <option value="04">4</option>
	                            <option value="05">5</option>
	                            <option value="06">6</option>
	                            <option value="07">7</option>
	                            <option value="08">8</option>
	                            <option value="09">9</option>
	                            <option value="10">10</option>
	                            <option value="11">11</option>
	                            <option value="12">12</option>
	                            <option value="13">13</option>
	                            <option value="14">14</option>
	                            <option value="15">15</option>
	                            <option value="16">16</option>
	                            <option value="17">17</option>
	                            <option value="18">18</option>
	                            <option value="19">19</option>
	                            <option value="20">20</option>
	                            <option value="21">21</option>
	                            <option value="22">22</option>
	                            <option value="23">23</option>
	                            <option value="24">24</option>
	                            <option value="25">25</option>
	                            <option value="26">26</option>
	                            <option value="27">27</option>
	                            <option value="28">28</option>
	                            <option value="29">29</option>
	                            <option value="30">30</option>
	                            <option value="31">31</option>
	                        </select>
	                        <select id="month" name="month">
	                            <option value="01">January</option>
	                            <option value="02">February</option>
	                            <option value="03">March</option>
	                            <option value="04">April</option>
	                            <option value="05">May</option>
	                            <option value="06">June</option>
	                            <option value="07">July</option>
	                            <option value="08">August</option>
	                            <option value="09">September</option>
	                            <option value="10">October</option>
	                            <option value="11">November</option>
	                            <option value="12">December</option>
	                        </select>
	                        <select id="year" name="year">
	                            <option value="1990">1990</option>
	                            <option value="1991">1991</option>
	                            <option value="1992">1992</option>
	                            <option value="1993">1993</option>
	                            <option value="1994">1994</option>
	                            <option value="1995">1995</option>
	                            <option value="1996">1996</option>
	                            <option value="1997">1997</option>
	                            <option value="1998">1998</option>
	                            <option value="1999">1999</option>
	                            <option value="2000">2000</option>
	                            <option value="2001">2001</option>
	                            <option value="2002">2002</option>
	                        </select>
                            <hr class="hrcolor">
                            <!-- Gender -->
                            <div>
                                <label for="gender"><b>Gender</b><d class="req">*</d></label>
	                            <select id="gender" name="gender">
	                                <option value="1">Male</option>
	                                <option value="2">Female</option>
	                                <option value="3">Other</option>
	                            </select>
	                        </div>
                        </td>
                    </tr>
                </table>
                <p align="center" class="p-agreement">By signing up to Belilokal, you agreed to our <a href="syaratdanketentuan">terms</a> and <a href="ketentuanprivasi">privacy</a>.</p>
                <hr width="98%">
	            <input class="submit-btn" type="submit" id="saveButtonId" name="saveButton" value="Sign Up" onclick=""/>
            </form>
        </div>
        
        <!-- Error Messages Styled :-->
        <div class="errorBox" id="firstNameError">
            <p align="center"><b>( ! ) First name must not be empty!</b></p>
        </div>
        <div class="errorBox" id="emailError">
            <p align="center"><b>( ! ) An email address is required to create an account which will be used to login to your account!</b></p>
        </div>
        <div class="errorBox" id="pswdError">
            <p align="center"><b>( ! ) A password is required for your account's security!</b></p>
        </div>
        <div class="errorBox" id="confPswdError000">
            <p align="center"><b>( ! ) A confirmation password is required to make sure your password is already correct!</b></p>
        </div>
        <div class="errorBox" id="confPswdError001">
            <p align="center"><b>( ! ) Your confirmation password does not match the password!</b></p>
        </div>
        <div class="errorBox" id="phoneNumberError">
            <p align="center"><b>( ! ) Invalid phone number!</b></p>
        </div>
        <br/>
        <div class="bottommost" style="overflow: auto;">
            <br/>
                <nav><!-- nav and ul helps in padding the below elements, do not delete! -->
                    <ul style="list-style: none;">
                        <table width="100%" class="bottommost">
                            <tr>
                                <td>
                                    <p>© BeliLokal │
                                        <button class="nav-btns3" onclick="javascript:location.href='syaratdanketentuan'">Terms & Conditions</button>
                                        <button class="nav-btns3" onclick="javascript:location.href='#'">Privacy Policy</button>
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </ul>
                </nav>
            <br/>
        </div>
    </div>
    </body>
</html>
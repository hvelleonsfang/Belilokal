<!DOCTYPE html>
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
            select {
                border-style: none;
                outline: none;
                color: white;
                box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            }
            .adhvacc {
                background-color: #cddeee;
                border-color: #6699cc;
                border-style: solid;
                border-width: 1px;
                padding: 10px;
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
            #emailFieldError {
                display: none;
            }
            #emailFormatError {
                display: none;
            }
            #pswdFieldError {
                display: none;
            }
            #accError {
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
            #eng1 {
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
        <?php 
        function checker($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        include("../static/database.php");
        $db = new Database();
        
        $emailError = $pwError = $existError = null;
        $email = $pw = null;
        $logged_in = true;
        
        $successRegister = null;
        if (isset($_COOKIE["registered"])) {
            $successRegister = $_COOKIE["registered"];
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["saveButton"])) {
                
                # region Primary Check
                
                if (empty($_POST["email"])) {
                    $emailError = "Field cannot empty";
                    $logged_in = false;
                } else {
                    $temp_email = checker($_POST["email"]);
                    if (!filter_var($temp_email, FILTER_VALIDATE_EMAIL)) {
                        $emailError = "Invalid email format";
                        $logged_in = false;
                    } else {
                        $email = $temp_email;
                        setcookie('USER_EMAIL', $email, time() + (86400 * 30));
                    }
                }
                
                if (empty($_POST["password"])) {
                    $pwError = "Password needed";
                    $logged_in = false;
                } else {
                    $pw = checker($_POST["password"]);
                }
                
                #endregion
                
                #region Secondary Check
                
                $loadData = $db -> get("SELECT * FROM user WHERE email = '$email'");
                if (!$loadData) {
                    $existError = "Invalid email/password, please try again.";
                    $logged_in = false;
                } else {
                    $conf = hash("sha256", hash("md5", $pw));
                    if ($conf != $loadData["password"]) {
                        $existError = "Invalid email/password, please try again.";
                        $logged_in = false;
                    }
                }
                
                #endregion
                
                if ($logged_in) {
                    setcookie('USER_ID', $loadData["uid"], time() + (86400 * 30));
                    setcookie('LOGGED_IN', true, time() + (86400 * 30));
                    echo '<script>window.location = "http://www.belilokal.com/" </script>';
                }
            }
        }
        
        ?>
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
                                            <td><button class="mobileBtn" onclick="javascript:location.href='authuserlogin'">Sign Up/Sign Up</button></td>
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
        <h2 align="center">Sign In</h2>
        <p align="center">Please fill the form to Sign In.</p>
        <div align="center" class="adhvacc"><b>Don't have an account yet? <a href="authuser">Sign Up here.</a></b></div>
    <hr width="98%">
        <div id="login" align="center"><?php echo $successRegister;?>
            <form id="contactId" name="contactForm" method="POST" action="#">
                <table>
                    <tr>
                        <td>
	                        <!-- E-Mail -->
	                        <div><input type="email" id="email" name="email" size="30" placeholder="E-Mail" value="<?php if ($_COOKIE['USER_EMAIL']) echo $_COOKIE['USER_EMAIL']; ?>" required></div>
	                        <!-- Passwords -->
	                        <div><br><?php echo $emailError;?>
	                            <input type="password" id="pasuwarudo" name="password" size="30" placeholder="Password" required>
	                            <input type="button" class="showhidepass" value="👁" onclick="formPasswordShowHide()"/>
	                        </div><br><?php echo $pwError;?><br>
	                        <?php echo $existError;?>
                        </td>
                    </tr>
                </table>
                <hr width="98%">
	            <input class="submit-btn" type="submit" id="saveButtonId" name="saveButton" value="Sign In" onclick="submit_contact_json();"/>
            </form>
        </div>
        <br/>
        <!-- Error Messages -->
        <div class="errorBox" id="emailFieldError">
            <p align="center"><b>Email field must not be empty!</b></p>
        </div>
        <div class="errorBox" id="pswdFieldError">
            <p align="center"><b>Password field must not be empty!</b></p>
        </div>
        <div class="errorBox" id="emailFormatError">
            <p align="center"><b>Invalid Email format!</b></p>
        </div>
        <div class="errorBox" id="accError">
            <p align="center"><b>Invalid Email/Password, please try again!</b></p>
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
    </body>
</html>
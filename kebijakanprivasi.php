<html>
    <head>
        <title>Belilokal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="Images/favicon.PNG">
        <link rel="stylesheet" type="text/css" href="sy-styles.css"/>
        <style>
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
            .p1 {
                padding-left: 40px;
                padding-right: 40px;
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
            }
        </style>
        <script src="translator.js"></script>
    </head>
    <body>
        <div class="uppermost">
        <br/>
            <div id="desktop">
                <table width="100%" border="0">
                    <tr>
                        <td style="width: 1px;padding-left: 130px;"><a href="index"><img src="Images/logoreal.png" width="200px" height="40px"></a></td>
                        <td style="width: 1px;padding-left: 670px;"><button class="nav-btns" onclick=""></button></td>
                        <td style="width: 1px;"><button class="nav-btns">🔍</button></td>
                        <td style="width: 1px;"><button class="nav-btns" onclick="javascript:location.href='authuserlogin'">👤</button></td>
                        <td style="width: 1px;"><button class="nav-btns">♥</button></td>
                        <td style="wdith: 1px;"><button class="nav-btns"></button></td>
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
                        <td style="width: 1px;"><button class="nav-btns" onclick="">译</button></td>
                       <td style="width: 1px;"><a href="index"><img src="Images/logoreal.png" width="200px" height="40px"></a></td> 
                    </tr>
                </table>
            </div>
        <br/>
        </div>
        <h2 align="center">Privacy Policy</h2>
        <p class="p1">1. <b>Personal Information</b></p>
        <p class="p1">It is our responsibility to keep your personal information safe. We do not allow any members of our team and any other users to take a view on the database for it breaks your privacy rights. Every personal information input into the Sign In and Sign Up pages were stored directly into the secure database and your account functions only as a container to save your data(s) such as name, gender, favorite goods, address, profile picture, email, password and etc.</p>
        <p class="p1">Every information stored into the database(SQL) are automatically encrypted, which adds more to the security of the private data(s).</p>
        <div class="bottommost">
            <br/>
                <nav>
            	    <ul style="list-style-type:none;">
            	        <li>
            	            <table width="100%" class="bottommost">
                                <tr>
                                    <td><p>© BeliLokal │<button class="nav-btns3" onclick="javascript:location.href='index'">Return to Homepage</button></td>
                                </tr>
                            </table>
            	        </li>
            	    </ul>
                </nav>
            <br/>
        </div>
    </body>
</html>
<?php
if ($_COOKIE["LOGGED_IN"] && $_COOKIE["USER_ID"]) {
    if (!file_exists(sprintf("Profiles/%s.php", $_COOKIE["USER_ID"]))) {
        copy("profile.php", sprintf("%s.php", $_COOKIE["USER_ID"]));
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Belilokal</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="sy-styles.css"/>
        <link rel="icon" href="Images/favicon.PNG">
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
                        <td style="width: 1px;padding-left: 670px;"><button class="nav-btns" onclick="javascript:indexTranslator()"></button></td>
                        <td style="width: 1px;"><button class="nav-btns">🔍</button></td>
                        <td style="width: 1px;"><button class="nav-btns" onclick=<?php
                        if ($_COOKIE["LOGGED_IN"] && $_COOKIE["USER_ID"]) {
                            // Change Login Link into Profile Detail Link
                            echo sprintf("javascript:location.href='Profiles/%s'", $_COOKIE["USER_ID"]);
                        } else {
                            echo "javascript:location.href='authuserlogin'";
                        } ?> >👤</button></td>
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
        <div id="indo">
            <div style="overflow-x: auto;">
                <table align="center">
                    <tr>
                        <td><button class="nav2-btns">Semua Kategori</button></td>
                        <td><button class="nav2-btns">Muslim Fashion</button></td>
                        <td><button class="nav2-btns">Pakaian Wanita</button></td>
                        <td><button class="nav2-btns">Pakaian Pria</button></td>
                        <td><button class="nav2-btns">Pakaian Anak-anak</button></td>
                        <td><button class="nav2-btns">Go-Green</button></td>
                        <td><button class="nav2-btns">Lainnya</button></td>
                        <td><button class="nav2-btns">Kedatangan Baru</button></td>
                        <td><button class="nav2-btns">Sale</button></td>
                    </tr>
                    <tr>
                        <td><button class="nav2-btns">Sepatu Wanita</button></td>
                        <td><button class="nav2-btns">Sepatu Pria</button></td>
                        <td><button class="nav2-btns">Perlengkapan Rumah</button></td>
                        <td><button class="nav2-btns">Makanan & Minuman</button></td>
                        <td><button class="nav2-btns">Perawatan & Kecantikan</button></td>
                        <td><button class="nav2-btns">Mainan</button></td>
                        <td><button class="nav2-btns">Kesehatan</button></td>
                        <td><button class="nav2-btns">Stock Terakhir</button></td>
                    </tr>
                </table>
            </div>
            <hr width="98%">
            <table align="center">
                <tr>
                    <td class="table-padder">
                        <div class="dropdown" id="insurance">
                             Garansi 30 Hari Pengembalian
                            <div class="dropdown-content">Belanja tanpa khawatir dengan garansi 30 hari pengembalian untuk semua produk.</div>
                        </div>
                    </td>
                    <td class="table-padder">
                        <div class="dropdown" id="brands">
                             Berbagai Brand
                            <div class="dropdown-content">Kami memiliki banyak brand produk-produk asli dari Indonesia.</div>
                        </div>
                    </td>
                    <td class="table-padder">
                        <div class="dropdown" id="delivery">
                            ⛟ Delivery Min. IDR.399,000
                            <div class="dropdown-content">Belanja hingga IDR.390,000 total harga berbagai produk-produk untuk free delivery.</div>
                        </div>
                    </td>
                    <td class="table-padder">
                        <div class="dropdown" id="recycle">
                            ♻ Peduli Terhadap Lingkungan
                            <div class="dropdown-content">Kami peduli terhadap lingkungan sekitar kami, kami mencegah pengunaan plastik, dan kami memiliki produk-produk go green yang dijual untuk mendukung kampanye ini.</div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div id="eng">
            <div style="overflow-x: auto;">
                <table align="center">
                    <tr>
                        <td><button class="nav2-btns">All Categories</button></td>
                        <td><button class="nav2-btns">Muslim Fashion</button></td>
                        <td><button class="nav2-btns">Women's Wear</button></td>
                        <td><button class="nav2-btns">Men's Wear</button></td>
                        <td><button class="nav2-btns">Kid's Wear</button></td>
                        <td><button class="nav2-btns">Go-Green</button></td>
                        <td><button class="nav2-btns">Other</button></td>
                        <td><button class="nav2-btns">New Arrivals</button></td>
                        <td><button class="nav2-btns">Sale</button></td>
                    </tr>
                    <tr>
                        <td><button class="nav2-btns">Women's Shoes</button></td>
                        <td><button class="nav2-btns">Men's Shoes</button></td>
                        <td><button class="nav2-btns">Furnitures</button></td>
                        <td><button class="nav2-btns">Food & Drinks</button></td>
                        <td><button class="nav2-btns">Beauty</button></td>
                        <td><button class="nav2-btns">Toys</button></td>
                        <td><button class="nav2-btns">Health</button></td>
                        <td><button class="nav2-btns">Last Stock</button></td>
                    </tr>
                </table>
            </div>
            <hr width="98%">
            <table align="center">
                <tr>
                    <td class="table-padder">
                        <div class="dropdown" id="insurance">
                             30 Day Returns
                            <div class="dropdown-content">Shop without concerns with 30 day returns for all products.</div>
                        </div>
                    </td>
                    <td class="table-padder">
                        <div class="dropdown" id="brands">
                             Various Brands
                            <div class="dropdown-content">We have many different brands of products originally from Indonesia.</div>
                        </div>
                    </td>
                    <td class="table-padder">
                        <div class="dropdown" id="delivery">
                            ⛟ Free Delivery Min. IDR.399,000
                            <div class="dropdown-content">Order up to IDR.390,000 total price of any products for free delivery.</div>
                        </div>
                    </td>
                    <td class="table-padder">
                        <div class="dropdown" id="recycle">
                            ♻ Care for the nature
                            <div class="dropdown-content"><p>We care for our environment, we prevent usage of plastic, and we have go green products sold to support this campaign.</p></div>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <br/>
        <div class="slideshow-container">
            <div class="mySlides fade">
                <div class="numbertext">1 / 4</div>
                <img src="Images/banner-placeholder.png" style="width:100%">
                <div class="text">Caption One</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">2 / 4</div>
                <img src="Images/banner-placeholder.png" style="width:100%">
                <div class="text">Caption Two</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">3 / 4</div>
                <img src="Images/banner-placeholder.png" style="width:100%">
                <div class="text">Caption Three</div>
            </div>

            <div class="mySlides fade">
                <div class="numbertext">4 / 4</div>
                <img src="Images/banner-placeholder.png" style="width:100%">
                <div class="text">Caption Four</div>
            </div>
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
        </div>
        <div id="indo1">
            <hr width="98%">
            <h2 align="center">Tentang BeliLokal</h2>
            <p class="p-padder" align="center">BeliLokal adalah sebuah pusat belanja online yang dikhususkan kepada merek dan produk lokal dengan bertujuan masyarakat Indonesia dapat lebih mengenal dan mengetahui bahwa merek lokal dari Indonesia pun bagus dan menarik. Dengan adanya kami, anda akan jauh lebih mudah dalam berbelanja.</p>
            <br/>
            <div class="bottommost">
                <br/>
                    <nav><!-- nav and ul helps in padding the below elements, do not delete! -->
                        <ul style="list-style: none;">
                            <table width="100%" class="bottommost">
                                <tr>
                                    <td>
                                        <p>© BeliLokal │
                                            <button class="nav-btns3" onclick="javascript:location.href='syaratdanketentuan'">Syarat & Ketentuan</button>
                                            <button class="nav-btns3" onclick="javascript:location.href='kebijakanprivasi.html'">Kebijakan Privasi</button>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </ul>
                    </nav>
                <br/>
            </div>
        </div>
        <div id="eng1">
            <hr width="98%">
            <h2 align="center">About BeliLokal</h2>
            <p class="p-padder" align="center">BeliLokal is an online shopping center that is concentrated to local brands and products with the aim of getting Indonesian people to know that local brands from Indonesia are great and interesting. We exist to simplify your shopping.</p>
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
                                            <button class="nav-btns3" onclick="javascript:location.href='kebijakanprivasi.html'">Privacy Policy</button>
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </ul>
                    </nav>
                <br/>
            </div>
        </div>
        <script src="slideshow.js"></script>
    </body>
</html>
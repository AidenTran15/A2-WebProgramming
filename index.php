<?php
$pageTitle = "Home Page";
require_once('tools.php');
require_once('header.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo $pageTitle; ?>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="main.css">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500&family=Raleway:wght@500&display=swap"
        rel="stylesheet">


    <script src="booking-page.js" defer></script>

</head>

<body>

    <nav>
        <a href="#about-us">About Us</a>
        <a href="#who-we-are">Who We Are</a>
        <a href="#service-area">Service Area</a>
        <a href="booking-page.php">Book Now</a>
        <a href="administration.php">Administration</a>
    </nav>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="./assets/Carousel-1.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./assets/Carousel-2.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./assets/Carousel-3.jpg" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./assets/Carousel-4.jpg" alt="Fourth slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./assets/Carousel-5.jpg" alt="Fifth slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container">
        <section id="about-us">
            <div class="content-wrapper">
                <div class="header-wrapper">
                    <span class="decorative-icon">&#x2756;</span> <!-- You can replace this with any icon you prefer -->
                    <h2>About Us</h2>
                </div>
                <div class="text-content">
                    <p>
                        Russel Street Medical opened in 2020 and is located in Melbourne’s CBD at 427 Swanston Street
                        Melbourne 3000, just opposite RMIT University Building 10 and within walking distance of
                        Melbourne central station.
                    </p>
                    <p>
                        We strive to help all our patients with a focus on preventative health care, a view to managing
                        chronic health conditions with a holistic approach, and with access to a wide range of
                        specialist care providers when needed.
                    </p>
                    <p>
                        RMIT students and staff receive discounts through partnership programs.
                    </p>
                </div>
            </div>
        </section>


        <style>
            table {
                border-collapse: collapse;
                width: 80%;
                margin: 20px auto;
                font-family: Arial, sans-serif;
                box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.15);
            }

            /* Header styles */
            thead {
                background-color: #2c3e50;
                color: white;
            }

            th,
            td {
                padding: 10px 20px;
                text-align: left;
            }

            th {
                border-bottom: 2px solid #34495e;
            }

            tbody tr:nth-child(odd) {
                /* alternating row colors */
                background-color: #f2f2f2;
            }

            tbody tr:hover {
                /* highlight on hover */
                background-color: #f5d6d6;
                cursor: pointer;
            }
        </style>
        </head>

        <body>
            <table>
                <thead>
                    <tr>
                        <th>Consultation</th>
                        <th>Normal Fee</th>
                        <th>RMIT Member Fee</th>
                        <th>Medicare Rebate</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Standard</td>
                        <td>$80.00</td>
                        <td>$60.00</td>
                        <td>$40.00</td>
                    </tr>
                    <tr>
                        <td>Long or Complex</td>
                        <td>$125.00</td>
                        <td>$95.00</td>
                        <td>$75.00</td>
                    </tr>
                </tbody>
            </table>


            <br><br><br><br>

            <!-- Who We Are -->
            <section id="who-we-are">
                <div class="section-header">
                    <h2>Our Team</h2>
                </div>
                <div class="profile-container">
                    <div class="profile">
                        <div class="image-wrapper">
                            <img src="assets/DrStephenHill.png" alt="Dr. Stephen Hill" class="profile-image">
                        </div>
                        <h3>Dr. Stephen Hill</h3>
                        <p>Stephen Hill graduated from Auckland University in New Zealand in 2014 and obtained his
                            Fellowship
                            from the Royal Australian College of General Practitioners in 2017.
                            Over his training and practice, Stephen worked in internal medicine at the Royal Children's
                            Hospital
                            Melbourne before transitioning to General Practice.</p>
                    </div>
                    <div class="profile">
                        <div class="image-wrapper">
                            <img src="assets/MsKiyokoTsu.png" alt="Ms Kiyoko Tsu" class="profile-image">
                        </div>
                        <h3>Ms Kiyoko Tsu</h3>
                        <p>Kiyoko Tsu completed her Bachelor of Nursing at the Yong Loo Lin School of Medicine in
                            Singapore
                            in
                            2019.
                            She is an accredited Nurse Immunizer and has worked in various hospitals within metropolitan
                            Melbourne.
                        </p>
                    </div>
                </div>
            </section>










            <!-- Service Area -->
            <section id="service-area">
                <div class="content-wrapper">
                    <h2>Service Area</h2>
                    <p>You are welcome to register at our clinic if you are a new patient. Click here to book an
                        appointment in our clinic for existing patients <a href="booking-page.php"
                            class="booking-link">Book here</a></p>
                </div>
            </section>

    </main>

    <footer>
        <p>Contact details</p>
        <p>Tuan Kiet Tran | s3827472</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        crossorigin="anonymous"></script>
</body>

</html>
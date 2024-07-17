<?php
include 'conection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        /* Style for the form container */
        .form-container {
            background-color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        /* Style for the form elements */
        .form-container input[type="text"],
        .form-container button {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style for the table container */
        .table-container {
            margin-top: 20px;
        }

        /* Style for the table */
        .Table {
            width: 100%;
            border-collapse: collapse;
        }

        .Table th,
        .Table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .Table th {
            background-color: #f2f2f2;
        }

        /* Style for the error message */
        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find a Room</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/findroom.css">
    <link rel="stylesheet" href="../assets/css/styles.css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon.ico">
</head>

<body>
    <!-- Navigation Bar -->
    <header class="header" id="header">
        <nav class="nav container">
            <b><a href="index.html" class="nav__logo">RoomieLink</a></b>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="../index.html"
                            class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">Home</a>
                    </li>
                    <li class="nav__item">
                        <a href="../index.html#about"
                            class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">About</a>
                    </li>
                    <li class="nav__item">
                        <a href="listroom.php"
                            class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">Add
                            Rooms</a>
                    </li>
                    <li class="nav__item">
                        <a href=""
                            class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">Find
                            a Room</a>
                    </li>
                </ul>
            </div>
            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-grid-alt'></i>
            </div>
            <a href="login.php"
                class="button button__header focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Sign
                in</a>
        </nav>
    </header>

    <!-- Banner Section -->
    <section class="bannery">
        <div class="content">
            <div class="title">Find A Room</div>
            <div class="top-subtitle subtitle">Discover Your Sanctuary: Welcome to My Cozy Room!</div>
        </div>
    </section>

    <!-- Search Form -->
    <div class="session">
        <div class="left">
            <img src="roomfind.png" alt="img">
        </div>
        <form method="post" class="log-in" autocomplete="off">
            <h4>The RoomieLink</h4>
            <p>Find Your Ideal Room, Your Way!</p>

            <!-- Location input -->
            <div class="floating-label">
                <input placeholder="Location of room/flat" type="text" name="Area" id="Area" autocomplete="off" >
                <label for="Area"></label>
                <div class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                     <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                  </svg>
               </div>
            </div>

             <!-- capacity Input -->
             <div class="floating-label">
                <input placeholder="capacity" type="number" name="capacity" id="capacity" autocomplete="off" >
                <label for="capacity"></label>
                <div class="icon">
                 <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                 <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                 </svg>
                </div>
            </div>

              <!-- Rent input -->
              <div class="floating-label">
                <input placeholder="Per head rent, please" type="number" name="rent" id="rent" autocomplete="off" >
                <label for="rent"></label>
                <div class="icon">
                   <?xml version="1.0" encoding="UTF-8"?>
                   <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                   <path d="M0 64C0 46.3 14.3 32 32 32H96h16H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H231.8c9.6 14.4 16.7 30.6 20.7 48H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H252.4c-13.2 58.3-61.9 103.2-122.2 110.9L274.6 422c14.4 10.3 17.7 30.3 7.4 44.6s-30.3 17.7-44.6 7.4L13.4 314C2.1 306-2.7 291.5 1.5 278.2S18.1 256 32 256h80c32.8 0 61-19.7 73.3-48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H185.3C173 115.7 144.8 96 112 96H96 32C14.3 96 0 81.7 0 64z"/>
                   </svg>
                </div>
             </div>

            
            <div class="gender">
                <label for="gender"><span id="gen"></span></label>
                <select id="gender" name="gender" class="form-select" aria-label="Default select example" >
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Any">Any</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <br>

            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" id="AC" name="Facilities[]" value="AC"
                        aria-label="Checkbox for following text input">
                </div>
                <label for="AC">Air Conditioning</label>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" id="cupboard" name="Facilities[]" value="cupboard"
                        aria-label="Checkbox for following text input">
                </div>
                <label for="cupboard">Cupboard</label> <!-- Change "cupboard" to "Cupboard" here -->
            </div>

            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" id="fridge" name="Facilities[]" value="fridge"
                        aria-label="Checkbox for following text input">
                </div>
                <label for="fridge">Fridge</label>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" id="washing" name="Facilities[]" value="washing"
                        aria-label="Checkbox for following text input">
                </div>
                <label for="washing">Washing Machine</label>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" id="geyser" name="Facilities[]" value="geyser"
                        aria-label="Checkbox for following text input">
                </div>
                <label for="geyser">Geyser</label>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" id="parking" name="Facilities[]" value="parking"
                        aria-label="Checkbox for following text input">
                </div>
                <label for="parking">Parking</label>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-text">
                    <input class="form-check-input mt-0" type="checkbox" id="security" name="Facilities[]" value="security"
                        aria-label="Checkbox for following text input">
                </div>
                <label for="security">Security System</label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="button focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                name="Send">Show Rooms</button>
        </form>
    </div>

    <!-- Search Results -->
    <div class="container my-5">
        <table class="Table">
        <?php
if (isset($_POST['Send'])) {
    include 'conection.php';

    $Area = isset($_POST['Area']) ? $_POST['Area'] : null;
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $Facilities = isset($_POST['Facilities']) ? $_POST['Facilities'] : array();

    // Construct the SQL query with proper conditions
    $sql = "SELECT * FROM rooms WHERE 1=1"; // Always true condition to start the query

    // Check if an Area value is provided by the user
    if (!empty($Area)) {
        $sql .= " AND Area = '$Area'";
    }

    // Check if a gender value is provided by the user
    if (!empty($gender)) {
        $sql .= " AND PreferredGender = '$gender'";
    }

    // Check if a capacity value is provided by the user
    if (isset($_POST['capacity']) && !empty($_POST['capacity'])) {
        $capacity = intval($_POST['capacity']);
        $sql .= " AND Capacity = $capacity";
    }

    // Check if a Rent value is provided by the user
    if (isset($_POST['rent']) && !empty($_POST['rent'])) {
        $rent = intval($_POST['rent']);
        $sql .= " AND Rent = $rent";
    }

    // Check if any facilities were selected
    if (!empty($Facilities)) {
        $facilityConditions = array();
        foreach ($Facilities as $facility) {
            // Modify the query to search for facilities within the Facilities column
            $facilityConditions[] = "Facilities LIKE '%$facility%'";
        }
        $facilitiesCondition = implode(' AND ', $facilityConditions);
        $sql .= " AND ($facilitiesCondition)";
    }

    $result = mysqli_query($mysqli, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            echo '<script>alert("Data is Displaying! Please Check below");</script>';
            echo '<table class="Table">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Rent</th>
                            <th>Contact</th>
                            <th>Email</th>
                            <th>Capacity</th>
                            <th>Gender</th>
                            <th>Facilities</th>
                        </tr>
                    </thead>';

            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                        <td>' . $row['Area'] . '</td>
                        <td>' . $row['Rent'] . '</td>
                        <td>' . $row['Contact'] . '</td>
                        <td>' . $row['Email'] . '</td>
                        <td>' . $row['Capacity'] . '</td>
                        <td>' . $row['PreferredGender'] . '</td>
                        <td>' . $row['Facilities'] . '</td>
                    </tr>';
            }

            echo '</table>';
        } else {
            echo '<script>alert("Data not Found");</script>';
            // You can display a message here if no data is found
        }
    } else {
        echo 'Error executing query: ' . mysqli_error($mysqli);
    }
}
?>


        </table>
    </div>

<!-- footer -->
    <div class="footer-dark" style="font-family: Inter;">
         <footer>
            <div class="bscontainer">
               <div class="bsrow">
                  <div class="bscol-md-2 item">
                     <h3>Pages</h3>
                     <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="pages/map.html">RoomieLink</a></li> 
                        <li><a href="pages/login.html">Login</a></li>
                        <!-- <li><a href="pages/book.html">Book Hotel</a></li> -->
                     </ul>
                  </div>
                  <div class="bscol-md-2 item" style="width: 50px;">
                     <h3>Know More</h3>
                     <ul>
                        <li><a href="pages/membership.html">Membership</a></li>
                        <li><a href="pages/team.html">Our Team</a></li>
                        <!-- <li><a href="pages/news.html">News</a></li> -->
                     </ul>
                  </div>
                  <div class="bscol-md-2 item">
                     <h3</h3>
                     <ul>
                        <!-- <li><a href="#">Privacy Policy</a></li> -->
                        <!-- <li><a href="#">Terms of Service</a></li> -->
                     </ul>
                  </div>
                  <div class="bscol-md-6 item text">
                     <h3>RoomieLink</h3>
                     <p>Join us on a journey to stay connected, stay informed, and stay ahead. Explore our services today and experience the power of modern connectivity with Romielink</p>

                     <!-- <p>Over the last 25 years, the Glory Hotels organisation has been known for dependably providing the best Indian hospitality experience with more than 50 hotels and resorts worldwide.</p> -->
                  </div>
                  <div class="social_links">
                     <a href="https://www.instagram.com/">
                     <span class="fa-stack fa-lg ig combo">
                        <i class="fa fa-circle fa-stack-2x circle"></i>
                        <i class="fa fa-instagram fa-stack-1x fa-inverse icon"></i>
                     </span>
                     </a>
                     <a href="https://www.facebook.com/">
                     <span class="fa-stack fa-lg fb combo">
                        <i class="fa fa-circle fa-stack-2x circle"></i>
                        <i class="fa fa-facebook fa-stack-1x fa-inverse icon"></i>
                     </span>
                     </a>
                     <a href="https://www.youtube.com/">
                     <span class="fa-stack fa-lg yt combo">
                        <i class="fa fa-circle fa-stack-2x circle"></i>
                        <i class="fa fa-youtube-play fa-stack-1x fa-inverse icon"></i>
                     </span>
                     </a>
                     <a href="https://www.twitter.com/">
                     <span class="fa-stack fa-lg tw combo">
                        <i class="fa fa-circle fa-stack-2x circle"></i>
                        <i class="fa fa-twitter fa-stack-1x fa-inverse icon"></i>
                     </span>
                     </a>
                     <a href="https://codepen.io">
                     <span class="fa-stack fa-lg gt combo">
                        <i class="fa fa-circle fa-stack-2x circle"></i>
                        <i class="fa fa-codepen fa-stack-1x fa-inverse icon"></i>
                     </span>
                     </a>
                     <a href="https://www.linkedin.com/">
                     <span class="fa-stack fa-lg tw combo">
                        <i class="fa fa-circle fa-stack-2x circle"></i>
                        <i class="fa fa-linkedin fa-stack-1x fa-inverse icon"></i>
                     </span>
                     </a>
                  </div>
               </div>
               <p class="copyright">The RoomieLink © 2023</p>
            </div>
         </footer>
      </div>

    <!-- JS -->
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

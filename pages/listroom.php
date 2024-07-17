
<?php
// Start a session to check user authentication
session_start();

// Check if the user is not authenticated (not signed in)
if (!isset($_SESSION['email'])) {
    // Redirect the user to the sign-in page
    header("Location: login.php");
    exit(); // Make sure to exit after the redirection
}

// If the user is authenticated, you can continue displaying the content of the "listroom.php" page
?>

<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "roommatefinder";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$area = "";
$rent = "";
$capacity = "";
$Contact = "";
$Email = "";

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $area = $_POST['area'];
    $rent = $_POST['rent'];
    $capacity = $_POST['capacity'];
    $profession = $_POST['profession'];
    $gender = $_POST['gender'];
    $Contact = $_POST['Contact'];
    $Email = $_POST['Email'];

    $facilities = [];

    if (isset($_POST['AC'])) {
        $facilities[] = 'AC';
    }
    if (isset($_POST['cupboard'])) {
        $facilities[] = 'cupboard';
    }
    if (isset($_POST['fridge'])) {
        $facilities[] = 'fridge';
    }
    if (isset($_POST['washing'])) {
        $facilities[] = 'washing';
    }
    if (isset($_POST['geyser'])) {
        $facilities[] = 'geyser';
    }
    if (isset($_POST['parking'])) {
        $facilities[] = 'parking';
    }
    if (isset($_POST['security'])) {
        $facilities[] = 'security';
    }

    $facilitiesString = implode(', ', $facilities);

    // Insert into the `rooms` table
    $sql = "INSERT INTO `rooms` (`RoomID`, `UserID`, `Area`, `Rent`, `Capacity`, `profession`, `Contact`, `Email`, `PreferredGender`, `facilities`) VALUES (NULL, NULL, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Use bind_param with 10 "s" placeholders to match the 10 values you're inserting 
    $stmt->bind_param('ssssssss', $area, $rent, $capacity, $profession, $Contact, $Email, $gender, $facilitiesString);

    if ($stmt->execute()) {
        echo '<script>alert("Your Room has listed successfully!");</script>';
        header("Location: ../index.html"); 
        exit; 

    } else {
        echo '<p>Error inserting into rooms: ' . $mysqli->error . '</p>';
    }

    $stmt->close();
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
      
      <!-- bootstrp -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">

      <!-- Icons -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

      <!-- CSS -->
      <link rel="stylesheet" href="../assets/css/listroom.css">
      <link rel="stylesheet" href="../assets/css/styles.css">

      <!-- Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

      <!-- Tailwind CDN -->
      <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

      <!-- Favicon -->
      <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon.ico">
      <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicon.ico">

           <!-- Title -->
      <title>RoomieLink| Sign In</title>
   </head>
   <body>
      <!-- Navigation Bar -->
      <header class="header" id="header" style="font-family: 'Inter'; background: rgb(255, 255, 255);">
         <nav class="nav container">
            <b><a href="index.html" class="nav__logo" style="font-family: 'Product Sans Bold'; letter-spacing: -.5px; font-size: 1.5rem;">RoomieLink </a></b>
            <div class="nav__menu" id="nav-menu">
               <ul class="nav__list">
                  <li class="nav__item">
                     <a href="../index.html" class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">Home</a> 
                  </li>
                  <li class="nav__item">
                     <a href="../index.html#about" class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">About</a> 
                  </li>
                  <li class="nav__item">
                     <a href="listroom.php" class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">Add Rooms </a>
                  </li>
                  <li class="nav__item">
                     <a href="findroom.php" class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">Find a Room</a>
                  </li>
                  <!-- <li class="nav__item">
                     <a href="" class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">Find a Room</a>
                  </li> -->
               </ul>
            </div>
            <div class="nav__toggle" id="nav-toggle">
               <i class='bx bx-grid-alt'></i>
            </div>
            <a href="login.php" class="button button__header focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Sign in</a>
         </nav>
      </header>

      <!-- Banner Section -->
      <section class="bannerx" style="height: 85vh;">
         <div class="content">
            <div class="title">List a Room</div>
            <div class="top-subtitle subtitle">List Your Room, Welcome New Beginnings!</div>
         </div>
      </section>

      <!-- registration -->
      <div class="session">
         <div class="left">
 
            <img src="roolistttt.jpg" alt="img">
         </div>

         <form method="post" action="listroom.php" class="log-in" autocomplete="off">
            <h4>The <span>RoomieLink</span></h4>
            <p>Your Room, Your Rules – List It Today!</p>

            <!-- location input -->
            <div class="floating-label">
               <input placeholder="location of room/flat" type="text" name="area" id="area" autocomplete="off" required>
               <label for="area"></label>
               <div class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                     <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
                  </svg>
               </div>
            </div>

            <!-- Rent input -->
            <div class="floating-label">
                <input placeholder="Per head rent, please" type="number" name="rent" id="rent" autocomplete="off" required>
                <label for="rent"></label>
                <div class="icon">
                   <?xml version="1.0" encoding="UTF-8"?>
                   <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                   <path d="M0 64C0 46.3 14.3 32 32 32H96h16H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H231.8c9.6 14.4 16.7 30.6 20.7 48H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H252.4c-13.2 58.3-61.9 103.2-122.2 110.9L274.6 422c14.4 10.3 17.7 30.3 7.4 44.6s-30.3 17.7-44.6 7.4L13.4 314C2.1 306-2.7 291.5 1.5 278.2S18.1 256 32 256h80c32.8 0 61-19.7 73.3-48H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H185.3C173 115.7 144.8 96 112 96H96 32C14.3 96 0 81.7 0 64z"/>
                   </svg>
                </div>
             </div>


            <div class="floating-label">
                <input placeholder="capacity" type="number" name="capacity" id="capacity" autocomplete="off" required>
                <label for="capacity"></label>
                <div class="icon">
                 <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                 <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z"/>
                 </svg>
                </div>
            </div>


            <!-- Profession Input -->
            <div class="floating-label">
                <input placeholder="Profession" type="text" name="profession" id="profession" autocomplete="off" required>
                <label for="profession"></label>
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M184 48H328c4.4 0 8 3.6 8 8V96H176V56c0-4.4 3.6-8 8-8zm-56 8V96H64C28.7 96 0 124.7 0 160v96H192 320 512V160c0-35.3-28.7-64-64-64H384V56c0-30.9-25.1-56-56-56H184c-30.9 0-56 25.1-56 56zM512 288H320v32c0 17.7-14.3 32-32 32H224c-17.7 0-32-14.3-32-32V288H0V416c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V288z"/>
                    </svg>
                </div>
            </div>

                <!-- Contact input -->
                <div class="floating-label">
                <input placeholder="Contact" type="number" name="Contact" id="Contact" autocomplete="off" required>
                <label for="Contact"></label>
                <div class="icon">
                <?xml version="1.0" encoding="UTF-8"?>
                   <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 24 24"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                   <path d="M12 0C5.372 0 0 5.372 0 12s5.372 12 12 12 12-5.372 12-12S18.628 0 12 0zm0 22c-5.096 0-9.623-3.228-11.28-8.045.396-.705.903-1.317 1.52-1.82L20.755 22H12z"/>
                   </svg>
                </div>
             </div>

              <!-- email input -->
            <div class="floating-label">
                <input placeholder="Email" type="Email" name="Email" id="Email" autocomplete="off" required>
                <label for="Email"></label>
                <div class="icon">
                   <?xml version="1.0" encoding="UTF-8"?>
                  
                   <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/>
                   </svg>
                </div>
             </div>

            
            
            <div class="gender">
                
            <label for="gender" id="gender"><span id="gen"></span></label>
            <select id="gender" name="gender" class="form-select" aria-label="Default select example" required>
                <!-- <option >--Preferred Gender--</option> -->
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Any">Any</option>
                <option value="Other">Other</option>
            </select>

            </div><br>

            <div class="input-group mb-3">

               <div class="input-group-text">
                  <input class="form-check-input mt-0" type="checkbox" id="AC" name="AC"  aria-label="Checkbox for following text input">
               </div><label for="AC">AirConditioning</label>
            </div>
            <div class="input-group mb-3">
               <div class="input-group-text">
                  <input class="form-check-input mt-0" type="checkbox" id="cupboard" name="cupboard"  aria-label="Checkbox for following text input">
               </div><label for="cupboard">Cupboard</label>
            </div>
            <div class="input-group mb-3">
               <div class="input-group-text">
                  <input class="form-check-input mt-0" type="checkbox" id="fridge" name="fridge"  aria-label="Checkbox for following text input">
               </div><label for="fridge">Fridge</label>
            </div>

            <div class="input-group mb-3">
               <div class="input-group-text">
                  <input class="form-check-input mt-0" type="checkbox" id="washing" name="washing"  aria-label="Checkbox for following text input">
               </div><label for="washing">WashingMachine</label>
            </div>

            <div class="input-group mb-3">
               <div class="input-group-text">
                  <input class="form-check-input mt-0" type="checkbox" id="geyser" name="geyser"  aria-label="Checkbox for following text input">
               </div><label for="geyser">Geyser	</label>
            </div>

            <div class="input-group mb-3">
               <div class="input-group-text">
                  <input class="form-check-input mt-0" type="checkbox" id="parking" name="parking" aria-label="Checkbox for following text input">
               </div><label for="">Parking</label>
            </div>

            <div class="input-group mb-3">
               <div class="input-group-text">
                  <input class="form-check-input mt-0" type="checkbox" id="security" name="security"  aria-label="Checkbox for following text input">
               </div><label for="security">SecuritySystem</label>
            </div>

            <br>
            <button type="submit"  style="margin-left:auto;" class="button focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Create Room</button>
            <!-- <a href="login.html" class="discrete" target="_blank">Already have an account? Login</a> -->
          </form>
        </div> 


      <!-- Footer -->
      <div class="footer-dark" style="font-family: Inter;">
        <footer>
           <div class="bscontainer">
              <div class="bsrow">
                 <div class="bscol-md-2 item">
                    <h3>Pages</h3>
                    <ul>
                       <li><a href="../index.html">Home</a></li>
                       <li><a href="login.php">Login</a></li>

                    </ul>
                 </div>
                 <div class="bscol-md-2 item">
                    <h3>Know More</h3>
                    <ul>
                       <li><a href="membership.html">Membership</a></li>
                       <li><a href="team.html">Our Team</a></li>
                       <li><a href="news.html">News</a></li>
                    </ul>
                 </div>
                 <div class="bscol-md-2 item">
                    <h3>Other Details</h3>
                    <ul>
                       <li><a href="#">Privacy Policy</a></li>
                       <li><a href="#">Terms of Service</a></li>
                    </ul>
                 </div>
                 <div class="bscol-md-6 item text">
                    <!-- <h3>RoomieLink</h3> -->

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
              <p class="copyright">RoomieLink © 2023</p>
           </div>
        </footer>
     </div>
     
     <!-- JS -->
     <script src="../assets/js/main.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html> 


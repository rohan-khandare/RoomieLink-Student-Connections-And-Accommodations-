<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "roommatefinder";

// Connection to the database
$conn = mysqli_connect($servername, $username, $password, $database);

// Variables to store data to be inserted into tables
$username = "";
$email = "";
$password = "";
$age = "";
$profession = "";
$gender = "";

$errors = []; // Create an array to store validation errors

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize user inputs
    $username = sanitizeInput($_POST['username']);
    $email = sanitizeInput($_POST['email']);
    $password = sanitizeInput($_POST['password']);
    $age = sanitizeInput($_POST['age']);
    $profession = sanitizeInput($_POST['profession']);
    $gender = sanitizeInput($_POST['gender']);

    // Validation checks
    if (empty($username)) {
        $errors[] = "Username is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8 || !preg_match("/[A-Za-z].*[0-9]|[0-9].*[A-Za-z]/", $password)) {
        $errors[] = "Password must be at least 8 characters long and contain both letters and numbers.";
    }

    if (empty($age)) {
        $errors[] = "Age is required.";
    } elseif (!is_numeric($age) || $age <= 0) {
        $errors[] = "Age must be a positive number.";
    }

    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    if (empty($profession)) {
        $errors[] = "Profession is required.";
    }

    // If there are no validation errors, insert data into the database
    if (empty($errors)) {
        $hashedPassword = $password;

        $sql = "INSERT INTO `users` (`UserID`, `Name`, `Email`, `Password`, `Age`, `Gender`, `Profession`) VALUES (NULL, '$username', '$email', '$hashedPassword', '$age', '$gender', '$profession')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Display a JavaScript alert
            echo '<script>alert("Registered successfully!");</script>';
        } else {
            // Display a JavaScript alert with the error message
            echo '<script>alert("Error: ' . mysqli_error($conn) . '");</script>';
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            // Display a JavaScript alert for each error
            echo '<script>alert("' . $error . '");</script>';
        }
    }
}

// Function to sanitize user inputs
function sanitizeInput($input)
{
    return htmlspecialchars(stripslashes(trim($input)));
}
?>




<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

      <!-- Icons -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

      <!-- CSS -->
      <!-- <link rel="stylesheet" href="../assets/css/registration.css"> -->
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
            <b><a href="../index.html" class="nav__logo" style="font-family: 'Product Sans Bold'; letter-spacing: -.5px; font-size: 1.5rem;">RoomieLink </a></b>
            <div class="nav__menu" id="nav-menu">
               <ul class="nav__list">
                  <li class="nav__item">
                     <a href="../index.html" class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">Home</a> 
                  </li>
                  <li class="nav__item">
                     <a href="../index.html#about" class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">About</a> 
                  </li>
                  <li class="nav__item">
                     <a href="listroom.php" class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">Add Rooms</a>
                  </li>
                  <li class="nav__item">
                     <a href="findroom.php" class="nav__link font-medium leading-6 text-black-600 transition duration-150 ease-out hover:text-gray-600">Find a Room</a>
                  </li>
               </ul>
            </div>
            <div class="nav__toggle" id="nav-toggle">
               <i class='bx bx-grid-alt'></i>
            </div>
            <a href="login.php" class="button button__header focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Sign in</a>
         </nav>
      </header>
       
      <!-- Banner Section -->
      <section class="banner" style="height: 85vh;">
         <div class="content">
            <div class="title">Sign Up</div>
            <div class="top-subtitle subtitle">RoomieLink</div>
         </div>
      </section>
      
      <!-- registration -->
      <div class="session">
         <div class="left">
 
            <img src="Mobile-login.jpg" alt="im">
         </div>

         <form method="post" action="" class="log-in" autocomplete="off">
            <h4>The <span>RoomieLink</span></h4>
            <p>Get Started Today:</p>
            <!-- username input -->
            <div class="floating-label">
               <input placeholder="Username" type="text" name="username" id="username" autocomplete="off" required>
               <label for="username"></label>
               <div class="icon">
                  <?xml version="1.0" encoding="UTF-8"?>
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M528 160V416c0 8.8-7.2 16-16 16H320c0-44.2-35.8-80-80-80H176c-44.2 0-80 35.8-80 80H64c-8.8 0-16-7.2-16-16V160H528zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM272 256a64 64 0 1 0 -128 0 64 64 0 1 0 128 0zm104-48c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376z"/>
                </svg>

               </div>
            </div>

            <!-- email input -->
            <div class="floating-label">
                <input placeholder="Email" type="email" name="email" id="email" autocomplete="off" required>
                <label for="email"></label>
                <div class="icon">
                   <?xml version="1.0" encoding="UTF-8"?>
                  
                   <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                    <path d="M64 112c-8.8 0-16 7.2-16 16v22.1L220.5 291.7c20.7 17 50.4 17 71.1 0L464 150.1V128c0-8.8-7.2-16-16-16H64zM48 212.2V384c0 8.8 7.2 16 16 16H448c8.8 0 16-7.2 16-16V212.2L322 328.8c-38.4 31.5-93.7 31.5-132 0L48 212.2zM0 128C0 92.7 28.7 64 64 64H448c35.3 0 64 28.7 64 64V384c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V128z"/>
                   </svg>
                </div>
             </div>

            <div class="floating-label">

               <input placeholder="Password" type="password" name="password" id="password" autocomplete="off" required>
               <label for="password"></label>
               
               <div class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                  <path d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z"/></svg>
               </div>
            </div>

            <!-- Age Input -->
            <div class="floating-label">
                <input placeholder="Age" type="number" name="age" id="age" autocomplete="off" required>
                <label for="age"></label>
                <div class="icon">
                   
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path d="M304 128a80 80 0 1 0 -160 0 80 80 0 1 0 160 0zM96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM49.3 464H398.7c-8.9-63.3-63.3-112-129-112H178.3c-65.7 0-120.1 48.7-129 112zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3z"/>
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
            <br>
            
            <div class="gender">   
            <label for="gender" id="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            </div>
            <br>
            <button type="submit"  style="margin-left:auto;" class="button focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Sign up</button>
            <a href="login.php" class="discrete" target="_blank">Already have an account? Login</a>

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
                       <li><a href="login.html">Login</a></li>
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
                    <h3>RoomieLink</h3>
                    <p>Join us on a journey to stay connected, stay informed, and stay ahead. Explore our services today and experience the power of modern connectivity with Romielink</p>

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
  </body>
</html> 




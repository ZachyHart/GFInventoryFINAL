<?php
if (!isset($_SESSION)) {
    session_start();
}

function isUserLoggedIn() {
    return isset($_SESSION['role']) && $_SESSION['role'] != '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Got Funko Collections</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="customerlogin.css">
    <!-- Sweetalerts & Jquery --> 
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<<body style="background-image: url('img/whiteBg4.png'); background-size: cover;">
    <div class="wrapper">
        <aside id="sidebar">
            
            <div class="sidebar-logo">
                <img src="img/CircularLogo.jpg" alt="Logo"
                    style="width: 100%; max-width: 120px; display: block; margin: 0 auto;">
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="CustomerInventory.php" class="sidebar-link" title="Our Products">
                        <i class="lni lni-cart"></i>
                        <span><br>Our Products</span>
                    </a>
                </li>
                <!-- Second sidebar item for Feedback -->
                <li class="sidebar-item">
                    <?php if (isUserLoggedIn()) { ?>
                        <a href="CustomerFeedback.php" class="sidebar-link" title="Inquiries">
                            <i class="lni lni-comments"></i>
                            <span><br>Inquiries</span>
                        </a>
                    <?php } else { ?>
                        <a href="" class="sidebar-link" data-bs-toggle="modal" data-bs-target="#loginModal">
                            <i class="lni lni-comments"></i>
                            <span><br>Inquiries</span>
                        </a>
                    <?php } ?>
                    </li>
                <li class="sidebar-item">
                    <a href="AboutUs.php" class="sidebar-link" title="About Us">
                         <i class="lni lni-users"></i> 
                        <span><br>About Us</span>
                    </a>

                  <li class="sidebar-item">
            <a href="https://www.facebook.com/profile.php?id=100088628276490" class="sidebar-link" target="_blank" title="Facebook">
                <i class="fa-brands fa-facebook"></i>
                <span><br>Facebook</span>
            </a>
        </li>
            </ul>
           
        </aside>
        <section class="about-us" style="background-image: url('img/whiteBg4.png'); background-size: cover;">>

            <div class="about">
                <img src="funkobrian.jpg" class="pic" />
                <div class="textaboutus">
                    <h2>About Us</h2>
                    <h5>GotFunkoCollections by Brian Pope Dela Rosa</h5>
                    <p>At Got Funko Collection, our goal is to become the premier destination for Funko Pop enthusiasts across the Philippines. We are committed to providing an expansive and diverse selection of Funko Pop figurines, ranging from the latest releases to rare and exclusive collectibles. </p>
                </div>
            </div>
        </section>
       


        
    </div>

</div> 
                                       
            <!-- Login modal -->
            <div class="modal fade" id="loginModal" tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div id="form_header_container" class="text-center">
                                <div id="logo_container">
                                    <img id="logo" src="img/CircularLogo.jpg" alt="Logo" class="img-fluid">
                                </div>
                                <h1 id="form_header" class="text-center mt-3">Customer Login</h1>
                            </div>

                            <form class="form" method="post" name="login" action="./controllers/CustomerUsers.php">
                                <div id="form_content_container" class="bg-white p-4 rounded">
                                    <div id="form_content_inner_container">
                                        <input type="hidden" name="type" value="login_user">
                                        <input type="text" class="form-control mb-3" name="name/email"
                                            placeholder="Username/Email..." autofocus="true" />
                                        <input type="password" class="form-control mb-3" name="usersPwd"
                                            placeholder="Password..." />
                                        <a href="./Customerreset-password.php" id="forgot_password"
                                        data-bs-toggle="modal" data-bs-target="#forgotPassModal" div class="form-sub-msg">Forgot Password?</a>

                                        <div id="button_container" class="text-center mt-3" name="submit">
                                            <button type="submit" button class="btn btn-primary">LOG IN</button>
                                        </div>
                                    </div>

                                    <p id="create_account_text" class="text-center mt-3">Don't have an account? <br> Create a new
                                        one <a href="" class="create-account-link" data-bs-toggle="modal" data-bs-target="#signupModal"> here</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Signup modal -->
            <div class="modal fade" id="signupModal" tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <div id="form_header_container" class="text-center registration-page">
                                <div id="logo_container">
                                    <img id="logo" src="img/CircularLogo.jpg" alt="Logo" class="img-fluid">
                                </div>
                                <h2 id="registration_form_header" class="mt-3">Register</h2>
                            </div>
                
                            <form class="form" id="form" method="post" action="./controllers/CustomerUsers.php" id="registrationForm">
                                <div id="form_content_container" class="bg-white p-4 rounded">
                                    <div id="form_content_inner_container">
                                        <input type="hidden" name="type" value="register">

                                        <input type="text" class="form-control mb-3" name="usersName" placeholder="Full name" required />

                                        <input type="text" class="form-control mb-3" name="usersEmail" placeholder="Email">

                                        <input type="text" class="form-control mb-3" name="usersUid" placeholder="Username">

                                        <input type="password" class="form-control mb-3" name="usersPwd" placeholder="Password">

                                        <input type="password" class="form-control mb-3" name="pwdRepeat" placeholder="Repeat password">

                                        <div id="button_container" class="text-center registration-page">
                                            <button type="submit" id="showConfirmationModal" class="btn btn-primary text-center btn-submit" style="background-color: black; color: white;">SIGN UP</button>
                                        </div>
                                        
                                        <p id="create_account_text" class="text-center mt-3">Already have an account? <br> Click here to <a href="" class="create-account-link" data-bs-toggle="modal" data-bs-target="#loginModal"> login</a></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Forgot Password modal -->
            <div class="modal fade" id="forgotPassModal" tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                           
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                        <div id="form_header_container" class="text-center">
                            <div id="logo_container">
                                <img id="logo" src="img/CircularLogo.jpg" alt="Logo" class="img-fluid">
                            </div>
                            <h1 id="form_header" class="text-center mt-3">Reset Password</h1>
                            </div>

                            <form method="post" action="./controllers/CustomerResetPasswords.php">
                                <div id="form_content_container" class="bg-white p-4 rounded">
                                <div id="form_content_inner_container">
                                <input type="hidden" name="type" value="send" />
                                <input type="text" class="form-control mb-3" name="usersEmail" placeholder="Email" autofocus="true"/>
                                <br><br>
                                <div id="button_container" class="text-center mt-3" name="submit">
                                                    <button type="submit" button class="btn btn-primary">RECEIVE EMAIL</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
                        
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="WorkingSidebar.js"></script>
</body>
<script>
    // Function to show SweetAlert confirmation dialog
    function showConfirmation() {
        Swal.fire({
            title: "Are you sure?",
            text: "You are about to sign up.",
            icon: "warning",
            confirmButtonText: "Yes",
            cancelButtonText: "No",
            showCancelButton: true,
        })
        .then((result) => {
            console.log(result.isConfirmed);
            if (result.isConfirmed) {
                // If user clicks "Yes" in the confirmation dialog, submit the form
                $('#form').submit();
                console.log('submitted');
            }
        });
    }

    // jQuery code to handle form submission when clicking the button
    $(document).ready(function() {
        $('.btn-submit').click(function() {
            event.preventDefault(); 
            showConfirmation();
        });
    });
</script>
<?php
    if(isset($_SESSION['flash-msg'])){
        echo $msg = $_SESSION['flash-msg'];
        if($msg == 'invalid-token'){
            echo"
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Unable to verify account creation',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }else if($msg == 'success-creation'){
            echo"
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: 'Please check your email to verify account',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }else if($msg == 'account-unconfirmed'){
            echo"
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Please verify your account before logging in',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }else if($msg == 'confirmed-creation'){
            echo"
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Account Verified!',
                text: 'Account verification successful. You may now login',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }else if($msg == 'password-invalid'){
            echo"
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Your password should be at least 8 characters, uppercase, lowercase, and numeric.',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }else if($msg == 'email-exist'){
            echo"
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Email already registered. Please login or use different email to create account.',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }else if($msg == 'username-exist'){
            echo"
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Username already registered. Please login or use different username to create account.',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }else if($msg == 'email-invalid'){
            echo"
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Your email is invalid.',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }else if($msg == 'fill-fields'){
            echo"
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Please fill all fields.',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }else if($msg == 'password-unmatched'){
            echo"
            <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Password and Repeat Password are not matched.',
                })
            </script>
            ";
            unset($_SESSION['flash-msg']);
        }
    }
?>
</html>
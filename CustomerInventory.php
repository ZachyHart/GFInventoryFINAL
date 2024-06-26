<?php
require_once 'helpers/conn_helpers.php';
include_once './helpers/session_helper.php';

// check if user is logged in, and check if user is an admin

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Got Funko Collections</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="customerlogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Sweetalerts & Jquery --> 
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-bootstrap-4/bootstrap-4.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <style>
        .product_card {
            /* Set a fixed height for the card */
            height: 500px; /* Adjust the height as per your design */
            margin-bottom: 20px; /* Add some margin between cards */

            /* Ensure content doesn't overflow */
            overflow: hidden;
        }

        .product_card .card-body {
            /* Set a fixed height for the card body */
            height: 100%; /* Ensures that the card body takes full height of the card */

            /* Add any additional styling as needed */
        }

        .product_card .card-img-top {
            /* Ensure image fits within the fixed height of the card */
            height: 200px; /* Adjust the image height as needed */
            object-fit: cover; /* Cover ensures the image fills the entire space */
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar">
            <div class="sidebar-logo">
                <img src="img/CircularLogo.jpg" alt="Logo" style="width: 100%; max-width: 120px; display: block; margin: 0 auto;">
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="CustomerInventory.php" class="sidebar-link" title="Our Products">
                        <i class="lni lni-cart"></i>
                        <span><br>Our Products</span>
                    </a>
                </li>
                
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
                </li>
                <li class="sidebar-item">
                    <a href="https://www.facebook.com/profile.php?id=100088628276490" class="sidebar-link" target="_blank" title="Facebook">
                        <i class="fa-brands fa-facebook"></i>
                        <span><br>Facebook</span>
                    </a>
                </li>
            </ul>
            <div class="sidebar-footer">
    <form method="post" action="./controllers/CustomerUsers.php">
        <input type="hidden" name="type" value="logout">
        <button type="submit" class="sidebar-link" title="Logout" style="background-color: black;">
            <i class="lni lni-exit"></i>
        </button>
    </form>
</div>
            
        </aside>

        <div class="main p-3">
            <div class="text-center">
                <h1 class="inventory-title">PRODUCT LIST</h1>
            </div>
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <form method="GET" class="d-flex align-items-center">
                        <input type="text" class="form-control me-2" name="search" placeholder="Search products..."required>
                        <button type="submit" class="btn btn-search1">Search</button>
                    </form>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 mt-3"> <!-- Updated to show 4 columns on large screens -->
                <?php
                $productsPerPage = 20;

                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                $offset = ($page - 1) * $productsPerPage;

                if (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $sql = "SELECT * FROM product_table WHERE product_name LIKE '%$search%' LIMIT $productsPerPage OFFSET $offset";
                } else {
                    $sql = "SELECT * FROM product_table LIMIT $productsPerPage OFFSET $offset";
                }
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col">
    <div class="card product_card">
        <img src="img/products/<?php echo $row['product_image']; ?>" class="card-img-top product_image" alt="<?php echo $row['product_name']; ?>">
        <div class="card-body">
            <div class="product-details">
                <span class="product-category"><?php echo $row['product_category']; ?></span>
                <h5 class="card-title"><?php echo $row['product_name']; ?></h5>
            </div>
            <div class="price_text">
                ₱ <?php echo $row['price']; ?>
            </div>
            <div class="stock_text">
                <?php
                $stock_status_class = $row['stock'] > 0 ? 'available' : 'out-of-stock';
                ?>
                <h1 class="<?php echo $stock_status_class; ?>"><?php echo $row['stock'] > 0 ? 'Available' : 'Out of Stock'; ?></h1>
            </div>
        </div>
    </div>
</div>

                <?php
                    }
                } else {
                    echo "0 results";
                }
                ?>
                <!-- Pagination buttons -->
                <div class="pagination d-flex justify-content-center w-100">
                    <?php
                    $sql_totalProducts = "SELECT COUNT(*) FROM product_table";
                    $result_totalProducts = $conn->query($sql_totalProducts);
                    $totalProducts = mysqli_fetch_array($result_totalProducts);

                    $totalPages = ceil($totalProducts['COUNT(*)'] / $productsPerPage);

                    if ($page > 1) {
                        echo '<a href="?page=' . ($page - 1) . '"><i class="lni lni-arrow-left-circle fs-3 px-3 text-dark"></i></a>';
                    }

                    for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<a href="?page=' . $i . '" class="px-3 text-dark">' . $i . '</a>';
                    }

                    if ($page < $totalPages) {
                        echo '<a href="?page=' . ($page + 1) . '"><i class="lni lni-arrow-right-circle fs-3 px-3 text-dark"></i></a>';
                    }
                    ?>
                </div>
            </div>
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
                        

    <!-- Your existing modals and scripts -->
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

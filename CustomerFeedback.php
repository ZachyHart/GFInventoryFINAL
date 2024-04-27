<?php
// Start the session and check if the user is authenticated, and if role is user
session_start();
if (!isset($_SESSION["usersName"]) || $_SESSION['role'] != 'user') {
    // header("Location: CustomerLogin.php");
    echo '<script>
    alert("You are not authorized to access this page", ' . $_SESSION["role"] . ');
    </script>';
    header("Location: CustomerInventory.php");
    exit();
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
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bowlby+One+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

</head>

<body>
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
                
                <li class="sidebar-item">
                    <a href="CustomerFeedback.php" class="sidebar-link" title="Feedback">
                        <i class="lni lni-comments"></i>
                        <span><br>Inquiries</span>
                    </a>
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
                <a href="CustomerInventory.php" class="sidebar-link" title="Logout">
                    <i class="lni lni-exit"></i>
                </a>
            </div>
            
                
        </aside>
        <div class="main">
            <div class="text-center">
                <h1 class="inventory-title">Customer Inquiries</h1>
                <div class="feedback-section mt-4">
                    <h2 class="text-center">We highly regard your inquiries.</h2>
                    <p class="text-justify">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbspAt GotFunko Collections, we are dedicated to enhancing your shopping experience with our products. 
                    Your inquiries are crucial to us, as they help us better understand your needs and ensure that we continue to deliver high-quality products and exceptional service.
                    </p>
                    <p class="text-justify">
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbspWe highly value your questions, suggestions, and experiences with our products and services. 
                    Whether you’ve recently made a purchase, interacted with our customer service team, or simply browsed our website, we encourage you to share your insights with us. Your inquiries not only enable us to improve but also assist fellow Funko Pop! enthusiasts in making well-informed decisions.
                    </p>
                    <a href="CustomerFeedback2.php" class="btn btn-primary btn-feedback">INQUIRE NOW</a>
                </div>
            </div>
            <!-- Admin reply -->
            <div class="container">
                <?php
                // Connect to database
                $conn = mysqli_connect('localhost', 'root', '', 'login_system');

                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                // Retrieve feedbacks from the database
                $sql = "SELECT * FROM customerfeedbacks WHERE reply != '' ORDER BY updated_at DESC";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <div class="card mb-3">
                            <div class="card-header">
                                Received inquiry from
                                <?php echo $row['Email']; ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><strong>
                                        <?php echo $row['FeedbackTitle']; ?>
                                    </strong></h5>
                                <p class="card-text">
                                    <?php echo $row['FeedbackContent']; ?>
                                </p>
                                <!-- Add form for reply here -->
                                    <input type="hidden" name="feedback_id" value="<?php echo $row['FeedbackID']; ?>">
                                    <div class="form-group">
                                        <label for="reply">Reply:</label>
                                        <textarea class="form-control reply" id="reply" name="reply"
                                            rows="3" style="resize:none;" disabled><?php echo $row['reply']; ?></textarea>
                                    </div>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    echo "No feedbacks found.";
                }
                ?>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script src="AdminInventory.js"></script>

</body>

</html>
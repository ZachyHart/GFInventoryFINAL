<?php
 use PHPMailer\PHPMailer\PHPMailer;
 require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; // If using tls
$mail->Port = 587;
$mail->Username = 'lgaforpeople@gmail.com'; // Your Gmail address
$mail->Password = 'idewfsnhmfrzwzsx'; // Your Gmail password

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link rel="stylesheet" href="style.css">
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
            <li class="sidebar-item">
                    <a href="AboutUs.php" class="sidebar-link" title="About Us">
                         <i class="lni lni-users"></i> 
                        <span><br>About Us</span>
                    </a>
                
        </aside>

        <div class="main p-3">
            <div class="text-center">
                <h1 class="inventory-title">Customer Feedback</h1>
                <div class="feedback-section">
                    <form id="feedbackForm" method="post" action="ConnectUsersFeedback.php">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" required placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="feedbackTitle" name="feedbackTitle" required placeholder="Title">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="feedbackContent" name="feedbackContent" rows="4" required placeholder="Feedback"></textarea>
                        </div>
                        <button type="button" class="btn btn-primary btn-feedback" onclick="validateForm()">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="AdminInventory.js"></script>

    <script>
        function confirmSubmission() {
            $('#confirmationModal').modal('show');
        }

        function submitForm() {
    var formData = $('#feedbackForm').serialize(); // Serialize form data
    $.ajax({
        type: 'POST',
        url: 'ConnectUsersFeedback.php',
        data: formData,
        success: function(response) {
            // Handle success
            $('#confirmationModal').modal('hide'); // Hide the confirmation modal
            $('#successModal').modal('show'); // Show success modal
            $('#feedbackForm')[0].reset(); // Reset form fields
        },
        error: function(xhr, status, error) {
            // Handle error
            alert('An error occurred while submitting the form.');
            console.error(error);
        }
    });
}


        function validateForm() {
            var email = document.getElementById('email').value;
            var title = document.getElementById('feedbackTitle').value;
            var content = document.getElementById('feedbackContent').value;

            if (email.trim() === '' || title.trim() === '' || content.trim() === '') {
                alert('Please fill in all fields.');
            } else {
                confirmSubmission();
            }
        }
    </script>

   
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmationModalLabel">Confirm Feedback Submission?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">NO</button>
                    <button type="button" class="btn btn-primary" onclick="submitForm()">YES</button>
                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center"> 
                <h1 class="modal-title" id="successModalLabel">Thank You!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center"> 
                Your form has been successfully submitted. Thanks!
            </div>
        </div>
    </div>
</div>



</body>

</html>

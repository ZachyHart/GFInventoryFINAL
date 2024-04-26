<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $feedbacktitle = $_POST['feedbackTitle'];
    $feedbackcontent = $_POST['feedbackContent'];

    // Database Connection
    $conn = new mysqli('localhost', 'root', '', 'login_system');
    if ($conn->connect_error) {
        die('Connection Failed : ' . $conn->connect_error);
    } else {
        // Insert feedback into the database
        $stmt = $conn->prepare("INSERT INTO customerfeedbacks (Email, FeedbackTitle, FeedbackContent, updated_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("sss", $email, $feedbacktitle, $feedbackcontent);
        $stmt->execute();
        $stmt->close();
        
        // Close database connection
        $conn->close();

        // Email notification to admin
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Port = 587;
        $mail->Username = 'lgaforpeople@gmail.com';
        $mail->Password = 'idewfsnhmfrzwzsx';

        $mail->setFrom('lgaforpeople@gmail.com', 'GotfunkoPopCollections'); // Change Your Name to your desired sender name
        $mail->addAddress('ijason2002@gmail.com', 'Admin'); // Change Admin to the recipient name
        $mail->Subject = 'New Feedback Submission';
        $mail->isHTML(true); // Set email content type to HTML

            $mail->Body = "
                <style>
                    /* Define table styles */
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }

                    th, td {
                        padding: 8px;
                        text-align: left;
                        border-bottom: 1px solid #ddd;
                    }

                    th {
                        font-size: 18px; /* Font size for title */
                    }

                    /* Adjust spacing */
                    td:first-child {
                        width: 100px; /* Width of the first column */
                    }
                </style>
                <table>
                    <tr>
                        <th>Title:</th>
                        <td>$feedbacktitle</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>$email</td>
                    </tr>
                    <tr>
                        <th>Content:</th>
                        <td>$feedbackcontent</td>
                    </tr>
                </table>
            ";
        if ($mail->send()) {
            // Email sent successfully
            echo "<script>
                    alert('Feedback submitted successfully.');
                    window.location.href = 'CustomerFeedback.php'; // Redirect to feedback form
                  </script>";
        } else {
            // Error sending email
            echo "<script>
                    alert('An error occurred while submitting the form. Please try again later.');
                    window.location.href = 'CustomerFeedback.php'; // Redirect to feedback form
                  </script>";
        }
    }
}
?>

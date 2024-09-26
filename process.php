<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamName = $_POST['team_name'];
    $collegeName = $_POST['college_name'];
    $teamHead = $_POST['team_head'];
    $whatsappNumber = $_POST['whatsapp_number'];
    $players = implode(", ", $_POST['player_name']);
    $email = $_POST['email'];
    $games = implode(", ", $_POST['game']);

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["payment_proof"]["name"]);
    move_uploaded_file($_FILES["payment_proof"]["tmp_name"], $target_file);

    // Send email with the uploaded image and registration details
    $to = $email;
    $subject = "Game Registration Confirmation";
    $message = "
        <h1>Game Registration Details</h1>
        <p>Team Name: $teamName</p>
        <p>College Name: $collegeName</p>
        <p>Team Head: $teamHead</p>
        <p>WhatsApp Number: $whatsappNumber</p>
        <p>Players: $players</p>
        <p>Games Registered: $games</p>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: admin@yourdomain.com' . "\r\n";

    // Send the email
    mail($to, $subject, $message, $headers);

    echo "Registration completed successfully!";
}
?>

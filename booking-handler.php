<?php
$errors = [];
$previous_data = $_POST; // to preserve state

// ... (rest of your validation code)

// If no errors, append data to appointments.txt
if (empty($errors)) {
    $booking_data = [
        'pid' => $_POST['pid'],
        'date' => $_POST['date'],
        'time' => implode(', ', $_POST['time']),
        'reason' => $_POST['reason'],
        'booking_time' => date('Y-m-d H:i:s') // Current time
    ];

    $file = fopen('appointments.txt', 'a');
    fputcsv($file, $booking_data);
    fclose($file);

    $booking_successful = true;
} else {
    $booking_successful = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
        }

        .card.border-success {
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.1);
            border: none;
            border-radius: 8px;
            overflow: hidden;
        }

        .card-header.bg-success {
            background: linear-gradient(45deg, #28a745, #66ff66);
        }

        .card-title {
            color: #28a745;
        }

        .btn-primary {
            background: linear-gradient(45deg, #007bff, #66ccff);
            border: none;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <?php if ($booking_successful): ?>
            <div class="card border-success">
                <div class="card-header bg-success text-white">
                    Booking Successful
                </div>
                <div class="card-body">
                    <h5 class="card-title">Thank you for your booking!</h5>
                    <p class="card-text">Booking request received! We will be in touch soon with a set time.</p>
                    <a href="index.php" class="btn btn-primary">Back to home page</a>
                </div>
            </div>
        <?php else: ?>
            <!-- Your booking form and error messages here -->
            <?php include 'booking-page.php'; ?>
        <?php endif; ?>
    </div>

</body>

</html>
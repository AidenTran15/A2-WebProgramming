<?php
$pageTitle = "Booking Page";
require_once('tools.php');
require_once('header.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Page</title>
    <link rel="stylesheet" href="booking-page.css">
</head>

<body>
    <nav>
        <a href="index.php" class="nav-link">Main Page</a>
    </nav>

    <main class="container">
        <h2>Book Your Appointment</h2>
        <form action="booking-handler.php" method="POST" id="bookingForm"
            onsubmit="return validatePatientId(document.getElementById('pid').value)">
            <div class="form-group">
                <label for="pid">Patient ID:</label>
                <input type="text" class="form-control" id="pid" name="pid" required oninput="convertToUppercase(this)"
                    value="<?php echo isset($previous_data['pid']) ? htmlspecialchars($previous_data['pid']) : ''; ?>">
                <small id="pid-error" class="form-text text-danger">
                    <?php echo isset($errors['pid']) ? $errors['pid'] : ''; ?>
                </small>
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" min="" required
                    value="<?php echo isset($previous_data['date']) ? htmlspecialchars($previous_data['date']) : ''; ?>">
                <small class="form-text text-danger">
                    <?php echo isset($errors['date']) ? $errors['date'] : ''; ?>
                </small>
            </div>

            <div class="form-group">
                <label for="time">Time:</label>
                <div class="pill-group">
                    <input type="checkbox" class="time-checkbox" id="time1" name="time[]" value="9am-12pm" <?php echo (isset($previous_data['time']) && in_array('9am-12pm', $previous_data['time'])) ? 'checked' : ''; ?>>
                    <label for="time1">9am - 12pm</label>

                    <input type="checkbox" class="time-checkbox" id="time2" name="time[]" value="12pm-3pm" <?php echo (isset($previous_data['time']) && in_array('12pm-3pm', $previous_data['time'])) ? 'checked' : ''; ?>>
                    <label for="time2">12pm - 3pm</label>

                    <input type="checkbox" class="time-checkbox" id="time3" name="time[]" value="3pm-6pm" <?php echo (isset($previous_data['time']) && in_array('3pm-6pm', $previous_data['time'])) ? 'checked' : ''; ?>>
                    <label for="time3">3pm - 6pm</label>
                </div>
            </div>


            <div class="form-group">
                <label for="reason">Reason for Appointment:</label>
                <select id="reason" name="reason" class="form-control" required onchange="showAdvice(this)">
                    <option value="" <?php echo (isset($previous_data['reason']) && $previous_data['reason'] == '') ? 'selected' : ''; ?>>Please Select</option>
                    <option value="child_vaccine" <?php echo (isset($previous_data['reason']) && $previous_data['reason'] == 'child_vaccine') ? 'selected' : ''; ?>>Childhood Vaccination Shots
                    </option>
                    <option value="flu_shot" <?php echo (isset($previous_data['reason']) && $previous_data['reason'] == 'flu_shot') ? 'selected' : ''; ?>>Influenza Shot</option>
                    <option value="covid_shot" <?php echo (isset($previous_data['reason']) && $previous_data['reason'] == 'covid_shot') ? 'selected' : ''; ?>>Covid Booster Shot</option>
                    <option value="blood_test" <?php echo (isset($previous_data['reason']) && $previous_data['reason'] == 'blood_test') ? 'selected' : ''; ?>>Blood Test</option>
                </select>
                <small class="form-text text-danger">
                    <?php echo isset($errors['reason']) ? $errors['reason'] : ''; ?>
                </small>
            </div>

            <div class="form-group" id="adviceArea"></div>

            <div class="form-group">
                <input type="submit" value="Submit">
            </div>
            <!-- <div class="form-group">
                <button id="adviceArea" formnovalidate>Submit without validation</button>
            </div> -->
        </form>
    </main>

    <!-- Footer -->
    <?php
    require_once('footer.php');
    ?>
    <script src="booking-page.js"></script>
</body>

</html>
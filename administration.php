<?php
require_once('tools.php');

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['logout'])) {
        unset($_SESSION['user']);
    } elseif (isset($_POST['delete'])) {
        $lineToDelete = $_POST['delete'];
        $bookings = file('appointments.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if (isset($bookings[$lineToDelete])) {
            unset($bookings[$lineToDelete]);
            file_put_contents('appointments.txt', implode("\n", $bookings));
            $message = "Booking deleted successfully!";
        }
    } elseif (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (!authenticate($username, $password)) {
            logFailedLogin($username);
            $message = "Invalid username or password.";
        }
    } elseif (isset($_POST['new_username'], $_POST['new_password'])) {
        $new_username = $_POST['new_username'];
        $new_password = $_POST['new_password'];

        if (userExists($new_username)) {
            $message = "Username already exists!";
        } else {
            registerUser($new_username, $new_password);
            $message = "New user registered successfully!";
        }
    }
}

function getFormattedDate($dateString)
{
    return date('l, jS F Y', strtotime($dateString));
}

function getBookingRequests()
{
    $bookings = file('appointments.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $formattedBookings = [];
    foreach ($bookings as $index => $booking) {
        $formattedBookings[] = ['line' => $index, 'details' => $booking];
    }
    return $formattedBookings;
}
?>

<?php
require_once('header.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Page</title>
    <link rel="stylesheet" href="administration.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <?php if (!isset($_SESSION['user'])): ?>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header bg-primary text-white">Admin Login</div>
                        <div class="card-body">
                            <?php if ($message): ?>
                                <div class="alert alert-danger">
                                    <?= $message ?>
                                </div>
                            <?php endif; ?>
                            <form action="administration.php" method="post">
                                <div class="form-group">
                                    <label>Username:</label>
                                    <input type="text" class="form-control" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Password:</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <h2>Welcome,
                <?= $_SESSION['user'] ?>
            </h2>
            <form action="administration.php" method="post">
                <button type="submit" name="logout" class="btn btn-danger">Logout</button>
            </form>

            <h2 class="mt-5">Booking Requests</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date Requested</th>
                        <th>Details</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach (getBookingRequests() as $booking): ?>
                        <tr>
                            <td>
                                <?= getFormattedDate($booking['details']) ?>
                            </td>
                            <td>
                                <?= $booking['details'] ?>
                            </td>
                            <td>
                                <form action="administration.php" method="post">
                                    <button type="submit" name="delete" value="<?= $booking['line'] ?>"
                                        class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3 class="mt-5">Register New User</h3>
            <form method="POST">
                <div class="form-group">
                    <label for="new_username">New Username:</label>
                    <input type="text" name="new_username" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>

            <?php if ($message): ?>
                <div class="mt-3 alert alert-info">
                    <?= $message ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</body>

</html>
<?php
require_once('footer.php');
?>
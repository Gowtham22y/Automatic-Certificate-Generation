<?php
session_start();

if (!isset($_SESSION['loggedin']) || !isset($_SESSION['stars'])) {
    header("Location: login.php");
    exit();
}

$name = $_SESSION['username'] ?? 'User';
$stars = $_SESSION['stars'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Certificate</title>
</head>
<body>

<h2>Certificate of Achievement</h2>
<p>Congratulations, <?php echo htmlspecialchars($name); ?>!</p>
<p>You have earned <?php echo $stars; ?> out of 5 stars in the quiz.</p>

<?php if ($stars == 5): ?>
    <p><strong>You have earned a Gold certificate!</strong></p>
<?php elseif ($stars >= 3): ?>
    <p><strong>You have earned a Silver certificate!</strong></p>
<?php else: ?>
    <p><strong>You have earned a Bronze certificate!</strong></p>
<?php endif; ?>

<a href="logout.php">Logout</a>

</body>
</html>

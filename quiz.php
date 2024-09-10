<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("Location: login.php");
    exit();
}

$questions = [
    1 => ['question' => 'What is 2 + 2?', 'answer' => '4'],
    2 => ['question' => 'Php stands for?', 'answer' => 'Hypertext Preprocessor'],
    3 => ['question' => 'What is 10 / 2?', 'answer' => '5'],
    4 => ['question' => 'What color is the sky?', 'answer' => 'Blue'],
    5 => ['question' => 'What is the square root of 9?', 'answer' => '3']
];

$total_stars = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    foreach ($questions as $id => $q) {
        if (isset($_POST['q' . $id]) && strtolower($_POST['q' . $id]) == strtolower($q['answer'])) {
            $total_stars++;
        }
    }

    $con = mysqli_connect("localhost", "root", "", "bio_data");
    $user_id = $_SESSION['user_id'];

    $sql = "UPDATE student SET quiz_completed = 1, stars_earned = $total_stars WHERE id = $user_id";
    mysqli_query($con, $sql);
    mysqli_close($con);

    $_SESSION['stars'] = $total_stars;
    header("Location: certificate.php");
    exit();
}
?>


<h2>Quiz</h2>
<form method="POST" action="">
    <?php foreach ($questions as $id => $q): ?>
        <p><?php echo $q['question']; ?></p>
        <input type="text" name="q<?php echo $id; ?>" required><br><br>
    <?php endforeach; ?>
    <input type="submit" value="Submit">
</form>

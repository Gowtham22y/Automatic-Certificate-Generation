<?php   
if (isset($_POST['submit'])) {
    $a = $_POST['name'];
    $b = $_POST['mobile'];
    $c = $_POST['email'];
    $d = $_POST['dob'];
    $j = $_POST['gender'];
    $e = $_POST['address'];
    $f = $_POST['degree'];
    $g = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // single file
    $h = $_FILES['photo']['name'];
    $photoTmpName = $_FILES['photo']['tmp_name'];
    $location = "pic/";
    move_uploaded_file($photoTmpName, $location . $h);
    

    $con = mysqli_connect("localhost", "root", "", "bio_data");
    $sql = "INSERT INTO student (name, mobile, email, dob, gender, address, degree, single,password)
            VALUES ('$a', '$b', '$c', '$d', '$j', '$e', '$f', '$h', '$g')";
    
    if (mysqli_query($con, $sql)) {
        echo "Registration successfully!";
    } else {
        echo "Failed to Registration.";
    }
    mysqli_close($con);
}
?>

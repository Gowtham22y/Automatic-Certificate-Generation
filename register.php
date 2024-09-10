<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <h1 class="head">Registration Form</h1>
    <form id="studentForm" method="post" action="action.php" enctype="multipart/form-data">
        <div class="center">
            <div class="form">
                <label class="label">Name</label>
                <input class="input" type='text' name='name' id="name">
                <span class="error" id="nameError"></span>
            </div>

            <div class="form">
                <label class="label">Mobile_No</label>
                <input class="input" type='number' name='mobile' id="mobile">
                <span class="error" id="phoneError"></span>
            </div>

            <div class="form">
                <label class="label">Email</label>
                <input class="input" type='email' name='email' id="email">
                <span class="error" id="emailError"></span>
            </div>

            <div class="form">
                <label class="label">Dob</label>
                <input class="input" type='date' name='dob' id="dob">
                <span class="error" id="dobError"></span>
            </div>

            <div class="form">
                <label class="label">Gender</label>
                <input class="input" type='radio' name='gender' value='Male'>Male
                <input class="input" type='radio' name='gender' value='Female'>Female
                <span class="error" id="genderError"></span>
            </div>

            <div class="form">
                <label class="label">Address</label>
                <textarea class="input" name="address" id="address"></textarea>
                <span class="error" id="addressError"></span>
            </div>

            <div class="form">
                <label class="label">Degree</label>
                <select class="input" name='degree' id="degree">
                    <option value="B.E CSE">B.E CSE</option>
                    <option value="B.E EEE">B.E EEE</option>
                    <option value="B.E ECE">B.E ECE</option>
                    <option value="B.E MEC">B.E MEC</option>
                    <option value="CIVIL">CIVIL</option>
                </select>
                <span class="error" id="degreeError"></span>
            </div>

            <div class="form">
                <label class="label">Photo</label>
                <input class="input" type='file' name='photo' id="photo">
                <span class="error" id="photoError"></span>
            </div>

            <div class="form">
                <label class="label">Password</label>
                <input class="input" type="password" name="password">
            </div>

            <div class="form">
                <input class="input" type='submit' name='submit'>
            </div>
        </div>
    </form>

    <div class="login">
        Already have an account? <a href="login.php" class="buttun"> Login</a>
    </div>

    <script>
        document.getElementById('studentForm').onsubmit = function (event) {
            let valid = true;

            // Clear previous error messages
            document.querySelectorAll('.error').forEach(function (el) {
                el.innerHTML = '';
            });

            // Name validation
            if (!/^[a-zA-Z]+$/.test(document.getElementById('name').value.trim())) {
                document.getElementById('nameError').innerHTML = 'Name must contain only letters.';
                valid = false;
            }

            // Phone validation
            const phone = document.getElementById('mobile').value;
            if (phone.trim() === '' || !/^\d{10}$/.test(phone)) {
                document.getElementById('phoneError').innerHTML = 'Valid phone number is required.';
                valid = false;
            }

            // Email validation
            const email = document.getElementById('email').value;
            if (email.trim() === '' || !/\S+@\S+\.\S+/.test(email)) {
                document.getElementById('emailError').innerHTML = 'Valid email is required.';
                valid = false;
            }

            // Address validation
            if (document.getElementById('address').value.trim() === '') {
                document.getElementById('addressError').innerHTML = 'Address is required.';
                valid = false;
            }

            // Dob validation
            if (document.getElementById('dob').value.trim() === '') {
                document.getElementById('dobError').innerHTML = 'Date of birth is required.';
                valid = false;
            }

            // Gender validation
            if (!document.querySelector('input[name="gender"]:checked')) {
                document.getElementById('genderError').innerHTML = 'Gender is required.';
                valid = false;
            }

            // Degree validation
            if (document.getElementById('degree').value === '') {
                document.getElementById('degreeError').innerHTML = 'Degree is required.';
                valid = false;
            }

            // File validation (photo)
            if (document.getElementById('photo').files.length === 0) {
                document.getElementById('photoError').innerHTML = 'Photo is required.';
                valid = false;
            }

            if (!valid) {
                event.preventDefault();
            }
        }
    </script>
</body>

</html>
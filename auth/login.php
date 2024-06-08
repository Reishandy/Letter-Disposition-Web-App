<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title>Login</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/login_register.css">
</head>
<body>

<div class="form-container">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="form-def">
            <h1>LOGIN</h1>

            <?php
            if (isset($_GET['error']) && $_GET['error'] == 'username') {
                ?>
                <div class="alert alert-danger" role="alert">
                    User do not exists.
                </div>
                <?php
            } elseif (isset($_GET['error']) && $_GET['error'] == 'password') {
                ?>
                <div class="alert alert-danger" role="alert">
                    Password is incorrect.
                </div>
                <?php
            } elseif (isset($_GET['success']) && $_GET['success'] == 'true') {
                ?>
                <div class="alert alert-success" role="alert">
                    Registered successfully. You can now login.
                </div>
                <?php
            }
            ?>

            <form id="formLogin" action="login_logic.php" method="POST" class="needs-validation" novalidate>
                <div class="form-floating mt-4">
                    <input type="text" class="form-control form-control-lg" id="uname" name="username"
                           placeholder="Username" pattern="[a-zA-Z0-9_]+"
                           required>
                    <label for="uname">Username</label>
                    <div class="invalid-feedback">
                        Please enter a valid username (a-zA-Z0-9_).
                    </div>
                </div>

                <div class="form-floating mt-4">
                    <input type="password" class="form-control form-control-lg" id="passwdSi" name="password"
                           placeholder="Password" required>
                    <label for="passwdSi">Password</label>
                    <div class="invalid-feedback">
                        Please enter a password.
                    </div>
                </div>

                <div id="link" class="form-group">
                    <h5>Register</h5>
                </div>

                <button id="button" type="submit" class="btn btn-outline-dark btn-lg">
                    Submit
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                          style="display: none;"></span>
                </button>
            </form>

            <h6>&copy; 2024 Reishandy</h6>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.2/anime.min.js"
        integrity="sha512-aNMyYYxdIxIaot0Y1/PLuEu3eipGCmsEUBrUq+7aVyPGMFH8z0eTP0tkqAvv34fzN6z+201d3T8HPb1svWSKHQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../assets/js/login_register.js"></script>
<script src="../assets/js/login.js"></script>
</body>
</html>
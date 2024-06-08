<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title>Register</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/login_register.css">
</head>
<body style="justify-content: flex-start;">

<div class="form-container">
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="form-def">
            <h1>REGISTER</h1>

            <?php
            if (isset($_GET['error']) && $_GET['error'] == 'taken') {
                ?>
                <div class="alert alert-danger" role="alert">
                    Username is already taken.
                </div>
                <?php
            }
            ?>

            <form id="formRegister" action="register_logic.php" method="POST" class="needs-validation" novalidate>
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
                    <input type="email" class="form-control form-control-lg" id="email" name="email"
                           placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                           required>
                    <label for="email">Email</label>
                    <div class="invalid-feedback">
                        Please enter a valid email.
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

                <div class="form-floating mt-4">
                    <input type="password" class="form-control form-control-lg" id="passwdConfirm"
                           name="passwordConfirm"
                           placeholder="Confirm Password" required>
                    <label for="passwdConfirm">Confirm password</label>
                    <div class="invalid-feedback">
                        Password do not match.
                    </div>
                </div>

                <div id="link" class="form-group">
                    <h5>Login</h5>
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
<script src="../assets/js/register.js"></script>
</body>
</html>
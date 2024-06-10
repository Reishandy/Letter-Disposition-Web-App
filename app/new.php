<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title>Submit new letters</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/app.css">
    <link rel="stylesheet" href="../assets/css/new.css">
</head>
<body>

<!-- Check login state -->
<?php
session_start();
if (!isset($_SESSION['user'])) {
    echo '<script>window.location.href = ("../auth/login.php") </script>';
    exit();
}

$username = $_SESSION['user'];
?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="p-5 div-centered">
        <div class="content">
            <!-- Title -->
            <h1>LETTER DISPOSITION</h1>

            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-dark">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Submit new letter</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="dropdown" class="nav-link dropdown-toggle active" href="#" role="button"
                                   data-bs-toggle="dropdown"
                                   aria-expanded="false">
                                    <?php echo $username; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <button id="logout" class="dropdown-item">Logout</button>
                                    </li>
                                </ul>
                            </li>
                        </ul>

                        <button id="received" class="btn btn-outline-light">View received letters</button>
                        <button id="sent" class="btn btn-outline-light">View sent letters</button>
                    </div>
                </div>
            </nav>

            <!-- Form -->
            <div class="div-form d-flex justify-content-center align-items-center flex-column">
                <h4>Submit new letter</h4>

                <?php
                require_once '../connection.php';
                session_start();
                $current_user = $_SESSION['user'];

                // Get all possible user as to input
                $stmt = $conn->prepare("SELECT username FROM users");
                $stmt->execute();

                $result = $stmt->get_result();
                $users = $result->fetch_all(MYSQLI_ASSOC);
                $usernames = array_column($users, 'username');
                ?>

                <?php
                if (isset($_GET['error']) && $_GET['error'] == 'size') {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        File must not exceed 5MB
                    </div>
                    <?php
                } elseif (isset($_GET['error']) && $_GET['error'] == 'type') {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        File must be a PDF
                    </div>
                    <?php
                } elseif (isset($_GET['error']) && $_GET['error'] == 'upload') {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Error uploading file
                    </div>
                    <?php
                } elseif (isset($_GET['error']) && $_GET['error'] == 'sql') {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Error executing SQL statement
                    </div>
                    <?php
                } elseif (isset($_GET['error']) && $_GET['error'] == 'upload') {
                    ?>
                    <div class="alert alert-danger" role="alert">
                        Error uploading file
                    </div>
                    <?php
                }
                ?>

                <form action="new-logic.php" method="post" role="form" class="needs-validation"
                      enctype="multipart/form-data" novalidate>
                    <div class="form-floating mb-3">
                        <select class="form-control" id="to" name="to" required>
                            <?php foreach ($usernames as $username):
                                if ($username == $current_user) {
                                    continue;
                                } ?>
                                <option value="<?php echo $username; ?>"><?php echo $username; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label for="to">To</label>
                        <div class="invalid-feedback">
                            Please choose a valid username.
                        </div>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="desc" name="desc" placeholder="Short description"
                               required>
                        <label for="desc">Short description</label>
                        <div class="invalid-feedback">
                            Please provide a short description.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <input type="file" class="form-control form-control-lg" id="file" name="file" accept=".pdf"
                               required>
                        <label for="file"></label>
                        <div class="invalid-feedback" id="fileError">
                            Please upload a PDF file (max 5MB).
                        </div>
                    </div>

                    <button id="submit-button" type="submit" class="btn btn-outline-light btn-lg" name="submit"
                            value="submit">Submit
                    </button>
                </form>
            </div>

            <!-- Copyright -->
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
<script src="../assets/js/app.js"></script>
<script>
    // Clear url params
    window.history.replaceState({}, document.title, "new.php");
</script>
</body>
</html>
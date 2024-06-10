<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=chrome">
    <title>Sent letters</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/app.css">
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
                                <a class="nav-link active" href="#">Sent letters</a>
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
                        <button id="new" class="btn btn-outline-light">Submit new letter</button>
                    </div>
                </div>
            </nav>

            <!-- Letters -->
            <div class="container-fluid">
                <div class="div-letters row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-3">
                    <?php
                    require_once '../connection.php';

                    $stmt = $conn->prepare("SELECT * FROM letters WHERE sender = ? ORDER BY id DESC");
                    $stmt->bind_param("s", $_SESSION['user']);
                    $stmt->execute();

                    $result = $stmt->get_result();
                    $stmt->close();

                    while ($row = $result->fetch_assoc()) {
                        $to = $row['receiver'];
                        $desc = $row['description'];
                        $date = $row['date'];
                        $status = $row['read_status'];
                        $file = $row['file_path'];
                        $fileName = $row['file_name'];

                        ?>
                        <div class="card m-2 div-letter">
                            <div class="card-header"
                                 style="background-color: <?php echo $status == 1 ? 'green' : 'red' ?>">
                                <h4>To: <?php echo $to ?> </h4>
                                <h6><?php echo $date ?></h6>
                            </div>
                            <div class="card-body">
                                <p><?php echo $desc ?></p>

                                <a href="<?php echo $file; ?>" download="<?php echo $fileName; ?>"
                                   class="btn btn-outline-dark">View</a>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
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
</body>
</html>
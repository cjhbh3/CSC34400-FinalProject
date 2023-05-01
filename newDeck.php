<!DOCTYPE html>
<html>
    <head>
        <title>Create a Deck</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link rel="stylesheet" href="styles/styles.css">
    </head>
    <body>
        <main>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="index.php"><img src="images/apple-touch-icon-57x57.png" alt="Website Logo" width="60" height="60"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="viewDeck.php">View Deck</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="newDeck.php">Create Deck</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="editDeck.php">Edit Deck</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
            <h1>Create a Deck</h1>
            <div id="loading-area">

                <form action="" method="post">
                    Commander Name: <input name="commanderName" type="text" />
                    <input name="submit" type="submit" />
                </form>

                <br />
                <table id="loading-area">
                    <?php
                        session_start();

                        $host = $_SESSION["host"];
                        $user = $_SESSION["user"];
                        $pass = $_SESSION["passw"];
                        $db = $_SESSION["db"];
                        $port = $_SESSION["port"];

                        $conn = new mysqli($host, $user, $pass, $db, $port);

                        if ($conn->connect_error)
                            die("Could not connect: ".mysqli_connect_error());

                        if (isset($_POST["submit"])) {
                            $commanderName = $_POST["commanderName"];

                            if (!$stmt = $conn->prepare("insert into deck values (?);")) {
                                die("Issue preparing select statement".htmlspecialchars($conn->error));
                            }

                            $stmt->bind_param("s", $commanderName);

                            if (!$stmt->execute()) {
                                die("Failure in execute");
                            }

                            if ($stmt->affected_rows > 0) {
                                echo $commanderName . " has been added.";
                            }
                        }
                    ?>
                </table>
            </div>
        </main>
    </body>
</html>
<?php
session_start();
$userId = $_SESSION['UserId'];
if ($userId <= 0) {
    echo '<script>
    location.href = \'http://localhost/Projects/login.php\';
    </script>';
}
?>

<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

</head>

<header>
    <nav class="navbar navbar-expand-sm bg-dark text-white  fixed-top " style="height: 48px;">
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="demoProducts.php">Add<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link text-white" href="productList.php">List</a>
                </li>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <li class="nav-item active">
                    <a class="nav-link text-white"> WELCOME &nbsp; <?php echo $_SESSION['Name']; ?></a>
                </li>
            </ul>
            <span class="navbar-text">
                <form method="POST">
                    <input type="submit" name="logout" value="LogOut" class='btn btn-outline-dark btn-xs me-3 text-white  ml-3 '>
                </form>
            </span>
        </div>
    </nav>
</header>

<br><br>

<body style="background-color: rgb(216, 216, 216); 
    align-items: center;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">
    <div class="ml-5 mt-5 " style="align-items:center;">
        <div class="card mt-5 ml-5 p-4 " style="width: 85%; ">
            <form method="post" id="form" enctype="multipart/form-data">
                <div style="text-align: center;">
                    <h2>
                        ADD PRODUCT
                    </h2>
                    <hr>
                </div>
                <br><br>
                <div>
                    <div class="row">
                        <div class="col-3">
                            <h5>Product Name </h5>
                        </div>
                        <div class="col-9 ">
                            <input type="text" placeholder="Apple iPad" style="width: 35%;" name="productName" required minlength="3" maxlength="30">
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <div class="row">
                        <div class="col-3">
                            <h5>Product Specification </h5>
                        </div>
                        <div class="col-9 ">
                            <input type="text" placeholder="10.9-inch" style="width: 35%;" name="productSpecifications" required minlength="3" maxlength="50">
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <div class="row">
                        <div class="col-3">
                            <h5>Stock </h5>
                        </div>
                        <div class="col-9 ">
                            <input type="number" placeholder="240" style="width: 35%;" name="stock" required pattern=[0-9]+>
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <div class="row">
                        <div class="col-3">
                            <h5>Product Image </h5>
                        </div>
                        <div class="col-9 ">
                            <input type="file" name="fileToUpload" id="fileToUpload" required>
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <div class="row">
                        <div class="col-3">
                            <h5>Short Description </h5>
                        </div>
                        <div class="col-9 ">
                            <input type="text" placeholder="Memory-64 GB" style="width: 35%;" name="short" maxlength="50" minlength="3" required>
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <div class="row">
                        <div class="col-3">
                            <h5>Description </h5>
                        </div>
                        <div class="col-9 ">
                            <input type="text" placeholder="A14 Bionic chip has power for everyday tasks to editing 4k video" style="width: 35%;" minlength="3" maxlength="150" name="desc" required>
                        </div>
                    </div>
                </div>
                <br>
                <div>
                    <div class="row">
                        <input type="submit" style="width: 10%; align-self: flex-end;" name="Submit" value="SAVE" id="myBtn" class='btn btn-secondary btn-xs me-3 text-black  ml-3'>
                    </div>
                </div>
                <br>
            </form>
        </div>
    </div>



    <?php
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        echo '<script>
        location.href = \'http://localhost/Projects/login.php\';
        </script>';
    }


    if (isset($_POST['Submit'])) {
        $servername = "localhost";
        $username = "binitha";
        $password = "Bini@1997";
        $dbname = "productDb";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $target_dir = "Images/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $file_name = basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $tempname = $_FILES["fileToUpload"]["tmp_name"];
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            if (move_uploaded_file($tempname, $target_file)) {
                $name = $_POST['productName'];
                $spec = $_POST['productSpecifications'];
                $stock = $_POST['stock'];
                $shortdesc = $_POST['short'];
                $desc = $_POST['desc'];
                header("Location: http://localhost/Projects/productEdit.php");

                $sql = "INSERT INTO Products (productname, specifications, stock, shortdescription,description)
                VALUES ('$name', '$spec', '$stock','$shortdesc','$desc')";

                if ($conn->query($sql) === TRUE) {

                    $last_id = $conn->insert_id;
                    $list = "INSERT INTO ProductImages(productId,fileName)
                    VALUES('$last_id','$file_name')";
                    if ($conn->query($list) === TRUE) {
                        echo '<script type="text/javascript">toastr.success("Product details inserted successfully",{ timeOut: 1 },{positionClass: \'toast-bottom-right\'})</script>';
                    } else {
                        echo "Image not inserted";
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Failed to upload image";
            }
            $uploadOk = 1;
        } else {
            echo '<script type="text/javascript">';
            echo ' alert("File is not an image\nProduct details not inserted")';
            echo '</script>';
            $uploadOk = 0;
        }
    }
    ?>
    <hr />
    <div class="footer">©ProductServices2022</div>

</body>

</html>
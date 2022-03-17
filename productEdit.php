<?php

session_start();
$userId = $_SESSION['UserId'];
if($userId<=0){
    echo'<script>
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


</head>
<br><br>

<body style="background-color: rgb(216, 216, 216); 

    align-items: center;
    font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;">


    <?php
     if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        echo '<script>
        location.href = \'http://localhost/Projects/login.php\';
        </script>';
    }


    //$pid = $_POST['id'];
    //$id = $_POST['id'];
    //$pid = $_COOKIE['productId'];

    //echo $did = $_POST['id'];
    //session_start();


    //echo "id from previous page";
    $strValue = $_GET['id'];
    //echo "$strValue";


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
    //echo "Connected successfully";
    $sql = "SELECT * FROM Products WHERE id=$strValue ";
    $sql2 = "SELECT fileName FROM ProductImages WHERE productId=$strValue ";
    //echo $sql;
    // $result1 = $conn->query($sql);
    // $row = $result->fetch_assoc();
    // $name=$row["productname"];
    // echo "product name".$name;


    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $name = $row["productname"];
    $spec = $row["specifications"];
    $stock = $row["stock"];
    $short = $row["shortdescription"];
    $desc = $row["description"];

    $result2 = $conn->query($sql2);
    $arr = $result2->fetch_assoc();
    $fileName = $arr["fileName"];

    $path = "Images/" . $fileName;

    //$_POST['fileToUpload']=$fileName;
















    ?>

    <div class="ml-5 " style="align-items:center;">
        <div class="card mt-5 ml-5 p-4" style="width: 85%; ">
            <form method="POST" id="form" enctype="multipart/form-data">
                <div>
                    <h2 style="align-self: center;">
                        EDIT DETAILS
                    </h2>

                </div>

                <hr><br>

                <div>
                    <div class="row">













                        <div class="col-3">
                            <h5>Product Name </h5>
                        </div>
                        <div class="col-9 ">
                            <input type="text" placeholder="Apple iPad" style="width: 35%;" name="productName" required minlength="3" maxlength="30" value="<?php echo $name; ?>">
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
                            <input type="text" placeholder="10.9-inch" style="width: 35%;" name="productSpecifications" required minlength="3" maxlength="50" value="<?php echo $spec; ?>">
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
                            <input type="number" placeholder="240" style="width: 35%;" name="stock" required pattern=[0-9]+ value="<?php echo $stock; ?>">
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


                            <input type="file" name="fileToUpload" style="width: 28%;" id="fileToUpload" value="<?php echo $path; ?>">
                            <img src="<?php echo $path; ?>" height="50px;" width="50px;">



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
                            <input type="text" placeholder="Memory-64 GB" style="width: 35%;" name="short" maxlength="50" minlength="3" required value="<?php echo $short; ?>">
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

                            <!-- <textarea 
                    placeholder="A14 Bionic chip has power for everyday tasks to editing 4k video"
                     rows="2"
                     minlength="3"
                     style="width: 45%;"
                maxlength="150"
                name="desc"
                required
                value=""
                     ></textarea> -->

                            <input type="text" placeholder="A14 Bionic chip has power for everyday tasks to editing 4k video" style="width: 35%;" minlength="3" maxlength="150" name="desc" required value="<?php echo $desc; ?>">



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



            <?php
            $name_ = $_POST['productName'];
            $spec_ = $_POST['productSpecifications'];
            $stock_ = $_POST['stock'];
            $shortdesc = $_POST['short'];
            $desc_ = $_POST['desc'];

            $file = $_POST['fileToUpload'];


            $update = "UPDATE Products 
        SET productname=\"$name_\",
        specifications=\"$spec_\",
        stock=$stock_,
        shortdescription=\"$shortdesc\",
        description=\"$desc_\"
        WHERE id=$strValue ";






            $target_dir = "Images/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $file_name = basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $tempname = $_FILES["fileToUpload"]["tmp_name"];

            //echo"tfile "."$file_name";
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

            if ($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                if (move_uploaded_file($tempname, $target_file)) {
                    //echo"Image uploaded successfully";
                } else {
                    //echo"Failed to upload image";
                }
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $uploadOk = 0;
            }

            if ($file_name == "") {
                $file_name = $fileName;
            }

            $postImage = "UPDATE ProductImages
        SET fileName=\"$file_name\"
        WHERE productId=$strValue";





            if ($conn->query($update) == TRUE) {

                if ($conn->query($postImage) == TRUE) {
                    echo '<script type="text/javascript">toastr.success("Product details updated successfully",{ timeOut: 1 },{positionClass: \'toast-bottom-right\'})</script>';
                    header("Refresh:0");
                    //echo "successfully updated";
                } else {
                    echo 'file not updated';
                }
                header("Location: http://localhost/Projects/productList.php");
            }


            ?>








        </div>
    </div>
    <hr />
    <div class="footer">©ProductServices2022</div>

</body>

</html>
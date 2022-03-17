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
                <input type="submit" name="logout" value="LogOut" 
                class='btn btn-outline-dark btn-xs me-3 text-white  ml-3 '>
            </form>
    </span>
  </div>
</nav>













</header>
</head>
<br>

<body style="background-color: rgb(216, 216, 216); 
    align-items: center; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    ">
    <div class="ml-5 " style="align-items:center;">
        <div class="card ml-5 mt-5 p-4" style="width: 85%; ">

            <div style="align-self: center;">
                <h2>
                    PRODUCTS
                </h2>

            </div>
          
          



            <br>
            <hr>















            <?php
             if (isset($_POST['logout'])) {
                session_unset();
                session_destroy();
                echo '<script>
                location.href = \'http://localhost/Projects/login.php\';
                </script>';
            }
            //session_start();

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



            if (isset($_POST['edit'])) {




                // echo $did = $_POST['id'];
                //echo "inside edit"."$did";
                // $_COOKIE['productId'] = $did;


                $_SESSION['id'] = $_POST['id'];
                $var = $_POST['id'];
                echo "$var";



                header("Location: http://localhost/Projects/productEdit.php?id=" . $var);
            }






            if (isset($_POST['delete'])) {


                $did = $_POST['id'];
                //echo "inside delete"."$did";


                $query = "DELETE FROM ProductImages WHERE productId=$did";
                $del = "DELETE FROM Products WHERE id=$did";





                if ($conn->query($query) === TRUE && $conn->query($del) === TRUE) {
                    echo '<script type="text/javascript">toastr.success("Product details deleted successfully",
                    { timeOut: 1 },{positionClass: \'toast-bottom-right\'})</script>';
                    //echo "Record deleted successfully";
                } else {
                    // echo "Error deleting record: " . $conn->error;

                    echo '<script type="text/javascript"> ';

                    echo ' alert("Error deleting product details")';
                    echo '</script>';
                }






                //echo "$query";

            }

            $sql = "SELECT * FROM Products";
            $result = $conn->query($sql);

            $sql1 = "SELECT * FROM ProductImages";
            $result1 = $conn->query($sql1);

            if ($result->num_rows > 0 && $result1->num_rows > 0) {

                echo "
    <table class='table table-bordered 
    
    table-hover
    
    ml-4 mt-2 table-active' style='width: 95%'>
    <thead class='table-lg' style='background-color: #cfcfcf'>
      <tr>
    
        <th scope='col'>Id</th>
        <th scope='col'>Name</th>
        <th scope='col'>Specification</th>
        <th scope='col'>Stock</th>
        <th scope='col'>Short Description</th>
        <th scope='col'>Description</th>
        <th scope='col'>Image</th>
        <th scope='col' colspan='2'>Action</th>
      </tr>
    </thead>
    <tbody class='table' style='background-color: #e7e7e7'>
      
      
        ";
                // output data of each row
                while ($row = $result->fetch_assoc()) {
                    $id = $row["id"];


                    $sql2 = "SELECT fileName FROM ProductImages
      WHERE productId=$id";
                    $result1 = $conn->query($sql2);
                    $file = $result1->fetch_assoc();
                    //echo "$file";

                    // <th scope='col'>{$file["fileName"]}</th>
                    echo "<tr><th scope='col'>{$row["id"]}</th>
    <th scope='col'>{$row["productname"]}</th>
    <th scope='col'>{$row["specifications"]}</th>
    <th scope='col'>{$row["stock"]}</th>
    <th scope='col'>{$row["shortdescription"]}</th>
    <th scope='col'>{$row["description"]}</th>
     
   <th>
 
    <img src=\"Images/{$file["fileName"]}\" height=\"80px\" width=\"80px;\">

	</th>
    

    <th scope='col'>
    <form method='POST' >
    <input type=hidden name=id value=" . $row["id"] . " >
    <input type=submit value=Edit name=edit 
    class='btn btn-secondary btn-xs me-3 text-black'
    >
    </form>
    </th>
    

    <th scope='col'>
    <form method='POST'>
    <input type=hidden name=id value=" . $row["id"] . " >
    <input type=submit value=Delete name=delete 
    class='btn btn-secondary btn-xs me-3 text-black'
    onclick=\"return confirm('Are you sure you want to delete?')\"
    >
    </form>
    </th>

</tr>

";
                }
            } else {
                echo "0 results";
            }

            echo "</tbody>
</table>";






            mysqli_close($con);
            ?>



        </div>
    </div>
    <hr />
    <div class="footer">©ProductServices2022</div>
</body>

</html>
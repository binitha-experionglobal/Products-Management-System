<html>

<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript"></script>
  
</head>

<body style="background-color: rgb(216, 216, 216); 
    align-items: center; font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    ">


<div class="container h-100">
    <div class="row align-items-center h-100">
        <div class="card col-6 mx-auto p-5"style="width: 85%;">
        <div class="pb-4" style="align-self: center; ">
        <form method="POST" id="form" >
        <h2>
                    GET STARTED
                </h2>
                <hr>
        </div>

      

                <div>
                    <div class="row">
                        <div class="col-4 pb-3">
                            <h5>Name </h5>
                        </div>
                        <div class="col-8 pb-3 ">
                            <input type="text" placeholder="Steve Rogers" style="width: 85%;" name="name" required minlength="3" maxlength="30" >
                        </div>
                    </div>



                </div>
                <div>
                    <div class="row">
                        <div class="col-4 pb-3">
                            <h5>Phone Number </h5>
                        </div>
                        <div class="col-8 pb-3 ">
                            <input type="tel" placeholder="986709838" style="width: 85%;" name="phone" required minlength="3" maxlength="30">
                        </div>
                    </div>



                </div>

                <div>
                    <div class="row">
                        <div class="col-4 pb-3">
                            <h5>Email </h5>
                        </div>
                        <div class="col-8 pb-3 ">
                            <input type="text" placeholder="steverogers@gmail.com" style="width: 85%;" name="email" required minlength="11" maxlength="50">
                        </div>
                    </div>



                </div>
              

                <div>
                    <div class="row">
                        <div class="col-4 pb-3">
                            <h5>User Name </h5>
                        </div>
                        <div class="col-8 pb-3">
                            <input type="text" placeholder="Steve_Rogers" style="width: 85%;" name="username" required minlength="5" maxlength="25" > 
                        </div>
                    </div>



                </div>
               
                <div>
                    <div class="row">
                        <div class="col-4 pb-3">
                            <h5>Password </h5>
                        </div>
                        <div class="col-8 pb-3">


                            <input type="password" name="password" placeholder="User@1234" style="width: 85%;" id="password" required required minlength="6" maxlength="15">



                        </div>
                    </div>
                </div>
                <div class="pt-3" style="align-self: flex-end;">

                <!-- <input type="submit" name="login" value="Login"  id="login" class="mr-3"> -->


                            <input type="submit" name="submit" value="Register"  id="register" 
                            class='btn btn-secondary btn-xs me-3 text-black  ml-3'>



                        </div>
                        

</form>
<div class="pt-3 mr-2" style="align-self: flex-end;">

<a href="http://localhost/Projects/login.php">Login here</a>
                        </div>
        </div>
    </div>
</div>


    
</body>

<script>
$(document).ready(function(){
$('#form').submit(function(e){
console.log("submitted")
e.preventDefault();
$.ajax({
type:"POST",
url:"register.php",
data:$("#form").serialize(),
dataType:'json',
//ContentType:'json',

           

// success: function(data){
// console.log(data);
//$.parseJSON
// }
success : function(data){
    //const obj=JSON.parse(data)
    console.log(("type of data = "+typeof(data)));
    console.log(data);

if ((data.code) == 'yes'){
    console.log("data = "+data);
    
    alert((data.msg));
    location.href = 'http://localhost/Projects/login.php';

}else if ((data.code) == 'no'){
    console.log("data = "+data);
    
    alert((data.msg));
    location.href = 'http://localhost/Projects/login.php';

}else{
    if ((data.code) == 'error'){
    console.log("data = "+data);
    
    alert((data.msg));

} 
} 

}

})
})
})
</script>


<hr />
    <div class="footer">©ProductServices2022</div>
</html>




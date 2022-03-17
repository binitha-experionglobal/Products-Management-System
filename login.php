<html>

<head>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                    LOGIN
                </h2>
                <hr>
        </div>

      

                

                <div>
                    <div class="row">
                        <div class="col-4 pb-3">
                            <h5>User Name </h5>
                        </div>
                        <div class="col-8 pb-3">
                            <input type="text" placeholder="Steve_Rogers" style="width: 85%;" name="username" required > 
                        </div>
                    </div>



                </div>
                <br>
                <div>
                    <div class="row">
                        <div class="col-4 pb-3">
                            <h5>Password </h5>
                        </div>
                        <div class="col-8 pb-3">


                            <input type="password" name="password" style="width: 85%;" id="password" required required >
                            



                        </div>
                        <div id="pass"></div>
                    </div>
                </div>
                <div class="pt-4 mr-2" style="align-self: flex-end;">

                <!-- <input type="submit" name="register" value="register"  id="reg" > -->
                            <input type="submit" name="submit" value="Login"  id="register"  
                            class='btn btn-secondary btn-xs me-3 text-black  ml-3'>
                            


                        </div>
                       
                        






</form>
<div class="pt-3" style="align-self: flex-end;">

<a href="http://localhost/Projects/registrationForm.php">Register here</a>
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
url:"loginInsert.php",
dataType:'json',
data:$("#form").serialize(),

success : function(data){
    //const obj=JSON.parse(data)
    console.log(("type of data = "+typeof(data)));
    console.log(data);
    var id= parseInt(data.code);

    parseInt(data.code)

if ((data.code) >0){
   
    console.log("data = "+data);
    
    alert((data.msg));
    
    
    location.href = 'http://localhost/Projects/demoProducts.php';
    

}else if ((data.code) == 0){
   
    console.log("data = "+data);

    $('#pass').val(data.msg);
   
     
        



    
    alert((data.msg));
    

}else{
    if ((data.code) == -1){
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




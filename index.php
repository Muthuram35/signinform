<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration </title>
    <link rel="stylesheet" href="css/style.css ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
<h2> Sign in/ Sign up Form</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form id="signup_form">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" name="name" placeholder="Name" />
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<button type="button" id="signup_btn">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form id="signin_form">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="email" name="email" placeholder="Email" />
			<input type="password" name="password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button type="button" id="signin_btn">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
</body>
<script src="js/script.js"></script>
<script>
        $(document).ready(function(){

//save the signup detals
    $("#signup_btn").on("click",function(){

        // var signupData = $("#signup_form").serialize();
        var signupData = new FormData($("#signup_form")[0]);
        signupData.append('action', 'signup');

        $.ajax({
            url: "ajax1.php",
            type:"POST",
            data : signupData,
            contentType:false,
            processData:false,
            success:function(response){
            
            response = JSON.parse(response);   

            if (response.status === 'success') {
                $("#signup_form")[0].reset();
            alert(response.msg);
            location.href  = 'details.php';

            } else if (response.status === 'error') {
                alert(response.msg);
            }

            },
            error:function(jqXHR, textStatus, errorThrown){
                console.log(errorThrown);                
            }
        })        
    });

    $("#signin_btn").on("click",function(){

        var signinData = new FormData($("#signin_form")[0]);
        signinData.append('action','login');

        $.ajax({
            url:"ajax1.php",
            type:"POST",
            data:signinData,
            processData:false,
            contentType:false,
            success:function(response){

                response = JSON.parse(response);   

                if (response.status === 'success') {
                    $("#signin_form")[0].reset();
                alert(response.msg);

                location.href  = "details.php"

                } else if (response.status === 'error') {
                    alert(response.msg);
                }
            },error:function(jqXHR, textStatus , errorThrown){
                console.log(errorThrown);
                
            }
        });
        
    });

});
</script>
</html>
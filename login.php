
<?php
session_start();

if(isset($_SESSION['userlogin'])){
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #headerStrip {
            background-color: #f00;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        #headerStrip h1 {
            margin: 0;
            font-size: 24px;
        }
        .container {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }
        h2 {
            color: #f00;
            margin-bottom: 20px;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #f00;
            border-radius: 4px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #f00;
            border: none;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover {
            background-color: #c00;
        }
        .underlineHover {
            color: #f00;
        }
        .underlineHover:hover {
            text-decoration: underline;
        }
        .fadeIn {
            animation-name: fadeIn;
            animation-duration: 1s;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div id="headerStrip">
        <h1>UWE</h1>
    </div>
    <div class="container">
        <div id="formContent">
            <div class="fadeIn first">
                <h2>Login</h2>
            </div>
            <form>
                <input type="email" id="email" class="fadeIn second" name="email" placeholder="Email" required>
                <input type="password" id="password" class="fadeIn third" name="login" placeholder="Password" required>
				<a href="info.php" class="btn btn-info fadeIn fourth zero-raduis">login help booklet </a>
                <input type="submit" class="fadeIn fourth" id="login" value="Log in">
                <div id="formFooter">
                    <a class="underlineHover" href="#">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        $(function(){
            $('#login').click(function(e){
                
                var valid = this.form.checkValidity();
                if(valid){
                    var username = $('#email').val();
                    var password = $('#password').val();
                }
                e.preventDefault();
                
                $.ajax({
                    type: 'Post',
                    url:'ajaxlogin.php',
                    data: {username:username,password:password},
                    success: function(data){
                        if($.trim(data) === "202"){
                            alert("Success");
                            setTimeout(' window.location.href =  "index.php"', 1000);
                        }else{
                            alert(data);
                        }
                    },
                    error: function(data){
                        alert("There were errors while performing the operation");
                    }
                });
            });
        });
    </script>
</body>
</html>
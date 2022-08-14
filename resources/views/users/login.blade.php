<!DOCTYPE html>


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Auto Verge</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>

            body {
                font-family:"Montserrat !important";
                margin-top:160px;
                margin-left: 150px;
            }

            h1, h2, h3, h4, h5, h6, a {
		            margin:0; padding:0;
            }

            .login {
                width: 320px;
                background: white;
                margin: 0;
                position: absolute;
                top: 55%;
                left: 47%;
                transform: translate(-50%, -50%);
                padding: 20px;
                font-family:Montserrat !important;
            }

            .login-header {
                color:#fff;
                text-align:center;
                font-size:28%;
            }

            .login-form h3 {
                text-align:left;
                color:#fff;
            }

            .login-form {
                box-sizing:border-box;
                padding-top:15px;
                padding-bottom:10%;
                margin:5% auto;
                text-align:center;
            }

            .login input[type="text"],
            .login input[type="password"],  .login input[type="number"]  {
                max-width:400px;
                width: 100%;
                line-height:3em;
                font-family: Montserrat;
                margin:1em 0em;
                border-radius:5px;
                border:2px solid #f2f2f2;
                outline:none;
                padding-left:10px;
            }

            .login-btn {
                height: 40px;
                background: #2846f0;
                border: unset;
                border-radius: 3px;
                color: white;
                text-transform: uppercase;
                cursor: pointer;
                margin: 5px 0px;
                max-width: 400px;
                width: 100%;
                margin-left:7px;
            }

            .login-btn:focus {
                outline: none;
                box-shadow: none;
            }

            .sign-up{
                color:#f2f2f2;
                margin-left:-70%;
                cursor:pointer;
                text-decoration:underline;
            }

            .no-access {
                color:#E86850;
                margin:20px 0px 20px -57%;
                text-decoration:underline;
                cursor:pointer;
            }

            .try-again {
                color:#f2f2f2;
                text-decoration:underline;
                cursor:pointer;
            }

            .color-orange{
                color: #2846f0 !important;
            }

            /*Media Querie*/
            @media only screen and (min-width : 150px) and (max-width : 530px){
                .login-form h3 {
                    text-align:center;
                    margin:0;
                }
                .sign-up, .no-access {
                    margin:10px 0;
                }
                .login-button {
                    margin-bottom:10px;
                }
            }

            .rem-con{
                width: 84%;
                height: 3vh;
                margin: auto;
                text-align: center;
                padding: 18px;
            }

            .logo_img {
                width: 170px;
                margin-top: -75px;
                position: absolute;
                margin-left: 72px;
                border-radius: 11px
            }
        </style>
    </head>
    <body style="height: 100vh">
        <link href='https://fonts.googleapis.com/css?family=Ubuntu:500' rel='stylesheet' type='text/css'>
        
        <div class="login">
            <div class="login-header">
                <h5 class="color-orange" style="font-size:20px;">Login</h5><br><br>
                <span style="font-size:12px;color:gray;">Please login with your username and password to continue.</span>
            </div>
            <form role="form" action="{{action('LoginController@login') }}" method="post">
                @csrf
                <div class="login-form">
                    <h3 class="color-orange" style="font-size:14px;">Username:</h3>
                    <input type="text" placeholder="Username" name="userName" required/><br>
                    <h3 class="color-orange" style="font-size:14px;">Password:</h3>
                    <input type="password" placeholder="Password" name="password" required/>
                    <br>
                    <button type="submit" class="login-button login-btn">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>

<script>
    localStorage.removeItem("userlevel");
    localStorage.removeItem("userid");
    localStorage.removeItem("name");
    localStorage.removeItem("token");
</script>
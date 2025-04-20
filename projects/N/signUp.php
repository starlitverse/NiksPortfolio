<?php
session_start();
?>

<?php include("header.php"); ?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body class="bg-info">
  <center>
    <div class="container">    
        <div id="signupbox" style="margin-top:150px; margin-left:375px; margin-right:800px; width:450px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-success" style="background-size:cover;">
                <div class="panel-heading" style="background-color: #0A122A; color: #fff;">
                    <div class="panel-title">Sign Up</div>
                </div>     

                <div style="padding-top:30px;" class="panel-body">
                    <?php
                    // Check if a success message is set in the session
                    if (isset($_SESSION['success_message'])) {
                        echo "<div class='alert alert-success'>{$_SESSION['success_message']}</div>";
                        unset($_SESSION['success_message']); // Clear the success message
                    }
                    ?>
                        
                    <form action="register_process.php" method="post">        
                        <!-- Name Field -->
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="signup-name" type="text" class="form-control" style="background-color:transparent; color:#000; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bolder;" name="name" placeholder="Full Name">
                        </div>

                        <!-- Username Field -->
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="signup-username" type="text" class="form-control" style="background-color:transparent; color:#000; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bolder;" name="username" placeholder="Username">
                        </div>
                        
                        <!-- Password Field -->
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="signup-password" type="password" class="form-control" style="background-color:transparent; color:#000; font-family:Arial, Helvetica, sans-serif; font-size:16px; font-weight:bolder;" name="password" placeholder="Password">
                        </div>

                        <!-- Centered Sign Up Button -->
                        <div style="margin-top:10px" class="form-group">
                            <div class="text-center">
                            <button type="submit" style="background-color: #0A122A; color: #fff; font-weight: bold; width: 150px; height: 35px; border-radius: 10px; ">Sign Up</button>
                            </div>
                        </div>
                        
                        <!-- Login Link -->
                        <div class="text-center" style="margin-top:20px;">
                            <span style="font-size:14px;">Already have an account?<a href="index.php" style="color: #2e3320; font-weight: bold;"> Admin Login</a></span>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
    </div> <!-- /container -->
  </center>
  
  <script src="js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

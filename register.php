<?php
    //Include Files
    include("includes/config.php");
    include("includes/classes/Account.php");
    include("includes/classes/Constants.php");

    // Create a new object of Account
    $account = new Account($con);
    
    // Include handlers for the account
    include("includes/handlers/register-handler.php");
    include("includes/handlers/login-handler.php");

    // Get input from user function
    function getInputValue($name){
        if(isset($_POST[$name])){
            echo $_POST[$name];

        }
    }
?>
<html>
<head>
    <title>Welcome to Slotify!</title>
    <link rel="stylesheet" type="text/css" href="assets/css/register.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>
    <?php
        // Check if the register button is set
        if(isset($_POST['registerButton'])){
            echo '<script>
            $(document).ready(function() {
                $("#loginForm").hide();
                $("#registerForm").show();
            });
            </script>';
        }
        else {
            echo '<script>
            $(document).ready(function() {
                $("#loginForm").show();
                $("#registerForm").hide();
            });
            </script>';
        }
    ?>
    
    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form id="loginForm" action="register.php" method="POST">
                    <h2>Login to your account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginFailed); ?>
                        <label for="loginUsername">Username</label>
                        <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. Bart Simpson" value="<?php getInputValue('loginUsername') ?>" required>
                    </p>
                    <p>
                        <label for="loginPassword">Password</label>
                        <input id="loginPassword" name="loginPassword" type="password" placeholder="Your Password" required>
                    </p>
                    <button type="submit" name="loginButton">LOG IN</button>

                    <div class="hasAccountText">
                        <span id="hideLogin">Don't have account yet? Signup here.</span>
                    </div>
                </form>  
                <form id="registerForm" action="register.php" method="POST">
                    <h2>Create your free account</h2>
                    <p> 
                        <?php echo $account->getError(Constants::$usernameTaken); ?>
                        <label for="registerUsername">Username</label>
                        <input id="registerUsername" name="registerUsername" type="text" placeholder="e.g. Bart Simpson" value="<?php echo getInputValue('registerUsername');?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$firstNameCharacters); ?>
                        <label for="firstname">First name</label>
                        <input id="firstname" name="firstname" type="text" placeholder="e.g. Bart Simpson" value="<?php echo getInputValue('firstname');?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$lastNameCharacters); ?>
                        <label for="lastname">Last name</label>
                        <input id="lastname" name="lastname" type="text" placeholder="e.g. Bart Simpson" value="<?php echo getInputValue('lastname');?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailTaken); ?>
                        <label for="email">email</label>
                        <input id="email" name="email" type="email" placeholder="123@me.com" value="<?php echo getInputValue('email');?>" required>
                    </p>

                    <p>
                        <label for="emailconfirm">Confirm email ?</label>
                        <input id="emailconfirm" name="emailconfirm" type="email" placeholder="e.g. Bart Simpson" value="<?php echo getInputValue('emailconfirm');?>" required>
                    </p>
                    <p>
                        <?php echo $account->getError(Constants::$passwordCharacters); ?>
                        <?php echo $account->getError(Constants::$passwordsNotAlphanumberic); ?>   
                        <?php echo $account->getError(Constants::$passwordsDoNotMatch); ?>
                        <label for="registerPassword">Password</label>
                        <input id="registerPassword" name="registerPassword" type="password" placeholder="Your Password" required>
                    </p>

                    <p>
                        <label for="regPasswordConf">Password</label>
                        <input id="regPasswordConf" name="regPasswordConf" type="password" placeholder="Your Password" required>
                    </p>
                    <button type="submit" name="registerButton">SIGN UP</button>

                    <div class="hasAccountText">
                        <span id="hideRegister">Already have an account? Login here.</span>
                        
                    </div>
                </form>  
            </div>
            <div id="loginText">
                <h1>Get great music, right now</h1>
                <h2>Listen to loads of songs for free</h2>
                <ul>
                    <li>Discover music you'll fall in lover with</li>
                    <li>Create your own playlist</li>
                    <li>Follow artist to keep up to date</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
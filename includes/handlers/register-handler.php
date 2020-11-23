<?php
    function sanitizeFormPassword($inputText){
        $inputText = strip_tags($inputText);
        return $inputText;
    }

    function sanitizeFormString($inputText){
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);
        $inputText = ucfirst(strtolower($inputText));
        return $inputText;
    }

    function sanitizeFormUsername($inputText){
        $inputText = strip_tags($inputText);
        $inputText = str_replace(" ","",$inputText);
        return $inputText;
    }
    
  

    if(isset($_POST['registerButton'])){
        //Register button was pressed
        $registerUsername = sanitizeFormUsername($_POST['registerUsername']);
        $firstname = sanitizeFormString($_POST['firstname']);
        $lastname = sanitizeFormString($_POST['lastname']);
        $email = sanitizeFormString($_POST['email']);
        $emailconfirm = sanitizeFormString($_POST['emailconfirm']);
        $registerPassword = sanitizeFormPassword($_POST['registerPassword']);
        $regPasswordConf = sanitizeFormPassword($_POST['regPasswordConf']);
        
        $wasSuccessful = $account->register($registerUsername,$firstname,$lastname,$email,$emailconfirm,$registerPassword,$regPasswordConf);
        
        if($wasSuccessful){
            $_SESSION['userLoggedIn'] = $username;
            header("Location: index.php");
        }
        
    }

?>

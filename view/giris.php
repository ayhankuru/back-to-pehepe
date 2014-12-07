<?php 
 		 if($foxy->Post("username") || $foxy->Post("parola") ){ 
            $_SESSION['username'] = "testsdgs";
             header('Location: /');  
        }else{
        	 header('Location: /login');
        }


?>
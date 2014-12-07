<?php 

require_once "modul/db.php";
require_once "modul/router.php";
require_once "modul/template.php";


$router = new Router();

$temp = new Template("view/header.php","view/footer.php");
session_start();


$router->get('/', function() use ($temp){ 
    $temp->variables = array("title" => "bla bla bla"); 
    $temp->render(function() use($temp){ 
           
          include "view/home.php";
  
      });
});

$router->get('/login', function() use ($temp){ 

    $temp->variables = array("title" => "HaberBox - Giriş Yap"); 
    $temp->render(function() use($temp){
        
        include "view/login.php";

    });
    
});

$router->post('/giris', function() use ($pdo){
    if($_POST['username'] || $_POST['parola'] ){ 
              $kullanici_adi =$_POST['username'] ;
              $password =md5($_POST['parola']);
              $query = $pdo->query("SELECT id,username FROM user WHERE username = '{$kullanici_adi}' and password ='{$password}' ")->fetch(PDO::FETCH_ASSOC);
              if($query){
                $_SESSION['id'] = $query["id"];
                $_SESSION['username'] = $query["username"];
                header('Location: / ');
              }else{
                header('Location: /login');    
              }
        }else{ 
            
            header('Location: /login');
        }
});

$router->get('/logout', function(){ 
    session_destroy();
    header('Location: / ');
});



//$foxy->Route("/haber/ekle", function() use ($foxy,$temp){
//
//     if($foxy->Files('bla')){
//     	copy($foxy->Files('bla')['tmp_name'],'./public/upload/'.
//               $foxy->Files('bla')['name']);
//          echo '<h4>Dosyaniz alindi.</h4> Alinan dosya bilgileri <br/>Isim:'.
//               $foxy->Files('bla')['name'].'<br/>';
//          echo 'Boyut: '.($foxy->Files('bla')['size']/1024).' KB<br>';
//          echo 'Türü : '.$foxy->Files('bla')['type'].'<hr>';
//     }
//});
//
// 
//
//
$router->match();
?>
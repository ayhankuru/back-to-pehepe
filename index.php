<?php 

require_once "modul/config.php";
require_once "modul/db.php";
require_once "modul/router.php";
require_once "modul/template.php";

$router = new Router();

$temp = new Template("view/header.php","view/footer.php");
$temp->uri(uri);

session_start();


$router->get('/', function() use ($temp){ 
    $temp->variables = array("title" => "HaberBox"); 
    $temp->render(function() use($temp){ 
           
          include "view/home.php";
  
      });
});


$router->get('/kategoriler', function() use ($temp){ 
    $temp->variables = array("title" => "HaberBox - Kategoriler"); 
    $temp->render(function() use($temp){ 
           
          include "view/kategoriler.php";
  
      });
});

 
 

$router->get('/ekle/:komut', function($komut) use ($temp){ 
    
      switch ($komut) {
        case 'haber':
               $temp->variables = array("title" => "HaberBox - Haber Ekle"); 
               $temp->render(function() use($temp){ 
                       
                      if($_SESSION['username']){
                        include "view/hab_ekle.php";  
                      }else{
                         header('Location: /login');
                      }
                      
              
                  });
          break;
        case 'kategori':
            
            $temp->variables = array("title" => "HaberBox - Kategori Ekle"); 
             $temp->render(function() use($temp){ 
               
              if($_SESSION['username']){
                include "view/kat_ekle.php";  
              }else{
                 header('Location: /login');
              }
              
      
            });

          break;
        default:
          $temp->variables = array("title" => "404"); 
             $temp->render(function() use($temp){  
                include "view/404.php";  
             
      
            });
          break;
      }



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

$router->post('/ekle/:komut',function($komut) use ($pdo){
      switch ($komut) {
        case 'haber':
          header('Location: / ');
          break; 
         case 'kategori':
          if($_POST['kat_baslik'] || $_POST['kat_aciklama']){
              $baslik =$_POST['kat_baslik'] ;
              $aciklama =$_POST['kat_aciklama']; 
              $query = $pdo->prepare("INSERT INTO kategori(baslik,aciklama) VALUES(?,?) ");
              $insert = $query->execute(array(
                   $baslik , $aciklama
              ));
              if($insert){
                header('Location: /kategoriler ');
              }else{
                header('Location: /ekle/kategori');    
              }

          }else{
            header('Location: /ekle/kategori ');
          }
          
          break; 
        default:
          header('Location: / ');
          break;
      }
});

$router->get('/logout', function(){ 
    session_destroy();
    header('Location: / ');
});

$router->notFound('/hata', function(){ 
    echo "hata";
});


$router->post('/bla/bla', function(){ 
    print_r($_POST);
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
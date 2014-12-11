<?php 

require_once "modul/config.php";
require_once "modul/db.php";
require_once "modul/router.php";
require_once "modul/template.php";

$router = new Router();

$temp = new Template("view/header.php","view/footer.php");
$temp->uri(uri);

session_start();


$router->get('/', function() use ($temp,$pdo){ 
    $temp->variables = array("title" => "HaberBox"); 
    $temp->render(function() use($temp,$pdo){ 
           
          include "view/home.php";
  
      });
});

$router->get('/haber/show/:id', function($id) use ($temp,$pdo){ 
    $temp->variables = array("title" => "HaberBox"); 
    $temp->render(function() use($temp,$id,$pdo){ 
           
           include "view/haber_show.php";
  
      });
});

$router->get('/haber/kat/:kat', function($kat) use ($temp,$pdo){ 
    $temp->variables = array("title" => "HaberBox"); 
    $temp->render(function() use($temp,$kat,$pdo){ 
           
          include "view/haber_kat.php";
  
      });
});


$router->get('/kategoriler', function() use ($temp,$pdo){ 
    $temp->variables = array("title" => "HaberBox - Kategoriler"); 
    $temp->render(function() use($temp,$pdo){ 
           
          include "view/kategoriler.php";
  
      });
});


$router->post('/kategori/edit', function() use ($temp,$pdo){
    if($_SESSION['username']){ 
      if($_POST['kat_baslik'] || $_POST['kat_aciklama'] || $_POST['id'] ){ 
              $baslik =htmlspecialchars($_POST['kat_baslik']);
              $aciklama = htmlspecialchars($_POST['kat_aciklama']);
              $id =$_POST['id'];
              $query = $pdo->prepare("UPDATE kategori SET baslik = ? , aciklama = ?  WHERE id = ?");
              $update = $query->execute(array($baslik,$aciklama,$id));
              if ( $update ){
                  header('Location: /kategoriler ');
              }else{
                header('Location: / ');
              }

      }else{
        header('Location: / ');
      }
     }else{
      header('Location: /login');
    }
});

$router->get('/kategori/edit/:id', function($id) use ($temp,$pdo){
    if($_SESSION['username']){ 
    $temp->variables = array("title" => "HaberBox - Kategori Düzenle"); 
    $temp->render(function() use($temp,$pdo,$id){ 
           
          include "view/kat_duzenle.php";
  
      });
     }else{
      header('Location: /login');
    }
});

$router->get('/kategori/delete/:id', function($id) use ($temp,$pdo){ 
    if($_SESSION['username']){
    $temp->variables = array("title" => "HaberBox - Kategori Sil"); 
    $temp->render(function() use($temp,$pdo,$id){ 
           
          include "view/kat_sil.php";
  
      });
    }else{
      header('Location: /login');
    }
});
 
$router->get('/haber/delete/:id', function($id) use ($temp,$pdo){ 
    if($_SESSION['username']){
    $temp->variables = array("title" => "HaberBox - Haber Sil"); 
    $temp->render(function() use($temp,$pdo,$id){ 
           
          include "view/haber_sil.php";
  
      });
    }else{
      header('Location: /login');
    }
});

$router->get('/haber/edit/:id', function($id) use ($temp,$pdo){ 
    if($_SESSION['username']){
    $temp->variables = array("title" => "HaberBox - Haber Düzenle"); 
    $temp->render(function() use($temp,$pdo,$id){ 
           
          include "view/haber_duzenle.php";
  
      });
    }else{
      header('Location: /login');
    }
});
 
$router->post('/haber/edit', function() use ($temp,$pdo){
    if($_SESSION['username']){ 
      if($_POST['baslik'] || $_POST['content'] || $_POST['id'] || $_POST['kat'] || $_POST['tagid'] || $_POST['tag']){ 
              $baslik =htmlspecialchars($_POST['baslik']);
              $content = htmlspecialchars($_POST['content']);
              $id =htmlspecialchars($_POST['id']);
              $katid=htmlspecialchars($_POST['kat']);
              $tid=htmlspecialchars($_POST['tagid']);
              $tag=htmlspecialchars($_POST['tag']);
              
              $query = $pdo->prepare("UPDATE haber SET baslik = ? , content = ?  WHERE id = ?");
              $update = $query->execute(array($baslik,$content,$id));

              $kquery = $pdo->prepare("UPDATE haber_kat SET  kat_id = ?  WHERE id = ?");
              $kupdate = $kquery->execute(array($katid,$id));

              $tquery = $pdo->prepare("UPDATE tag SET  content = ?  WHERE id = ?");
              $tupdate = $tquery->execute(array($tag,$tid));

              if ( $update || $tupdate || $kupdate ){
                  header('Location: / ');
              }else{
                header('Location: / ');
              }

      }else{
        header('Location: / ');
      }
     }else{
      header('Location: /login');
    }
});

$router->get('/ekle/:komut', function($komut) use ($temp,$pdo){ 
      if($_SESSION['username']){
        switch ($komut) {
          case 'haber':
                 $temp->variables = array("title" => "HaberBox - Haber Ekle"); 
                 $temp->render(function() use($temp,$pdo){  
                          include "view/hab_ekle.php";   
                
                    });
            break;
          case 'kategori':
              
              $temp->variables = array("title" => "HaberBox - Kategori Ekle"); 
               $temp->render(function() use($temp){ 
                 
                
                  include "view/kat_ekle.php";  
                
        
              });

            break;
          default:
            $temp->variables = array("title" => "404"); 
               $temp->render(function() use($temp){  
                  include "view/404.php";  
               
        
              });
            break;
        }

    }else{
        header('Location: /login');
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
              $kullanici_adi =htmlspecialchars($_POST['username']);
              $password =md5(htmlspecialchars($_POST['parola']));
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
      if($_SESSION['username']){
        switch ($komut) {
          case 'haber':
            if($_POST['tag'] || $_FILES['cover'] || $_POST['baslik'] || $_POST['content'] || $_POST['kat']){
                  
                  // Tag variables
                  $tag_content=htmlspecialchars($_POST['tag']);


                  $tag_query = $pdo->prepare("INSERT INTO tag(content) VALUES(?) ");

                  $tag_query->execute(array($tag_content)); 
                  $tag_last_id = $pdo->lastInsertId();

                  // File variables

                  $cover_name ='cover_'.mt_rand(10,10000);
                  $cover_dir =upload_dir.$cover_name.'.'.split('[/.-]', $_FILES['cover']['type'])[1];
                  $cover_desc="Bu Dosya ".$_SESSION['username']." tarafından eklendi ";

                  copy($_FILES['cover']['tmp_name'],$cover_dir);


                  $foto_query = $pdo->prepare("INSERT INTO fotograf(foto_name,foto_desc,foto_dizin) VALUES(?,?,?) ");

                  $foto_query->execute(array($cover_name,$cover_desc,$cover_dir)); 
                  $foto_last_id = $pdo->lastInsertId();

                  // Haber variables

                  $haber_baslik =htmlspecialchars($_POST['baslik']);
                  $haber_content =htmlspecialchars($_POST['content']);

                  $haber_query = $pdo->prepare("INSERT INTO haber(baslik,content,foto_id,tag_id) VALUES(?,?,?,?) ");

                  $haber_query->execute(array($haber_baslik,$haber_content,$foto_last_id,$tag_last_id)); 
                  $haber_last_id = $pdo->lastInsertId();

                  // Kategori variables

                  $kat_id = htmlspecialchars($_POST['kat']);

                  $kat_query = $pdo->prepare("INSERT INTO haber_kat(haber_id,kat_id) VALUES(?,?) ");

                  $kat_query->execute(array($haber_last_id,$kat_id)); 
                  

                  header('Location: /');   
            }

            break; 
           case 'kategori':
            if($_POST['kat_baslik'] || $_POST['kat_aciklama']){
                $baslik =htmlspecialchars($_POST['kat_baslik']);
                $aciklama =htmlspecialchars($_POST['kat_aciklama']); 
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

    }else{
        header('Location: /login');
    }
       
});

$router->get('/logout', function(){ 
    session_destroy();
    header('Location: / ');
});

$router->notFound('/hata', function() use ($temp){ 
    $temp->variables = array("title" => "404"); 
               $temp->render(function() use($temp){  
                  include "view/404.php";  
               
        
              });
});

 $router->get('/bla/bla/:id', function($id){ 
    echo $id;
});

 

$router->match();
?>

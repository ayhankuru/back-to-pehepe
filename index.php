<?php 

require_once "modul/foxyroute.php";
require_once "modul/template.php";

$foxy = new FoxyRoute();

$temp = new Template("view/header.php","view/footer.php");

 

$foxy->Route("/", function() use ($foxy,$temp){ 
     
    $temp->variables = array("title" => "bla bla bla"); 
    $temp->render(function() use($foxy,$temp){

        
        $title="<b> Haber Box </b>";
         
        include "view/home.php";

    });
    


});

$foxy->Route("/login", function() use ($foxy,$temp){ 

    $temp->variables = array("title" => "HaberBox - Giriş Yap"); 
    $temp->render(function() use($foxy,$temp){
        
        include "view/login.php";

    });
    
});

$foxy->Route("/giris", function() use ($foxy,$temp){

    $temp->variables = array("title" => "HaberBox - Giriş Yap"); 
    $temp->render(function() use($foxy,$temp){
        
        include "view/giris.php";

    });
    
});

$foxy->Route("/haber/ekle", function() use ($foxy,$temp){

     if($foxy->Files('bla')){
     	copy($foxy->Files('bla')['tmp_name'],'./public/upload/'.
               $foxy->Files('bla')['name']);
          echo '<h4>Dosyaniz alindi.</h4> Alinan dosya bilgileri <br/>Isim:'.
               $foxy->Files('bla')['name'].'<br/>';
          echo 'Boyut: '.($foxy->Files('bla')['size']/1024).' KB<br>';
          echo 'Türü : '.$foxy->Files('bla')['type'].'<hr>';
     }
});

 

?>
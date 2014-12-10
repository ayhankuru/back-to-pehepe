<!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
          <a class="navbar-brand" href="#">Haber Box</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <?php include "menu.php"; ?>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <div class="row">
          
          <div class="col-lg-10">
            <h3>Gündemden Haberler...</h1>
          </div>

          <div class="col-lg-2">
            

           <?php 

               $query = $pdo->query("SELECT * FROM kategori")->fetchAll(PDO::FETCH_ASSOC);
                   if ( $query || count($query) > 1 ){
                   ?>
                   <select class="form-control" id="kat">
                   <option> Hepsi </option>
                   <?php
                     for ($i=0; $i < count($query) ; $i++) { 
                   ?>
                   <option value="<?php  echo $query[$i]['id']; ?>"><?php  echo $query[$i]['baslik']; ?></option>
                  <?php  }  ?>                           
                    </select> 
               <?php } ?>
          </div>
        <script type="text/javascript">
        $(function(){
            $( "#kat" ).change(function() {
              var value =$( "select option:selected" ).val();
              if(value !=="Hepsi") window.location.href =window.location.href+'haber/kat/'+value;
            });
        });
        </script>
        </div> 
      </div>
      
      <div class="row">
        
        <div class="col-lg-4"> 
                    <h3 class="text-center"><a href="#">Subheading</a></h4>
                     <img src="<?php echo uri; ?>/public/upload/10649817_10204311162476317_5313655160896017934_n.jpg" alt="..." class="img-rounded cover">
                     <p class="lead">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
                     <p><mark><a href="#">highlight</a></mark>,<mark><a href="#">highlight</a></mark>,<mark><a href="#">highlight</a></mark></p>
                  
        </div>
        
         <div class="col-lg-4"> 
                    <h3 class="text-center"><a href="#">Subheading</a></h4>
                     <img src="<?php echo uri; ?>/public/upload/10649817_10204311162476317_5313655160896017934_n.jpg" alt="..." class="img-rounded cover">
                     <p class="lead">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
                     <p><mark><a href="#">highlight</a></mark>,<mark><a href="#">highlight</a></mark>,<mark><a href="#">highlight</a></mark></p>
                  
        </div>

         <div class="col-lg-4"> 
                    <h3 class="text-center"><a href="#">Subheading</a></h4>
                     <img src="<?php echo uri; ?>/public/upload/10649817_10204311162476317_5313655160896017934_n.jpg" alt="..." class="img-rounded cover">
                     <p class="lead">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
                     <p><mark><a href="#">highlight</a></mark>,<mark><a href="#">highlight</a></mark>,<mark><a href="#">highlight</a></mark></p>
                  
        </div>
        
        <div class="col-lg-4"> 
                    <h3 class="text-center"><a href="#">Subheading</a></h4>
                     <img src="<?php echo uri; ?>/public/upload/10649817_10204311162476317_5313655160896017934_n.jpg" alt="..." class="img-rounded cover">
                     <p class="lead">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
                     <p><mark><a href="#">highlight</a></mark>,<mark><a href="#">highlight</a></mark>,<mark><a href="#">highlight</a></mark></p>
                  
        </div>
        
         <div class="col-lg-4"> 
                    <h3 class="text-center"><a href="#">Subheading</a></h4>
                     <img src="<?php echo uri; ?>/public/upload/10649817_10204311162476317_5313655160896017934_n.jpg" alt="..." class="img-rounded cover">
                     <p class="lead">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
                     <p><mark><a href="#">highlight</a></mark>,<mark><a href="#">highlight</a></mark>,<mark><a href="#">highlight</a></mark></p>
                  
        </div>

         <div class="col-lg-4"> 
                    <h3 class="text-center"><a href="#">Subheading</a></h4>
                     <img src="<?php echo uri; ?>/public/upload/10649817_10204311162476317_5313655160896017934_n.jpg" alt="..." class="img-rounded cover">
                     <p class="lead">Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
                     <p><mark><a href="#">highlight</a></mark>,<mark><a href="#">highlight</a></mark>,<mark><a href="#">highlight</a></mark></p>
                  
        </div>
      </div>

    </div>

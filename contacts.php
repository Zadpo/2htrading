<!DOCTYPE html>
<html>
    <head>
        <?php
            $title = "H2 Trading The Best Hardware Store";
            require_once('utility/header.php');
            load_css('index-navbar');
            load_css('index');
            load_css('contacts');
      


            auth_outside();

        ?>
    </head>
    <body>
        <?php render_navbar('index'); ?>
        <div class="wrapper">
            
          <h2>Contact Us</h2>
          
  <div class="email"><i class="fas fa-envelope"></i> twohtrading@yahoo.com</div>
  <div class="phone"><i class="fas fa-mobile-alt"></i> 09228459029</div>
  <div class="telephone" ><i class="fas fa-phone"></i>  87889302</div>

        </div>
        <footer>
            <p>2-H Trading Allright Reserved &copy; 2022</p>
            
        </footer>
        <?php package_manager('script') ?>
    </body>
</html>
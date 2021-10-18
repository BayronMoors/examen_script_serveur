<?php  
/**
 * 
 *  ./app/views/templates/index.php
 * 
 */

 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
   <?php  include_once "../app/views/templates/partials/_head.php";?>
  </head>

  <body>
    <!-- Preloader Start -->
    <div class="preloader">
      <div class="rounder"></div>
    </div>
    <!-- Preloader End -->

    <div id="main">
      <div class="container">
        <div class="row">
          <!-- About Me (Left Sidebar) Start -->
          <?php include_once "../app/views/templates/partials/_side.php"; ?>
          <!-- About Me (Left Sidebar) End -->

          <!-- Blog Post (Right Sidebar) Start -->
          <div class="col-md-9">
          <?php echo $content; ?>

            <!-- Footer Start -->
            <?php include_once "../app/views/templates/partials/_footer.php"; ?>
            <!-- Footer End -->
          </div>
          <!-- Blog Post (Right Sidebar) End -->
        </div>
      </div>
    </div>

    <!-- Back to Top Start -->
    <a href="#" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
    <!-- Back to Top End -->
    <?php include_once "../app/views/templates/partials/_script.php"; ?>

    <!-- All Javascript Plugins  -->

  </body>
</html>

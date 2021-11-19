<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Sansci | Meeting Room, Working Space, and Cafe</title>
    
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-onix-digital.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/newStyle.css">
  </head>

  <body style="background-color: #FEF5ED">

  <!-- ***** Preloader Start ***** -->
  <!-- <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div> -->
  <!-- ***** Preloader End ***** -->

  <?php include('headerAdmin.php')?>

  <div id="pricing" class="pricing-tables">
    <div class="tables-left-dec">
      <img src="assets/images/tables-left-dec.png" alt="">
    </div>
    <div class="tables-right-dec">
      <img src="assets/images/tables-right-dec.png" alt="">
    </div>
    <div class="container">
      <div class="row" style="margin-top:30px">
        <div class="col-lg-6 buttonAdmin"><a href="showCheckOutReserved.php">
          <div class="item second-item" style="margin: 10px; padding:30px; border: black solid">
          <br>
          <img src="assets/images/feature.png" style="width:50%; margin-bottom:30px" alt="">
          <br>
            <h5>Checkout Reservation</h5>
            <br>
          </div>
        </a></div>
        <!-- <div class="col-lg-4 buttonAdmin"><a href="#">
          <div class="item third-item" style="margin: 10px; padding:30px; border: black solid">
          <br>
          <img src="assets/images/refresh.png" style="width:80%; margin-bottom:30px" alt="">
          <br>
            <h5>Update Room n Table</h5>
            <br>
          </div>
        </a></div> -->
        <div class="col-lg-6 buttonAdmin"><a href="showIncome.php">
          <div class="item first-item" style="margin: 10px; padding:30px; border: black solid">
          <br>
          <img src="assets/images/piggy-bank.png" style="width:50%; margin-bottom:30px" alt="">
            <br>
            <h5>See Income</h5>
            <br>
          </div>
        </a></div>
      </div>
    </div>
  </div>
  
  <?php include('footer.php')?>
  
  <style>
    .buttonAdmin a {
        display: inline-block;
        font-size: 15px;
        font-weight: 400;
        text-transform: capitalize;
        border-radius: 23px;
        transition: all .3s;
    }
    .buttonAdmin a:hover {
        background-color: black;
        color: #fff;
        border-radius: 20px;
    }
    .pricing-tables .item h5 {
      margin-top:20px;
      font-size: 25px;
      font-weight: 700;
      color: #2a2a2a;
    }
  </style>

  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/newScript.js"></script> <!-- additional -->

  <script>
  // Acc
    $(document).on("click", ".naccs .menu div", function() {
      var numberIndex = $(this).index();
      if (!$(this).is("active")) {
          $(".naccs .menu div").removeClass("active");
          $(".naccs ul li").removeClass("active");

          $(this).addClass("active");
          $(".naccs ul").find("li:eq(" + numberIndex + ")").addClass("active");

          var listItemHeight = $(".naccs ul")
            .find("li:eq(" + numberIndex + ")")
            .innerHeight();
          $(".naccs ul").height(listItemHeight + "px");
        }
    });
  </script>
</body>
</html>
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
    <h5>History Room Transactions :</h5><br>
    <?php
        include('connect.php');
        $sql = "SELECT a.transactionDate, a.reservedDate, d.firstName, d.lastName, c.roomType, a.paymentMethod, c.roomPrice  FROM transactions a JOIN roomtransactions b ON a.transactionId = b.transactionId JOIN rooms c ON c.roomId = b.roomId JOIN users d ON d.userId = a.userId WHERE a.status = 1 GROUP BY a.transactionId ORDER BY c.roomType, a.transactionDate";
        $result = mysqli_query($con,$sql);
        echo "<div style='margin: 0 0 auto;width:93%'>";
        echo "<br><table class='col-lg-12 seperate-6'>
                  <tr><th>Order Date</th><th>Reserved Date</th><th>Name</th><th>Order Type</th><th>Payment Method</th><th>Price</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2] $row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
        }
        echo "</table></div>";
    ?>
  </div>

  <div id="pricing" class="pricing-tables"><h5>Income :</h5><br>
    <?php
        include('connect.php');
        $sql = "SELECT c.roomType, c.roomPrice, COUNT(DISTINCT(c.roomType)), (c.roomPrice * COUNT(DISTINCT(c.roomType))) AS 'Income' FROM transactions a JOIN roomtransactions b ON a.transactionId = b.transactionId JOIN rooms c ON c.roomId = b.roomId JOIN users d ON d.userId = a.userId WHERE a.status = 1 GROUP BY a.transactionId, c.roomType";
        $result = mysqli_query($con,$sql);
        echo "<div style='margin: 0 0 auto;width:93%'>";
        echo "<br><table class='col-lg-12 seperate-4'>
                  <tr><th>Room Type</th><th>Room Price</th><th>Ordered</th><th>Income</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td></tr>";
        }
        echo "</table></div>";
    ?>
  </div>

  <?php include('footer.php')?>
  
  <style>
    .positioningButton {
        margin-left: 50px;
        width:100%;
    }
    table tr th, table tr td {
        width:20%;
    }
    tr{
        text-align: center;
    }
    table, table td, table th {
        margin:10px 50px;
        border: 3px solid black;
    }
    table th {
        text-align:center;
    }
    table td {
        padding-left:30px;
        width:25%;
        text-align: left;
    }
    tr td, tr th {
        width: 120px;
    }
    h5 {
      margin-left: 50px;
      margin-bottom: -40px;
      font-size: 25px;
      font-weight: 700;
      color: #2a2a2a;
    }
    .seperate-6 tr th, .seperate-6 tr td{
        width: 16.66%;
    }
    .seperate-4 tr th, .seperate-4 tr td {
        width:25%;
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
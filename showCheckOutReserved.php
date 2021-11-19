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
    <h5>Room Booked :</h5><br>
    <?php
        include('connect.php');
        $sql = "SELECT a.transactionId, a.transactionDate, a.reservedDate, d.firstName, d.lastName, c.roomType FROM transactions a JOIN roomTransactions b ON a.transactionId = b.transactionId JOIN rooms c ON b.roomId = c.roomId JOIN users d ON d.userId = a.userId WHERE c.status = '1' AND a.status = '0' GROUP BY a.transactionId ORDER BY a.reservedDate";
        $result = mysqli_query($con,$sql);
        echo "<form action='#' method='post' style='margin: 0 0 auto;width:93%'>";
        echo "<br><table class='col-lg-12'>
                  <tr><th>Order Date</th><th>Reserved Date</th><th>Name</th><th>Room Type</th><th>Check Out Reserved</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3] $row[4]</td><td>$row[5]</td><td style='text-align: center; padding-left: 0px'><a href='checkoutRoomProcess.php?index=$row[0]'>Check Out</a></td></tr>";
        }
        echo "</table></form>";
    ?>
    <h5>Table Booked :</h5><br>
    <?php
        include('connect.php');
        $sql = "SELECT a.transactionId, a.transactionDate, a.reservedDate, d.firstName, d.lastName, c.tableType FROM transactions a JOIN tableTransactions b ON a.transactionId = b.transactionId JOIN tables c ON b.tableId = c.tableId JOIN users d ON d.userId = a.userId WHERE c.status = '1' AND a.status = '0' GROUP BY a.transactionId ORDER BY a.reservedDate";
        $result = mysqli_query($con,$sql);
        echo "<form action='#' method='post' style='margin: 0 0 auto;width:93%'>";
        echo "<br><table class='col-lg-12'>
                  <tr><th>Order Date</th><th>Reserved Date</th><th>Name</th><th>Table Type</th><th>Check Out Reserved</th></tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>$row[1]</td><td>$row[2]</td><td>$row[3] $row[4]</td><td>$row[5]</td><td style='text-align: center; padding-left: 0px'><a href='checkoutTableProcess.php?index=$row[0]'>Check Out</a></td></tr>";
        }
        echo "</table></form>";
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
        width:20%;
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
    a {
      color: #0d6efd;
      text-decoration: underline;
    }
    a:hover {
      color: #0a58ca;
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
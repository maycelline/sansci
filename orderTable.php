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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <title>Sansci | Working Space and Cafe</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-onix-digital.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/newStyle.css">
</head>

<body>

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

    <!-- ***** Header Area Start ***** -->
    <?php include('header.php'); ?>
    <!-- ***** Header Area End ***** -->

    <div id="about" class="about-us section">
        <div class="container">
            <h2><em>Choose</em> your <span>table</span></h2>
            <div class="row">
                <div class=" col-lg-6">
                    <div class="section-heading">
                        <div class="row">
                            <div id="contact" class="section">
                                <div class="container">
                                    <div class="row" style="font-size: 15px;">
                                        <form id="update" action="submitOrderTable.php" method="post" enctype="multipart/form-data">
                                            <script>
                                                function showTableList() {
                                                    var str = document.getElementById("roomName").value;
                                                    var text = "<br><label style='margin-right: 30px;'>Capacity :</label><br>";
                                                    if (str == "Co-Working") {
                                                        text += "<select name='capacitySelected' id='capacitySelected' required=''>";
                                                        text += "<option value='' disabled selected>Choose Capacity</option>";
                                                        text += "<option value='4'>4</option><option value='6'>6</option><option value='10'>10</option></select>";
                                                    } else if (str == "Indoor Cafe" || str == "Outdoor Cafe") {
                                                        text += '<select name="capacitySelected" id="capacitySelected" required=""><option value="" disabled selected>Choose Capacity</option><option value="4">4</option><option value="6">6</option><option value="8">8</option></select>';
                                                    }
                                                    document.getElementById('tableChoose').innerHTML = text;
                                                }
                                            </script>
                                            <fieldset>
                                                <br><label style="margin-right: 17px;">Room Type : </label>
                                                <select name="roomName" id="roomName"
                                                    onchange="showTableList()" required="">
                                                    <option disabled selected>Choose Room
                                                    </option>
                                                    <option value="Co-Working">Co-Working Space
                                                    </option>
                                                    <option value="Indoor Cafe">Indoor Cafe
                                                    </option>
                                                    <option value="Outdoor Cafe">Outdoor Cafe
                                                    </option>
                                                </select>
                                            </fieldset>
                                            <fieldset>
                                                <div id="tableChoose">
                                                    <br><label style="margin-right: 32px;">Capacity : </label>
                                                    <select name="capacitySelected" id="capacitySelected" required="">
                                                        <option disable selected>Choose Capacity</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <br><label style="margin-right: 10px;">Booked Date : </label>
                                                <input type="date" name="bookedDate" id="bookedDate" required="">
                                            </fieldset>
                                            <fieldset>
                                                <label style="margin-right: 10px;">Booked Time : </label>
                                                <input type="time" name="bookedTime" id="bookedTime" value="11:00" required>
                                            </fieldset>
                                            <fieldset>
                                                <label style="margin-right: 40px;">Payment : </label>
                                                <select name="paymentMethod" id="paymentMethod" required="">
                                                    <option disabled selected>Choose Payment Method
                                                    </option>
                                                    <option value="Transfer - BCA">Transfer - BCA
                                                    </option>
                                                    <option value="OVO">OVO
                                                    </option>
                                                    <option value="GoPay">GoPay
                                                    </option>
                                                </select>
                                                
                                            </fieldset>
                                            <br><br>
                                            <fieldset>
                                                <label style="margin-right: 10px;">Upload File : </label>
                                                <input type="file" name="file" required style="width: 100%;">
                                            </fieldset>
                                            <fieldset>
                                                <br><button type="submit" id="form-submit" class="main-button"
                                                    style="width:92%">Order</button><br><br>
                                                <br>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div class="left-image">
                        <img src="assets/images/about-left-image.png" alt="Co-Working Space">
                    </div>
                </div>
            </div>

        </div>
        <?php include('footer.php')?>
</body>
<style>
    .container h2 {
        margin: 0 auto 30px;
        text-align: center;
        font-size: 350%;
        /* font-weight: 400; */
    }

    .container h2 em {
        font-style: normal;
        color: #03a4ed;
    }

    .container h2 span {
        color: #ff695f;
        font-weight: 700;
        opacity: 1;
        text-transform: capitalize;
    }

    form#update {
        margin-left: 0px;
        position: relative;
        z-index: 2;
        padding: 60px 120px;
        border-radius: 20px;
        margin-top: 30px;
    }

    form#update input {
        width: 50%;
        height: 46px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid #9bdbf8;
        border-top: none;
        border-left: none;
        border-right: none;
        outline: none;
        font-size: 15px;
        font-weight: 300;
        color: #2a2a2a;
        padding: 0px 0px;
        margin-bottom: 25px;
    }

    form#update input::placeholder {
        color: #afafaf;
    }

    form#update button {
        display: inline-block;
        background-color: #ff695f;
        font-size: 15px;
        font-weight: 400;
        color: #fff;
        text-transform: capitalize;
        padding: 12px 25px;
        border-radius: 23px;
        letter-spacing: 0.25px;
        border: none;
        outline: none;
        transition: all .3s;
    }

    form#update button:hover {
        background-color: #03a4ed;
    }
</style>

</html>
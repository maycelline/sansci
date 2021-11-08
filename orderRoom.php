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

    <!-- Additional jQuery -->
    <link href="http://wvega.github.io/timepicker/resources/jquery-timepicker/jquery.timepicker.min.css" rel="stylesheet" />
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

    <?php include('header.php'); ?>

    <div id="about" class="about-us section">
        <div class="container">
            <h2><em>Let's</em> order <span>a room</span></h2>
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-image">
                        <img src="assets/images/about-left-image.png" alt="Two Girls working together"">
                    </div>
                </div>
                <div class=" col-lg-6">
                        <div class="section-heading">
                            <div class="row">
                                <div id="contact" class="section">
                                    <div class="container">
                                        <div class="row" style="font-size: 15px; width: 125%;">
                                            <form id="update" action="submitOrder.php" method="post">
                                                <script>
                                                    function showTableList(value) {
                                                        if(value != undefined){
                                                            var str = value;
                                                        } else {
                                                            var str = document.getElementById("roomName").value;
                                                        }
                                                        var text = "";
                                                        if (str == "small") {
                                                            text += "<select name='tableSelected' id='tableSelected' required=''>";
                                                            text += "<option value='' disabled selected>Choose Table</option>";
                                                            text += "<option value='U-Shape Table' selected>U-Shape Table</option></select>";
                                                        } else if (str == "medium") {
                                                            text += '<select name="tableSelected" id="tableSelected" required=""><option value=""disabled>Choose Room</option><option value="U-Shape Table" selected>U-Shape Table</option><option value="Round Table">Round Table</option></select>';
                                                        } else if (str == "large") {
                                                            text += '<select name="tableSelected" id="tableSelected" required=""><option value=""disabled>Choose Room</option><option value="U-Shape Table" selected>U-Shape Table</option><option value="Round Table">Round Table</option><option value="Theatre Table">Theatre Table</option><option value="Boardroom Table">Boardroom Table</option></select>';
                                                        } else {
                                                            text += "<select name='tableSelected' id='tableSelected' required=''>";
                                                            text += "<option value='' disabled selected>Choose Table</option></select>";
                                                        }
                                                        document.getElementById('tableChoose').innerHTML = text;
                                                    }
                                                    function showAttributeList(value) {
                                                        if(value != undefined){
                                                            var str = value;
                                                        } else {
                                                            var str = document.getElementById("roomName").value;
                                                        }
                                                        if (str == "") {
                                                            return;
                                                        }
                                                        var text = "";
                                                        if (str == "small") {
                                                            text += "<input type='checkbox' name = 'terminal' value='terminal' disabled checked style='margin-left: -50px; margin-right: -55px; height: 15px'> 2 Charger Terminals<br>";
                                                        } else if (str == "medium") {
                                                            text += "<input type='checkbox' name = 'terminal' value='terminal' disabled checked style='margin-left: -50px; margin-right: -55px; height: 15px'> 4 Charger Terminal<br>";
                                                            text += "<input type='checkbox' name = 'wifi' value='wifi' disabled checked style='margin-left: -50px; margin-right: -55px; height: 15px'> Own Wifi<br>";
                                                        } else {
                                                            text += "<input type='checkbox' name = 'terminal' value='terminal' disabled checked style='margin-left: -50px; margin-right: -55px; height: 15px'> 10 Charger Terminal<br>";
                                                            text += "<input type='checkbox' name = 'wifi' value='wifi' disabled checked style='margin-left: -50px; margin-right: -55px; height: 15px'> Own Wifi<br>";
                                                            text += "<input type='checkbox' name = 'AC' value='AC' disabled checked style='margin-left: -50px; margin-right: -55px; height: 15px'> Double AC<br>";
                                                        }
                                                        document.getElementById('attributeChoose').innerHTML = text;
                                                    }
                                                    function showCapacityList(value){
                                                        if(value != undefined){
                                                            var str = value;
                                                        } else {
                                                            var str = document.getElementById("roomName").value;
                                                        }
                                                        var text = "";
                                                        if (str == "small") {
                                                            text += "<select name='capacitySelected' id='capacitySmall' required=''>";
                                                            text += "<option value='' disabled selected>Choose Capacity</option>";
                                                            text += "<option value='10' selected>10</option></select>";
                                                        } else if (str == "medium") {
                                                            text += '<select name="capacitySelected" id="capacityMedium" required="">';
                                                            text += '<option value=""disabled selected>Choose Capacity</option>';
                                                            text += '<option value="20" selected>20</option>';
                                                        } else if (str == "large") {
                                                            text += '<select name="capacitySelected" id="capacityLarge" required="">';
                                                            text += '<option value=""disabled selected>Choose Capacity</option>';
                                                            text += '<option value="30" selected>30</option>';
                                                            text += '<option value="40">40</option>';
                                                        } else {
                                                            text += "<select name='capacitySelected' required=''>";
                                                            text += "<option value='' disabled selected>Choose Capacity</option></select>";
                                                        }
                                                        document.getElementById('capacityChoose').innerHTML = text;
                                                    }
                                                </script>
                                                <fieldset>
                                                    <br><label style="margin-right: 28px;">Room Type&nbsp;&nbsp;:&nbsp;&nbsp; </label>
                                                    <select name="roomName" id="roomName"
                                                        onchange="showTableList(); showAttributeList(); showCapacityList();" required="">
                                                        <?php
                                                            $selected = $_GET['selected'];
                                                            echo "<script type='text/javascript'>";
                                                            echo "showTableList('$selected');";
                                                            echo "showAttributeList('$selected');";
                                                            echo "</script>";
                                                        ?>
                                                        <option value="" disabled selected>Choose Room
                                                        </option>
                                                        <option value="small" <?php if($selected=='small') echo 'selected="selected"';?>>Small Room
                                                        </option>
                                                        <option value="medium" <?php if($selected=='medium') echo 'selected="selected"';?>>Medium Room
                                                        </option>
                                                        <option value="large" <?php if($selected=='large') echo 'selected="selected"';?>>Large Room
                                                        </option>
                                                    </select>
                                                </fieldset>

                                                <fieldset>
                                                    <br><label style="margin-right: 28px;">Table Type&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</label>
                                                    <div id="tableChoose" style="display: inline;">
                                                        <select name="tableSelected" id="tableSelected" required="">
                                                            <option value="" disable selected>No Room Choosed</option>
                                                        </select>
                                                    </div>
                                                </fieldset>

                                                <fieldset>
                                                    <br><label style="margin-right: 28px;">Capacity&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;</label>
                                                    <div id="capacityChoose" style="display: inline;">
                                                        <select name="capacitySelected" id="capacitySelected" required="">
                                                            <option value="" disable selected>No Capacity Choosed</option>
                                                        </select>
                                                    </div>
                                                </fieldset>
                                                
                                                <fieldset>
                                                    <br>Additional : <div id="attributeChoose" style="margin-top: 15px;">
                                                    </div>
                                                    <input type="checkbox" name="micSpeaker" id="micSpeaker"
                                                        value="Microphone and Speaker"
                                                        style="margin-left: -50px; margin-right: -55px; height: 15px">
                                                    Microphone and Speaker<br>
                                                    <input type="checkbox" name="cableConn" id="cableConn"
                                                        value="Cable Connector"
                                                        style="margin-left: -50px; margin-right: -55px; height: 15px">
                                                    Cable Connector<br>
                                                    <input type="checkbox" name="LCDProjector" id="LCDProjector"
                                                        value="LCD Projector Screen"
                                                        style="margin-left: -50px; margin-right: -55px; height: 15px">
                                                    LCD Projector Screen<br>
                                                    <input type="checkbox" name="flipchartMarkers" id="flipchartMarkers"
                                                        value="Flipchart and Markers"
                                                        style="margin-left: -50px; margin-right: -55px; height: 15px">
                                                    Flipchart and Markers<br>
                                                    <input type="checkbox" name="coffeeMaker" id="coffeeMaker"
                                                        value="Coffee Maker"
                                                        style="margin-left: -50px; margin-right: -55px; height: 15px">
                                                    Coffee Maker
                                                </fieldset>
                                                <fieldset>
                                                    <label style="margin-right: 23px;">Booked Date&nbsp;: </label>
                                                    <input type="date" name="bookedDate" id="bookedDate" required="">
                                                </fieldset>
                                                <fieldset>
                                                    <label style="margin-right: 23px;">Booked Time&nbsp;: </label>
                                                    <input type="time" name="bookedTime" id="bookedTime" value="11:00" required>
                                                </fieldset>
                                                <fieldset>
                                                    <label style="margin-right: 45px;">Payment&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </label>
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
                                                <fieldset>
                                                    <br><button type="submit" id="form-submit"
                                                        class="main-button" style="width:92%">Order</button><br><br>
                                                    <br>
                                                </fieldset>
                                                <?php
                                                    echo "<script type='text/javascript'>";
                                                    echo "showTableList('$selected');";
                                                    echo "showAttributeList('$selected');";
                                                    echo "showCapacityList('$selected');";
                                                    echo "</script>";
                                                ?>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-3 display-block">
          <div class="about footer-item">
            <div class="new-container">
              <p>Deboras Team - <a href="#mail"">deboras@mail.com</a></p>
              <div class="media fel"><a href="https://www.instagram.com/feli.g_25/" target="_blank" title="Feliciana Gunadi"></a></div>
              <div class="media sil"><a href="https://www.instagram.com/silviprisillia4/" target="_blank" title="Silvi Prisillia Louismono"></a></div>
              <div class="media yen"><a href="https://www.instagram.com/yen_aj29/" target="_blank" title="Yendistia Angelia Julianti"></a></div>
              <div class="media jes"><a href="https://www.instagram.com/jesslynowen/" target="_blank" title="Jesslyn Nadya Owen"></a></div>
              <div class="media may"><a href="https://www.instagram.com/mariamaycelline/" target="_blank" title="Maycelline Selvyanti Sudarsono"></a></div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="subscribe-newsletters footer-item">
            <ul class="misc-class">
              <h4>Miscellaneous Things Related to the Deboras</h4>
              <li class="misc"><a href="https://www.ithb.ac.id/study-program/Teknik/Informatika-2">Informatics ITHB</a></li>
              <li class="misc"><a href="https://linktr.ee/SansCo">Sans.Co</a></li>
              <li class="misc"><a href="https://www.instagram.com/ayamgeprekbebass/">Ayam Geprek Bebas</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="copyright">
            <p>Copyright &copy; 2021 the Deboras x Squidward
            <br>
            Designed by <a rel="nofollow" href="https://templatemo.com" title="free CSS templates">TemplateMo</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
</body>
<style>
    .form {
        width: 125%;
    }

    .container h2 {
        margin: auto;
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
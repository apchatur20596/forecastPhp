
<html>
    <head>
        <title> Forecastt.io</title>
        <style>
            @font-face {
                font-family: dbsillo;
                src: url(dbsillo.ttf);
            }
            .textStyle {
                font-size: 36px;
                padding-left: 6px;
            }
            sup {
                vertical-align: top;
            } 
            .secondDetails {
                width: 694px;
                height: 301px;
                float: left;
            }
            .secondImageOutput {
                height: 100%;
                width: 100%;
            }
            .outputSecond {
                height: 561px;
                width: 694px;
                background-color: skyblue;
                margin-left: 426px;
                float: left;
                border-radius: 20px;
            }
            .summaryTemp {
                float: left;
                width: 347px;
                height: 260px;
                color: white;

            }
            .printSecondDetails {
                float: right;
                width: 555px;
                height: 301px;
            }
            .iconSecond {
                float:left;
                height: 260px;
                width: 347px;
            }
            .DailyWeatherDetailsText {
                font-size: 40px;
                text-align: center;
                margin-left: -301px;
                margin-top: 15px;
                margin-bottom: 15px;
            }
            .Fimage {
                width: 20px;
                height: 20px;
            }
            .cityStyle {
                font-size: 34px;
                color: white;
                padding-top: 16px;
                padding-left: 25px;
            }
            .temperatureStyle {
                margin-bottom: 0px;
                font-size: 67px;
                color: white;
                margin-top: -6px;
                margin-left: 25px;
            }
            .imageClass {
                width: 59px;
            }
            #chart_div {
                float: left;
                margin-top: 136px;
                margin-left: 357px;
            }
            #lowerArrow {
                float: left;
                height: 33.65px;
                width: 111px;
                margin-left: 277px;
                text-align: center;
            }
            .tableOutput {
                background-color: skyblue;
                border-color: blue;
                color: white;
                align-content: center;
                text-align: center;
                border-spacing: 0px;
                margin-top: 47px;
                margin-left: 168px;
                width: 1176px;
            }
            .outerDiv {
                background-color : #579d40;
                height: 300px;
                width: 1000px;
                margin-top: 70px;
                margin-left: 250px;
                border-radius: 20px;

            }
            .boxImages {
                height: 36px;
                width: 39px;
            }
            .summaryStyle {
                margin-left: 25px;
                font-size: 34px;
                color: white;
                margin-top: 11px;
                margin-bottom: 15px;
            }
            .outputFirst {
                height: 332px;
                width: 580px;
                background-color: skyblue;
                margin-left: 472px;
                border-radius: 20px;
            }
            .weatherStyle {
                text-align: center;
                font-size: 50px;
                color: white;
                padding-top: 12px;
                margin-bottom: 8px;
                margin-left: 34px;
                font-family: dbsillo;
            }
            .verticalLine {
                border-left: 6px solid white;
                height: 140px;
                float: left;
                margin-left: 66px;
                margin-right: 150px;
            }
            .formLeft {
                width: 465px;
                float: left;
                margin-left: 59px;
            }
            .timezoneStyle {
                margin-top: -30px;
                margin-left: 25px;
                color: white;
            }
            .tableIcons {
                margin-left: 23px;
                float: left;
                padding-right: 9px;
                color:white;
                text-align: center;
                font-size: 20px;
            }
            .thStyle {
                padding-right: 15%;
            }
            .tdStyle {
                padding-top: 3%;
            }
            .simage {
                width: 14px;
                height: 13px;

            } 
            .errorEntity {
                background-color: lightgrey;
                border : solid 2px grey;
                width: 416px;
                margin-top: 42px;
                margin-left: 526px;
                text-align: center;
            }
            .secondF {
                font-size: 52px;
                padding-left: 1%;

            }
            .secondText {
                font-size: 18px;
                text-align: center;
                color: white;
            }
            #secondLowerText {
                float: left;
                height: 61.7px;
                width: 694px;
                text-align: center;
                margin-top: 15px;
            }
        </style>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            // Java script code to handle client side operations.

            var displayIcon = false;
            var dataTable = 0;
            var options = 0;

            // Clear function handles the event after clear button click.

            function clearAll() {
                document.getElementById('outputFirstWrapper').innerHTML = "";
                document.getElementById('outputFirstWrapper').style = "";
                document.getElementById('tableOutput1').innerHTML = "";
                document.getElementById('outerSecondDiv').innerHTML = "";
                document.getElementById('outerSecondDiv').style = "";
            }

            // 

            function getDecisionTrue(arrow) {
                if(arrow) {
                    document.getElementById('lowerArrow').innerHTML = "<button style='transform: rotate(90deg); display:inline-block; width:50%; height:135%; font-size:40px; border:0px; background-color:white;' onclick='getDecisionTrue(false)'><</button>";
                    displayIcon = true;
                    createTable();
                } else {
                    document.getElementById('lowerArrow').innerHTML = "<button style='transform: rotate(90deg); display:inline-block; width:50%; height:135%; font-size:40px; border:0px; background-color:white;' onclick='getDecisionTrue(true)'>></button>";
                    displayIcon = false;
                    createTable();
                }
            }

            function getDecisionFalse() {
                document.getElementById('chart_div').innerHTML = "";
            }    
                function drawCrosshairs(data) {
                for(var i=0;i<data.length;i++) {
                    console.log("outputting JSON");
                    console.log(data[i]);
                }
                console.log("Getting the data");
                console.log(data);
                dataTable = new google.visualization.DataTable();
                dataTable.addColumn('number','X');
                dataTable.addColumn('number','T');
                for(var i=0;i<data.length;i++) {
                    dataTable.addRow([i,data[i]]);
                }
            }

            // This function is called to create table.

            function createTable() {
        options = {
            width : 700,
            height: 500,
            colors: ['#87CEEB'],
            hAxis : {
                title : 'Time',
            },
            vAxis : {
                title : 'Temperature',
                textStyle : {
                    color : "#ffffff"
                }
            }
                };
                if(displayIcon) {
                var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                chart.draw(dataTable, options);
        } else {
            document.getElementById('chart_div').innerHTML = "";
        }
            }

            // This function calls google charts to create the chart.

            function getData(data) {
            google.charts.load('current', {packages: ['corechart', 'line']});
            google.charts.setOnLoadCallback(function() {drawCrosshairs(data);});
        }

            function handleChekckBox() {
                    document.getElementById('State').selectedIndex = "0";
                    document.getElementById('Street').value = "";
                    document.getElementById('City').value = "";
                    document.getElementById('Street').disabled = true;
                    document.getElementById('City').disabled = true;
                    document.getElementById('State').disabled = true;
                    document.getElementById('getIp').checked = true;
            }

            // This function handles checkbox click event.

            function setHidden() {
                if(document.getElementById('getIp').checked) {
                    document.getElementById('State').selectedIndex = "0";
                    document.getElementById('Street').value = "";
                    document.getElementById('City').value = "";
                    document.getElementById('Street').disabled = true;
                    document.getElementById('City').disabled = true;
                    document.getElementById('State').disabled = true;

                    var xmlhttp = new XMLHttpRequest();
                    var urlget = "https://ipapi.co/json" ;
                    xmlhttp.open("GET", urlget,false);
                    xmlhttp.overrideMimeType("application/json");
                    xmlhttp.send();

                    if(xmlhttp.status == 200) {
                    console.log(xmlhttp.responseText);
                    var gotResponse = xmlhttp.responseText;
                    var myObj = JSON.parse(xmlhttp.responseText);
                    var latitudeCurrent = myObj.latitude;
                    var longitudeCurrent = myObj.longitude;
                    var cityCurrent = myObj.city;
                    document.getElementById('latitudeCurrent').value = latitudeCurrent;
                    document.getElementById('longitudeCurrent').value = longitudeCurrent;
                    document.getElementById('cityCurrent').value = cityCurrent;
                }
                } else {
                    document.getElementById('Street').disabled = false;
                    document.getElementById('City').disabled = false;
                    document.getElementById('State').disabled = false;
                    document.getElementById('latitudeCurrent').value = "";
                    document.getElementById('longitudeCurrent').value = "";
                    document.getElementById('cityCurrent').value = "";  
                }
            }

            function handleAnchor(gettime, latitude, longitude) {
                alert(latitude);
                alert(longitude);
            }

            // This function is to set the data after form submission is done to retain the search state.

            function setData(street, city, state) {
                document.getElementById('Street').value = street;
                document.getElementById('City').value = city;
                document.getElementById('State').value = state;
            }

        </script>
    </head>
    <body>
        <?php
                        $states = array(
            'AL'=>'Alabama',
            'AK'=>'Alaska',
            'AZ'=>'Arizona',
            'AR'=>'Arkansas',
            'CA'=>'California',
            'CO'=>'Colorado',
            'CT'=>'Connecticut',
            'DE'=>'Delaware',
            'DC'=>'District of Columbia',
            'FL'=>'Florida',
            'GA'=>'Georgia',
            'HI'=>'Hawaii',
            'ID'=>'Idaho',
            'IL'=>'Illinois',
            'IN'=>'Indiana',
            'IA'=>'Iowa',
            'KS'=>'Kansas',
            'KY'=>'Kentucky',
            'LA'=>'Louisiana',
            'ME'=>'Maine',
            'MD'=>'Maryland',
            'MA'=>'Massachusetts',
            'MI'=>'Michigan',
            'MN'=>'Minnesota',
            'MS'=>'Mississippi',
            'MO'=>'Missouri',
            'MT'=>'Montana',
            'NE'=>'Nebraska',
            'NV'=>'Nevada',
            'NH'=>'New Hampshire',
            'NJ'=>'New Jersey',
            'NM'=>'New Mexico',
            'NY'=>'New York',
            'NC'=>'North Carolina',
            'ND'=>'North Dakota',
            'OH'=>'Ohio',
            'OK'=>'Oklahoma',
            'OR'=>'Oregon',
            'PA'=>'Pennsylvania',
            'RI'=>'Rhode Island',
            'SC'=>'South Carolina',
            'SD'=>'South Dakota',
            'TN'=>'Tennessee',
            'TX'=>'Texas',
            'UT'=>'Utah',
            'VT'=>'Vermont',
            'VA'=>'Virginia',
            'WA'=>'Washington',
            'WV'=>'West Virginia',
            'WI'=>'Wisconsin',
            'WY'=>'Wyoming',
        );

        ?>
        <?php 
        $cityGlobal = "";
        $stateGlobal = "state";
        $streetGlobal = "";

        ?>

        <div class="outerDiv">
            <p class="weatherStyle">Weather Search</p>
            <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
                <div class="formLeft">
                    <div style="float: left; width: 400px; margin-bottom: 10px;">
                <label for="Street" style="font-size: 20px; color: white; float: left;margin-right: 14px; ">Street</label>
                <input type="text" name="Street" id="Street" style="width: 107px"/>
            </div>
            <div style="float: left; width: 400px; margin-bottom: 10px;">
                <label for="City" style="font-size: 20px; color: white; float: left; margin-right: 38px">City</label>
                <input type="text" name="City" id="City" style="width: 107px" />
            </div>
            <div style="float: left; width: 400px; margin-bottom: 45px;">
                <label for="State" style="font-size: 20px; color: white; float: left; margin-right: 23px">State</label>
                            <select name = "State" id="State" style="width: 70%">
                    <option value="state" selected>State</option>
                    <option value="dash" disabled>-------------------------------------------------------------------------</option>
                    <?php foreach ($states as $key => $value) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php } ?>
                </select>
            </div>
                <input type="hidden" id="latitudeCurrent" name="latitudeCurrent">
                <input type="hidden" id="longitudeCurrent" name="longitudeCurrent">
                <input type="hidden" id="cityCurrent" name="cityCurrent">
                <input type="submit" style="float: right; margin-right: 4px; background-color: white; margin-left: 340px; border-radius: 6px; float: left;" name="submit" value="Search" />            
                <input type="Reset" name="Clear" style="float: right; border-radius: 6px; background-color: white; float:left;" value = "Clear" onclick="clearAll()" />

            </div>
              <div class="verticalLine"></div>
                <input type="checkbox" name="getIp" id ="getIp" value="true" onclick="setHidden();"> <label for="getIp" style="font-size: 20px; color: white;">Current Location</label> 
            </form>
        </div>

        <?php

            // Code to handle form submission.

            if(isset($_POST['submit'])) {

                // If the checkbox is checked, then call function handleChckBox of Java Script. Then get Latitude and Longitude values of current location and call function forecastIO.
                // Else validate input address, if everything is good then call the geocode function.

                if($_POST['getIp'] == "true") {
                    echo "<script type='text/javascript'> handleChekckBox();</script>";
                    $latitudeCurrent =  $_POST['latitudeCurrent'];
                    $longitudeCurrent =  $_POST['longitudeCurrent'];
                    $cityCurrent =  $_POST['cityCurrent'];
                    forecastIO($latitudeCurrent, $longitudeCurrent, $cityCurrent, null, null, false);
                } else {
                if(!$_POST['Street'] || !$_POST['City'] || $_POST['State'] == "state") {
                    echo "<div class='errorEntity'>Please check the input address.</div>";
                }
                else {
                $street = $_POST['Street'];
                $streetGlobal = $street;
                $city =  $_POST['City'];
                $cityGlobal = $city;
                $stateReq = $_POST['State'];
                $stateGlobal = $stateReq;
                $address = "ajriejiowjrpij3243";
                geocode($address, $city, $street, $stateReq);
         
                }
            }
            }

            // This function is called if user is adding any address for forecast. It takes the address and call google api to get Lat, Long coordinates of the address.
            // Then, call the forecastIO function.

            function geocode($address, $city, $street, $stateReq) {
                $api_key = "AIzaSyBQ6cnaCTeWd3xSU52Or5Xn0ae1eQvasKI";
                $address = urlencode($address);
                $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBQ6cnaCTeWd3xSU52Or5Xn0ae1eQvasKI";
                $resp_json = file_get_contents($url);
                $resp = json_decode($resp_json, true);
                if ($resp['status'] == 'OK') {
                    $lati = $resp["results"][0]["geometry"]["location"]["lat"];
                    $longi = $resp["results"][0]["geometry"]["location"]["lng"];
                    forecastIO($lati, $longi,$city, $stateReq, $street, true);

                } else {
                    echo "<div class='errorEntity'>Invalid Input Address.</div>";
                    
                }
            }

            // This function is called when we get the Lat Long coordinates of location.
            // It calls the forecast.io API to get the weather forecast and displays the result on web page.

            function forecastIO($lati, $longi,$city, $stateReq, $street, $inputType) {

                // Calling the API.

                $url = "https://api.forecast.io/forecast/18087e7f222fa75c00b2d34c155ba638/$lati,$longi";
                $resp_json = file_get_contents($url);

                // Parsing and manipulating the response.

                $resp = json_decode($resp_json, true);
                $latitude = $resp["latitude"];
                $longitude = $resp["longitude"];
                $timezone = $resp["timezone"];
                $summary = $resp["currently"]["summary"];
                $temperature = $resp["currently"]["temperature"];
                $humidity = $resp["currently"]["humidity"];
                $pressure = $resp["currently"]["pressure"];
                $windspeed = $resp["currently"]["windSpeed"];
                $cloudCover = $resp["currently"]["cloudCover"];
                $visibility = $resp["currently"]["visibility"];
                $ozone = $resp["currently"]["ozone"];
                $outputTest = "";
                if($humidity != null) {
                    $outputTest = $outputTest."<table class='tableIcons'><thead id = 'humidityMouseOver'><tr><th style = 'padding-right:15%;'><div id='humidityPopUp' style='display: none'>Humidity</div><img id='humidityId' title='Humidity' src='https://cdn2.iconfinder.com/data/icons/weather-74/24/weather-16-512.png' class='boxImages'></th></tr></thead><tbody><tr><td>".$humidity."</td></tr></tbody></table>";
                }
                if($pressure != null) {
                    $outputTest = $outputTest."<table class='tableIcons'><thead><tr><th style = 'padding-right:15%;'><img title='Pressure' src = 'https://cdn2.iconfinder.com/data/icons/weather-74/24/weather-25-512.png' class='boxImages'></th></tr></thead><tbody><tr><td>".$pressure."</td></tr></tbody></table>";
                }
                if($windspeed != null) {
                    $outputTest = $outputTest."<table class='tableIcons'><thead><tr><th style = 'padding-right:15%;'><img title='WindSpeed' src = 'https://cdn2.iconfinder.com/data/icons/weather-74/24/weather-27-512.png' class='boxImages'></th></tr></thead><tbody><tr><td>".$windspeed."</td></tr></tbody></table>";
                }
                if($visibility != null) {
                    $outputTest = $outputTest."<table class='tableIcons'><thead><tr><th style = 'padding-right:15%;'><img  title='Visibility' src='https://cdn2.iconfinder.com/data/icons/weather-74/24/weather-30-512.png' class='boxImages'></th></tr></thead><tbody><tr><td>".$visibility."</td></tr></tbody></table>";
                }
                if($cloudCover != null) {
                    $outputTest = $outputTest."<table class='tableIcons'><thead><tr><th style = 'padding-right:15%;'><img title='Cloud Cover' src='https://cdn2.iconfinder.com/data/icons/weather-74/24/weather-28-512.png' class='boxImages'></th></tr></thead><tbody><tr><td>".$cloudCover."</td></tbody></table>";
                }
                if($ozone != null) {
                    $outputTest = $outputTest."<table class='tableIcons'><thead><tr><th style = 'padding-right:15%;'><img title='Ozone' src='https://cdn2.iconfinder.com/data/icons/weather-74/24/weather-24-512.png' class='boxImages'></th></tr></thead><tbody><tr><td>".$ozone."</td></tbody></table>";
                }
                echo "<div id='outputFirstWrapper'>";
                echo "<div class='outputFirst' id = 'outputFirst'><p class='cityStyle'>".$city."</p>";
                echo "<p class='timezoneStyle'>".$timezone."</p>";
                echo "<p class= 'temperatureStyle'>".$temperature."<sup><img src='https://cdn3.iconfinder.com/data/icons/virtual-notebook/16/button_shape_oval-512.png' class='Fimage'></sup><text class = 'textStyle'>F</text></p>";
                echo "<p class='summaryStyle'>".$summary."</p>";
                
                echo $outputTest;
                echo "</div>";
                echo "<table border='1 px' class='tableOutput' id='tableOutput1'><thead>";
                echo "<tr>"; 
                echo "<th> Date </th>";
                echo "<th> Status </th>";
                echo "<th> Summary </th>";
                echo "<th> TemperatureHigh </th>";
                echo "<th> TemperatureLow </th>";
                echo "<th> Wind Speed </th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

            $sizeArr =  sizeof($resp["daily"]["data"]);
            for ($i=0; $i <$sizeArr ; $i++) {   
                $iconOutput = $resp["daily"]["data"][$i]["icon"];
                $iconLink = '';
                                
                switch ($iconOutput) {
                    case 'clear-day':
                        $iconLink = 'https://cdn2.iconfinder.com/data/icons/w
eather-74/24/weather-12-512.png';
                        break;
                    case 'clear-night' :
                        $iconLink = 'https://cdn2.iconfinder.com/data/icons/w
eather-74/24/weather-12-512.png';
                        break;
                    case 'rain' :
                        $iconLink = 'https://cdn2.iconfinder.com/data/icons/w
eather-74/24/weather-04-512.png';
                        break;

                    case 'snow' :
                        $iconLink = 'https://cdn2.iconfinder.com/data/icons/w
eather-74/24/weather-19-512.png';
                        break;

                    case 'sleet' :
                        $iconLink = 'https://cdn2.iconfinder.com/data/icons/w
eather-74/24/weather-07-512.png';
                        break;

                    case 'wind' :
                        $iconLink = 'https://cdn2.iconfinder.com/data/icons/w
eather-74/24/weather-27-512.png';
                        break;

                    case 'fog' :
                        $iconLink = 'https:$resp_daily["currently"]["temperature"]//cdn2.iconfinder.com/data/icons/w
eather-74/24/weather-28-512.png';
                        break;

                    case 'cloudy' :
                        $iconLink = 'https://cdn2.iconfinder.com/data/icons/w
eather-74/24/weather-01-512.png';
                        break;

                    case 'partyly-cloudy-day' :
                        $iconLink = 'https://cdn2.iconfinder.com/data/icons/w
eather-74/24/weather-02-512.png';
                        break;

                    case 'partyly-cloudy-night' :
                        $iconLink = 'https://cdn2.iconfinder.com/data/icons/w
eather-74/24/weather-02-512.png';
                        break;                                    
                    default:
                        $iconLink = 'https://cdn2.iconfinder.com/data/icons/w
eather-74/24/weather-02-512.png';
                        break;
                }
                $passVal = json_encode($resp["daily"]["data"][$i]); 
                $passAnchor = "";
                $decisionTrue = "Hello";
                if($inputType) {
                    $passAnchor = "<td><a class='anchorStyle' href = 'index.php?LD=".$latitude."&LG=".$longitude."&PV=".$resp["daily"]["data"][$i]["time"]."&cityLink=".$city."&decision=".$decisionTrue."&streetLink=".$street."&stateLink=".$stateReq."'>".$resp["daily"]["data"][$i]["summary"]."</a></td>"; 
                } else {
                    $passAnchor = "<td><a class='anchorStyle' href = 'index.php?LD=".$latitude."&LG=".$longitude."&PV=".$resp["daily"]["data"][$i]["time"]."&decision=".$inputType."'>".$resp["daily"]["data"][$i]["summary"]."</a></td>";
                }
                   echo "<tr>";
                   echo "<td>".date("Y-m-d", $resp["daily"]["data"][$i]["time"])."</td>";
                   echo "<td style='width:25px'><img src = '".$iconLink."' alt = 'weathericon' class='imageClass'></td>";
                   echo $passAnchor;
                   echo "<td>".$resp["daily"]["data"][$i]["temperatureMax"]."</td>";
                   echo "<td>".$resp["daily"]["data"][$i]["temperatureMin"]."</td>";
                   echo "<td>".$resp["daily"]["data"][$i]["windSpeed"]."</td>";
                   echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            }
                
            if (isset($_GET['LD'])) {
                $getDecision = $_GET['decision'];
                var_dump($getDecision); 
                if($getDecision) {
                $cityGlobal = $_GET['cityLink'];
                $stateGlobal = $_GET['stateLink'];
                $streetGlobal = $_GET['streetLink'];
                } else {
                    echo "<script type='text/javascript'> handleChekckBox();</script>";

                }

                echo $cityGlobal;
                echo $stateGlobal;
                echo $streetGlobal;
                getDaily($_GET['LD'],$_GET['LG'],$_GET['PV']);
            }

            // Displays the daily data.

            function getDaily($latiDaily, $longiDaily, $timeDaily) {
                $temperatureDaily = array();

                $urlDaily = "https://api.darksky.net/forecast/18087e7f222fa75c00b2d34c155ba638/".$latiDaily.",".$longiDaily.",".$timeDaily."?exclude=minutely";
                $resp_json_daily = file_get_contents($urlDaily);
                $resp_daily = json_decode($resp_json_daily, true);
                $iconSecond = $resp_daily["currently"]["icon"];
                $iconLinkSecond = "";

                switch ($iconSecond) {
                    case 'clear-day':
                        $iconLinkSecond = 'https://cdn3.iconfinder.com/data/icons/w
eather-344/142/sun-512.png';
                        break;
                    case 'clear-night' :
                        $iconLinkSecond = 'https://cdn3.iconfinder.com/data/icons/w
eather-344/142/sun-512.png';
                        break;
                    case 'rain' :
                        $iconLinkSecond = 'https://cdn3.iconfinder.com/data/icons/w
eather-344/142/rain-512.png';
                        break;

                    case 'snow' :
                        $iconLinkSecond = 'https://cdn3.iconfinder.com/data/icons/w
eather-344/142/snow-512.png';
                        break;

                    case 'sleet' :
                        $iconLinkSecond = 'https://cdn3.iconfinder.com/data/icons/w
eather-344/142/lightning-512.png';
                        break;

                    case 'wind' :
                        $iconLinkSecond = 'https://cdn4.iconfinder.com/data/icons/th
e-weather-is-nice-today/64/weather_10-
512.png';
                        break;

                    case 'fog' :
                        $iconLinkSecond = 'https://cdn3.iconfinder.com/data/icons/w
eather-344/142/cloudy-512.png';
                        break;

                    case 'cloudy' :
                        $iconLinkSecond = 'https://cdn3.iconfinder.com/data/icons/w
eather-344/142/cloud-512.png';
                        break;

                    case 'partyly-cloudy-day' :
                        $iconLinkSecond = 'https://cdn3.iconfinder.com/data/icons/w
eather-344/142/sunny-512.png';
                        break;

                    case 'partyly-cloudy-night' :
                        $iconLinkSecond = 'https://cdn3.iconfinder.com/data/icons/w
eather-344/142/sunny-512.png';
                        break;                                    
                    default:
                        $iconLinkSecond = 'https://cdn3.iconfinder.com/data/icons/w
eather-344/142/lightning-512.png';
                        break;
                }
                $secondSummary = $resp_daily["currently"]["summary"];
                $temperatureSecond = $resp_daily["currently"]["temperature"];
                $precipitationSecond = $resp_daily["currently"]["precipIntensity"];
                $precipOutput = "";
                if($precipitationSecond <=0.1) {
                    if($precipitationSecond <=0.5) {
                        if($precipitationSecond <= 0.015) {
                            if($precipitationSecond <= 0.001) {
                                $precipOutput = "None";
                            } else {
                                $precipOutput = "Very Light";
                            }
                        } else {
                            $precipOutput = "Light";
                        }
                    } else {
                        $precipOutput = "Moderate";
                    }
                } else {
                    $precipOutput = "heavy";
                }
                $chanceOfRain = $resp_daily["currently"]["precipProbability"] * 100;
                $windSpeedSecond = $resp_daily["currently"]["windSpeed"];
                $humiditySecond = $resp_daily["currently"]["humidity"] * 100;
                $visibilitySecond = $resp_daily["currently"]["visibility"];
                $sunriseTimeSecond = $resp_daily["daily"]["data"]["0"]["sunriseTime"];
                $sunriseTimeSecondForm1 = date('Y/m/d H:i:s', $sunriseTimeSecond);
                $sunriseTimeSecondFinal = date('h:i A', strtotime($sunriseTimeSecondForm1));
                $sunsetTimeSecond = $resp_daily["daily"]["data"]["0"]["sunsetTime"];
                $sunsetTimeSecondForm1 = date('Y/m/d H:i:s', $sunsetTimeSecond);
                $sunsetTimeSecondFinal = date('h:i A', strtotime($sunsetTimeSecondForm1));
                echo "<div id = 'outerSecondDiv'>";
                echo "<div class='DailyWeatherDetailsText'> Daily Weather Details</div>";
               
                 echo "<div class='outputSecond' id='outputSecond'><div class='summaryTemp'><p style='font-size:36px; margin-top:92px; margin-left:35px;'>".$secondSummary."</p><p style='font-size:67px; margin-top:-38px; margin-left:35px;'>".$temperatureSecond."<sup><img src='https://cdn3.iconfinder.com/data/icons/virtual-notebook/16/button_shape_oval-512.png' class='simage'></sup><text class='secondF'>F</text></p></div><div class='iconSecond'><img src='".$iconLinkSecond."' class='secondImageOutput'></div> <div class='secondDetails'>
                    <div class='printSecondDetails'>
                    <p class = 'secondText'> Precipitation: <text class='textStyle' style='font-size:23px;'>".$precipOutput."</text></p>
                    <p class = 'secondText'> Chance of Rain: <text class='textStyle' style='font-size:23px;'>".$chanceOfRain."</text><text class='textStyle' style='font-size:18px; color:white;'>%</text></p>
                    <p class = 'secondText'> wind Speed: <text class='textStyle' style='font-size:23px;'>".$windSpeedSecond."</text><text class='textStyle' style='font-size:18px; color:white'>mph</text></p>
                    <p class = 'secondText'> Humidity: <text class='textStyle' style='font-size:23px;'>".$humiditySecond."</text><text class='textStyle' style='font-size:18px; color:white;'>%</text></p>
                    <p class = 'secondText'> Visibility <text class='textStyle' style='font-size:23px;'>".$visibilitySecond."</text><text class='textStyle' style='font-size:18px; color:white;'>mi</text></p>
                    <p class = 'secondText'> Sunrise / Sunset: <text class='textStyle' style='font-size:23px;'>".$sunriseTimeSecondFinal."/".$sunsetTimeSecondFinal."</text></p></div></div>";

                    echo "<div id='secondLowerText'>
                            <text class='textStyle' style='font-size:40px;'> Day's Hourly Weather</text>
                          </div>";
                    echo "<div id='lowerArrow'>
                            <button style='transform:rotate(90deg);display: inline-block; font-size:40px; border:0px; background-color:white;' onclick='getDecisionTrue(true)'>></button>
                          </div>";          
                for ($i=0; $i <24 ; $i++) { 
                    $temperatureDaily[$i] = $resp_daily["hourly"]["data"][$i]["temperature"];
                }
                $temperatureDailyJson = json_encode($temperatureDaily);
                echo "<script type='text/javascript'> getData(".$temperatureDailyJson.");</script>";
                echo "</div>";
                echo "</div>";
                
            }

        ?>
        <script type="text/javascript">
            document.getElementById('Street').value = "<?php echo $streetGlobal; ?>";
            document.getElementById('City').value = "<?php echo $cityGlobal; ?>";
            document.getElementById('State').value = "<?php echo $stateGlobal; ?>";
            
        </script>
        <div id="chart_div">
        </div>    
    
    </body>
</html>
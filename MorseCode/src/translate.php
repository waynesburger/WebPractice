<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/main.css">
</head>

<body style="background-color: #ACCBF9;">
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
  
  <!--------------------------                     ------------------------------------------>
  <!-------------------------- Begin Modified Area ------------------------------------------>
  <!--------------------------                     ------------------------------------------>

  <!--     Title Section    -->
      <div>
        <a style="font-size: 60px; font-family: arial; font-weight: bold; color: #bc0093">Discover Morse</a>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a style="font-size: 30px; font-family: monospace;">-. .. ... -.-. --- ...- . .-. / -- --- .-. ... .</a>
        <!--<img src="img/title1.PNG" alt="Discover Morse">
        <img src="img/title1-1.PNG" alt="Morse Code translation of 'Discover Morse'">
        <button class="large-button" style="float: right;"><a href="signIn.php">Sign In</a></button>
        <button class="large-button" style="float: right;"><a href="signUp.php">Sign Up</a></button>-->
      </div>
      <div class="title-font1">
          <a style="font-style: italic;">
            &nbsp;&nbsp;&nbsp;&nbsp; Learn
            &nbsp;&nbsp;&nbsp;&nbsp; Play
            &nbsp;&nbsp;&nbsp;&nbsp; Interact
            &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
          </a>
          <a style="font-weight: bolder; flex-grow: 1;">
            Interactive Translation Page
          </a>
      </div>
      
      <!-- Tab Links -->
        <div class="tab-casing">
            <button class="to-new-page"><a href="index.html">Home</a></button>
            <button class="to-new-page"><a href="translate.php">Translate</a></button>
            <button class="to-new-page"><a href="feedbackForm.html">Contact</a></button>
        </div>
    
      <br>
      <br>
      <br>
      <br>
       

      <div class="tab-casing">
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'toMorse')">Regular --> Morse</button>
            <button class="tablinks" onclick="openTab(event, 'toRegular')">Morse --> Regular</button>
        </div>
      </div>
    
      <div id="toMorse" class="tabcontent">
        <div class="centered-content" style="width: 1000px">
          <h2>Translate to Morse Code</h2>
          <textarea placeholder="Stuff to turn into morse code" style="height: 200px; width: 450px;" name="regMessage" required></textarea>
          <textarea style="height: 200px; width: 450px; flex-grow: 1;" name="morResult" disabled></textarea>
          <br>
          <button class="enter-button">Translate</button>
        </div>
          
          <br>
          <br>
          <br>
          
        <div class="centered-content" style = "width: 1050px;">
            <h3>Saved Translations</h3>
            <?php
                //require_once 'php/config.php';
                //require_once 'php/config.php';
                /* Database credentials. Assuming you are running MySQL
                server with default setting (user 'root' with no password) */
                define('DB_SERVER', 'localhost');
                define('DB_USERNAME', 'root');
                define('DB_PASSWORD', 'Calvin&hobb6');
                define('DB_NAME', 'discover_morse_data');

                /* Attempt to connect to MySQL database */
                $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                if(mysqli_connect_errno()){
                  echo "Connection failure, The database never connected.";
                }else{
                    $querey = "SELECT original_text,translation_code FROM morse_translation WHERE `public`=1";
                    
                    try{
                        $result = mysqli_query($link, $querey);
                        
                        while($record = mysqli_fetch_assoc($result)){
                            echo"<hr>";
                            //printf("%s\n", $record["original_text"]);
                            echo "<p style=\"font-size: 22px;\">{$record["original_text"]}</p>\n";
                            //printf("%s\n", $record["translation_code"]);
                            echo "<p style=\"font-size: 25px; font-family: monospace; font-weight: bold;\">{$record["translation_code"]}</p>\n";
                        }
                        
  
                        mysqli_free_result($result);
                        mysqli_close($link);
                    }catch (Exception $exc){
                        echo 'Caught exception: ', $exc->getMessage();
                    }
                }

            ?>
        </div>
      </div>

      <div id="toRegular" class="tabcontent">
        <div class="centered-content" style="width: 1000px;">
          <h2>Translate to English</h2>
          <textarea placeholder="... - ..- ..-. ..-. / - --- / - ..- .-. -. / .. -. - --- / . -. --. .-.. .. ... ...." style="height: 200px; width: 450px;" name="moreMessage" required></textarea>
          <textarea style="height: 200px; width: 450px; flex-grow: 1;" name="regResult" disabled></textarea>
          <br>
          <button class="enter-button">Translate</button>
        </div>
          
          <br>
          <br>
          <br>
          
        <div class="centered-content" style = "width: 1050px;">
            <h3>Saved Translations</h3>
            <?php
                //require_once 'php/config.php';
                /* Database credentials. Assuming you are running MySQL
                server with default setting (user 'root' with no password) */
                define('DB_SERVER', 'localhost');
                define('DB_USERNAME', 'root');
                define('DB_PASSWORD', 'Calvin&hobb6');
                define('DB_NAME', 'discover_morse_data');
 
                /* Attempt to connect to MySQL database */
                $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
                if(mysqli_connect_errno()){
                  echo "Connection failure, The database never connected.";
                }else{
                    $querey = "SELECT original_code,translation_text FROM english_translation WHERE `public`=1";
                    
                    try{
                        $result = mysqli_query($link, $querey);
                        
                        while($record = mysqli_fetch_assoc($result)){
                            echo"<hr>";
                            //printf("%s\n", $record["original_code"]);
                            echo "<p style=\"font-size: 25px; font-family: monospace; font-weight: bold;\">{$record["original_code"]}</p>\n";
                            //printf("%s\n", $record["translation_text"]);
                            echo "<p style=\"font-size: 22px;\">{$record["translation_text"]}</p>\n";
                        }
    
                        mysqli_free_result($result);
                        mysqli_close($link);
                    } catch (Exception $exc){
                        echo 'Caught exception: ', $exc->getMessage();
                    }
                }
            ?>
        </div>
      </div>
    
  
  <!--------------------------                   -------------------------------------->
  <!-------------------------- End Modified Area -------------------------------------->
  <!--------------------------                   -------------------------------------->
  
  
  <script src="js/vendor/modernizr-{{MODERNIZR_VERSION}}.min.js"></script>
  <script src="https://code.jquery.com/jquery-{{JQUERY_VERSION}}.min.js" integrity="{{JQUERY_SRI_HASH}}" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-{{JQUERY_VERSION}}.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>
  <script src="js/formvalidation.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>

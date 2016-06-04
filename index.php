<!DOCTYPE html>
<html>




        <head>
            <link href='https://fonts.googleapis.com/css?family=Skranji:700' rel='stylesheet' type='text/css'>
            <link rel="shortcut icon" type="image/x-icon" href="photos/favicon.ico">
            <link rel="stylesheet" href="main.css">
            <title>Paper Mario Characters</title>
            <meta name="description" content="Project 2">
        </head>



        <body>
                <div class="bigban">

                    <div class="sprites2">
                        <div class="sprites">
                        </div>
                    </div>

                    <div class="title">
                        Paper Mario
                    </div>
                </div>

                <div class="title2">
                    Characters
                </div>

                <h1 class="nav">
                    <a href="index.php"> Characters </a>
                </h1>   
                <h1 class="nav"> 
                    <a href="search.php"> Search </a>
                </h1>
                <h1 class="nav"> 
                    <a href="edit_characters.php"> Add Characters </a>
                </h1>


            <div class="banner">

                <?php
                error_reporting(E_ERROR | E_PARSE);

                $file_pointer = fopen("data.txt", "a+");

                while (!feof($file_pointer)){
                    $line = fgets($file_pointer);
                    $input = explode(",", $line);
                    $input[3] = trim($input[3]);
                    if (in_array("Good", $input)) {
                        echo "<div class= 'good'> <div class= 'banner_text'>
                        Character Name: ".$input[0]."<br><br> First Platform Appearance: ".$input[1]."<br><br> Species: ".$input[2]."<br><br> Alliance: ".$input[3]."
                        </div>
                        </div>";
                    }
                    if (in_array("Bad", $input)) {
                        echo "<div class= 'bad'> <div class= 'banner_text'>
                        Character Name: ".$input[0]."<br><br> First Platform Appearance: ".$input[1]."<br><br> Species: ".$input[2]."<br><br> Alliance: ".$input[3]."
                        </div>
                        </div>";
                    }
                    if (in_array("Neutral", $input)) {
                        echo "<div class= 'neutral'> <div class= 'banner_text'>
                        Character Name: ".$input[0]."<br><br> First Platform Appearance: ".$input[1]."<br><br> Species: ".$input[2]."<br><br> Alliance: ".$input[3]."
                        </div>
                        </div>";
                    }

                }
                fclose($file_pointer);
                ?>
            </div>

            <div class="cite">
                All images provided by Nintendo, Co., Ltd.
            </div>

        </body>


</html>

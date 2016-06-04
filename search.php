<!DOCTYPE html>
<html>

<?php

if(isset($_POST['Submit1']) )
{
    $varName = $_POST['form_name'];
    $varGame = $_POST['form_game'];
    $varSpecies = $_POST['form_species'];
    $varAlliance = $_POST['form_alliance'];

}
?>

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

                <div class="title3">
                    Search
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

            <div class="echo1">
                <?php
                if(!empty($errorMessage)){
                    echo "<h2>".$errorMessage."</h2>";
                }
                ?>
            </div>

            <div class="search_table">

                <form action="search.php" method="post">
                    You must fill in at least one field to run a search!<br><br><br><br>
                    Character Name: <input type="text" name="form_name"><br><br>
                    First platform appearance : <select name="form_game">
                        <option value="">Select...</option>
                        <option value="Nintendo 64">Nintendo 64</option>
                        <option value="Gamecube">Gamecube</option>
                        <option value="Wii">Wii</option>
                    </select>
                    <br><br>
                    Species: <input type="text" name="form_species"><br><br>
                    What is their Alliance?
                    <select name="form_alliance">
                        <option value="">Select...</option>
                        <option value="Good">Good</option>
                        <option value="Bad">Bad</option>
                        <option value="Neutral">Neutral</option>
                    </select>

                    <input type="submit" name="Submit1">
                </form>
            </div>

                <?php

                $myarray = file("data.txt");

                if(isset($_POST['Submit1']) && ( ($_POST['form_name'] != "") || ($_POST['form_game'] != "") || ($_POST['form_alliance'] != "") || ($_POST['form_species'] != "") )) {



                    if($_POST['form_name'] != "") {
                        $myarray = preg_grep("/".$_POST['form_name']."/i", $myarray);
                    }
                    if($_POST['form_game'] != "") {
                        $myarray = preg_grep("/".$_POST['form_game']."/i", $myarray);
                    }
                    if($_POST['form_species'] != "") {
                        $myarray = preg_grep("/".$_POST['form_species']."/i", $myarray);
                    }
                    if($_POST['form_alliance'] != "") {
                        $myarray = preg_grep("/".$_POST['form_alliance']."/i", $myarray);
                    }

                    $howmany = count($myarray);

                    echo "<div class= 'results'> 
                        Your Search Results(".$howmany."):
                        </div>";

                    $i = 0;

                    while ($howmany != 0){
                        if ($myarray[$i] != ""){
                            $input = explode(",", $myarray[$i]);
                            $input[3] = trim($input[3]);
                            if (in_array("Neutral", $input)) {
                            echo "<div class= 'neutral2'> <div class= 'banner_text'>
                            Character Name: ".$input[0]."<br><br> First Platform Appearance: ".$input[1]."<br><br> Species: ".$input[2]."<br><br> Alliance: ".$input[3]."
                            </div>
                            </div>";
                            }
                            if (in_array("Bad", $input)) {
                            echo "<div class= 'bad2'> <div class= 'banner_text'>
                            Character Name: ".$input[0]."<br><br> First Platform Appearance: ".$input[1]."<br><br> Species: ".$input[2]."<br><br> Alliance: ".$input[3]."
                            </div>
                            </div>";
                            }
                            if (in_array("Good", $input)) {
                            echo "<div class= 'good2'> <div class= 'banner_text'>
                            Character Name: ".$input[0]."<br><br> First Platform Appearance: ".$input[1]."<br><br> Species: ".$input[2]."<br><br> Alliance: ".$input[3]."
                            </div>
                            </div>";
                            }
                            $howmany = ($howmany - 1);
                            $i++;
                        }else{
                            $i++;
                        }
                    }


                }
                ?>
                <div class="cite">
                All images provided by Nintendo, Co., Ltd.
                </div>
        </body>
        


</html>
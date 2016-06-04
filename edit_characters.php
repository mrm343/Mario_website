<!DOCTYPE html>
<html>

<head>
    <link href='https://fonts.googleapis.com/css?family=Skranji:700' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/x-icon" href="photos/favicon.ico">
    <link rel="stylesheet" href="main.css">
    <title>Paper Mario Characters</title>
    <meta name="description" content="Project 2">
</head>

<?php

    $file_pointer = fopen("data.txt", "a+");
    $errorMessage = "";

    if(isset($_POST['Submit1']) ){
        if($_POST['form_name'] == ""){
            $errorMessage .= "You forgot to select the Character's Name!";
        }
        else{
            $varName = $_POST['form_name'];
        }
        if($_POST['form_game'] == ""){
            $errorMessage .= "<br>You forgot to select the Character's Game!";
        }
        else{
            $varGame = $_POST['form_game'];
        }
        if($_POST['form_alliance'] == ""){
            $errorMessage .= "<br>You forgot to select the Character's Alliance!";
        }
        else{
            $varSpecies = $_POST['form_species'];
        }
        if($_POST['form_species'] == "") {
            $errorMessage .= "<br>You forgot to select the Character's Species";
        }
        else{
            $varAlliance = $_POST['form_alliance'];
        }
        if ( ($_POST['form_name'] != "") && ($_POST['form_game'] != "") && ($_POST['form_alliance'] != "") && ($_POST['form_species'] != "") ) {

        $fullstring =  $varName .",". $varGame .",". $varSpecies .",". $varAlliance;
        $fullstring .= "\n";
        fputs($file_pointer, $fullstring);
        }
    }
    fclose($file_pointer);
?>



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

        <div class="title4">
            Add Characters
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

        <div class="paragraph_header">
            Add Characters
        </div>

        <div class="search_table">
            <form action="edit_characters.php" method="post">

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

        <div class="cite">
                All images provided by Nintendo, Co., Ltd.
        </div>

    </body>

</html>
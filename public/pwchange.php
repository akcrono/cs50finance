<?php

    // configuration
    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["opassword"]))
        {
            apologize("You must provide your current password.");
        }
        else if (empty($_POST["npassword"]))
        {
            apologize("You must provide a new password.");
        }
        else if (empty($_POST["confirmation"]))
        {
            apologize("You must confirm your new password.");
        } 
        else if ($_POST["npassword"] != $_POST["confirmation"])
        {
            apologize("Your new passwords must match");
        }
        
        // query database for user
        $rows = query("SELECT * FROM users WHERE id = ?", $_SESSION["id"]);
        $row = $rows[0];

        // compare hash of user's input against hash that's in database
        if (crypt($_POST["opassword"], $row["hash"]) == $row["hash"])
        {
            query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["npassword"]), $_SESSION["id"]);
            render("pwchange_display.php", ["title" => "Password changed"]);
        }
        else
        {
            apologize("Invalid password.");
        }
    }
    else
    {
        // else render form
        render("pwchange_submit.php", ["title" => "Log In"]);
    }

?>

<?php

    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a stock symbol.");
        }
        $s = lookup($_POST["symbol"]);
        if ($s ===false)
        {
            apologize("You must provide a valid stock symbol.");
        }
    
        render("quote_display.php", $s);
    }
    else
    {
        // else render form
        render("quote_submit.php", ["title" => "Quote"]);
    }
    
        
?>

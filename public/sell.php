<?php

    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a stock symbol.");
        }
        if (empty($_POST["shares"]))
        {
            apologize("You must provide a valid number of shares.");
        }

        $s = lookup($_POST["symbol"]);
        
        if ($s ===false)
        {
            apologize("You must provide a valid stock symbol.");
        }
        
        $rows = query("SELECT shares FROM portfolio WHERE id = ? and symbol = ?", $_SESSION["id"], $_POST["symbol"]);

        if (empty($rows))
        {
            apologize("You have no shares of {$_POST["symbol"]}!");
        }
        if ($_POST["shares"] > $rows[0]["shares"])
        {
            apologize("You don't have that many shares!");
        }   
            
        query("UPDATE users SET cash = cash + ? WHERE id = ?", $s["price"]*$_POST["shares"], $_SESSION["id"]);
        if ($_POST["shares"] == $rows[0]["shares"])
        {
            query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
        }
        
        else
        {
            query("UPDATE portfolio SET shares = shares - ? WHERE id = ? and symbol = ?", $_POST["shares"], $_SESSION["id"], $_POST["symbol"]);
        }
        query("INSERT INTO history (id, buysell, symbol ,shares, price) VALUES(?, ?, ?, ?, ?)",
                $_SESSION["id"], "sell", $_POST["symbol"], $_POST["shares"], $s["price"]);
        render("sell_display.php", [ "s" => $s, "shares" => $_POST["shares"]]);
    }
    else
    {
        // else render form
        render("sell_submit.php", ["title" => "Quote"]);
    }
    
        
?>

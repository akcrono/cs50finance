<?php

    require("../includes/config.php"); 

    // if form was submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["symbol"]))
        {
            apologize("You must provide a stock symbol.");
        }
        if (empty($_POST["shares"]) || !preg_match("/^\d+$/", $_POST["shares"]))
        {
            apologize("You must provide a valid number of shares.");
        }




 
        $s = lookup($_POST["symbol"]);
        
        if ($s ===false)
        {
            apologize("You must provide a valid stock symbol.");
        }
        
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);

        if ($s["price"] * $_POST["shares"] > $cash[0]["cash"])
        {
            apologize("You don't have enough money to purchase {$_POST["shares"]} share(s) of {$_POST["symbol"]}!");
        }  
            
        query("UPDATE users SET cash = cash - ? WHERE id = ?", $s["price"]*$_POST["shares"], $_SESSION["id"]);
        
        
       
        query("INSERT INTO portfolio (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", 
                $_SESSION["id"], $_POST["symbol"], $_POST["shares"]);
                
        query("INSERT INTO history (id, buysell, symbol ,shares, price) VALUES(?, ?, ?, ?, ?)",
                $_SESSION["id"], "buy", $_POST["symbol"], $_POST["shares"], $s["price"]);
        render("buy_display.php", [ "s" => $s, "shares" => $_POST["shares"]]);
    }
    else
    {
        // else render form
        render("buy_submit.php", ["title" => "Quote"]);
    }
    
        
?>

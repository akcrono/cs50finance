<?php

    // configuration
    require("../includes/config.php"); 

    // render history
        $histories = query("SELECT buysell, symbol ,shares, price, time FROM history WHERE id = ?", $_SESSION["id"]);

    render("history_display.php", ["histories" => $histories]);

?>

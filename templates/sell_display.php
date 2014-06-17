<div>
    <?php print("You have sold $shares share(s) of {$s["name"]} ({$s["symbol"]}) at {$s["price"]} for a total of " . $shares * $s["price"] . ".");?>
</div>

<div>
    <a href="sell.php">Sell another stock</a>
</div>

<div>
    <a href="index.php">Back to portfolio</a>
</div>

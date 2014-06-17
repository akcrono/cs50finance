<div>
    <?php print("You have purchased $shares share(s) of {$s["name"]} ({$s["symbol"]}) at {$s["price"]} for a total of " . $shares * $s["price"] . ".");?>
</div>

<div>
    <a href="buy.php">Buy another stock</a>
</div>

<div>
    <a href="index.php">Back to portfolio</a>
</div>

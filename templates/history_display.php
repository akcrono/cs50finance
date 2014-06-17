<div>
    <ul class="nav nav-pills" id="myhead">
    <li><a href="quote.php">Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="pwchange.php">Change Password</a></li>
</ul>
    <table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
            <th>Time</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody id="mytd">
 
        <?php foreach ($histories as $history): ?>

        <tr>    
            <td><?= $history["buysell"] ?></td>
            <td><?= $history["symbol"] ?></td>
            <td><?= $history["shares"] ?></td>
            <td><?= "$" . number_format($history["price"], 2) ?></td>
            <td><?= $history["time"] ?></td>
            <td><?= "$" . number_format($history["shares"]*$history["price"], 2) ?></td>
        </tr>
    <? endforeach ?>
    

    </tbody> 
</table>
</div>
<div>
    <a href="logout.php">Log Out</a>
</div>

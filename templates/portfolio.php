<div >
    <ul class="nav nav-pills" id="myhead">
    <li><a href="quote.php">Quote</a></li>
    <li><a href="buy.php">Buy</a></li>
    <li><a href="sell.php">Sell</a></li>
    <li><a href="history.php">History</a></li>
    <li><a href="pwchange.php">Change Password</a></li>
</ul>
    <table class="table table-striped">

    <thead id="mytd">
        <tr>
            <th>Symbol</th>
            <th>Name</th>
            <th>Shares</th>
            <th>Price</th>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody id="mytd">
 
        <?php foreach ($positions as $position): ?>

        <tr>    
            <td><?= $position["symbol"] ?></td>
            <td><?= $position["name"] ?></td>
            <td><?= $position["shares"] ?></td>
            <td><?= "$" . number_format($position["price"], 2) ?></td>
            <td><?= "$" . number_format($position["shares"]*$position["price"], 2) ?></td>
        </tr>
    <? endforeach ?>
    
        <tr>
            <td> </td>
            <td> </td>
            <td> </td>
            <td> </td>
            <td><?= "$" . number_format($balance, 2)?></td>
        </tr>
    <!-- <tbody id="mytd">
        
        <tr>    
            <td>POOP</td>
            <td>Netflix, Inc.</td>
            <td>10</td>
            <td>424.49</td>
            <td>4244.9</td>
        </tr>//-->
    </tbody> 
</table>
</div>
<div>
    <a href="logout.php">Log Out</a>
</div>

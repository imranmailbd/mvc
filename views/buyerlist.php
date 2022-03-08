<p></p>
<h2>Buyer List</h2>
<p></p><p></p>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Buyer Name</th>
        <th scope="col">Buyer Email</th>
        <th scope="col">Phone</th>
        <th scope="col">Receipt ID</th>
        <th scope="col">Amount</th>
        <th scope="col">Entry</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach($buyers_data as $key => $buyer_data){
    ?>
    <tr>
        <td><?=$key++;?></th>
        <td><?=$buyer_data['buyer'];?></td>
        <td><?=$buyer_data['buyer_email'];?></td>
        <td><?=$buyer_data['phone'];?></td>
        <td><?=$buyer_data['receipt_id'];?></td>
        <td><?=$buyer_data['amount'];?></td>
        <td><?=$buyer_data['entry_at']?date('d/m/Y',strtotime($buyer_data['entry_at'])):'';?></td>
    </tr>
    <?php
    }
    ?>
    </tbody>
</table>

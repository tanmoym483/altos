<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        h1 {
            color: #007BFF;
        }
        p {
            color: #555;
        }
        table{
            border: 1px solid #dee2e6;
        }
        table td, table th {
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
<table class="table table-bordered exportable" id="mytable">

<thead>
    <tr>
        <th style="width: 100px">Date</th>
       
        <th>Amount</th>
        <th>Transaction ID</th>
        <th>Transaction Date</th>
        <th>Action</th>


    </tr>
</thead>
<tbody>
    <?php if (!empty($result)) { ?>
        <?php foreach ($result as $key => $c) {

        ?>
            <tr>
            <td><a href="<?php echo site_url("commission/list/".$c->details->user_id.'?d='.date("d-m-Y",strtotime($c->date)))?>"><?php echo date("d-m-Y",strtotime($c->date)); ?></a></td>
            <td><?php echo $c->amount; ?></td>
            <td><?php echo $c->details->transaction_id>0?$c->details->transaction_id:""; ?></td>
            <td><?=($c->details->createdAt == '')?'':date('d-m-Y H:i:s',strtotime($c->details->createdAt))?></td>
           <td> 
            <?php echo $c->details->isPaymentCompleted=='true'?"Paid":"Nonpaid"; ?>
            

            </td>
            </tr>
    <?php }
    } ?>


</tbody>

</table>
</body>
</html>
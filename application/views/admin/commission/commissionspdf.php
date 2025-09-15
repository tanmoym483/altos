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
<table class="table table-bordered exportable">

<thead>
    <tr>
        <th style="width: 10px">SL.No</th>
        <th>Item</th>

        <th>Amount</th>

        <th>Date</th>


    </tr>
</thead>
<tbody>

    <?php 
    
    if (!empty($commissions)) { ?>
        <?php foreach ($commissions as $key => $c) {

        ?>
            <tr>
                <td><?php 
                echo $key + 1;
                 ?></td>

                <td><?php echo $c->reason; ?>
                </td>
                <td><?php echo $c->amount; ?>
                </td>
                <td><?php echo $c->createdAt; ?>
                </td>


            </tr>
    <?php }
    } ?>


</tbody>

</table>
</body>
</html>
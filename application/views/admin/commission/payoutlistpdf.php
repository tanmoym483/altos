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
<table class="table table-bordered exportable" >

<thead>
    <tr>
        <th style="width: 10px">Sl.No</th>
        <th>User Id</th>
        <th>User</th>
        
         <th>Bank A/C Number</th>
        <th>Bank IFSC Code</th>
        <th>Bank Name</th>
        <th>Amount</th>

        


    </tr>
</thead>
<tbody>
    <?php if (!empty($result)) { ?>
        <?php 
        
        foreach ($result as $key => $c) {

        ?>
            <tr>
            <td><?php   
             echo $key + 1;
           
            ?></td>
            <td><?php echo $c->regId;?></td>
            <td>
                <?php echo $c->firstName.($c->middleName? " ".$c->middleName:' ').$c->lastName;?>
            </td>
            
            <td><?php echo count($c->bankDetails)>0? " ".$c->bankDetails[0]->accountNumber:' ';?></td>
            <td><?php echo count($c->bankDetails)>0? " ".$c->bankDetails[0]->ifscCode:' ';?></td>
            <td>
            
                <?php echo (count($c->bankDetails)>0? " ".$c->bankDetails[0]->bankName:' ');?>
               
            </td>
            <td><?php echo (count($c->payout)>0? " ".$c->payout[0]->amount:0); ?></td>
            

            </tr>
    <?php }
    } ?>


</tbody>

</table>
</body>
</html>
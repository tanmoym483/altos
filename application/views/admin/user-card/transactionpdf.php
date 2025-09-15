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
<table class="table table-bordered" id="healthcard_transaction" data-ordering="false">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Mode</th>
                                        <th>Particulas</th>
                                        <th>Deposites</th>
                                        <th>Withdrawals</th>
                                        <th>Balence</th>
                                       
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach( $card_transaction_log as $logs){ 
                                        if($logs->cardmember_id == 0){
                                            $this->db->select('firstName,lastName,middleName')->from('users');
                                            $this->db->where('id', $logs->user_id);
                                            $query = $this->db->get();
                                            $username = $query->row(); 
                                            $name = $username->firstName.' '.$username->middleName.' '.$username->lastName;
                                        } else {
                                            $this->db->select('name')->from('user_card');
                                            $this->db->where('id', $logs->user_id);
                                           // $this->db->where('user_id', $logs->user_id);
                                            $query = $this->db->get();
                                            $username = $query->row(); 
                                            $name = $username->name;
                                        }
                                        
                                        ?>
                                        <tr> 
                                        <td><?=$logs->transaction_date?></td>
                                        <td><?=$logs->transaction_type?></td>
                                        <td><?=$name?> - <?=$user->cardnumber?></td>
                                        <td><?php if($logs->transaction_type == 'credited'){ echo $logs->amount; } ?></td>
                                        <td><?php if($logs->transaction_type == 'debited'){ echo $logs->amount; } ?></td>
                                        <td><?=$logs->balance_after?></td>
                                    </tr>
                                    <?php } ?>
                                <?php if($user->cardnumber != '' && $user->card_status != 'inactive' ){ ?>
                                    <?php foreach( $usercarddetails as $usercard){?>
                                        <tr> 
                                        <td><?=$usercard['created_at']?></td>
                                        <td>Credit</td>
                                        <td><?=$usercard['name']?> - <?=$user->cardnumber?></td>
                                        <td>15000</td>
                                        <td></td>
                                        <td>15000</td>
                                    </tr> <?php } ?>
                                    <tr> 
                                        <td><?=$user->createdAt?></td>
                                        <td>Credit</td>
                                        <td><?=$user->firstName.' '.$user->lastName?> - <?=$user->cardnumber?></td>
                                        <td>15000</td>
                                        <td></td>
                                        <td>15000</td>
                                    </tr>
                                    
                                    <?php  } ?>
                                   
                                </tbody>
                            </table>
</body>
</html>
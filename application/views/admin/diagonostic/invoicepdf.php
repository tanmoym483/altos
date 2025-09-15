<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
       
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
            text-transform:uppercase
        }
        .table th {
            background-color: #167784;
            color:#fff;
            padding:5px 10px;

        }
        .total {
            text-align: right;
            margin-top: 20px;
           
            font-weight: bold;
        }
    </style>
</head>
<body>

   
        
       
        <table>
            <tbody>
                <tr>
                    <td align="left" style="width:33.3%">
                        <p ><strong style="margin-bottom:0px"><?=$data->center_name?></strong></p>
                        <p ><?php echo $centerDetails->address.' '.$centerDetails->city.' <br>'.$centerDetails->district.'<br>'.$centerDetails->state.' '.$centerDetails->postcode; ?>
                        <br>Phone: <?=$centerDetails->phone?></p>
                    </td>

                    <td align="left" style="width:33.3%">
                    <?php if($data->gstin_number != ''){ ?>
                        <div style="font-size:16px;text-align:right">
                        GSTIN: <?=$data->gstin_number?><br>
                        PAN: <?=$data->pancard_number?><br>
                        CIN: <?=$data->cin_number?> </div>
                    <?php } ?>
                        
                    </td>
                    <td align="right" style="width:33.3%">
                        <div style="text-align:right">
                            Invoice Date: <?=date('d-m-Y',strtotime($data->date))?><br>
                            Invoice No.: <?=$data->invoiceid?>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table style="border:1px solid #000; width:100%; padding:5px">
            <tbody>
                <tr>
                    <td align="left" >
                    
                    <?php 
                    if($data->cardId == 0 ){
                        $name = $data->firstName. ' '.$data->middleName. ' '. $data->lastName;
                        $phone_number = $data->uphone;
                        } else {
                        $name = $data->name;
                        $phone_number = $data->ucphone;
                        }
                    ?>
                    <p style="font-size:16px; font-weight:400; text-transform:uppercase">BILL TO<br><?=$name?><br></p>
                    <p style="font-size:14px;">Phone: <?=$phone_number?></p>
                    <p style="font-size:14px;">ADDRESS: <?php echo $data->address.' '.$data->city.' <br>'.$data->district.'<br>'.$data->state.' '.$data->postcode; ?></p>
                    <?php echo ($data->cgstin_number != '')?'Customer GSTIN '.$data->cgstin_number:'';?>
                    </td>
                   
                </tr>
            </tbody>
        </table>
<?php if($data->gst_amount != ''){
        $total = $data->amount_with_gst;
    } else {
        $total = $data->total_amount;
    }
    ?>
   

    <table class="table">
        <thead>
            <tr>
                <th>S No.</th>
                <th >Items</th>
                <th >Quantity</th>
                <?php if($data->gst_amount != ''){?>
                <th>Taxable Value</th>
                <th>CGST</th>
                <th>SGST / UTGST</th>
                <th>IGST</th>
                <?php } else {?>
                <th>Rate</th>
                <?php } ?>
                <th >Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $this->db->select('diagonostic_report_test.test_amount, diagonostic_test.name')->from('diagonostic_report_test')->join('diagonostic_test','diagonostic_test.id=diagonostic_report_test.test_name');
                $this->db->where('diagonostic_report_test.reportId', $data->did);
                // $this->db->where('user_id', $logs->user_id);
                $query = $this->db->get();
                $testnames = $query->result_array();
                $i = 0;
                foreach($testnames as $tname){ ?>
            <tr>
                <td><?=$i+1?></td>
                <td><?php echo $tname['name']; ?></td>
                <td>1</td>
                <td><?php echo number_format($tname['test_amount'], 2); ?></td>
                <?php if($data->gst_amount != ''){?>
                <td>0.00</td>
                <td>0.00</td>
                <td>0.00</td>
               <?php } ?>
                <td><?php echo number_format($tname['test_amount'], 2); ?></td>
            </tr>
            <?php $i++; } ?>
            <tr>
                <td></td>
                <td>Total Amount</td>
                <td></td>
                <?php if($data->gst_amount != ''){?>
                <td><?=$data->total_amount?></td>
                <td><?=($data->gst_amount/2)?></td>
                <td><?=($data->gst_amount/2)?></td>
                <td><?=$data->gst_amount?></td>
                <td><?php echo number_format($total, 2); ?></td>
                <?php } else {?>
                <td></td>
                <td><?php echo number_format($total, 2); ?></td>
                <?php } ?>
                
            </tr>
            <tr>
                <td></td>
                <td>Paid Amount</td>
                <td></td>
                <?php if($data->gst_amount != ''){?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <?php } else {?>
                <td></td>
                <?php } ?>
                <?php if($data->payment_status != 'full payment') {?>
                <td><?php echo number_format($data->paidamount, 2); ?></td>
                <?php } else { ?>
                    <td><?php echo number_format($total, 2); ?></td>
                <?php } ?>
            </tr>
            <?php if($data->payment_status != 'full payment') {?>
            <tr>
                <td></td>
                <td>Due Amount</td>
                <td></td>
                <?php if($data->gst_amount != ''){?>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><?php $due= $total - $data->paidamount;
                echo number_format($due, 2); ?></td>
                <?php } else {?>
                <td></td>
                <td><?php $due= $total - $data->paidamount;
                echo number_format($due, 2); ?></td>
                <?php } ?>
                
            </tr>
            <?php } ?>
        </tbody>
        
    </table>
    <table style="border:1px solid #000; width:100%; padding:10px; margin-top:20px">
            <tbody>
                <tr>
                    <td align="left" >
                    
                    <p>Total Paid Amount In Word</p>
                    <p style="text-transform:capitalize" ><?php
                    function getIndianCurrency(float $number)
                    {
                        $decimal = round($number - ($no = floor($number)), 2) * 100;
                        $hundred = null;
                        $digits_length = strlen($no);
                        $i = 0;
                        $str = array();
                        $words = array(0 => '', 1 => 'one', 2 => 'two',
                            3 => 'three', 4 => 'four', 5 => 'five', 6 => 'six',
                            7 => 'seven', 8 => 'eight', 9 => 'nine',
                            10 => 'ten', 11 => 'eleven', 12 => 'twelve',
                            13 => 'thirteen', 14 => 'fourteen', 15 => 'fifteen',
                            16 => 'sixteen', 17 => 'seventeen', 18 => 'eighteen',
                            19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
                            40 => 'forty', 50 => 'fifty', 60 => 'sixty',
                            70 => 'seventy', 80 => 'eighty', 90 => 'ninety');
                        $digits = array('', 'hundred','thousand','lakh', 'crore');
                        while( $i < $digits_length ) {
                            $divider = ($i == 2) ? 10 : 100;
                            $number = floor($no % $divider);
                            $no = floor($no / $divider);
                            $i += $divider == 10 ? 1 : 2;
                            if ($number) {
                                $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
                                $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
                                $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
                            } else $str[] = null;
                        }
                        $Rupees = implode('', array_reverse($str));
                        $paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
                        return ($Rupees ? $Rupees . '₹ ' : '') . $paise;
                    }
                    if($data->gst_amount != ''){
                        echo getIndianCurrency($data->amount_with_gst).' only';
                    } else {
                        echo getIndianCurrency($data->total_amount).' only';
                    }
                    ?></p>
                    <?php if($data->payment_status != 'full payment') {?>
                    <p style="text-transform:uppercase">Total Paid Amount In Words</p>
                    <p><?=getIndianCurrency($data->paidamount).' only';?></p>
                    <?php } ?>
                    </td>
                   
                </tr>
            </tbody>
        </table>
        <?php
        if($data->gst_amount != ''){
            $amount = $data->amount_with_gst;
        } else {
            $amount = $data->total_amount;
        }
       
        if($amount >= 1000 && $amount < 2400 ){
            $payamount = $amount/2;
            $downpayment['emi_timing'] = 1;
            $downpayment['f_emi_amount'] = $payamount;
            $downpayment['downpayment_amount'] = $payamount;
        }

        if($amount >= 2400 && $amount < 3100){
            $payamount = $amount/3;
            $downpayment['emi_timing'] = 2;
            $downpayment['f_emi_amount'] = $payamount;
            $downpayment['downpayment_amount'] = $payamount;
        }
        if($amount >= 3100 && $amount < 6800){
            $payamount = $amount/4;
            $downpayment['emi_timing'] = 3;
            $downpayment['f_emi_amount'] = $payamount;
            $downpayment['downpayment_amount'] = $payamount;
        }
        if($amount >= 6800){
            $payamount = $amount/5;
            $downpayment['emi_timing'] = 4;
            $downpayment['f_emi_amount'] = $payamount;
            $downpayment['downpayment_amount'] = $payamount;
        }
        $today = date('d-m-Y',strtotime($data->date));
        $day = date('j',strtotime($data->date));
        $month = date('m',strtotime($data->date)); // 0-based (0 = January, 11 = December)
        $year = date('Y',strtotime($data->date));

        // Determine the EMI payment date
        $emiPaymentDate = '';

        // If today is before the 20th, set EMI payment to next month's 5th
        if ($day <= 20) {
            // Set to the 5th of the next month
            $month = ($month + 1) % 12; // Move to next month (rollover to January if December)
            if ($month == 1) { 
                //$year = $year+1; // Increment the year if month was December
                $year = date('Y', strtotime('+1 year'));
            }
            //$emiPaymentDate = new Date(year, month, 5); // 5th of next month
            $emiPaymentDate = date("F j Y", mktime(0,0,0, $month, 5, $year));
        } else {
             // Otherwise, set the EMI payment to the 3rd of the second next month
            $month = ($month + 2) % 12; // Move to the second next month (rollover to January if December)
            if ($month == 1) { 
                // Increment the year if month was December
                $year = date('Y', strtotime('+1 year'));
            }
            //emiPaymentDate = new Date(year, month, 3); // 3rd of the second next month
            $emiPaymentDate = date("F j Y", mktime(0,0,0, $month, 3, $year));
        }
       
           
        
        ?>
         <?php if($data->payment_status != 'full payment') {?>
        <table class="table">
            <thead>
                <tr>
                    <th>S No.</th>
                    <th>Emi</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php for($i=0; $i< $downpayment['emi_timing']; $i++) {?>
                <tr>
                    <td><?=$i+1?></td>
                    <td><?=$i+1?> Emi</td>
                    <td><?=$downpayment['f_emi_amount']?></td>
                    <td><?=$emiPaymentDate?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } ?>
        <table style="width:100%; margin-top:80px">
            <thead>
                <tr>
                    <th style="width:50%" align="left">Customer Signature</th>
                    <th style="width:50%" align="right" >For <?=$data->center_name?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
   

</body>
</html>
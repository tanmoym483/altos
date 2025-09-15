<h2><center>Bdo List</center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
    	<th>Name</th>
                                        <th>Reg ID</th>
                                        <th>Transaction Id</th>
                                     
                                        <th>Joining Date</th>
                                        <th>Status</th>
	</tr>
	
	<?php 
	$no = 1;
	foreach($siswa as $u)
	{
		?>
		<tr>
			<td><?php echo $no++; ?></td>
		<td>
		   Name: <?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?> </br>
		    Email: <?php echo $u->email; ?> </br>
		    Phone: <?php echo $u->phone; ?> </br>
		    City:  <?php echo $u->city; ?> </br>
		    State: <?php echo $u->state; ?>
		    </td>
		    <td><?php echo $u->regId; ?></td>
		    <td><?php echo $u->transRefNo; ?></td>
		    <td><?php echo $u->createdAt; ?></td>
                                           
                                            
                                            <td><?php echo $u->status; ?></td>
		</tr>
		<?php
	}
	?>
</table>
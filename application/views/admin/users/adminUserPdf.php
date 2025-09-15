<h2><center>Admin User List</center></h2>
<hr/>
<table border="1" width="100%" style="text-align:center;">
	<tr>
		<th>No</th>
    	 <th>Member Details</th>

                                                <!-- <th>Side</th> -->

                                                <!-- <th>Intro</th> -->
                                                <!-- <th>Upliner</th> -->
                                                <th>DOJ</th>
                                                
	</tr>
	
	<?php 
	
	$no = 1;
	foreach($siswa as $u)
	{
		?>
		<tr>
			<td><?php echo $no++; ?></td>
	<td>
                                                            <a href="<?php echo site_url('user-details/' . $u->id); ?>">
                                                                <?php echo $u->firstName . ' ' . $u->middleName . ' ' . $u->lastName; ?><br><?php echo $u->regId; ?></a>
                                                        </td>





                                                        <td><?php echo $u->createdAt; ?></td>
		</tr>
		<?php
	}
	?>
</table>
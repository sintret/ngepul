<?php

include ("../_lib/config.php");

 
$counter =$_POST['counter'];

?>
					<tr  valign="top" id="appendTr<?php echo $counter;?>" >
					<!-- <td><input type="text" class="inp-form" name="detail[nm_pegawai][]" id="tmb_pegawai"></td> -->
			
												<td>
														<select name="detail[room][]" id="room" required="required">
															<option value=''>Please Select One</option>
																<?php
																	#$s = " SELECT * FROM room_number where room_status_id = '2' ORDER BY id  " ; 
																	$s = "
																		 	    SELECT a.id,room_no,rate_input_id,room_status_id,
																					   b.id as id_rate_input,rate_name,room_type_id,days_id,price,
																					   c.id as id_room_status,room_status,
																					   d.id as id_room_type,room_type
																				FROM room_number 
																					   a LEFT OUTER JOIN rate_input b ON a.rate_input_id = b.id 
																						 LEFT OUTER JOIN room_status c ON a.room_status_id = c.id
																						 LEFT OUTER JOIN room_type d ON b.room_type_id = d.id
																						 
																		 ";
																		
																	$q = mysql_query ($s);
																	while ($rw = mysql_fetch_array ($q) ) {
																	?>
																		   <option value=<?php echo $rw['id'].'/'.$rw['price']; ?>>
																		   	 <strong>
																			 	<?php echo $rw['room_no']; ?>  Type ->  <?php echo $rw['room_type'] ?>Price -> <?php echo $rw['price'] ?>
																			 </strong>
																			</option>
																<?php
																	}
																?>	
														</select>
													</td>
													 
            <td onclick="deleteTr('<?php echo $counter?>')"><button class="btn btn-danger"><i class="icon-trash "> X</i></button></td>
        </tr>


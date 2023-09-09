<?php 
$newUser=new Users(); 
$bids = $newUser->FindWinOffer('bid_post',$_SESSION['master_id']);
$pending = 0;
$proccess = 0;
$done = 0;
if($bids)
{
  foreach ($bids as $bid) 
  {
  	$post = $newUser->FindCurrentUser('post',$bid->pid);
  	$earlier_a = new DateTime($post->fromdate);
    $later_a = new DateTime($post->todate);
    $diff_a = $later_a->diff($earlier_a)->format("%a");
    $b_total = $bid->bid_amount*$diff_a;
    $broom_am = $b_total*BROOMS_PERCENTAGE/100;

  		if($bid->settlement == 0)
    	{
    		$pending+=$broom_am;
    	}
    	if($bid->settlement == 1)
    	{
    		$done+=$broom_am;
    	}
    	if($bid->settlement == 2)
    	{
    		$proccess+=$broom_am;
    	}
  }
}

$per_p = $pending*3/100;
$per_d = $done*3/100;
$per_po = $proccess*3/100;
?>
<div class="dashboard-main-inner">
<div class="row">
    <div class="col-12">
        <div class="page-breadcrumb-content mb-40">
            <h1>Payments</h1>
        </div>
    </div>
</div>
<div class="dashboard-overview" style="margin-bottom: 20px;">
    <div class="row no-gutters">

        <div class="col-lg-4 col-md-6 col-sm-6">
            <!-- Single Funfact Start -->
            <div class="single-funfact">
                <div class="icon-img">
                    <span class="lnr lnr-license" style="font-size: 55px; color: #2cc1d6;"></span>
                </div>
                <div class="funfact-content">
                    <span class="counter">€ <?php echo round($pending+$per_p,2); ?></span>
                    <span class="text theme-color">Broom Pending Amount</span>
                </div>
            </div>
            <!-- Single Funfact End -->
        </div> 

         <div class="col-lg-4 col-md-6 col-sm-6">
            <!-- Single Funfact Start -->
            <div class="single-funfact">
                <div class="icon-img">
                    <span class="lnr lnr-hourglass" style="font-size: 55px; color: #2cc1d6;"></span>
                </div>
                <div class="funfact-content">
                    <span class="counter">€ <?php echo round($proccess+$per_po,2); ?></span>
                    <span class="text theme-color">Broom Process Amount</span>
                </div>
            </div>
            <!-- Single Funfact End -->
        </div>   

        <div class="col-lg-4 col-md-6 col-sm-6">
            <!-- Single Funfact Start -->
            <div class="single-funfact">
                <div class="icon-img">
                    <span class="lnr lnr-thumbs-up" style="font-size: 55px; color: #2cc1d6;"></span>
                </div>
                <div class="funfact-content">
                    <span class="counter">€ <?php echo round($done+$per_d,2); ?></span>
                    <span class="text theme-color">Broom Done Amount</span>
                </div>
            </div>
            <!-- Single Funfact End -->
        </div>    
    </div>
</div>


<div class="dashboard-overview">
    <div class="row">
        <div class="col-xl-12 col-12" id="chat_error"></div>
        <div class="col-xl-12 col-12">
           <div class="job-applications mb-50">
                <div class="job-applications-main-block">
                    <div class="job-applications-table">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>OF.Details</th>
                                    <th>Cost P/D</th>
                                    <th>Day</th>
                                    <th>T.Cost</th>
                                    <th>B.Cost</th>
                                    <th>TAX 3%</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php                                
                                if($bids)
                                {
                                  foreach ($bids as $bid) 
                                  {
                                    $post = $newUser->FindCurrentUser('post',$bid->pid);
                                    $customer = $newUser->FindCurrentUser('users',$post->uid);
                                    $location = $newUser->FindCurrentUser('locationsadmin',$post->location);
                                    // $ctype = $newUser->FindCurrentUser('vehicle_type',$post->ctype);
                                    // $cname = $newUser->FindCurrentUser('vehicle_name',$bid->car_name);
                                    // $fimage = $newUser->FindFuterImage('vehiclemanage',$cname->id);

                                    $earlier = new DateTime($post->fromdate);
                                    $later = new DateTime($post->todate);

                                    $diff = $later->diff($earlier)->format("%a");
                                     ?>
                                    <tr>
                                        <td>
                                            <?php echo $bid->id; ?>
                                        </td>
                                        <td>
                                        <strong><?php echo $post->title; ?></strong><br>
                                        <b>Location :</b> <?php echo $location->lname; ?><br>
                                        <b>Customer : </b><?php echo $customer->fname.' '.$customer->surname; ?>
                                        </td>                                        
                                        <td>€ <?php echo $bid->bid_amount; ?></td>
                                        <td><?php echo $diff; ?> Days</td>
                                        <td>€ <?php echo $total = $bid->bid_amount*$diff; ?></td>
                                        <td>€ <?php echo $bt = $total*BROOMS_PERCENTAGE/100; ?></td>
                                        <td>€ <?php echo $bt_P = round($bt*3/100,2); ?></td>
                                        <td>€ <?php echo round($bt+$bt_P,2); ?></td>
                                        <td id="pay_status_<?php echo $bid->id; ?>">
                                        	<?php
                                        	if($bid->settlement == 0)
                                        	{
                                        		echo '<b style="color:red;">Pending</b>';
                                        	}
                                        	if($bid->settlement == 1)
                                        	{
                                        		echo '<b style="color:green;">Done</b>';
                                        	}
                                        	if($bid->settlement == 2)
                                        	{
                                        		echo '<b style="color:#37d8d8;">Processing</b>';
                                        	}
                                            if($bid->settlement == 3)
                                            {
                                                echo '<b style="color:red;">Reject</b>';
                                            }
                                        	?>
                                        </td>
                                        <td class="application-contact">
                                        	<?php
                                        	if($bid->settlement == 0)
                                        	{
                                        		?>
                                        		<a href="javaScript:void(0);" id="submited_amount" fdi="<?php echo $bid->id; ?>" style="border-color: #2dc1d6; background-color: #2dc1d6;"><span>Submit</span></a> 
                                        		<?php
                                        	}
                                        	if($bid->settlement == 1)
                                        	{
                                        		?>
                                        		<a href="<?=PROOT?>in.php?invoiceid=<?php echo base64_encode($bid->id); ?>" target="_blank" style="border-color: #2dc1d6; background-color: #2dc1d6;"><span>Download Invoice</span></a> 
                                        		<?php
                                        	}
                                        	?>
                                        	
                                        </td>
                                        
                                    </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript">
	 $(document).on('click','#submited_amount',function()
	    {
	        var bid = $(this).attr('fdi');
	        $("#settlement_id").val(bid);
	        $('#myModalsettlement').modal('show'); // Show modal
	    });

	 $(document).on('click','#settlement-offer',function()
	    {
	        var bid = $("#settlement_id").val();
	        var payment_mode = $("#payment_mode").val();
            var payid = $("#settlement_payment_id").val();
	        $("#settlement_payment_id,#payment_mode").css('border-color','#ccc');
	        if(payment_mode == '')
	        {
	        	$("#payment_mode").focus().css('border-color','red');
	        	return false;
	        }
            else if(payid == '')
            {
                $("#settlement_payment_id").focus().css('border-color','red');
                return false;
            }
	        else
	        {
	        	$("#pay_status_"+bid).html('<b style="color:#37d8d8;">Processing</b>');
	        	$.ajax({
			        type: 'POST',
			        url: path + 'Master/PaymentSettlement',
			        data: {"bid":bid,"payid":payid,"payment_mode":payment_mode},
			        beforeSend: function () {
			        	
			        },
			        success: function (responce) {
			            $('#myModalsettlement').modal('hide'); // Show modal
			        }
			    });
	        }
	        
	    });
</script>

<!-- Modal -->
<div id="myModalsettlement" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">     
      <div class="modal-body">
        <center><img src="<?=PROOT?>images/car.png" style="width: 30%;"></center>           
        <center><h4 class="modal-title w-100">Are you sure?</h4> 
        <p>Settlement Payment This Offer</p>
        <div style="margin: 20px 0px;" id="bid_offer_error"></div>
        </center> 
        <input type="hidden" name="settlement_id" id="settlement_id">
         <center>
             <select id="payment_mode" style="border-radius: 5px; border: 1px solid #ccc; margin-bottom: 20px;width: 90%; padding: 5px 10px;">
                 <option value="">Select Payment Mode</option>
                 <option value="Deposit in Bank">Deposit in Bank</option>
                 <option value="Web Banking">Web Banking</option>
             </select>
         </center> 

        <center><input type="text" name="settlement_payment_id" id="settlement_payment_id" placeholder="Enter Transaction ID" style="border-radius: 5px; border: 1px solid #ccc; margin-bottom: 20px;width: 90%; padding-left: 10px;padding-right:10px;"></center> 

        <center>
        <button type="button" class="btn btn-info" id="settlement-offer">Submit</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </center>
      </div>      
    </div>

  </div>
</div>
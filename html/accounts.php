<?php
//error_reporting(E_ALL); 
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);

require 'templates/header.php';
require 'templates/sidebar.php';
include 'commons/common-functions.php';
?>
<?php
require_once 'connections/connection.php';

date_default_timezone_set("Asia/Kolkata");
if (isset($_GET['voucher'])) {
    
    $voucher_id = $_GET['voucher'];
    $guest_count = json_decode(getGuestCount($conn, $voucher_id));
    $vehicle_info = json_decode(steps("vehicle_info", $conn, $voucher_id));
    $guest_info = json_decode(steps("guest_info", $conn, $voucher_id));
    $ticket_info = json_decode(steps("ticket_info", $conn, $voucher_id));
    $ticket_info_depature = json_decode(steps("ticket_info_depature", $conn, $voucher_id));
    $ticket_special_remark = json_decode(steps("ticket_special_remark", $conn, $voucher_id));
    $ticket_ferry_info = json_decode(steps("ticket_ferry_info", $conn, $voucher_id));
    $accommodation = json_decode(steps("accommodation", $conn, $voucher_id));
    $accommodation_info = json_decode(steps("accommodation_info", $conn, $voucher_id));
    $itenarary = json_decode(steps("itenarary", $conn, $voucher_id));
    $closure = json_decode(steps("closure", $conn, $voucher_id));
    $hotel_blocking_request = json_decode(steps("hotel_blocking_request", $conn, $voucher_id));
    $itenarary = json_decode(steps("itenarary", $conn, $voucher_id));
    $client = json_decode(steps("client_service_confirmation", $conn, $voucher_id));
    $payment_status = json_decode(steps("payment_status", $conn, $voucher_id));
    $other_expenses = json_decode(steps("other_expenses", $conn, $voucher_id));
   
    $cash_expenses = json_decode(steps("cash_expenses", $conn, $voucher_id));
   $account_payment = json_decode(steps("accounts_payment", $conn, $voucher_id));
    $vehicle_expenses = json_decode(steps("vehicle_expenses", $conn, $voucher_id));
    
    $selectedhoteldata = json_decode(selectedhoteldatainfo( $conn, $voucher_id));
    $ferryAmount = json_decode(ferryReportAmount( $conn, $voucher_id));
    $agent_info = json_decode(getAgent($closure[0]->Agent, $conn));
    echo '<script>var packAmount='.$closure[0]->PackageAmount.';
</script>';
    if(isset($closure[0]->GSTIncluded) && $closure[0]->GSTIncluded=="No"){
        echo '<script>var gst="No";
</script>';
    }
    else{
        echo '<script>var gst="Yes";
</script>';
    }
}
?>

 <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <!-- Row -->
          <!-- vertical wizard -->
          <div class="row">
            <div class="col-12">
              <div class="card">
			  <div class="card-block wizard-content ">
			  <div class="row">
               <div class="col-md-12 text-right"> <h3><?php echo isset($client[0]->ConfirmationNumber) ?$client[0]->ConfirmationNumber:"" ?><br> Agency - <?php echo isset($agent_info[0]->CompanyName) ? $agent_info[0]->CompanyName : ''; ?></h3></div>
                </div>
                <!-- Guest first row-->
                    <h4>Guest Details</h4>
					<hr class="m-t-20 m-b-40">
                   <div class="row">
					  <div class="col-md-8">
					  <table class="table table-bordered">
					  <tr>
					  <td><strong>Name of Customer</strong><br><label><?php echo isset($guest_count[0]->GuestName) ?$guest_count[0]->GuestName:"" ?></label></td>
                                          <?php
                                                        $totalguestcount=0;
                                                
                                              $totalguestcount+= isset($guest_count[0]->Occupancy) && ($guest_count[0]->Occupancy)!="" ?intval($guest_count[0]->Occupancy):0; 
                                              $totalguestcount+= isset($guest_count[0]->ExtraAdult) && ($guest_count[0]->ExtraAdult)!="" ?intval($guest_count[0]->ExtraAdult):0 ;
                                              $totalguestcount+= isset($guest_count[0]->ExtraChild) && ($guest_count[0]->ExtraChild)!="" ?intval($guest_count[0]->ExtraChild):0 ;
                                              $totalguestcount+= isset($guest_count[0]->ExtraChildWithMat) && ($guest_count[0]->ExtraChildWithMat)!="" ?intval($guest_count[0]->ExtraChildWithMat):0 ;
                                              $totalguestcount+= isset($guest_count[0]->Infant) && ($guest_count[0]->Infant)!="" ?intval($guest_count[0]->Infant):0; 
                                              $totalguestcount+= isset($guest_count[0]->InfantUnder2) && ($guest_count[0]->InfantUnder2)!="" ?intval($guest_count[0]->InfantUnder2):0 ;
                                              $totalguestcount+= isset($guest_count[0]->SingleOccupancy) && ($guest_count[0]->SingleOccupancy)!="" ?intval($guest_count[0]->SingleOccupancy):0 ;
                                              $totalguestcount+= isset($guest_count[0]->SingleOccFamily) && ($guest_count[0]->SingleOccFamily)!="" ?intval($guest_count[0]->SingleOccFamily):0;
                                              
                                        ?>
                                          <td><strong>No:of Guest</strong><br><label><?php echo $totalguestcount ; ?>
                                              </label></td>
					  <td><strong>Infant (below 2 yrs)</strong><br><label><?php echo (isset($guest_count[0]->InfantUnder2) && ($guest_count[0]->InfantUnder2)!="") ?$guest_count[0]->InfantUnder2:0 ?></label></td>
					  </tr>
                                          <?php
                                            $package_amount= (isset($closure[0]->PackageAmount) && !empty($closure[0]->PackageAmount)) ?  ceil(intval($closure[0]->PackageAmount)):0;
                                            $utgst=0;
                                            $netvalue=0;
                                            if(isset($closure)){
                                            if($closure[0]->GSTIncluded=="No"){
                                                $utgst=($package_amount*5)/100;
                                                $netvalue=$package_amount+$utgst;
                                            }
                                            else{
                                                $netvalue=$package_amount;
                                                $package_amount = (isset($closure[0]->PackageAmount) && !empty($closure[0]->PackageAmount)) ?  ceil(intval($closure[0]->PackageAmount)*0.9524): 0;
                                                $utgst=$netvalue-$package_amount;
                                            }
                                            }
                                          ?>
					   <tr>
					  <td><strong>Amount Invoiced</strong><br><label><?php echo $package_amount; ?> </label></td>
					  <td><strong>UTGST (5%)</strong><br><label><?php echo $utgst; ?></label></td>
					  <td><strong>Nett Value</strong><br><label id="netinvoice"><?php echo $netvalue; ?></label></td>
					  </tr>
					  </table>  
					 </div>
					 <div class="col-md-4">
					  <table class="table table-bordered">
					  <thead>
					  <tr>
					  <th>Guest Names</th>
					  </tr>
					  </thead>
					  <tr>
                                              <td><label>
                                              <?php
                                              $i=1;
                                              if(isset($guest_info)){
                                              foreach ($guest_info as $value) {
                                                  //if($value->GuestName!=""){
                                                  echo $i.". ".$value->GuestName."<br/>";
                                                  $i++;
                                              //}
                                              }
                                              }
                                              ?>
					  </label></td>
					  </tr>					  
                      </table>  
					 </div>
					</div>  
					  
                    
					  <!-- Payment first row -->
					  <div class="m-t-20 m-b-40"></div>
					   <h4>Payments</h4>
					<hr class="m-t-20 m-b-40">
                   <div class="row">
					  <div class="col-md-12">
					  <table class="table table-bordered">
                                              <?php
                                              if(isset($payment_status)){
                                                  $paytotal=0;
                                                      foreach ($payment_status as $value) {
                         ?> 
                                                          <tr>
					  <td><strong>Date of Payment</strong><br><label><?php echo isset($value->DateOfPayment)?date("d/m/Y", strtotime($value->DateOfPayment)):""   ;  ?></label></td>
					  <td><strong>Amount Paid</strong><br><label><?php echo $amountPaid=isset($value->PaymentAmount)?$value->PaymentAmount:0;  ?></label></td>
					  <td><strong>TDS if Applicable</strong><br><label><?php echo $tds=isset($value->TDSCut)?$value->TDSCut:0;  ?></label></td>
                                          <td><h5>Total</h5><label><?php echo $paytotal= $amountPaid+$tds; ?></label></td>
					  </tr>
                                            <?php         
                                                      }
                                              }
                                              ?>
					  
					  </table>  
					 </div>
                       <div class="col-md-12">
                           <table class="col-md-12">
                               
                               <td style="float:right"><button type="button" class="btn btn-warning updatePaymentModal" data-toggle="modal" data-target="#exampleModal123"  data-voucherid="<?php echo $voucher_id; ?>"  data-whatever="@getbootstrap">Update </button></td>
                           </table>
                       </div>
					</div>  
				         <form method="post">	  	
					<div class="row"> 
					
					  <div class="col-md-12">
					 <table class="table table-bordered">
					  <tr>
					  <td width="60%"><h5>Comments</h5><div class="form-group"> 
                                       <input class="form-control"  name="accountpaymentid" value='<?php echo isset($account_payment[0]->AccountpaymentID)?$account_payment[0]->AccountpaymentID:""; ?>' type="hidden">           
					 <textarea class="form-control" id="addressTextarea" name='paymentcomments'rows="3"><?php echo isset($account_payment[0]->Comments)?$account_payment[0]->Comments:""; ?></textarea></div></td>
					  <td width="20%"><h5>Descrepancy</h5><br><label style="color:#FF0000"><strong><?php echo isset($closure[0]->Discrepancy) && ($closure[0]->Discrepancy)!="" ? $closure[0]->Discrepancy : 0; ?></strong></label></td>
					  <td width="20%"><h5>Payment Status</h5><br>
					  <select class="form-control custom-select" name='paymentstatus'>
					  <option value="Unpaid" <?php echo isset($account_payment[0]->PaymentStatus) && ($account_payment[0]->PaymentStatus)=="Unpaid" ?"selected" : ""; ?>>Unpaid</option>
					  <option value="Paid" <?php echo isset($account_payment[0]->PaymentStatus) && ($account_payment[0]->PaymentStatus)=="Paid" ?"selected" : ""; ?>>Paid</option>
					  </select>
					 
                      </td>
					  </tr>
					  </table> 
					</div>
				</div>
		
					
					  <!-- Accommodation first row -->
					  <div class="m-t-20 m-b-40"></div>
					   <h4>Accommodation</h4>
					<hr class="m-t-20 m-b-20">
					  <div class="row">
					  <div class="col-md-3">
					  <table class="table table-bordered">
					  <thead>
					  <tr>
                                             
					  <th>Port Blair</th>
					  <th>Amount</th>
					  </tr>
					  </thead>
					 
                                            <?php
                                            $porttotal=0;
                                            $digitotal=0;
                                            $neiltotal=0;
                                            $havtotal=0;
                                            if(isset($selectedhoteldata)){
                                                foreach ($selectedhoteldata as $value) {
                                                        if($value->IslandName=="Port Blair"){
                                                          $porttotal+= intval($value->Amount); 
                                      ?>
                                          <tr>     
					  <td><?php echo $value->HotelName;?></td>
					  <td><?php echo $value->Amount;?></td>
					  </tr>
                                                            
                                                            
                                 <?php                       }
                                                  }
                                            }
                                            ?>
					  <tr>
					  <td><h5>Total</h5></td>
					  <td><h5><?php echo $porttotal;?></h5></td>
					  </tr>
                      </table>  
					 </div>
					  
					  <div class="col-md-3">
					  <table class="table table-bordered">
					  <thead>
					  <tr>

					  <th>Havelock</th>
					  <th>Amount</th>
					  </tr>
					  </thead>
					  
					 <?php 
                                         if(isset($selectedhoteldata)){
                                         foreach ($selectedhoteldata as $value) {
                                                        if($value->IslandName=="Havelock"){
                                                          $havtotal+= intval($value->Amount); 
                                      ?>
                                          <tr>     
					  <td><?php echo $value->HotelName;?></td>
					  <td><?php echo $value->Amount;?></td>
					  </tr>
                                                            
                                                            
                                 <?php                       }
                                         }}
                                            ?>
					  <tr>
					  <td><h5>Total</h5></td>
					  <td><h5><?php echo $havtotal;?></h5></td>
					  </tr>
                      </table>  
					 </div>
					  
					  <div class="col-md-3">
					  <table class="table table-bordered">
					  <thead>
					  <tr>
					  <th>Neil</th>
					  <th>Amount</th>
					  </tr>
					  </thead>
					  <?php
                                          if(isset($selectedhoteldata)){
                                                foreach ($selectedhoteldata as $value) {
                                                        if($value->IslandName=="Neil Island"){
                                                          $neiltotal+= intval($value->Amount); 
                                      ?>
                                          <tr>     
					  <td><?php echo $value->HotelName;?></td>
					  <td><?php echo $value->Amount;?></td>
					  </tr>
                                                            
                                                            
                                 <?php                       }
                                          }}
                                            ?>
					  <tr>
					  <td><h5>Total</h5></td>
					  <td><h5><?php echo $neiltotal;?></h5></td>
					  </tr>
                      </table>  
					 </div>
					 
					 <div class="col-md-3">
					  <table class="table table-bordered">
					  <thead>
					  <tr>
					  <th>Diglipur</th>
					  <th>Amount</th>
					  </tr>
					  </thead>
					  <?php
                                          if(isset($selectedhoteldata)){
                                                foreach ($selectedhoteldata as $value) {
                                                        if($value->IslandName=="Diglipur"){
                                                          $digitotal+= intval($value->Amount); 
                                      ?>
                                          <tr>     
					  <td><?php echo $value->HotelName;?></td>
					  <td><?php echo $value->Amount;?></td>
					  </tr>
                                                            
                                                            
                                 <?php                       }
                                          }}
                                            ?>
					  <tr>
					  <td><h5>Total</h5></td>
					  <td><h5><?php echo $digitotal;?></h5></td>
					  </tr>
                      </table> 
					   </div>
					  </div>
					 <div class="row"> 
					 <div class="col-md-4">&nbsp;</div>
					  <div class="col-md-8">
					 <table class="table table-bordered">
					  <tr>
					  <td width="20%"><h5> 
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal2" data-whatever="@getbootstrap" id="roomPaymentForm6">Room Payment Status Pop-up</button></h5></td>
					  <td width="40%"><h5>Hotel Expenses</h5></td>
					  <td width="20%"><h5>Total</h5></td>
					  <td width="20%"><h5 id="hotelExpenses"><?php echo $porttotal+$havtotal+$neiltotal+$digitotal;  ?></h5></td>
					  </tr>
					  </table> 
					</div>
				</div>
					 
					<!-- Ferry ticket first row -->
					  <div class="m-t-20 m-b-40"></div>
					   <h4>Ferry Tickets</h4>
                                           
					<hr class="m-t-20 m-b-20">
					  <div class="row">
					  <div class="col-md-12">
					  <table class="table table-bordered ferryAccountTable">
					  <tr>
                                        <?php
                                           $PB_HL=0;
                                           $HL_NL=0;
                                           $HL_PB=0;
                                           $NL_PB=0;
                                           $PB_NL=0;
                                           $NL_HL=0;
                                           if(isset($ferryAmount)){
                                               foreach ($ferryAmount as $value) {
                                                   if($value->SectorName=="PB - HL"){
                                                    $PB_HL+= ($value->Amount!="")?intval($value->Amount):0;
                                                   }
                                                   
                                                   if($value->SectorName=="HL - NL"){
                                                    $HL_NL+= ($value->Amount!="")?intval($value->Amount):0;
                                                   }
                                                   
                                                   if($value->SectorName=="HL - PB"){
                                                    $HL_PB+= ($value->Amount!="")?intval($value->Amount):0;
                                                   }
                                                   
                                                   if($value->SectorName=="NL - PB"){
                                                    $NL_PB+= ($value->Amount!="")?intval($value->Amount):0;
                                                   }
                                                   
                                                   if($value->SectorName=="PB - NL"){
                                                    $PB_NL+= ($value->Amount!="")?intval($value->Amount):0;
                                                   }
                                                   
                                                   if($value->SectorName=="NL - HL"){
                                                    $NL_HL+= ($value->Amount!="")?intval($value->Amount):0;
                                                   }
                                           }}
                                               $totalferryAmount=0;
                                           ?>
					
					  <td><strong>PB - HL</strong></td>
					  <td><?php echo $PB_HL;?></td>
					  <td><strong>HL - NL</strong></td>
					  <td><?php echo $HL_NL;?></td>
					  <td><strong>HL - PB</strong></td>
					  <td><?php echo $HL_PB;?></td>
					  <td><strong>NL - PB</strong></td>
					  <td><?php echo $NL_PB;?></td>
					   <td><strong>PB - NL</strong></td>
					  <td><?php echo $PB_NL;?></td>
					   <td><strong>NL - HL</strong></td>
					  <td><?php echo $NL_HL;?></td>
					  </tr>
					  
					  </table>  
					 </div>
					</div>  
					  <div class="row"> 
					 <div class="col-md-4">&nbsp;</div>
					  <div class="col-md-8">
					 <table class="table table-bordered">
					 <tr>
<!--					  <td width="20%"><h5> 
                                                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Update Payment</button>
                     </h5></td>-->
					  <td width="40%"><h5>Ferry Ticket Expenses</h5></td>
					 <td width="150px"><h5>Total</h5></td>
                                         <?php
                                         $totalferryAmount= $PB_HL+$HL_NL+$HL_PB+$NL_PB+$PB_NL+$NL_HL;
                                         ?>
					  <td width="150px"><h5 id="ferryTicketExpenses"><?php echo $totalferryAmount;?></h5></td>
					  </tr>
					  </table> 
					</div>
				</div>
                                
				 <input class="form-control"  name="voucherid" value='<?php echo $voucher_id; ?>' type="hidden">
					<!-- Cash first row -->
					  <div class="m-t-20 m-b-40"></div>
					   <h4>Cash Expenses</h4>
					<hr class="m-t-20 m-b-20">
					  <div class="row">
					  <div class="col-md-12">
					  <table class="table table-bordered">
					  <tr>
					  <td><strong>Petty Cash at PB</strong></td>
					  <td> 
					  <div class="form-group"> 
                                              <input class="form-control"  name="cashexpenses" value='<?php echo isset($cash_expenses[0]->CashExpensesID)?intval($cash_expenses[0]->CashExpensesID):""; ?>' type="hidden">
						<input class="form-control" id="pettyCashPB"  name="pettycashpb" value='<?php echo $cashpb=isset($cash_expenses[0]->PettyCashPB) && ($cash_expenses[0]->PettyCashPB!="")?intval($cash_expenses[0]->PettyCashPB):0; ?>'  type="text">
					   </div>
						  </td>
					  <td><strong>Petty Cash at HL</strong></td>
					  <td>
					   <div class="form-group"> 
						<input class="form-control" id="pettyCashHL" name="pettycashhl"  value='<?php echo $cashhl=isset($cash_expenses[0]->PettyCashHL) && ($cash_expenses[0]->PettyCashHL!="")?intval($cash_expenses[0]->PettyCashHL):0; ?>'  type="text">
					   </div>
						  </td>
						<td><strong>Petty Cash at Neil</strong></td>
					  <td>
					   <div class="form-group"> 
						<input class="form-control" id="pettyCashNeil" name="pettycashneil" value='<?php echo $cashneil= isset($cash_expenses[0]->PettyCashNeil) && ($cash_expenses[0]->PettyCashNeil!="")?intval($cash_expenses[0]->PettyCashNeil):0; ?>'  type="text">
					   </div>
						  </td>
					  <td><strong>Amount for Something Different</strong></td>
					  <td>
					   <div class="form-group"> 
						<input class="form-control" id="amountForSomething" name="pettycashsomething"  value='<?php echo $something=isset($cash_expenses[0]->AmountSomethingDifferent) && ($cash_expenses[0]->AmountSomethingDifferent!="")?intval($cash_expenses[0]->AmountSomethingDifferent):0; ?>' type="text">
					   </div>
						  </td>
					  </tr>
						  
					  </table>
					  </div>
					</div>
					<div class="row"> 
					 <div class="col-md-6">
					  <table class="table table-bordered">
					  <tr>
					 <td width="80%"><h5>Comments</h5><div class="form-group"> 
					 <textarea class="form-control" id="addressTextarea" name="comments" rows="3"><?php echo isset($cash_expenses[0]->Comment)?$cash_expenses[0]->Comment:""; ?> </textarea></div></td>
					 </tr>
					 </table>
					 </div>
					  <div class="col-md-6">
					 <table class="table table-bordered">
					  <tr>
					  <td width="400px"><h5>Cash Expenses</h5></td>
					  <td width="150px"><h5>Total</h5></td>
					  <td width="150px"><h5 id="cashExpensesTotal"><?php echo $cashtotal =$cashpb+$cashhl+$cashneil+$something; ?></h5></td>
					  </tr>
					  </table> 
					</div>
				</div>
					  
					
					<!-- Vehicles first row -->
					  <div class="m-t-20 m-b-40"></div>
					   <h4>Vehicle Expenses</h4>
					<hr class="m-t-20 m-b-20">
					  <div class="row">
					  <div class="col-md-12">
					  <table class="table table-bordered">
					  <tr>
					  <td><strong>Cars at PB</strong></td>
					  <td> 
					  <div class="form-group"> 
                                              <input class="form-control" name="vehicleid"  value='<?php echo isset($vehicle_expenses[0]->vehicleExpensesID)?intval($vehicle_expenses[0]->vehicleExpensesID):""; ?>' type="hidden">
						<input class="form-control" name="carspb"id="carsPB" value='<?php echo $carpb= isset($vehicle_expenses[0]->CarPB) && ($vehicle_expenses[0]->CarPB!="")?intval($vehicle_expenses[0]->CarPB):0; ?>' type="text">
					   </div>
						  </td>
					  <td><strong>Cars at HL</strong></td>
					  <td>
					   <div class="form-group"> 
						<input class="form-control" name="carshl" id="carsHL" value='<?php echo $carhl=isset($vehicle_expenses[0]->CarHL) && ($vehicle_expenses[0]->CarHL!="")?intval($vehicle_expenses[0]->CarHL):0; ?>'  type="text">
					   </div>
						  </td>
					  <td><strong>Cars at Neil</strong></td>
					  <td>
					   <div class="form-group"> 
						<input class="form-control" name="carsneil" id="carsNeil" value='<?php echo $carn= isset($vehicle_expenses[0]->CarNeil) && ($vehicle_expenses[0]->CarNeil!="")?intval($vehicle_expenses[0]->CarNeil):0; ?>'  type="text">
					   </div>
						  </td>
					  <td><strong>Ali AC Coach</strong></td>
					  <td>
					   <div class="form-group"> 
						<input class="form-control" name="aliaccoach" id="alicoach" value='<?php echo $alicouch =isset($vehicle_expenses[0]->AliACCouch) && ($vehicle_expenses[0]->AliACCouch !="")?intval($vehicle_expenses[0]->AliACCouch):0; ?>'  type="text">
					   </div>
						  </td>
					  </tr>
					  
					  </table>
					  </div>
					</div>
					
					<div class="row"> 
					 <div class="col-md-6">&nbsp;</div>
					  <div class="col-md-6">
					 <table class="table table-bordered">
					  <tr>
					  <td width="400px"><h5>Vehicle Expenses</h5></td>
					  <td width="150px"><h5>Total</h5></td>
					  <td width="150px"><h5 id="vehicleExpensesTotal"><?php echo $vehicletotal=$alicouch+$carhl+$carn+$carpb; ?></h5></td>
					  </tr>
					  </table> 
					</div>
				</div>
					  
					  
					<!-- Cash first row -->
					  <div class="m-t-20 m-b-40"></div>
					   <h4>Other Expenses</h4>
					<hr class="m-t-20 m-b-20">
					  <div class="row">
					  <div class="col-md-12">
					  <table class="table table-bordered">
					  <tr>
					  <td><strong>DJ/Sound SystemB</strong></td>
					  <td> 
					  <div class="form-group"> 
                                              <input class="form-control" name="otherexpensesid" value='<?php echo isset($other_expenses[0]->OtherExpensesID)?intval($other_expenses[0]->OtherExpensesID):0; ?>' type="hidden">
                                              <input class="form-control" name="djsound" id="djsound" value='<?php echo $dj= isset($other_expenses[0]->DjSoundSystem) && ($other_expenses[0]->DjSoundSystem)!="" ?intval($other_expenses[0]->DjSoundSystem):0; ?>' type="text">
					   </div>
						  </td>
					  <td><strong>Photos</strong></td>
					  <td>
					   <div class="form-group"> 
						<input class="form-control" name="photos" id="photos" value='<?php echo $photo=isset($other_expenses[0]->Photos) && ($other_expenses[0]->Photos)!=""?intval($other_expenses[0]->Photos):0; ?>' type="text">
					   </div>
						  </td>
					  <td><strong>Miscellaneous</strong></td>
					  <td>
					   <div class="form-group"> 
						<input class="form-control" name="miscellaneous" id="misc" value='<?php echo $misc= isset($other_expenses[0]->Miscellaneous) && ($other_expenses[0]->Miscellaneous)!=""?intval($other_expenses[0]->Miscellaneous):0; ?>' type="text">
					   </div>
						  </td>
					  </tr>
					 	  
					  </table>
					  </div>
					</div>
					
					<div class="row"> 
					 <div class="col-md-6">&nbsp;</div>
					  <div class="col-md-6">
					 <table class="table table-bordered">
					  <tr>
					  <td width="400px"><h5>Other Expenses</h5></td>
					  <td width="150px"><h5>Total</h5></td>
					  <td width="150px"><h5 id="otherExpensesTotal"><?php echo $totalother= $dj+$photo+$misc ; ?></h5></td>
					  </tr>
					  </table> 
					</div>
				</div>
					  
					  
					<!-- Accounts -->
					  <div class="m-t-20 m-b-40"></div>
					   <h4>Accounts</h4>
					<hr class="m-t-20 m-b-20">
					  <div class="row"> 
					 <div class="col-md-6">&nbsp;</div>
					  <div class="col-md-6">
					 <table class="table table-bordered">
					  <tr>
					  <td width="150px"><h5>Total Expenses</h5></td>
					  <td width="150px"><h5 id="totalExpenses">75000</h5></td>
					  </tr>
					  <tr>
					  <td width="150px"><h5>Profit</h5></td>
					  <td width="150px"><h5 style="color:#006600; font-weight:bold" id="profit">35000</h5></td>
					  </tr>
					  </table> 
					</div>
				</div>
				
			 <div class="m-t-20 m-b-40"></div>
				 <div class="form-actions">
                      <div class="row">
					  <div class="col-md-10">&nbsp;</div>
                        <div class="col-md-42">
                          <button type="submit" class="btn btn-success" name="saveandupdateaccount">Save and Close</button>
                              <button type="button" class="btn btn-inverse">Cancel</button>
                          </div>
                      </div>
                    </div>
                         </form>
			<div class="m-t-20 m-b-40"></div>
					
                </div>
      
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
     
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== --> </div>
         <?php
require 'templates/footer.php';
?>   
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
	
	 <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLabel1">Hotel Payment Status</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="cancelHotelPaymentStatusModal"><span aria-hidden="true">×</span></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>

                                                                <th>Hotel Name</th>                                                                                                                                
                                                                <th>Payment Term</th>                                                                    
                                                                <th>Amount</th>
                                                                <th>Amount Payable</th>
                                                                <th>Cut Of Date(If applicable)</th>
                                                                <th>Payment Status</th>                                                                    
                                                            </tr>
                                                        </thead>
                                                        <tbody id="form61ModalTable">                                                                


                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="modal-footer"> 
                                                <button type="button" class="btn btn-default" data-dismiss="modal" id="closeForm6Modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="submitModalForm6">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								
								
								<!-- modal form -->
<!--                          <div class="modal fade" id="exampleModal" tabindex="-1"

                            role="dialog" aria-labelledby="exampleModalLabel1">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title" id="exampleModalLabel1">PB - HL</h4>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                </div>
                                <div class="modal-body">
								
								
							
							<div class="row">
							<div class="col-md-12">
                             <label for="firstName1"><strong>Name: Rajesh Kumar | Age: 33</strong></label>
								</div>
							<div class="col-md-3">
                          <div class="form-group"> <label for="guestage">Ferry
                              Name</label>
                            <select class="form-control custom-select">
                              <option>Makruzz Gold @ 0800 hrs</option>
                              <option>Makruzz Gold @ 1400 hrs</option>
                              <option>Green Ocean @ 0645 Hrs</option>
                            </select>
                          </div>
                        </div>
								<div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">Amount</label>
                                    <input class="form-control" id="agent-name1" type="number">
                                  </div>
								  </div>
								  <div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">PNR</label>
                                    <input class="form-control" id="agent-name1" type="text">
                                  </div>
								  </div>
								  <div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">Status</label>
                                    <select class="form-control custom-select">
                                      <option>Completed</option>
                                      <option>Pending</option>
                                    </select>
                                  </div>
								  </div>
                           		</div>
																
															
							<div class="row">
							<div class="col-md-12">
                             <label for="firstName1"><strong>Name: Vinoth Kumar | Age: 33</strong></label>
								</div>
							<div class="col-md-3">
                          <div class="form-group"> <label for="guestage">Ferry
                              Name</label>
                              <select class="form-control custom-select">
                              <option>Makruzz Gold @ 0800 hrs</option>
                              <option>Makruzz Gold @ 1400 hrs</option>
                              <option>Green Ocean @ 0645 Hrs</option>
                            </select>
                          </div>
                        </div>
						
								<div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">Amount</label>
                                    <input class="form-control" id="agent-name1" type="number">
                                  </div>
								  </div>
								  <div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">PNR</label>
                                    <input class="form-control" id="agent-name1" type="text">
                                  </div>
								  </div>
								  <div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">Status</label>
                                    <select class="form-control custom-select">
                                      <option>Completed</option>
                                      <option>Pending</option>
                                    </select>
                                  </div>
								  </div>
                           		</div>
								
								<div class="row">
								<div class="col-md-12">
                             <label for="firstName1"><strong>Name: Akil Nandan | Age: 40</strong></label>
								</div>
							<div class="col-md-3">
                          <div class="form-group"> <label for="guestage">Ferry
                              Name</label>
                              <select class="form-control custom-select">
                              <option>Makruzz Gold @ 0800 hrs</option>
                              <option>Makruzz Gold @ 1400 hrs</option>
                              <option>Green Ocean @ 0645 Hrs</option>
                            </select>
                          </div>
                        </div>
								<div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">Amount</label>
                                    <input class="form-control" id="agent-name1" type="number">
                                  </div>
								  </div>
								  <div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">PNR</label>
                                    <input class="form-control" id="agent-name1" type="text">
                                  </div>
								  </div>
								  <div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">Status</label>
                                    <select class="form-control custom-select">
                                      <option>Completed</option>
                                      <option>Pending</option>
                                    </select>
                                  </div>
								  </div>
                                </div>
								
								<div class="row">
								<div class="col-md-12">
                             <label for="firstName1"><strong>Name: Nikhil Kumar | Age: 7</strong></label>
								</div>
							<div class="col-md-3">
                          <div class="form-group"> <label for="guestage">Ferry
                              Name</label>
                              <select class="form-control custom-select">
                              <option>Makruzz Gold @ 0800 hrs</option>
                              <option>Makruzz Gold @ 1400 hrs</option>
                              <option>Green Ocean @ 0645 Hrs</option>
                            </select>
                          </div>
                        </div>
								<div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">Amount</label>
                                    <input class="form-control" id="agent-name1" type="number">
                                  </div>
								  </div>
								  <div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">PNR</label>
                                    <input class="form-control" id="agent-name1" type="text">
                                  </div>
								  </div>
								  <div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">Status</label>
                                    <select class="form-control custom-select">
                                      <option>Pending</option>
                                      <option>Completed</option>
                                    </select>
                                  </div>
								  </div>
                                </div>
								
								<div class="row">
								<div class="col-md-12">
                             <label for="firstName1"><strong>Name: Mahesh Kumar | Age: 30</strong></label>
								</div>
							<div class="col-md-3">
                          <div class="form-group"> <label for="guestage">Ferry
                              Name</label>
                              <select class="form-control custom-select">
                              <option>Makruzz Gold @ 0800 hrs</option>
                              <option>Makruzz Gold @ 1400 hrs</option>
                              <option>Green Ocean @ 0645 Hrs</option>
                            </select>
                          </div>
                        </div>
								<div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">Amount</label>
                                    <input class="form-control" id="agent-name1" type="number">
                                  </div>
								  </div>
								  <div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">PNR</label>
                                    <input class="form-control" id="agent-name1" type="text">
                                  </div>
								  </div>
								  <div class="col-md-3">
                                  <div class="form-group"> <label for="firstName1">Status</label>
                                    <select class="form-control custom-select">
                                      <option>Pending</option>
                                      <option>Completed</option>
                                    </select>
                                  </div>
								  </div>
                                </div>
                                </div>
                                <div class="modal-footer"> <button type="button"

                                    class="btn btn-default" data-dismiss="modal">Close</button>
                                  <button type="button" class="btn btn-primary">Submit</button>
                                </div>
                              </div>
                            </div>
                          </div>-->
<div class="modal fade" id="exampleModal" tabindex="-1"

     role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modaltitlelabel" id="exampleModalLabel1"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<!--                <input type="hidden" class="numberpax" value="">-->
                <input type="hidden" class="macruzzticketferryID" value="">
            </div>
            <div class="modal-body">
                <span class="makruzzBodySpanFirst">
                    <span class="makruzzBodySpan">
<!--                        <div class="row makruzzModalBodyRow">
                            <input type="hidden" class="ferryReportID" value="">

                            <div class="col-md-12">
                                <label for="firstName1" class="personInfo"><strong>Name:  | Age: </strong></label>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <label for="guestage">Ferry
                                        Name</label>
                                    <select class="form-control custom-select makruzFerryname" id="makruzzFerryname">
                                        <option>Makruzz Gold @ 0800 hrs</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <label for="firstName1">Amount</label>
                                    <input class="form-control makruzzAmount"  type="number" value="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"> <label for="firstName1">PNR</label>
                                    <input class="form-control makruzzPNR"  type="text" value="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group makruzzStatus"> <label for="firstName1">Status</label>
                                    <select class="form-control custom-select">
                                        <option value="Pending">Pending</option>
                                        <option value="Confirmed">Confirmed</option>
                                    </select>
                                </div>
                            </div>

                        </div>-->

                    </span>

                </span>

            </div>
            <div class="modal-footer"> <button type="button"

                                               class="btn btn-default closemakruzz" id="closeReportFerry" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="makruzSubmitButton">Submit</button>
            </div>
        </div>
    </div>
</div>





<div class="modal fade" id="exampleModal123" tabindex="-1"

     role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title modaltitlelabel" id="exampleModalLabel1">Payment Status</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<!--                <input type="hidden" class="numberpax" value="">-->
                <input type="hidden" class="paymentID" value="">
            </div>
            <div class="modal-body">
                <span class="makruzzBodySpanFirst">
                    <span class="paymentModalBody">

                    </span>

                </span>

            </div>
            <div class="modal-footer"> <button type="button"

                                               class="btn btn-default closemakruzz" id="closeReportFerry" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="paymentSubmitButton">Submit</button>
            </div>
        </div>
    </div>
</div>
                          <!-- modal form ends-->
						
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
   
    <script src="assets/plugins/moment/min/moment.min.js"></script>
    <script src="assets/plugins/wizard/jquery.steps.min.js"></script>
    <script src="assets/plugins/wizard/jquery.validate.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="assets/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="assets/plugins/wizard/steps.js"></script>
    <!-- Date Picker Plugin JavaScript -->
    <script src="assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Clock Plugin JavaScript -->
    <script src="assets/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Date range Plugin JavaScript -->
    <script src="assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- icheck -->
    <script src="assets/plugins/icheck/icheck.min.js"></script>
    <script src="assets/plugins/icheck/icheck.init.js"></script>
    <script>

      // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }

    // Date Picker
    //jQuery('.mydatepicker, #datepicker').datepicker();
    
        jQuery('.mydatepicker, #datepicker').datepicker({
            startDate: new Date()
        });
        $('body').on('focus', ".mydatepicker, #datepicker", function() {
            $(this).datepicker({
                startDate: new Date()
            });
        });
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });
    </script>
    <script src="assets/plugins/summernote/dist/summernote.min.js"></script>
    <script>
    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false // set focus to editable area after initializing summernote
        });

        $('.inline-editor').summernote({
            airMode: true
        });

    });

    window.edit = function() {
            $(".click2edit").summernote()
        },
        window.save = function() {
            $(".click2edit").summernote('destroy');
        }
    </script>
    <script src="js/accounts.js"></script>
    
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
  
 <?php
                        include "commons/add-common.php";
                        
                        
                     ?>
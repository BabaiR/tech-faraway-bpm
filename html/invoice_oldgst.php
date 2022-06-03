<?php
require_once 'connections/connection.php';
date_default_timezone_set("Asia/Kolkata");
include 'commons/common-functions.php';
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
    
    $client = json_decode(steps("client_service_confirmation", $conn, $voucher_id));

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Invoice</title>

<style type="text/css">
    #one td {
        border: 1px solid #000;
    }
	
	#oneinner td {
        border-right: 1px solid #000; border-left: 1px solid #000; border-bottom: 1px solid #000;
    }
	
	#typography {font-family:cambria; ont-size:10.5px }
	
	a {color: #009900;}
	p, a span {color: #000;}
</style>

</head>

<body id="typography">

<table width="700" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td colspan="3"></td>
  </tr>
    <tr>
    <td width="141" rowspan="4"><img src="http://farawaytree-andaman.com/img/logo_web.png" width="100" height="100" /></td>
    <td width="571" align="center"><strong>PAN NO: AACCF5694A</strong></td>
    <td width="156" align="center">&nbsp;</td>
  </tr>
    <tr>
      <td align="center"><strong>GSTIN : 35AACCF5694A1ZS</strong></td>
      <td align="center">&nbsp;</td>
    </tr>
	<tr>
      <td align="center"><strong>SAC NO: 998555</strong></td>
      <td align="center">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><strong>Faraway Tree Hospitality Private Limited </strong><br />
Survey No. 38, 3rd Floor, Junglighat Village, Port Blair, South Andaman 744101 <br />
M +91-9500-555912 |T +91-44-2498-0114| 4206-9995</td>
     
    </tr>
 <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
  
<table width="700" cellspacing="0" cellpadding="5" align="center">
  
  <tr>
    <td colspan="2" align="center"><strong><u>INVOICE</u></strong></td>
  </tr>
   <tr>
    <td width="538"><strong>No. </strong> FTT / <?php echo isset($client[0]->DocketNumber) ? $client[0]->DocketNumber : ""; ?> </td>
    <td width="340"><strong>Guest Name:</strong> <?php echo isset($guest_count[0]->GuestName) ?$guest_count[0]->GuestName : ""; ?><?php echo isset($closure[0]->FileReferenceNumber) && !empty($closure[0]->FileReferenceNumber) ? "(".$closure[0]->FileReferenceNumber.")" : "" ?> </td>
  </tr>
   <tr>
    <?php $stop_date = date('dS F , Y', strtotime($guest_count[0]->Departure . ' +1 day'));?>
     <td><strong>Date:</strong> <?php echo $stop_date ?></td>
     <td><strong>To:</strong> <?php echo isset($closure[0]->Agent) && !empty($closure[0]->Agent)  ? json_decode(getAgent($closure[0]->Agent,$conn))[0]->CompanyName : ""  ; ?> </td>
   </tr>
   <tr>
     <td>&nbsp;</td>
     <td><strong>GST Number :</strong> <?php echo isset($closure[0]->Agent) && !empty($closure[0]->Agent) ? json_decode(getAgent($closure[0]->Agent,$conn))[0]->GSTNo : ""  ; ?></td>
   </tr>
</table>
  
 <table width="700" cellspacing="0" cellpadding="5" align="center">
  <tr>
    <td colspan="3" align="center">&nbsp;</td>
  </tr>
  <tr id="one">
    <td colspan="2" align="center" valign="top"><strong><u>Particulars</u></strong></td>
    <td width="251" valign="top" align="center"><strong><u>AMOUNT</u></strong></td>
  </tr>
     <?php
     if(isset($closure[0]->GSTIncluded) && $closure[0]->GSTIncluded=="No"){
       ?>
  <tr id="oneinner">
    <td height="100" colspan="2" align="center" valign="middle"><strong>Towards Package for Andaman for <?php echo isset($guest_count[0]->GuestName)?$guest_count[0]->GuestName:""; ?> </strong></td>
    <td rowspan="2" align="center" valign="middle"><strong><?php echo isset($closure[0]->PackageAmount) ? $closure[0]->PackageAmount: ""?></strong></td>
  </tr>
  <tr id="oneinner">
    <td width="307" valign="top"><strong>Travel Date</strong></td>
    <td width="310" valign="top"><?php echo isset($guest_count[0]->Arrival)?date("d/m/Y", strtotime($guest_count[0]->Arrival)):""; ?> to <?php echo isset($guest_count[0]->Departure) ? date("d/m/Y", strtotime($guest_count[0]->Departure)) : ""; ?> </td>
  </tr>
     
  <tr id="oneinner">
    <td colspan="2" valign="top" align="right"><strong>ADD: UTGST @ 2.50%</strong></td>
    <td valign="top" align="center"><strong><?php echo isset($closure[0]->PackageAmount) ? $utgst=($closure[0]->PackageAmount *2.5/100) : "";?></strong></td>
  </tr>
  <tr id="oneinner">
    <td colspan="2" valign="top" align="right"><strong>ADD: CGST @ 2.50%</strong></td>
    <td valign="top" align="center"><strong><?php echo isset($closure[0]->PackageAmount) ? $utgst : "";?></strong></td>
  </tr>
  <tr id="oneinner">
    <td colspan="2" valign="top" align="right"><strong>TOTAL PAYABLE</strong></td>
    <td valign="top" align="center"><strong><?php echo isset($closure[0]->PackageAmount)? ceil(($closure[0]->PackageAmount+$utgst+$utgst)) : "";?></strong></td>
  </tr>  
     <?php
     }
     else{
  ?>
     
  <tr id="oneinner">
    <td height="100" colspan="2" align="center" valign="middle"><strong>Towards Package for Andaman for <?php echo isset($guest_count[0]->GuestName)?$guest_count[0]->GuestName:""; ?> </strong></td>
    <td rowspan="2" align="center" valign="middle"><strong><?php echo $packagewo = (isset($closure[0]->PackageAmount) && !empty($closure[0]->PackageAmount)) ?  ceil(intval($closure[0]->PackageAmount)*0.9524): 0;?></strong></td>
  </tr>
  <tr id="oneinner">
    <td width="307" valign="top"><strong>Travel Date</strong></td>
    <td width="310" valign="top"><?php echo isset($guest_count[0]->Arrival)?date("d/m/Y", strtotime($guest_count[0]->Arrival)):""; ?> to <?php echo isset($guest_count[0]->Departure) ? date("d/m/Y", strtotime($guest_count[0]->Departure)) : ""; ?> </td>
  </tr>
     <tr id="oneinner">
    
    <?php
           $a= $packagewo!=0?ceil(intval($closure[0]->PackageAmount))-$packagewo:0;
           $gstb=$a/2;
    ?>
    <td colspan="2" valign="top" align="right"><strong>ADD: UTGST @ 2.50%</strong></td>
    <td valign="top" align="center"><strong><?php echo $gstb; ?></strong></td>
  </tr>
     
  <tr id="oneinner">
    <td colspan="2" valign="top" align="right"><strong>ADD: CGST @ 2.50%</strong></td>
     <td valign="top" align="center"><strong><?php echo $gstb; ?></strong></td>
  </tr>
     <tr id="oneinner">
    <td colspan="2" valign="top" align="right"><strong>TOTAL PAYABLE</strong></td>
    <td valign="top" align="center"><strong><?php echo isset($closure[0]->PackageAmount)? ceil(($closure[0]->PackageAmount)) : "";?></strong></td>
  </tr>  
  
     <?php
     }
     ?>
     <tr>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td valign="top">Prepared By: <?php echo isset($closure[0]->FileHandlerFTT) ? $closure[0]->FileHandlerFTT: ''; ?></td>
    <td colspan="2" valign="top" align="right">Authorized By: Mr. Akshay Rawat</td>
   </tr>
  <tr>
    <td colspan="2" valign="top">&nbsp;</td>
    <td valign="top" align="right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" valign="top">Account Name: Faraway Tree Hospitality Private Limited<br />
      Current Account No: 915020021706515<br />
      Bank: AXIS Bank<br />
	  IFSC Code: UTIB0000234<br />
      Branch: # 37- D, VELACHERY- TAMBARAM MAIN ROAD, VELACHERY, CHENNAI - 600 004.</td>
 
  </tr>
  <tr>
    <td colspan="3" valign="top" style="color:#0099FF">**Please note this is a auto-generated invoice copy and hence no signature required.**</td>
   </tr>
  <tr>
    <td colspan="3" valign="top" style="color:#0099FF">&nbsp;</td>
  </tr>
 </table> 
    <?php
    }
?>

</body>
</html>

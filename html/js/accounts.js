$(document).ready(function() {
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
    
}
var voucherid = getParameterByName('voucher');
console.log("packageamount...."+packAmount);

console.log(packageam);
console.log("voucherid");
console.log(voucherid);
var str1="";
var pbhl=0;
var amountpbhl=0;
var amounthlnl=0;
var amounthlpb=0;
var amountnlpb=0;
var amountpbnl=0;
var amountnlhl=0;
var hlnl=0;
var str2="";
var str3="";
var str4="";
var str5="";
var str6="";
var abc="";
$.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "ferryaccounts",
                voucher:voucherid
            },
             dataType: "JSON",
            success: function(result) {
                console.log(result);
                
                var len =result.data.length;
                console.log(len);
                for(var i=0;i<len;i++){
                    if(result.data[i].SectorName=="PB - HL"){
                        console.log("pbhlll  "+ result.data[i].Amount);
                                        if(result.data[i].Amount!="" && result.data[i].Amount!='null' && result.data[i].Amount!=null ){
                                   amountpbhl+= parseInt(result.data[i].Amount);
                                        }
                        if(str1!=""){
                            str1="";
                        str1+='<td><strong>PB - HL</strong></td>';
                            str1+='<input type="hidden" id="pbhl"  value="pbhl">';
                             str1+='<td>'+amountpbhl+'</td>';
                             str1+='<input type="hidden" id="pbhlamount"  value="'+amountpbhl+'">';
                             str1+='<td> <button type="button" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#exampleModal" data-sectorID="' + result.data[i].SectorID + '" data-sectorname="' + result.data[i].SectorName + '"data-pax="' + result.data[i].pax + '" data-ticketferry="' + result.data[i].TicketFerryID + '" data-voucherid="' + voucherid + '" data-whatever="@getbootstrap">Update Payment</button></td>';
                        }
                        else{
                            str1+='<td><strong>PB - HL</strong></td>';
                            str1+='<input type="hidden" id="pbhl"  value="">';
                             str1+='<td>'+amountpbhl+'</td>';
                             str1+='<input type="hidden" id="pbhlamount"  value="'+amountpbhl+'">';
                             str1+='<td> <button type="button" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#exampleModal" data-sectorID="' + result.data[i].SectorID + '" data-sectorname="' + result.data[i].SectorName + '"data-pax="' + result.data[i].pax + '" data-ticketferry="' + result.data[i].TicketFerryID + '" data-voucherid="' + voucherid + '" data-whatever="@getbootstrap">Update Payment</button></td>';
                        }
                        
                    }
                    if(result.data[i].SectorName=="HL - NL"){
                         if(result.data[i].Amount!=""){
                                   amounthlnl+= parseInt(result.data[i].Amount);
                                        }
                        if(str2!=""){
                            str2="";
                            str2+='<td><strong>HL - NL</strong></td>';
                            str2+='<input type="hidden" id="hlnl"  value="">';
                             str2+='<td>'+amounthlnl+'</td>';
                             str2+='<input type="hidden" id="hlnlamount"  value="'+amounthlnl+'">';
                             str2+='<td> <button type="button" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#exampleModal" data-sectorID="' + result.data[i].SectorID + '" data-sectorname="' + result.data[i].SectorName + '"data-pax="' + result.data[i].pax + '" data-ticketferry="' + result.data[i].TicketFerryID + '" data-voucherid="' + voucherid + '" data-whatever="@getbootstrap">Update Payment</button></td>';
                        }
                            else{   
                             str2+='<td><strong>HL - NL</strong></td>';
                             str2+='<input type="hidden" id="hlnl"  value="hlnl">';
                             str2+='<td>'+amounthlnl+'</td>';
                              str2+='<input type="hidden" id="hlnlamount"  value="'+amounthlnl+'">';
                             str2+='<td> <button type="button" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#exampleModal" data-sectorID="' + result.data[i].SectorID + '" data-sectorname="' + result.data[i].SectorName + '"data-pax="' + result.data[i].pax + '" data-ticketferry="' + result.data[i].TicketFerryID + '" data-voucherid="' + voucherid + '" data-whatever="@getbootstrap">Update Payment</button></td>';
                            }
                    }
                    if(result.data[i].SectorName=="HL - PB"){
                               if(result.data[i].Amount!=""){
                                   amounthlpb+= parseInt(result.data[i].Amount);
                                        }
                                if(str3!="")
                                    {
                                        str3="";
                                        
                             str3+='<td><strong>HL - PB</strong></td>';
                             str3+='<input type="hidden" id="hlpb"  value="hlpb">';
                             str3+='<td>'+amounthlpb+'</td>';
                             str3+='<input type="hidden" id="hlpbamount"  value="'+amounthlpb+'">';
                             str3+='<td> <button type="button" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#exampleModal" data-sectorID="' + result.data[i].SectorID + '" data-sectorname="' + result.data[i].SectorName + '"data-pax="' + result.data[i].pax + '" data-ticketferry="' + result.data[i].TicketFerryID + '" data-voucherid="' + voucherid + '" data-whatever="@getbootstrap">Update Payment</button></td>';
                                    }
                                    else{
                                        
                             str3+='<td><strong>HL - PB</strong></td>';
                             str3+='<input type="hidden" id="hlpb"  value="">';
                             str3+='<td>'+amounthlpb+'</td>';
                             str3+='<input type="hidden" id="hlpbamount"  value="'+amounthlpb+'">';
                             str3+='<td> <button type="button" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#exampleModal" data-sectorID="' + result.data[i].SectorID + '" data-sectorname="' + result.data[i].SectorName + '"data-pax="' + result.data[i].pax + '" data-ticketferry="' + result.data[i].TicketFerryID + '" data-voucherid="' + voucherid + '" data-whatever="@getbootstrap">Update Payment</button></td>';
                                    }
                        
                    }
                    if(result.data[i].SectorName=="NL - PB"){
                                if(result.data[i].Amount!=""){
                                   amountnlpb+= parseInt(result.data[i].Amount);
                                        }
                        if(str4!=""){     
                            str4="";
                        str4+='<td><strong>NL - PB</strong></td>';
                        str4+='<input type="hidden" id="nlpb"  value="nlpb">';
                             str4+='<td>'+amountnlpb+'</td>';
                             str4+='<input type="hidden" id="nlpbamount"  value="'+amountnlpb+'">';
                             str4+='<td> <button type="button" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#exampleModal" data-sectorID="' + result.data[i].SectorID + '" data-sectorname="' + result.data[i].SectorName + '"data-pax="' + result.data[i].pax + '" data-ticketferry="' + result.data[i].TicketFerryID + '" data-voucherid="' + voucherid + '" data-whatever="@getbootstrap">Update Payment</button></td>';
                        }
                        else{
                            str4+='<td><strong>NL - PB</strong></td>';
                            str4+='<input type="hidden" id="nlpb" value="nlpb">';
                             str4+='<td>'+amountnlpb+'</td>';
                             str4+='<input type="hidden" id="nlpbamount"  value="'+amountnlpb+'">';
                             str4+='<td> <button type="button" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#exampleModal" data-sectorID="' + result.data[i].SectorID + '" data-sectorname="' + result.data[i].SectorName + '"data-pax="' + result.data[i].pax + '" data-ticketferry="' + result.data[i].TicketFerryID + '" data-voucherid="' + voucherid + '" data-whatever="@getbootstrap">Update Payment</button></td>';
                        
                        }
                    }
                    if(result.data[i].SectorName=="PB - NL"){
                        if(result.data[i].Amount!=""){
                                   amountpbnl+= parseInt(result.data[i].Amount);
                                        }
                        if(str5!=""){
                             str5="";
                             str5+='<td><strong>PB - NL</strong></td>';
                             str5+='<input type="hidden" id="pbnl" value="pbnl">';
                             str5+='<td>'+amountpbnl+'</td>';
                             str5+='<input type="hidden" id="pbnlamount"  value="'+amountpbnl+'">';
                             str5+='<td> <button type="button" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#exampleModal" data-sectorID="' + result.data[i].SectorID + '" data-sectorname="' + result.data[i].SectorName + '"data-pax="' + result.data[i].pax + '" data-ticketferry="' + result.data[i].TicketFerryID + '" data-voucherid="' + voucherid + '" data-whatever="@getbootstrap">Update Payment</button></td>';
                             
                        }
                        else
                            {
                                
                             str5+='<td><strong>PB - NL</strong></td>';
                             str5+='<input type="hidden" id="pbnl" value="">';
                             str5+='<td>'+amountpbnl+'</td>';
                             str5+='<input type="hidden" id="pbnlamount"  value="'+amountpbnl+'">';
                             str5+='<td> <button type="button" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#exampleModal" data-sectorID="' + result.data[i].SectorID + '" data-sectorname="' + result.data[i].SectorName + '"data-pax="' + result.data[i].pax + '" data-ticketferry="' + result.data[i].TicketFerryID + '" data-voucherid="' + voucherid + '" data-whatever="@getbootstrap">Update Payment</button></td>';
                            }
                    }
                    if(result.data[i].SectorName=="NL - HL"){
                       if(result.data[i].Amount!=""){
                                   amountnlhl+= parseInt(result.data[i].Amount);
                                        }
                       if(str6!=""){
                            str6="";
                             str6+='<td><strong>NL - HL</strong></td>';
                             str6+='<input type="hidden" id="nlhlFerry" class="hotelname" value="">';
                             str6+='<td>'+amountnlhl+'</td>';
                             str6+='<td> <button type="button" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#exampleModal" data-sectorID="' + result.data[i].SectorID + '" data-sectorname="' + result.data[i].SectorName + '"data-pax="' + result.data[i].pax + '" data-ticketferry="' + result.data[i].TicketFerryID + '" data-voucherid="' + voucherid + '" data-whatever="@getbootstrap">Update Payment</button></td>';
                            
                             
                        }
                        else
                            {
                              
                             str6+='<td><strong>NL - HL</strong></td>';
                             str6+='<input type="hidden" id="nlhl" class="hotelname" value="NL-HL">';
                             str6+='<td>'+amountnlhl+'</td>';
                             str6+='<input type="hidden" id="nlhlamount" class="hotelname" value="'+amountnlhl+'">';
                             str6+='<td> <button type="button" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#exampleModal" data-sectorID="' + result.data[i].SectorID + '" data-sectorname="' + result.data[i].SectorName + '"data-pax="' + result.data[i].pax + '" data-ticketferry="' + result.data[i].TicketFerryID + '" data-voucherid="' + voucherid + '" data-whatever="@getbootstrap">Update Payment</button></td>';
                            }
                    }
                }
                var counter=0;
                if(str1!="")
                    {
                        counter++;
                    }
                if(str2!="")
                    {
                        counter++;
                    }
                    if(str3!="")
                    {
                        if(counter==2){
                          var  concat='</tr><tr>'+str3;
                          str3=concat;
                          counter=1;
                        }
                        else{
                            counter++;
                        }
                        
                        
                    }
                    if(str4!="")
                    {
                        
                        if(counter==2){
                          var  concat='</tr><tr>'+str4;
                          str4=concat;
                          counter=1;
                        }
                        else{
                            counter++;
                        }
                        
                    }
                    
                    if(str5!="")
                    {
                        
                        if(counter==2){
                          var  concat='</tr><tr>'+str5;
                          str5=concat;
                          counter=1;
                        }
                        else{
                            counter++;
                        }
                        
                    }
                    
                    if(str6!="")
                    {
                        
                        if(counter==2){
                          var  concat='</tr><tr>'+str6;
                          str6=concat;
                          counter=1;
                        }
                        else{
                            counter++;
                        }
                        
                    }
                    
                abc='<tr>'+str1+str2+str3+str4+str5+str6+'</tr>';
                $(".ferryAccountTable").html(abc);
                
            }
        });
        
        var cutOffTerms = [];
    var hotelNameArray = [];
    $.ajax({
                url: "php/hotels.php",
                type: 'POST',
                data: {
                    status:"accounthotelsdata"
                },
                dataType: "JSON",
                success: function(result) {
                    console.log(result);
                   
                    for (var i = 0; i < result.data.length; i++) {
                   
                        cutOffTerms[result.data[i]['HotelID']] = result.data[i]['PaymentTerms'];
                        hotelNameArray[result.data[i]['HotelID']] = result.data[i]['HotelName'];
                    }
                   
                }
            });
            var result_table = [];
            
          $(document).on("click", ".downloadExcel", function() {
     
     result_table=[["Unique number", "Agency Name", "Name of Customer", "No of Guest","Infant < 2 years","Guest Names","Amount Invoiced","Utgst","Nett Value"],[]
                    ];
                
                result_table[1].push($("#cvnumber").val());
                result_table[1].push($("#agency").val());
                result_table[1].push($("#guestname").val());
                result_table[1].push($("#guestcout").val());
                result_table[1].push($("#infant2").val());
                result_table[1].push($("#guestnameaccounts").val());
                console.log("guest name"+$("#guestnameaccounts").val());
                result_table[1].push($("#amountinvoice").val());
                result_table[1].push($("#utgst").val());
                result_table[1].push($("#nettvalue").val());
        $(".paymentRow").each(function(){
            var tds=$(this).find($(".tds")).val();
            result_table[0].push("tds");
            result_table[1].push(tds);
            var amount=$(this).find($(".AmountPaid")).val();
            result_table[1].push(amount);
            result_table[0].push("Payment");
            var date=$(this).find($(".dateofpayment")).val();
            result_table[0].push("date of payment");
            result_table[1].push(date);
            var paytotal=$(this).find($(".payTotal")).val();
            result_table[0].push("total payment");
            result_table[1].push(paytotal);
        });
        result_table[0].push("descripency");
        result_table[1].push($("#descrip").val());
        result_table[0].push("Status of Payment");
        result_table[1].push($("#paymentstatus").val());
        
        $(".portblair").each(function(){
            var tds=$(this).find($(".pbhotel")).val();
            result_table[0].push("PB hotel");
            result_table[1].push(tds);
            var amount=$(this).find($(".pbamount")).val();
            result_table[1].push(amount);
            result_table[0].push("Amount");
            
        });
        
        $(".havhotel").each(function(){
            var tds=$(this).find($(".hotelname")).val();
            result_table[0].push("HL hotel");
            result_table[1].push(tds);
            var amount=$(this).find($(".havamount")).val();
            result_table[1].push(amount);
            result_table[0].push("Amount");
            
        });
        $(".neilhotel").each(function(){
            var tds=$(this).find($(".hotelname")).val();
            result_table[0].push("NL hotel");
            result_table[1].push(tds);
            var amount=$(this).find($(".hotelamount")).val();
            result_table[1].push(amount);
            result_table[0].push("Amount");
            
        });
        $(".dighotel").each(function(){
            var tds=$(this).find($(".hotelname")).val();
            result_table[0].push("Diglipur");
            result_table[1].push(tds);
            var amount=$(this).find($(".hotelamount")).val();
            result_table[1].push(amount);
            result_table[0].push("Amount");
            
        });
        console.log("pbnl value...");
        console.log($("#pbnl").val());
        if($("#pbhl").val()!=undefined  ){
            var am=$("#pbhlamount").val();
            result_table[1].push(am);
            result_table[0].push("Ferrytickets PB-HL");
        }
        if($("#hlnl").val()!=undefined){
            var am=$("#hlnlamount").val();
            result_table[1].push(am);
            result_table[0].push("Ferrytickets HL-NL");
        }
        if($("#hlpb").val()!=undefined){
            var am=$("#hlpbamount").val();
            result_table[1].push(am);
            result_table[0].push("Ferrytickets HL-PB");
            
        }
        if($("#nlpb").val()!=undefined){
            var am=$("#nlpbamount").val();
            result_table[1].push(am);
            result_table[0].push("Ferrytickets NL-PB");
        }
        if($("#pbnl").val()!=undefined ){
            var am=$("#pbnlamount").val();
            result_table[1].push(am);
            result_table[0].push("Ferrytickets PB-NL");
        }
        
        if($("#nlhl").val()!=undefined){
            var am=$("#nlhlamount").val();
            result_table[1].push(am);
            result_table[0].push("Ferrytickets NL-HL");
        }
        result_table[1].push($("#pettyCashPB").val());
            result_table[0].push("Petty Cash at PB");
        
        result_table[1].push($("#pettyCashHL").val());
            result_table[0].push("Petty Cash at HL");
        result_table[1].push($("#pettycashneil").val());
            result_table[0].push("Petty Cash at Neil");
        result_table[1].push($("#amountForSomething").val());
            result_table[0].push("Amount For Something Different");
            result_table[1].push($("#carsPB").val());
            result_table[0].push("Cars at PB");
            result_table[1].push($("#carsHL").val());
            result_table[0].push("Cars at HL");
            result_table[1].push($("#carsNeil").val());
            result_table[0].push("Cars at Neil");
            result_table[1].push($("#alicoach").val());
            result_table[0].push("Ali AC Couch");
            result_table[1].push($("#djsound").val());
            result_table[0].push("Dj/Sound System");
            result_table[1].push($("#photos").val());
            result_table[0].push("Photos");
            result_table[1].push($("#misc").val());
            result_table[0].push("Miscellaneous");
            result_table[1].push($("#hidtotalexpenses").val());
            result_table[0].push("Total Expenses");    
            result_table[1].push($("#hidprofit").val());
            result_table[0].push("Profit");    
       
        
        console.log(result_table);
        export_Excel();
 
     
     
          });
        function export_Excel() {
    var lineArray = [];
    result_table.forEach(function (infoArray, index) {
        var line = infoArray.join(",");
        lineArray.push(index == 0 ? "data:application/vnd.ms-excel;charset=utf-8," + line : line);
    });
    var csvContent = lineArray.join("\n");
    window.open(encodeURI(csvContent));
}



          $(document).on("click", ".openMakruzzModal", function() {
        var voucherid = $(this).attr("data-voucherid");
        var sectorid = $(this).attr("data-sectorID");
        var sectorname = $(this).attr("data-sectorname");
        var ticketferry = $(this).attr("data-ticketferry");
        $(".macruzzticketferryID").val(ticketferry);
        $(".modaltitlelabel").html(sectorname);
        
        //============ Get Previous Details of This Ticket Ferry ============//
        var previousFerryData=[];
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "get_report_ferry",
                ticketFerryID: ticketferry
            },
            async: false,
            dataType: "JSON",
            success: function(result) {
//                console.log("get_report_ferry");
//                console.log(result);
                previousFerryData = result.data;
            }
        });
        var previousFerryDataCount = previousFerryData.length;
                
        //=================== Get Guest Info and display in Modal =======//
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "get_guest_info",
                voucher_id: voucherid
            },
            dataType: "JSON",
            success: function(result) {
//                console.log("get_guest_info");
//                console.log(result);
                var str = '';
                for (var i = 0; i < result.data.length; i++){
                    str += '<div class="row makruzzModalBodyRow eachFerryReport'+i+'">';
                        if(previousFerryDataCount >= i+1){
                             str += '<input type="hidden" class="ferryReportID" value="'+previousFerryData[i].FerryReportID+'">';
                        }
                        else{
                             str += '<input type="hidden" class="ferryReportID" value="">';
                        }
                            str += '<div class="col-md-12">';
                                str += '<label for="firstName1" class="personInfo"><strong>Name: '+result.data[i].GuestName+'  | Age: '+result.data[i].Age+'</strong></label>';
                            str += '</div>';
                            str += '<div class="col-md-3">';
                                str += '<div class="form-group"> <label for="guestage">FerryName</label>';
                                    str += '<select class="form-control custom-select makruzFerrynameinModal" >';
                                    str += '</select>';
                                str += '</div>';
                            str += '</div>';
                            str += '<div class="col-md-3">';
                                str += '<div class="form-group"> <label for="firstName1">Amount</label>';
                                if(previousFerryDataCount >= i+1){
                                    str += '<input class="form-control makruzzAmount"  type="number" value="'+previousFerryData[i].Amount+'">';
                                }
                                else{
                                    str += '<input class="form-control makruzzAmount"  type="number" value="">';
                                }
                                str += '</div>';
                            str += '</div>';
                            str += '<div class="col-md-3">';
                                str += '<div class="form-group"> <label for="firstName1">PNR</label>';
                                if(previousFerryDataCount >= i+1){
                                    str += '<input class="form-control makruzzPNR"  type="text" value="'+previousFerryData[i].PNR+'">';
                                }
                                else{
                                    str += '<input class="form-control makruzzPNR"  type="text" value="">';
                                }
                                str += '</div>';
                            str += '</div>';
                            str += '<div class="col-md-3">';
                                str += '<div class="form-group"> <label for="firstName1">Status</label>';
                                    str += '<select class="form-control custom-select makruzzStatus">';
                                        str += '<option value="Pending">Pending</option>';
                                        str += '<option value="Confirmed">Confirmed</option>';
                                    str += '</select>';
                               str += ' </div>';
                            str += '</div>';

                        str += '</div>';
                }
                $(".makruzzBodySpan").html(str);
                
                $.ajax({
                    url: "php/hotels.php",
                    type: 'POST',
                    data: {
                        status: "sectortiming",
                        sector_id: sectorid
                    },
                    dataType: "JSON",
                    success: function(result1) {
//                        console.log("sectortiming");
//                        console.log(result1);
                        var makruzzname = result1.data;
                        var makruzzdrop = "";
                        for (var k = 0; k < makruzzname.length; k++) {
                            makruzzdrop += '<option value="' + makruzzname[k].SectorTimingsID + '">' + makruzzname[k].Timings + '   </option>';
                        }
                        $(".makruzFerrynameinModal").html(makruzzdrop);
                        
                        if(previousFerryDataCount >= 0){
                            for (var i = 0; i < result.data.length; i++){
                                if(previousFerryDataCount >= i+1){
                                    $(".eachFerryReport"+i+" .makruzFerrynameinModal").val(previousFerryData[i].FerryName);
                                    $(".eachFerryReport"+i+" .makruzzStatus").val(previousFerryData[i].Status);
                                }
                            }
                        }
                        
                    }
                });
                
            }
        });

    });
                                        
          $(document).on("click", ".addmodalForm", function() {
        console.log("click button");
             addNewDiv("form62Row");
        
        
    });
     function addNewDiv(ClassName) {
         console.log("new div");
        var present_index = parseInt($("." + ClassName + ":last").attr("data-id"));
        var section32 = $("." + ClassName).parent();
        section32.append($("." + ClassName + ":first").wrap('<p/>').parent().html());
        $("." + ClassName + ":first").unwrap();
        $("." + ClassName + ":last").attr("data-id", present_index + 1);
        $("." + ClassName + ":last").find("." + ClassName + "Delete").attr("data-id", present_index + 1);
        $("." + ClassName + ":last").find("." + ClassName + "Delete").attr("style", '');
        $("." + ClassName + ":last").find("." + ClassName + "DeleteButton").attr("data-id", present_index + 1);
        $("." + ClassName + ":last").find("input").each(function() {
            $(this).val('');
        });

    }
    
        $(document).on("click", ".updatePaymentModal", function() {
        var voucherid = $(this).attr("data-voucherid");
        var paymentStr=""
        console.log(voucherid);
       // $(".paymentID").val(ticketferry);
       // $(".modaltitlelabel").html(sectorname);
        
        //============ Get Previous Details of This Ticket Ferry ============//
        //var previousFerryData=[];
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "get_payment_status",
                voucherid: voucherid
            },
            async: false,
            dataType: "JSON",
            success: function(result) {
            console.log(result);
               paymentStr+=' <div class="col-md-12"> <button class="btn btn-warning btn-circle addmodalForm" type="button" id="addmodalForm" style="float: right"><i class="fa fa-plus"></i></button></div>';
               paymentStr+='     <span class="form62Span">';
               if(result.data.length>0)
                   {
                       console.log("inside if");
                        for (var i = 0; i < result.data.length;i++) {
                                           console.log("inside for");
                           paymentStr+='   <span class="form62Row" data-id="'+i+'">';
                                             paymentStr+=' <div class="row">';
                                                   paymentStr+=' <div class="col-md-12">';
                                                       paymentStr+=' <h4>Payment Status</h4>';
                                                   paymentStr+=' </div>';
                                               paymentStr+=' </div>';
                                               paymentStr+=' <div class="row">';
                                                  paymentStr+='  <div class="col-md-3">';
                                                     paymentStr+='   <div class="form-group"> '
                                                          paymentStr+='  <label for="firstName1">Date of Payment</label>';
                                                          paymentStr+='<input type="hidden" class="paymentstatusid" value="'+result.data[i].PaymentStatusID+'">';
                                                          paymentStr+='  <div class="input-group"> <input class="form-control mydatepicker DateOfPaymentForm62" placeholder="mm/dd/yyyy" type="text" value="'+result.data[i].DateOfPayment+'"> ';
                                                               paymentStr+=' <span class="input-group-addon"><i class="icon-calender"></i></span> ';
                                                            paymentStr+='</div>';
                                                       paymentStr+=' </div>';
                                                  paymentStr+='  </div>';
                                                   paymentStr+=' <div class="col-md-3">';
                                                        paymentStr+='<div class="form-group"> <label for="cut for payment">Confirmation';
                                                               paymentStr+=' Via</label>';
                                                           paymentStr+=' <div class="input-group">';
                                                           var confirmation=result.data[i].ConfirmationVia;
                                                           $(".ConfirmationViaForm62").val(confirmation);
                                                               paymentStr+=' <select class="form-control custom-select ConfirmationViaForm62 " >';
                                                                  paymentStr+='   <option value="Email" ';
                                                                    if(result.data[i].ConfirmationVia=="Email"){
                                                                        paymentStr+='selected';
                                                                    }      
                                                                    paymentStr+= '>Email</option>';
                                                               paymentStr+=' <option value="Telephone"';
                                                                    if(result.data[i].ConfirmationVia=="Telephone"){
                                                                        paymentStr+='selected';
                                                                    }         
                                
                                                                    paymentStr+= '>Telephone</option>';
                                                               paymentStr+=' <option value="Benazir" ';
                                                                       if(result.data[i].ConfirmationVia=="Benazir"){
                                                                        paymentStr+='selected';
                                                                    }      
                                                                           paymentStr+=' >Benazir</option>';
                                                               paymentStr+=' <option value="Bank Statement"';
                                                                  if(result.data[i].ConfirmationVia=="Bank Statement"){
                                                                        paymentStr+='selected';
                                                                    }
                                                                       paymentStr+= '>Bank Statement</option>';
                                                               paymentStr+=' </select>';
                                                           paymentStr+=' </div>';
                                                       paymentStr+=' </div>';
                                                    paymentStr+='</div>';
                                                    paymentStr+='<div class="col-md-3">';
                                                      paymentStr+='  <div class="form-group"> <label>Payment Amount</label>';
                                                           paymentStr+=' <input class="form-control PaymentAmountForm62"  type="text" value="'+result.data[i].PaymentAmount+'">';
                                                      paymentStr+='  </div>';
                                                   paymentStr+=' </div>';
                                                   paymentStr+=' <div class="col-md-3">';
                                                        paymentStr+='<div class="form-group"> <label>TDS Cut</label>';
                                                           paymentStr+=' <input class="form-control TDSCutForm62" type="text" value="'+result.data[i].TDSCut+'">';
                                                        paymentStr+='</div>';
                                                    paymentStr+='</div>'
                                                paymentStr+='</div>';

                                                paymentStr+='<div class="row form62RowDelete"';
                                                  if(i == 0){
                                                     paymentStr+= 'style = "display: none;"';
                                                    paymentStr+= ' data-id="'+i+'">';
                                                  }
                                                  else{
                                                      paymentStr+= ' data-id="'+i+'">';
                                                  }
                                                   paymentStr+=' <div class="col-md-12"> ';
                                                     paymentStr+='   <button class="btn btn-danger btn-circle form62RowDeleteButton" type="button" style="float: right"  data-id="'+i+' ">';
                                                     paymentStr+='       <i class="fa fa-trash"></i>';
                                                       paymentStr+=' </button>';
                                                  paymentStr+='  </div>';
                                                paymentStr+='</div>';
                                               paymentStr+=' <hr class="m-t-40 m-b-40">';
                                            paymentStr+='</span> ';                                       
                                          
                                        }
                                    }
                        else{
                                       
                                      paymentStr+='  <span class="form62Row" data-id="0">';
                                      paymentStr+='      <div class="row">';
                                              paymentStr+='  <div class="col-md-12">';
                                                paymentStr+='    <h4>Payment Status</h4>';
                                               paymentStr+=' </div>';

                                            paymentStr+='</div>';
                                           paymentStr+=' <div class="row">';

                                              paymentStr+='  <div class="col-md-3">';
                                                    paymentStr+='<div class="form-group"> <label for="firstName1">Date';
                                                          paymentStr+='  of Payment</label>';
                                                     paymentStr+='   <div class="input-group"> <input class="form-control mydatepicker DateOfPaymentForm62" placeholder="mm/dd/yyyy" type="text"> <span class="input-group-addon"><i class="icon-calender"></i></span> </div>';
                                                  paymentStr+='  </div>';
                                               paymentStr+=' </div>';
                                               paymentStr+=' <div class="col-md-3">';
                                                  paymentStr+='  <div class="form-group"> <label for="cut for payment">Confirmation';
                                                       paymentStr+='     Via</label>';
                                                       paymentStr+=' <div class="input-group">';
                                                          paymentStr+='  <select class="form-control custom-select ConfirmationViaForm62">';
                                                             paymentStr+='   <option value="Email">Email</option>';
                                                               paymentStr+=' <option value="Telephone">Telephone</option>';
                                                               paymentStr+=' <option value="Benazir">Benazir</option>';
                                                               paymentStr+=' <option value="Bank Statement">Bank Statement</option>';
                                                          paymentStr+='  </select>';
                                                       paymentStr+=' </div>';
                                                   paymentStr+=' </div>';
                                               paymentStr+=' </div>';
                                                paymentStr+='<div class="col-md-3">';
                                                  paymentStr+='  <div class="form-group"> <label>Payment Amount</label>';
                                                     paymentStr+='   <input class="form-control PaymentAmountForm62"  type="text">';
                                                   paymentStr+=' </div>';
                                               paymentStr+=' </div>';
                                               paymentStr+=' <div class="col-md-3">';
                                                   paymentStr+=' <div class="form-group"> <label>TDS Cut</label>';
                                                      paymentStr+='  <input class="form-control TDSCutForm62" type="text">';
                                                   paymentStr+=' </div>';
                                               paymentStr+=' </div>';
                                           paymentStr+=' </div>';

                                            paymentStr+='<div class="row form62RowDelete" style="display: none;" data-id="0">';
                                               paymentStr+=' <div class="col-md-12"> ';
                                                    paymentStr+='<button class="btn btn-danger btn-circle form62RowDeleteButton" type="button" style="float: right"  data-id="0">';
                                                    paymentStr+='    <i class="fa fa-trash"></i>';
                                                    paymentStr+='</button>';
                                               paymentStr+=' </div>';
                                            paymentStr+='</div>';
                                            paymentStr+='<hr class="m-t-40 m-b-40">';
                                        paymentStr+='</span>';
                                        
                                    }
                                    
                               paymentStr+=' </span>';
                
                
                
                
                
                
            }
        });
        $(".paymentModalBody").html(paymentStr);
                
        //=================== Get Guest Info and display in Modal =======//
        

    });
    var paymentdataarray=[];
    var packageam=0;
    var discrepancy=0;
    var pay=0;
    
    $("#paymentSubmitButton").click(function(){
         var paymentdataarray=[];
        $(".form62Row").each(function(){
            var paymentid= $(this).find(".paymentstatusid").val();
            
           var date= dateToTimestamp($(this).find(".DateOfPaymentForm62").val());
           var confirm= $(this).find(".ConfirmationViaForm62").val();
           var paymentamounts= $(this).find(".PaymentAmountForm62").val();
           var tds= $(this).find(".TDSCutForm62").val();
           
           paymentdataarray.push({paymentid:paymentid,date:date,confirm:confirm,payment:paymentamounts,tds:tds});
           pay+=parseInt(paymentamounts)+parseInt(tds);
        });
        console.log(paymentdataarray);
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "updatePaymentStatusModal",                
                payment: JSON.stringify(paymentdataarray),
                voucherid:voucherid
            },
            dataType: "JSON",
            success: function(result12) {
                console.log(result12);
     }
       });
        packageam=parseInt(packAmount);
        console.log("gstt"+gst);
        if(gst=="No")
        
            {
               packageam+=(packageam*5/100);
            }
            var valueToceil=0;
       valueToceil=pay-packageam;
       discrepancy=Math.ceil(valueToceil);
       $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "updatedisc",                
                disc:discrepancy,
                voucherid:voucherid
            },
            dataType: "JSON",
            success: function(result12) {
                console.log(result12);
     }
       });
          $(".closemakruzz").trigger("click");
          location.reload();
        console.log("click");
    });
     $(document).on("click", "#makruzSubmitButton", function() {
        var fieldData = [];
        var ticketFerryIdinModal = $(".macruzzticketferryID").val();
        console.log("ticketferry");
        console.log(ticketFerryIdinModal);
        var reportstatus;
        $(".makruzzModalBodyRow").each(function(){
            var each_sector_timing_id = $(this).find(".makruzFerrynameinModal").val();
            var each_amount = $(this).find(".makruzzAmount").val();
            
            var each_pnr = $(this).find(".makruzzPNR").val();
            var each_status = $(this).find(".makruzzStatus").val();
            var each_report_ferry_id = $(this).find(".ferryReportID").val();
            fieldData.push({ferryid: each_report_ferry_id, timing: each_sector_timing_id, pnr: each_pnr, amount: each_amount, status: each_status});
        });
        var status =0;
        $(".makruzzModalBodyRow").each(function(){
            if($(this).find(".makruzzStatus").val() !="Confirmed") {
                status = 1;
                return false;
            }
            
        });
      console.log("status..."+status);
        if(status==0)
            {
              console.log("status if");
              $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "updateTicketFerryInfo",                
                ticketFerryID: ticketFerryIdinModal
            },
           // dataType: "JSON",
            success: function(result12) {
                console.log(result12);
                console.log("Update");
                

            }
        });
         
     }
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "makruzzmodaldata",
                fielddata: JSON.stringify(fieldData),
                ticketFerryID: ticketFerryIdinModal
            },
            //dataType: "JSON",
            success: function(result11) {
                console.log(result11);
                swal({
                    title: "Successfully",
                    text: "Updated the data",
                    timer: 1500,
                    showConfirmButton: false
                });
                $("#closeReportFerry").trigger("click");
                //$("#makruzzGenerate").trigger("click");

            }
        });
        setTimeout(function(){
            location.reload();
        },400);
        
    });
    
    
    $('body').on("click", ".form62RowDeleteButton", function() {
        console.log("clicked");
        var classSelected = $(this).attr("class");
        var classSelectedArray = classSelected.split(" ");
        var formName = "";
        for (var i = 0; i < classSelectedArray.length; i++) {
            if (classSelectedArray[i].indexOf("form") > -1) {
                formName = classSelectedArray[i];
                break;
            }
        }
        console.log(formName);
        formName = (formName.split("DeleteButton"))[0];
        console.log(formName);
        $(this).closest("." + formName).remove();
    });
    
    function dateToTimestamp(dateInput) {
        console.log("dateToTimestamp");
        console.log(dateInput);

        if (dateInput == '') {
            return '';
        }
        else {
            var dateFormatTotime = new Date(dateInput);
            var increasedDate = new Date(dateFormatTotime.getTime() + 86400000);
            console.log(increasedDate);
            var dateToIso = increasedDate.toISOString().slice(0, 19).replace('T', ' ');
            console.log(dateToIso);
            return dateToIso;
        }

    }
     $("#roomPaymentForm6").click(function() {
        console.log(cutOffTerms);
        console.log(hotelNameArray);
//        console.log(amountForm6);
        roomPaymentStatus();
    });
     var ifRecheckin = 0;
    function roomPaymentStatus() {
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            dataType: "JSON",
            data: {
                status: "accountshotelblocking",
                voucher:voucherid
            },
            success: function(result) {
                console.log(result);
                var str = '';

                for (var i = 0; i < result.data.length; i++) {


                    if (i == 0) {
                        if (hotelNameArray[result.data[0]['HotelSelected']] == hotelNameArray[result.data[1]['HotelSelected']] && hotelNameArray[result.data[0]['RoomSelected']] == hotelNameArray[result.data[1]['RoomSelected']]) {
                            ifRecheckin = 1;
                        }
                    }
                    console.log("room category");
                    console.log(result);
                    str += '<tr class="form61ModalRow"><input type="hidden" class="hotelSelectedIdModal6" value="' + result.data[i]['HotelBlockingID'] + '">';
                    str += '<td> ' + hotelNameArray[result.data[i]['HotelSelected']] + ' </td>';
                    console.log("cutofftermsss"+cutOffTerms[result.data[i]['HotelSelected']]);
                    $.trim(cutOffTerms[result.data[i]['HotelSelected']]) == "Advance" ? str += "<td>Advance</td>" : str += "<td>Credit</td>";
                    if (ifRecheckin == 1 && i == 0) {
                        str += '<td > <span class="AmountForm41" style="display: none;">' + result.data[0]['Amount'] + '</span> ' + (parseInt(result.data[0]['Amount']) + parseInt(result.data[1]['Amount'])) + '</td>';
                    }
                    else {
                        str += '<td class="AmountForm41"> ' + result.data[i]['Amount'] + ' </td>';
                    }



                    str += '<td> <input type = "number" class = "AmountPayableForm6Modal" value="' + result.data[i]['AmountPayable'] + '"> </td>';
                    $.trim(cutOffTerms[result.data[i]['HotelSelected']]) != "Advance" ? str += '<td><input class = "form-control mydatepicker cutOffDateForm6Modal" placeholder = "mm/dd/yyyy" type = "text" value="' + timestampToDate(result.data[i]['CutOffDate']) + '"></td>' : str += '<td>N.A</td>';
                    str += '<td>';
                    str += '<select class = "form-control custom-select paymentStatusForm6Modal" >';
                    result.data[i]['Status'] == "Pending" ? str += '<option  selected >Pending</option>' : str += '<option>Pending</option>';
                    result.data[i]['Status'] == "Paid" ? str += '<option selected>Paid</option>' : str += '<option>Paid</option>';
                    str += '</select>';
                    str += '</td>';
                    str += '</tr>';
                }
                console.log(str);
                $("#form61ModalTable").html('');
                $("#form61ModalTable").html(str);
                if (ifRecheckin == 1) {
                    $(".form61ModalRow").eq(1).hide();
                }
                console.log("Result");
                console.log(result);
                return result;
            }
        });
    }
    var AmountPayableForm6Modal = "";
    var paymentStatusForm6Modal = "";
    var cutOffDateForm6Modal = "";
    var hotelSelectedIdModal6 = "";
    var AmountForm41 = '';
    $("#submitModalForm6").click(function() {
        AmountPayableForm6Modal = "";
        paymentStatusForm6Modal = "";
        cutOffDateForm6Modal = "";
        hotelSelectedIdModal6 = "";
        $(this).prop("disabled", "true");
        $("#form61ModalTable").find('tr').each(function() {
            hotelSelectedIdModal6 += $(this).find(".hotelSelectedIdModal6").val() != "" ? $(this).find(".hotelSelectedIdModal6").val() + "###" : "###";
            AmountForm41 += $.trim($(this).find(".AmountForm41").text()) != "" ? $.trim($(this).find(".AmountForm41").text()) + "###" : "###";

            AmountPayableForm6Modal += $(this).find(".AmountPayableForm6Modal").val() != "" ? $(this).find(".AmountPayableForm6Modal").val() + "###" : "###";
            cutOffDateForm6Modal += $(this).find(".cutOffDateForm6Modal").val() ? dateToTimestamp($(this).find(".cutOffDateForm6Modal").val()) + "###" : "###";
            paymentStatusForm6Modal += $(this).find(".paymentStatusForm6Modal").val() != "" ? $(this).find(".paymentStatusForm6Modal").val() + "###" : "###";
        });
        updateHotelRoomBlocking();
        $("#submitModalForm6").removeAttr("disabled");
        $("#closeForm6Modal").trigger("click");
    });
     function updateHotelRoomBlocking() {
        console.log(AmountPayableForm6Modal);
        console.log(paymentStatusForm6Modal);
        console.log(cutOffDateForm6Modal);
        $("#cancelHotelPaymentStatusModal").trigger("click");
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "updateRoomBlocking",
                amountPayable: AmountPayableForm6Modal,
                paymentStatus: paymentStatusForm6Modal,
                cutOfDate: cutOffDateForm6Modal,
                hotelSelectedId: hotelSelectedIdModal6,
                Amount41: AmountForm41
            },
            success: function(result) {
                console.log(result);

                swal({
                    title: "Successfully",
                    text: "Updated the data",
                    timer: 1500,
                    showConfirmButton: false
                });
                return result;
            }
        });
    }
    function timestampToDate(dateIn) {
        console.log("date in is");
        console.log(dateIn);

        if (dateIn != null && dateIn != '' && dateIn != "0000-00-00 00:00:00") {
            var monthIs = new Date(dateIn).getMonth() + 1;
            monthIs = parseInt(monthIs) < 10 ? ('0' + monthIs) : ('' + monthIs);
            var dateIs = (new Date(dateIn)).getDate();
            dateIs = parseInt(dateIs) < 10 ? ('0' + dateIs) : ('' + dateIs);
            return (monthIs + "/" + dateIs + "/" + (new Date(dateIn)).getFullYear());
        }
        else {
            return '';
        }
    }
    total();
    
    $("#pettyCashPB , #pettyCashHL , #pettyCashNeil, #amountForSomething, #carsPB, #carsHL, #carsNeil, #alicoach, #djsound , #photos , #misc").keyup(function() {
        console.log("keyup");
        cashTotal();
        vehicleTotal();
        otherTotal();
        total();
    });
    function cashTotal(){
        var cashtotal=0;
        var cashpb=($("#pettyCashPB").val()!=""?parseInt($("#pettyCashPB").val()):0);
        //console.log("pb"+cashpb);
        var cashhl=($("#pettyCashHL").val()!=""?parseInt($("#pettyCashHL").val()):0);
        //console.log("hl"+cashhl);
        var cashneil=($("#pettyCashNeil").val()!=""?parseInt($("#pettyCashNeil").val()):0);
        //console.log("neil"+cashneil);
        var cashsome=($("#amountForSomething").val()!=""?parseInt($("#amountForSomething").val()):0);
         cashtotal=cashpb+cashhl+cashneil+cashsome;
        //console.log("total"+cashtotal);
        $("#cashExpensesTotal").html(cashtotal);
    }
    
    function vehicleTotal(){
        var carspb=($("#carsPB").val()!=""?parseInt($("#carsPB").val()):0);
        console.log(carspb);
        var carshl=($("#carsHL").val()!=""?parseInt($("#carsHL").val()):0);
        console.log(carshl);
        var carsneil=($("#carsNeil").val()!=""?parseInt($("#carsNeil").val()):0);
        console.log(carsneil);
        var alicoach=($("#alicoach").val()!=""?parseInt($("#alicoach").val()):0);
        console.log(alicoach);
        var vehicletotal=carspb+carshl+carsneil+alicoach;
        console.log(vehicletotal);
        $("#vehicleExpensesTotal").html(vehicletotal);
    }
    function otherTotal(){
        var dj=($("#djsound").val()!=""?parseInt($("#djsound").val()):0);
        var photo=($("#photos").val()!=""?parseInt($("#photos").val()):0);
        var misc=($("#misc").val()!=""?parseInt($("#misc").val()):0);
        var othertotal=dj+photo+misc;
        $("#otherExpensesTotal").html(othertotal);
    }
    function total(){
        var hotelExpensesTotal = parseInt($("#hotelExpenses").html());
    console.log(hotelExpensesTotal);
    var ferryticketExpenses = parseInt($("#ferryTicketExpenses").html());
    console.log("ferryticketExpenses"+ferryticketExpenses);
    var cashExpensestotal = parseInt($("#cashExpensesTotal").html());
    var vehicleExpensesTotal = parseInt($("#vehicleExpensesTotal").html());
    var otherExpensesTotal = parseInt($("#otherExpensesTotal").html());
    var totalExpenses = hotelExpensesTotal+ferryticketExpenses+cashExpensestotal+vehicleExpensesTotal+otherExpensesTotal;
    var profit = parseInt($("#netinvoice").html())-totalExpenses;
    console.log("profit"+profit);
    $("#totalExpenses").html(totalExpenses);
    $("#hidtotalexpenses").val(totalExpenses);
    $("#profit").html(profit);
    $("#hidprofit").val(profit);
    }
    
    
    
    
});
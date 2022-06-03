$(document).ready(function() {

//var ferrydatareportall = ferryDatareport($conn);
    $("#reportType").on("change", function() {
        $(".checkReportType").each(function() {
            $(this).hide();
        });
        $("." + $("#reportType").val()).each(function() {
            $(this).show();
        });
    });
    $("#dateSelectHotelReport").hide();


    $("#hotelNameReport").on("change", function()
    {
        if ($("#hotelNameReport").val() == "")
        {
            $("#paymentReport").prop("disabled", false);
        }
        else
        {
            $("#paymentReport").prop("disabled", true);
        }
    });

    $("#selectType").on("change", function()
    {
        if ($("#selectType").val() == "")
        {
            $("#dateSelectHotelReport").hide();
        }
        else
        {
            $("#dateSelectHotelReport").show();
        }
    });
    $("#startHotelPayment , #endHotelPayment , #selectType").on("change ,keyup", function()
    {
        if ($("#endHotelPayment").val() == "" && $("#selectType").val() != "")
        {
            $("#generateReport").prop("disabled", true);
        }
        else
        {
            $("#generateReport").prop("disabled", false);
        }
    });

    $("#startSail, #endSail").on("change ,keyup", function()
    {
        if ($("#endSail").val() == "" && $("#startSail").val() != "")
        {
            $("#makruzzGenerate").prop("disabled", true);
        }
        else
        {
            $("#makruzzGenerate").prop("disabled", false);
        }
    });



    $.ajax({
        url: "php/hotels.php",
        type: 'POST',
        data: {
            status: "getHotelRoomBlocking"
        },
        dataType: "JSON",
        success: function(result) {

            var hotelArray = [];
            var hotelIDArray = [];
            var hotelString = "";
            result.data.forEach(function(item) {
                $.ajax({
                    url: "php/hotels.php",
                    type: 'POST',
                    data: {
                        status: "hotelForID",
                        name_id: item.HotelSelected
                    },
                    dataType: "JSON",
                    success: function(res) {
                        if (hotelIDArray.indexOf(res.data[0].HotelID) == -1) {
                            hotelIDArray.push(res.data[0].HotelID);
                            hotelArray.push({id: res.data[0].HotelID, name: res.data[0].HotelName});
                        }



                    }
                });
                console.log(item);
            });
            setTimeout(function() {
                console.log(hotelArray);
                var str = '<option value="">Select</option>';

                hotelArray.forEach(function(ite) {

                    str += '<option value="' + ite.id + '">' + ite.name + '</option>';
                });
                str += '<option value="">All</option>';
                console.log("str is");
                console.log(str);
                $("#hotelNameReport").html("");
                $("#hotelNameReport").html(str);

            }, 1000);



//            $(this).html('');
//            $(this).html(str);
        }
    });
    setTimeout(function() {
        $("#startHotelPayment , #endHotelPayment").trigger("change");
        $("#reportType").trigger("change");


    }, 500);






    $.ajax({
        url: "php/hotels.php",
        type: 'POST',
        data: {
            status: "getmakruzz"

        },
        dataType: "JSON",
        success: function(res) {
            console.log(res);
            var str = '<option value="">Select</option>';
            var len = res.data.length;

            for (var i = 0; i < len; i++) {

                str += '<option value="' + res.data[i].SectorID + '">' + res.data[i].Name + '</option>';


            }
            $("#sectorBody").html('');
            $("#sectorBody").html(str);
        }
    });













    /*var ferrydatareportall=[];
     ferrydatareportall.push(ferryDatareport($conn));
     console.log("ferrydatareportall ......"+ ferrydatareportall);*/




    $("#generateReport").click(function() {


        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "generatehotel",
                hotel_id: $("#hotelNameReport").val(),
                Arrival: $("#startHotelPayment").val() != "" ? dateToTimestamp($("#startHotelPayment").val()) : "",
                Departure: $("#endHotelPayment").val() != "" ? dateToTimestamp($("#endHotelPayment").val()) : "",
                PaymentStatus: $("#paymentReport").val(),
                reportstatus: $("#statusreport").val(),
                typeOfDate: $("#selectType").val()
            },
            dataType: "JSON",
            success: function(res) {
                 $("#example23").dataTable().fnDestroy();            
                console.log(res);
                var str = '';
                var len = res.data.length;
                if ($("#selectType").val() == "" || $("#selectType").val() == "CIO") {
                    $("#dataStatusHotelPayment").text("C/In - C/Out");
                }
                else {
                    $("#dataStatusHotelPayment").text("Cut Off");
                }

                for (var i = 0; i < len; i++) {
                    var status = res.data[i].Status;

                    var amt = res.data[i].PayWOGST;

                    var rowid = res.data[i].HotelBlockingID;
                    $(".AmountPayableRport").val(amt);
                    $("#idReportHotel").val(rowid);
                    str += '<tr><td>' + res.data[i].ConfirmationNumber + '</td>';
                    str += '<td>' + res.data[i].GuestName + '</td>';
                    str += ($("#selectType").val() == "" || $("#selectType").val() == "CIO") ? '<td>' + timestampToDate(res.data[i].CheckIn) + ' to ' + timestampToDate(res.data[i].CheckOut) + '</td>' : '<td>' + res.data[i].CutOffDate + '</td>';
                    str += '<td>' + res.data[i].HotelName + '</td>';

                    str += '<td>' + res.data[i].AmountPayable + '</td>';
                    str += '<td>' + res.data[i].PayWOGST + '</td>';
                    str += '<td><button type="submit" class="btn btn-warning openModalHotelReport" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-id="' + rowid + '" data-cutoff="' + res.data[i].CutOffDate + '" data-amountPayable="' + res.data[i].PayWOGST + '" data-amount="' + res.data[i].AmountPayable + '" data-status="' + res.data[i].Status + '" data-paymentTerm="' + res.data[i].PaymentTerms + '">Update</button></td>';
                    str += '</tr>';


                }
                $("#hotelPaymentBody").html('');
                $("#hotelPaymentBody").html(str);
             
         
        setTimeout(function() {
           
        $("#example23").dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]       
    
        });
            }, 500);
             
            }
        });
        console.log('res1');
       
        
        
    });
    var ferryReportData = [];
    var makruzzDataArray = [];
    $("#makruzzGenerate").click(function() {

        var p;
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "generateFerryData"
            },
            dataType: "JSON",
            success: function(result) {
                console.log("ferry report data ...");
                console.log(result);
                ferryReportData = result.data
                console.log("ferryreprt array");
                console.log(ferryReportData);
            }
        });

        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "generatemakruzz",
                sector_id: $("#sectorBody").val(),
                Arrival: $("#startSail").val() != "" ? dateToTimestamp($("#startSail").val()) : "",
                Departure: $("#endSail").val() != "" ? dateToTimestamp($("#endSail").val()) : "",
                bookingStatus: $("#makruzzStatus").val(),
            },
            dataType: "JSON",
            success: function(res) {
         $("#example24").dataTable().fnDestroy();
                console.log(res);
                var str = '';
                var len = res.data.length;
                makruzzDataArray = res.data;

                var i;
                for (i = 0; i < len; i++) {
//                    makruzzDataArray[i]= res.data[i];
                    str += '<tr><td>' + res.data[i].ConfirmationNumber + '</td>';
                    str += '<td>' + res.data[i].Name + '</td>';
                    str += '<td>' + res.data[i].SailingDate + '</td>';
                    str += '<td>' + res.data[i].pax + ' </td>';

                    var ticketferryid = res.data[i].TicketFerryID;
                    console.log("ticketferryid is.." + ticketferryid);

                    var count = 0;
                    for (var j = 0; j < ferryReportData.length; j++) {
                        if (ferryReportData[j].TicketFerryID==res.data[i].TicketFerryID) {
                            if (ferryReportData[j].Status == "Confirmed")
                            {
                                count += 1;
                            }
                        }                        
                    }
                    var pending=res.data[i].pax-count;
                    str += '<td>'+count+'</td>';
                    
                    str += '<td>'+pending+'</td>';

                    str += '<td><button type="submit" class="btn btn-warning openMakruzzModal" data-toggle="modal" data-target="#makruzzModal" data-whatever="@getbootstrap" data-sectorID="' + res.data[i].SectorID + '" data-sectorname="' + res.data[i].Name + '" data-guestname="' + res.data[i].GuestName + '" data-age="' + res.data[i].Age + '" data-pax="' + res.data[i].pax + '" data-ticketferry="' + res.data[i].TicketFerryID + '" data-voucherid="' + res.data[i].VoucherID + '" >Update</button> </td>';
                    //str += '<td><button type="submit" class="btn btn-warning openModalHotelReport" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" data-id="' + rowid + '" data-cutoff="'+res.data[i].CutOffDate+'" data-amountPayable="'+res.data[i].PayWOGST+'" data-amount="'+res.data[i].AmountPayable+'" data-status="'+res.data[i].Status+'" data-paymentTerm="'+res.data[i].PaymentTerms+'">Update</button></td>';
                    str += '</tr>';
                    
                    
                    
                    
                }
                $("#makruzzTable").html('');
                $("#makruzzTable").html(str);     
                
      
         setTimeout(function() {
        $("#example24").dataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]       
    
        });
            }, 500);

            }
        });
        console.log('res1');
        
    });
    
    

    $(document).on("click", ".openModalHotelReport", function() {
        console.log($(this).attr("data-id"));
        console.log($(this).attr("data-id"));
        $("#idReportHotel").val($(this).attr("data-id"));
        $(".AmountPayableRport:first").val($(this).attr("data-amount"));
        $(".paymentStatus12:first").val($(this).attr("data-status"));
        $(".amountPayableHotelReport:first").val($(this).attr("data-amountPayable"));
        $(".cutOffDateAmountPayable:first").val(timestampToDate($(this).attr("data-cutoff")));
        if ($(this).attr("data-paymentTerm") == "Advance") {
            $("#cutOffDate").hide();
        }
        else {
            $("#cutOffDate").show();
        }


    });

    $(document).on("click", "#updateModalSubmit", function() {
        AmountPayableHotel = "";
        amountHotel = "";
        paymentStatusHotel = "";
        cutOffDateHotel = "";
        hotelSelectedIdHotel = "";
        $(this).prop("disabled", "true");
        hotelSelectedIdHotel += $("#idReportHotel").val() != "" ? $("#idReportHotel").val() + "###" : "###";


        amountHotel += $(".AmountPayableRport:first").val() != "" ? $(".AmountPayableRport:first").val() + "###" : "###";
        AmountPayableHotel += $(".AmountPayableRport").val() != "" ? $(".AmountPayableRport").val() + "###" : "###";
        cutOffDateHotel += $(".cutOffDateAmountPayable").val() ? dateToTimestamp($(".cutOffDateAmountPayable").val()) + "###" : "###";
        paymentStatusHotel += $(".paymentStatus12").val() != "" ? $(".paymentStatus12").val() + "###" : "###";
        updateHotelRoomBlocking();
        $("#updateModalSubmit").removeAttr("disabled");
        $("#closeModalHotelReport").trigger("click");
    });

//    var makruzzname = [];
//    var s;
//    
    
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

//makruzz submit modal
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
                $("#makruzzGenerate").trigger("click");

            }
        });

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
    function updateHotelRoomBlocking() {

        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            data: {
                status: "updateRoomBlocking",
                amountPayable: amountHotel,
                paymentStatus: paymentStatusHotel,
                cutOfDate: cutOffDateHotel,
                hotelSelectedId: hotelSelectedIdHotel,
                Amount41: AmountPayableHotel
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

});

/*(function(){
 console.log("second ajax");
 $.ajax({
 
 
 
 })
 str += '<td>' + res.data[i].booked+ '</td>';
 str += '<td>' + '</td>';
 })(i);*/

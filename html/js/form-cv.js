$("document").ready(function() {
    // on load time storing form 3 through ajax
    rateFieldDisable();
function rateFieldDisable()
{   
    console.log("rate field disable function");
    if($("#noOfAdultsDbl").val()=="" || $("#noOfAdultsDbl").val()==0 )
        {
           
         $("#noOfAdultsDblRate").prop("disabled",true);   
        }
        if($("#extraAdult").val()=="" || $("#extraAdult").val()==0 )
        {
           
         $("#ExtraAdultRate").prop("disabled",true);   
        }
        if($("#extraChildWith").val()=="" || $("#extraChildWith").val()==0 )
        {
            console.log("rate field disable function Extra child with matt");
         $("#extraChildWithRate").prop("disabled",true);   
        }
        if($("#extraChildWM").val()=="" || $("#extraChildWM").val()==0 )
        {
           
         $("#extraChildWMRate").prop("disabled",true);   
        }
        if($("#infant24").val()=="" || $("#infant24").val()==0 )
        {
           
         $("#infant24Rate").prop("disabled",true);   
        }
        if($("#infant2").val()=="" || $("#extraChildWM").val()==0 )
        {
           
         $("#infant2Rate").prop("disabled",true);   
        }
        if($("#SingleOccupancy").val()=="" || $("#SingleOccupancy").val()==0 )
        {
           
         $("#SingleOccupancyRate").prop("disabled",true);   
        }
        if($("#SingleOccFamily").val()=="" || $("#SingleOccFamily").val()==0 )
        {
            console.log("rate field disable function inner");
         $("#SingleOccFamilyRate").prop("disabled",true);   
        }
        
}
      

$(document).on("click", ".snapshotButton", function() {
   
   var PBnights=$("#portBlairNights").val()==""?0:parseInt($("#portBlairNights").val());
   var HLnights=$("#havelockNights").val()==""?0:parseInt($("#havelockNights").val());
   var NLnights=$("#neilIslandNights").val()==""?0:parseInt($("#neilIslandNights").val());
   var DLnights=$("#diglipurNights").val()==""?0:parseInt($("#diglipurNights").val());
   var totalNights=PBnights+HLnights+NLnights+DLnights;
   var arrivaldate=$("#start_date_form1").val();
   var departuredate=$("#end_date_form1").val();
   var d="";
   var deptd="";
   var month = new Array();
month[0] = "January";
month[1] = "February";
month[2] = "March";
month[3] = "April";
month[4] = "May";
month[5] = "June";
month[6] = "July";
month[7] = "August";
month[8] = "September";
month[9] = "October";
month[10] = "November";
month[11] = "December";
    if(arrivaldate!="")
   {
       var dd=new Date(arrivaldate);
       d=dd.getDate();
       if(d=="1"||d=="21" ||d=="31")
           {
               d+="st";
           }
           else if(d=="3"||d=="23"){
               d+="rd";
           }
           else if(d=="2"||d=="22"){
               d+="nd";
           }
           else{
               d+="th";
           }
           
           

           d+=" "+month[dd.getMonth()];
           d+=","+dd.getFullYear();
   }
   else{d="";}
   
   
   if(departuredate!="")
   {
       var dd=new Date(departuredate);
       deptd=dd.getDate();
       if(deptd=="1"||deptd=="21" ||deptd=="31")
           {
               deptd+="st";
           }
           else if(deptd=="3"||deptd=="23"){
               deptd+="rd";
           }
           else if(deptd=="2"||deptd=="22"){
               deptd+="nd";
           }
           else{
               deptd+="th";
           }
           
           deptd+=" "+month[dd.getMonth()];
           deptd+=","+dd.getFullYear();
   }
   else{deptd="";}
   
    
  var couch=$("#count_coach_portBlair").val();
  console.log("couch..." );
  console.log(couch);
   var Adults=parseInt($("#noOfAdultsDbl").val());
   var ExtraAdults=parseInt($("#extraAdult").val());
   var ExtraChildBed=parseInt($("#extraChildWith").val());
   var ExtrachildWOBed=parseInt($("#extraChildWM").val());
   var singleocc=parseInt($("#SingleOccupancy").val());
   var singleoccfamily=parseInt($("#SingleOccFamily").val());
   var infant24;
   if($("#infant24").val()=="")
       {
           infant24=0;
       }
       else
           {
               infant24=parseInt($("#infant24").val());
           }
   var infant2;
   if($("#infant2").val()!="")
       {
           infant2=parseInt($("#infant2").val());
       }
       else{
           infant2=0;
       }
   var totalinfant=infant24+infant2;
   var numPax="" ;
   if(Adults!="" && Adults<10 && Adults>0)
       {
           numPax+=" 0"+Adults+" Adults +";
       }
       else if(Adults>=10)
           {
               numPax+=Adults+" Adults +";
           }
   if(ExtraAdults!="" && ExtraAdults<10 && ExtraAdults>0)
       {
           numPax+=" 0"+ExtraAdults+" Extra Bed +";
       }
       else if(ExtraAdults>=10)
           {
           numPax+=ExtraAdults+" Extra Bed + ";
           }
           
   if(ExtraChildBed!="" && ExtraChildBed<10 && ExtraChildBed>0)
       {
           numPax+=" 0"+ExtraChildBed+" Child with bed +";
       }
       else if(ExtraChildBed>=10)
           {
                numPax+=ExtraChildBed+" Child with bed +";
           }
   if(ExtrachildWOBed!="" && ExtrachildWOBed<10 && ExtrachildWOBed>0)
       {
           numPax+=" 0"+ExtrachildWOBed+" Child without bed +";
       }
       else if(ExtrachildWOBed>=10)
           {
                numPax+=ExtrachildWOBed+" Child without bed +";
           }
       if(totalinfant<10 && totalinfant>0)
       {
           numPax+=" 0"+totalinfant+" Infant +";
       }
       else if(totalinfant>=10)
           {
                numPax+=totalinfant+" Infant +";
           }
           if(singleocc!="" && singleocc<10 && singleocc>0)
       {
           numPax+=" 0"+singleocc+" Single Occupancy +";
       }
       else if(singleocc>=10)
           {
                numPax+=singleocc+" Single Occupancy +";
           }
           if(singleoccfamily!="" && singleoccfamily<10 && singleoccfamily>0)
       {
           numPax+=" 0"+singleoccfamily+" Single Occupancy with Family +";
       }
       else if(singleoccfamily>=10)
           {
                numPax+=singleoccfamily+" Single Occupancy with Family +";
           }
           var arrflightname;
           var arrflightnumber;
           var arrflighttime;
           var arrflight=[];
    $(".form31Row").each(function(){
                console.log(" Arrival flight");
             arrflightname = $(this).find(".arrival-flight-form3").val();
             arrflightnumber= $(this).find(".ArrivalflightNumberForm3").val();
             arrflighttime=$(this).find(".arrival-time-form3").val();
                if(arrflightname!="" && arrflightnumber!="" && arrflighttime!="" )
                    {
                        console.log("inner arr flight");
                        arrflight.push({name:arrflightname,number:arrflightnumber,time:arrflighttime});
                    }
               
           });
           var flightname;
           var flightnumber;
           var flighttime;
           var departureFlight=[];
           
           $(".form31DepartureRow").each(function(){
                console.log(" dept flight");
             flightname = $(this).find(".departure-flight-form3").val();
             flightnumber= $(this).find(".DepartureflightNumberForm3").val();
             flighttime=$(this).find(".departure-time-form3").val();
                if(flightname!="" && flightnumber!="" && flighttime!="" )
                    {
                        console.log("inner dept flight");
                        departureFlight.push({name:flightname,number:flightnumber,time:flighttime});
                    }
               
           });
           var Guestinfo=[];
           $(".form2Row").each(function(){
               
             var gname = $(this).find(".guestName").val();
             var gage= $(this).find(".guestAge").val();
             
                if(gname!="" && gage!="" )
                    {
                        console.log("inner dept flight");
                        Guestinfo.push({name:gname,age:gage});
                    }
               
           });
           
           var portb=[];
           var hav=[];
           var neil=[];
           var digi=[];
           var checkDuplicateArrPB = [];
           var checkDuplicateArrHAV = [];
           var checkDuplicateArrNeil = [];
           var checkDuplicateArrDigi = [];
           $(".form41Row").each(function(){
                console.log(" hotel");
                
             var ival = $(this).find(".SelectedIslandForm41:first").val();
             if(ival!=""){
             var iname=$(this).find("option[value="+ival+"]").html();
             }
             var hotelval = $(this).find(".HotelSelectedForm41:first").val();
             if(hotelval!=""){
             var hotelname=$(this).find("option[value="+hotelval+"]").html();
             var numberNightsthis=$(this).find(".NumberOfNightsForm41:first").val();
             var cinthis=$(this).find(".CheckInForm41:first").val();
             var coutthis=$(this).find(".CheckOutForm41:first").val();
             var mealplanthis=$(this).find(".MealPlanForm41:first").val();
             }
             
             
             
             
               if(iname=="Port Blair"){
//                   if($.inArray(hotelname, checkDuplicateArrPB) === -1){
//                       checkDuplicateArrPB.push(hotelname);
                       portb.push({name:hotelname,nights:numberNightsthis,cin:cinthis,cout:coutthis,meal:mealplanthis});
                   //}
             }
             if(iname=="Havelock"){
//                 if($.inArray(hotelname, checkDuplicateArrHAV) === -1){
//                       checkDuplicateArrHAV.push(hotelname);
                       hav.push({name:hotelname,nights:numberNightsthis,cin:cinthis,cout:coutthis,meal:mealplanthis});
                   //}
             }
             if(iname=="Neil Island"){
//                 if($.inArray(hotelname, checkDuplicateArrNeil) === -1){
//                       checkDuplicateArrNeil.push(hotelname);
                       neil.push({name:hotelname,nights:numberNightsthis,cin:cinthis,cout:coutthis,meal:mealplanthis});
                   //}
             }
             if(iname=="Diglipur"){
                 //if($.inArray(hotelname, checkDuplicateArrDigi) === -1){
                   //    checkDuplicateArrDigi.push(hotelname);
                       digi.push({name:hotelname,nights:numberNightsthis,cin:cinthis,cout:coutthis,meal:mealplanthis});
                       
                 //}
             }
             
             console.log(hotelname);
               
           });
           var pbvehicle="";
           var digvehicle="";
           var nvehicle="";
           var havehicle="";
           if($("#portBlair").prop("checked")==true)
               {
                   if($("#car_portBlair").prop("checked")==true){
                       pbvehicle+= "Car "+$("#count_car_portBlair").val()+"/";
                   }
                   if($("#coach_portBlair").prop("checked")==true)
                       {
                           pbvehicle+="Coach "+$("#count_coach_portBlair").val()+"/";
                       }
                        if($("#tempo_portBlair").prop("checked")==true)
                       {
                           pbvehicle+="Tempo "+$("#count_tempo_portBlair").val()+"/";
                       }
                        
               }
           
           if($("#havelock").prop("checked")==true)
               {
                   if($("#car_havelock").prop("checked")==true){
                       havehicle+="Car "+$("#count_car_havelock").val()+"/";
                   }
                   if($("#coach_havelock").prop("checked")==true)
                       {
                           havehicle+="Coach "+$("#count_coach_havelock").val()+"/";
                       }                                               
               }
           if($("#neil").prop("checked")==true)
               {
                   if($("#car_neil").prop("checked")==true){
                       nvehicle+="Car "+$("#count_car_neil").val();
                   }                                                                 
               }
                if($("#diglipur").prop("checked")==true)
               {
                   if($("#car_diglipur").prop("checked")==true){
                       digvehicle+="Car "+$("#count_car_diglipur").val()+"/";
                   }
                   if($("#coach_diglipur").prop("checked")==true)
                       {
                           digvehicle+="Coach "+$("#count_coach_diglipur").val()+"/";
                       }                                               
               }
       
    var snapStr="";
//    
//  snapStr+= '<table width="500" border="0" cellspacing="5" cellpadding="5" align="center">';
//snapStr+='<tr><td colspan="5" style="font-weight:bold; color:black;font-family: serif;">';
//        snapStr+='<b>';
//        snapStr+='NO: OF NIGHTS';
//                snapStr+='</b>';
//                        snapStr+='</td></tr>';
// snapStr+='<tr>';
//   snapStr+=' <td class="modalColumns">PB</td>';
//    snapStr+='<td class="modalColumns">HL</td>';
//   snapStr+= '<td class="modalColumns">NL</td>';
//snapStr+='<td class="modalColumns">DP</td>';
//snapStr+='<td class="modalColumns">Total</td>';
// snapStr+=' </tr>';
// snapStr+= '<tr>';
//   snapStr+= '<td class="modalColumns">'+PBnights+'</td>';
//   snapStr+= '<td class="modalColumns">'+HLnights+'</td>';
//   snapStr+= '<td class="modalColumns">'+NLnights+'</td>';
//	snapStr+='<td class="modalColumns">'+DLnights+'</td>';
//snapStr+='<td class="modalColumns">'+totalNights+'</td>';
//  snapStr+='</tr>';
//  snapStr+='<tr>';
//	snapStr+='<td colspan="5"><hr /></td>';
//	snapStr+='</tr>';
//snapStr+='</table>';
//
//snapStr+='<table width="500" border="0" cellspacing="5" cellpadding="5" align="center">';
//snapStr+='<tr>	';
//	snapStr+='<td colspan="3" style="font-weight:bold; color:black;font-family: serif;"><strong>ARRIVAL FLIGHT</strong></td>';
//snapStr+='</tr>';
//  snapStr+='<tr>';
//    snapStr+='<td class="modalColumns" width="198">Name</td>';
//    snapStr+='<td class="modalColumns" width="150">Number</td>';
//    snapStr+='<td class="modalColumns" width="102">Time</td>';
//  snapStr+='</tr>';
//  var alength=arrflight.length;
//  if(alength>0){
//  for(var i=0;i<alength;i++){
//      snapStr+='<tr>';
//  snapStr+='<td class="modalColumns">'+arrflight[i].name+'</td>';
//    snapStr+='<td class="modalColumns">'+arrflight[i].number+'</td>';
//    snapStr+='<td class="modalColumns">'+arrflight[i].time+'</td>';
//  snapStr+='</tr>';
//  
//  }    
//  }
//  else{
//      snapStr+='<tr>';
//      snapStr+='</tr>';
//  }
//   snapStr+='<tr>'
//	snapStr+='<td colspan="3"><hr /></td>';
//	snapStr+='</tr>';
//snapStr+='</table>';
//
//snapStr+='<table width="500" border="0" cellspacing="5" cellpadding="5" align="center">';
//snapStr+='<tr>	';
//	snapStr+='<td colspan="3" style="font-weight:bold; color:black;font-family: serif;"><strong>DEPARTURE FLIGHT</strong></td>';
//snapStr+='</tr>';
//  snapStr+='<tr>';
//    snapStr+='<td class="modalColumns" width="198">Name</td>';
//    snapStr+='<td class="modalColumns" width="150">Number</td>';
//    snapStr+='<td class="modalColumns" width="102">Time</td>';
// snapStr+=' </tr>';
// var dlength=departureFlight.length;
// console.log(dlength);
// if(dlength>0){
// for(var i=0;i<dlength;i++)
//     {
//  snapStr+='<tr>';
//    snapStr+='<td class="modalColumns">'+departureFlight[i].name+'</td>';
//    snapStr+='<td class="modalColumns">'+departureFlight[i].number+'</td>';
//    snapStr+='<td class="modalColumns">'+departureFlight[i].time+'</td>';
//   snapStr+='</tr>';
//     }
//}
//else
//    {
//         snapStr+='<tr>';
//          snapStr+='</tr>';
//    }
//     snapStr+='<tr>';
//	snapStr+='<td colspan="3"><hr /></td>';
//	snapStr+='</tr>';
//snapStr+='</table>';
//
//snapStr+='<table width="500" border="0" cellspacing="5" cellpadding="5" align="center">';
//snapStr+='<tr>';
//   snapStr+= '<td colspan="4" style="font-weight:bold; color:black;font-family: serif;"><strong>HOTELS</strong></td>';
//snapStr+='</tr>';
//  snapStr+='<tr>';
//    snapStr+='<td class="modalColumns">PB</td>';
//    snapStr+='<td class="modalColumns">HL</td>';
//    snapStr+='<td class="modalColumns">NL</td>';
//snapStr+='<td class="modalColumns">DP</td>';
// snapStr+= '</tr>';
//  snapStr+= '<tr>';
//  if(portb.length>0){
//      snapStr+= '<td class="modalColumns">';
//      for(var i=0;i<portb.length;i++){
//   snapStr+= portb[i].name+' </br>';
//      }
//      snapStr+= '</td>';
//   }
//   else{snapStr+= '<td></td>';}
//
//  if(hav.length>0){
//      snapStr+= '<td class="modalColumns">';
//      for(var i=0;i<hav.length;i++){
//   snapStr+= hav[i].name+' </br>';
//      }
//      snapStr+= '</td>';
//   }
//   else{snapStr+= '<td></td>';}
//   
//  if(neil.length>0){
//      snapStr+= '<td class="modalColumns">';
//      for(var i=0;i<neil.length;i++){
//   snapStr+= neil[i].name+' </br>';
//      }
//      snapStr+= '</td>';
//   }
//   else{snapStr+= '<td></td>';}
//  if(digi.length>0){
//      snapStr+= '<td class="modalColumns">';
//      for(var i=0;i<digi.length;i++){
//   snapStr+= digi[i].name+' </br>';
//      }
//      snapStr+= '</td>';
//   }
//   else{snapStr+= '<td></td>';}
//   snapStr+='</tr>';
//  snapStr+= '<tr>';
//snapStr+='<td colspan="4"><hr /></td>';
//	snapStr+='</tr>';
//snapStr+='</table>';
//
//snapStr+='<table width="500" border="0" cellspacing="5" cellpadding="5" align="center">';
//snapStr+='<tr>';
//    snapStr+='<td colspan="4" style="font-weight:bold; color:black;font-family: serif;"><strong>CARS</strong></td>';
//snapStr+='</tr>';
//  snapStr+='<tr>';
//    snapStr+='<td class="modalColumns">PB</td>';
//    snapStr+='<td class="modalColumns">HL</td>';
//    snapStr+='<td class="modalColumns">NL</td>';
//	snapStr+='<td class="modalColumns">DP</td>';
//  snapStr+='</tr>';
//  snapStr+='<tr>';
//  var pb=pbvehicle.slice("/", -1);
//    snapStr+='<td class="modalColumns">'+pb+'</td>';
//    var ha=havehicle.slice("/",-1);
//    snapStr+='<td class="modalColumns">'+ha+'</td>';
//    snapStr+='<td class="modalColumns">'+nvehicle+'</td>';
//    var dig=digvehicle.slice("/",-1);
//	snapStr+='<td class="modalColumns">'+dig+'</td>';
// snapStr+='</tr>';
//   snapStr+='<tr>';
//snapStr+='<td colspan="54"><hr /></td>';
//	snapStr+='</tr>';
//snapStr+='</table>';
//
//snapStr+='<table width="500" border="0" cellspacing="5" cellpadding="5" align="center">';
//snapStr+='<tr>';
//    snapStr+='<td style="font-weight:bold; color:black;font-family: serif;"><strong>NO OF PAX</strong></td>';
//snapStr+='</tr>';
// snapStr+='<tr>';
// pax=numPax.slice("+",-1);
//    snapStr+='<td class="modalColumns">'+pax+'</td>';
//snapStr+='</tr>';
// snapStr+='<tr>';
//	snapStr+='<td colspan="2"><hr /></td>';
//snapStr+='</tr>';
//snapStr+='</table>';
//
//snapStr+='<table width="500" border="0" cellspacing="5" cellpadding="5" align="center">';
//snapStr+='<tr>';
//    snapStr+='<td style="font-weight:bold; color:black;font-family: serif;"><strong>PAX NAME</strong></td>';
//snapStr+='<td style="font-weight:bold; color:black;font-family: serif;"><strong>AGE</strong></td>';
//snapStr+='</tr>';
//
//var glength=Guestinfo.length;
// if(glength>0){
// for(var i=0;i<glength;i++)
//     {
//         snapStr+='<tr>';
//    snapStr+='<td class="modalColumns">'+Guestinfo[i].name+'</td>';
//	snapStr+='<td class="modalColumns">'+Guestinfo[i].age+'</td>';
//snapStr+='</tr>';
// 
//     }
// }
// else
//     {
//         snapStr+='<tr>';
//         snapStr+='</tr>';
//     }
//
// snapStr+='<tr>';
//	snapStr+='<td colspan="2"><hr /></td>';
//	snapStr+='</tr>';
//snapStr+='</table>';
//..............................................................................
           
  snapStr+= '         <table width="800" class="table table.bordered" style="margin:25px;">';
snapStr+= '<tr>';
   snapStr+= ' <td colspan="5"><h4>No. of Nights</h4></td>';
snapStr+= '</tr>';
  snapStr+= '<tr>'
    snapStr+= '<td>';
    if(PBnights>0){
        snapStr+= 'PB : <span style="font-weight:500">'+PBnights+'</span>';
    }
            snapStr+= '</td>';
    snapStr+= '<td>';
    if(HLnights>0){
        snapStr+= 'HL : <span style="font-weight:500">'+HLnights+'</span>';
    }
            snapStr+= '</td>';
    snapStr+= '<td>';
    if(NLnights>0){
        snapStr+= 'NL : <span style="font-weight:500">'+NLnights+'</span>';
    }
            snapStr+= '</td>';
    snapStr+= '<td>';
    if(DLnights>0){
        snapStr+= 'DP : <span style="font-weight:500">'+DLnights+'</span>';
    }
            snapStr+= '</td>';
    snapStr+= '<td>';
    if(totalNights>0){
        snapStr+= 'Total Stay: <span style="font-weight:500">'+totalNights+'</span>';
    }
            snapStr+= '</td>';
 
  snapStr+= '</tr>';
snapStr+= '</table>';

snapStr+= '<table width="800" class="table table.bordered" style="margin:25px;">';
snapStr+= '<tr>';
    snapStr+= '<td colspan="2"><h4>Flight Details</h4></td>';
snapStr+= '</tr>';
snapStr+= ' <tr>';
snapStr+= '<td>';
var alength=arrflight.length;
  if(alength>0){
  for(var i=0;i<alength;i++){

snapStr+= 'Arrival Flight: <span style="font-weight:500">' +d +' @ '+arrflight[i].time+'</span><br/>';
  
  }
  }
  snapStr+= '</td>';
  snapStr+= '<td>';
  var dlength=departureFlight.length;
  if(dlength>0){
 for(var i=0;i<dlength;i++)
     {
         snapStr+= 'Departure Flight: <span style="font-weight:500">'+deptd+' @ '+departureFlight[i].time+' </span><br/>';
     }
     }
     snapStr+= '</td>';
  snapStr+= ' </tr>';
snapStr+= '</table>';


snapStr+= '<table width="800" class="table table.bordered" style="margin:25px;">';
snapStr+= '<tr>';
    snapStr+= '<td colspan="5"><h4>Hotel Details</h4></td>';
snapStr+= '</tr>';

if(portb.length>0){
      
snapStr+= '<tr>';
    snapStr+= '<td colspan="5"><span style="font-weight:600"><u>PB Hotel</u></span></td>';
snapStr+= '</tr>';
  snapStr+= '<tr>';
    snapStr+= '<td><span style="font-weight:400">Name</span></td>';
    snapStr+= '<td><span style="font-weight:400">C/In</span></td>';
    snapStr+= '<td><span style="font-weight:400">C/Out</span></td>';
	snapStr+= '<td><span style="font-weight:400">Number of Nights</span></td>';
	snapStr+= '<td><span style="font-weight:400">Meal Plan</span></td>';
snapStr+= '  </tr>';
      for(var i=0;i<portb.length;i++){
   
 snapStr+= ' <tr>';
    snapStr+= '<td><span style="font-weight:500">'+portb[i].name+'</span></td>';
   snapStr+= ' <td><span style="font-weight:500">'+portb[i].cin+'</span></td>';
    snapStr+= '<td><span style="font-weight:500">'+portb[i].cout+'</span></td>';
	snapStr+= '<td><span style="font-weight:500">'+portb[i].nights+'</span></td>';
	snapStr+= '<td><span style="font-weight:500">'+portb[i].meal+'</span></td>';
  snapStr+= '</tr>';
      }
      
   }
   if(hav.length>0){
       snapStr+= '<tr>';
    snapStr+= '<td colspan="5"><span style="font-weight:600"><u>Havelock Hotel</u></span></td>';
snapStr+= '</tr>';
 snapStr+= ' <tr>';
    snapStr+= '<td><span style="font-weight:400">Name</span></td>';
    snapStr+= '<td><span style="font-weight:400">C/In</span></td>';
    snapStr+= '<td><span style="font-weight:400">C/Out</span></td>';
	snapStr+= '<td><span style="font-weight:400">Number of Nights</span></td>';
	snapStr+= '<td><span style="font-weight:400">Meal Plan</span></td>';
  snapStr+= '</tr>';
     for(var i=0;i<hav.length;i++){
            snapStr+= '<tr>';
    snapStr+= '<td><span style="font-weight:500">'+hav[i].name+'</span></td>';
    snapStr+= '<td><span style="font-weight:500">'+hav[i].cin+'</span></td>';
   snapStr+= ' <td><span style="font-weight:500">'+hav[i].cout+'</span></td>';
	snapStr+= '<td><span style="font-weight:500">'+hav[i].nights+'</span></td>';
snapStr+= '	<td><span style="font-weight:500">'+hav[i].meal+'</span></td>';
  snapStr+=' </tr>';
   }
   }
   if(neil.length>0){
      snapStr+= '<tr>';
    snapStr+= '<td colspan="5"><span style="font-weight:600"><u>Neil Hotel</u></span></td>';
snapStr+= '</tr>';
 snapStr+= ' <tr>';
    snapStr+= '<td><span style="font-weight:400">Name</span></td>';
    snapStr+= '<td><span style="font-weight:400">C/In</span></td>';
    snapStr+= '<td><span style="font-weight:400">C/Out</span></td>';
	snapStr+= '<td><span style="font-weight:400">Number of Nights</span></td>';
	snapStr+= '<td><span style="font-weight:400">Meal Plan</span></td>';
  snapStr+= '</tr>';
      for(var i=0;i<neil.length;i++){
          snapStr+= '<tr>';
    snapStr+= '<td><span style="font-weight:500">'+neil[i].name+'</span></td>';
    snapStr+= '<td><span style="font-weight:500">'+neil[i].cin+'</span></td>';
   snapStr+= ' <td><span style="font-weight:500">'+neil[i].cout+'</span></td>';
	snapStr+= '<td><span style="font-weight:500">'+neil[i].nights+'</span></td>';
snapStr+= '	<td><span style="font-weight:500">'+neil[i].meal+'</span></td>';
  snapStr+=' </tr>';
      }
     
   }
   console.log("diglipur...");
   console.log(digi.length);
   if(digi.length>0){
         snapStr+= '<tr>';
    snapStr+= '<td colspan="5"><span style="font-weight:600"><u>DigliPur Hotel</u></span></td>';
snapStr+= '</tr>';
 snapStr+= ' <tr>';
    snapStr+= '<td><span style="font-weight:400">Name</span></td>';
    snapStr+= '<td><span style="font-weight:400">C/In</span></td>';
    snapStr+= '<td><span style="font-weight:400">C/Out</span></td>';
	snapStr+= '<td><span style="font-weight:400">Number of Nights</span></td>';
	snapStr+= '<td><span style="font-weight:400">Meal Plan</span></td>';
  snapStr+= '</tr>';
      for(var i=0;i<digi.length;i++){
   snapStr+= '<tr>';
    snapStr+= '<td><span style="font-weight:500">'+digi[i].name+'</span></td>';
    snapStr+= '<td><span style="font-weight:500">'+digi[i].cin+'</span></td>';
   snapStr+= ' <td><span style="font-weight:500">'+digi[i].cout+'</span></td>';
	snapStr+= '<td><span style="font-weight:500">'+digi[i].nights+'</span></td>';
snapStr+= '	<td><span style="font-weight:500">'+digi[i].meal+'</span></td>';
  snapStr+=' </tr>';
   
      }
   
   }

snapStr+= '</table>';


snapStr+= '<table width="800" class="table table.bordered" style="margin:25px;">';
snapStr+= '<tr>';
    snapStr+= '<td><h4>Guest Details</h4></td>';
snapStr+= '</tr>';
snapStr+= '<tr>';
    snapStr+= '<td colspan="2"><span style="font-weight:600"><u>Number of PAX</u></span></td>';
snapStr+= '</tr>';
 snapStr+= '<tr>';
  var pax=numPax.slice("+",-1);
   snapStr+= ' <td colspan="2">'+pax+'</td>';
snapStr+= '</tr>';

snapStr+= '<tr>';
    snapStr+= '<td><span style="font-weight:400">PAX NAME</span></td>';
	snapStr+= '<td><span style="font-weight:400">AGE</span></td>';
snapStr+= '</tr>';
var glength=Guestinfo.length;
 if(glength>0){
 for(var i=0;i<glength;i++)
     {
         snapStr+='<tr>';
    snapStr+='<td><span style="font-weight:500">'+Guestinfo[i].name+'</span></td>';
	snapStr+='<td><span style="font-weight:500">'+Guestinfo[i].age+'</span></td>';
snapStr+='</tr>';
 
     }
 }
 else
     {
         snapStr+='<tr>';
         snapStr+='</tr>';
     }


snapStr+= '</table>';

    
    
    
  $(".snapshotBody").html(snapStr);  
    
});


$(document).on("click", ".listHotelsreview", function() {
    var hotelid=$(this).attr("data-hotelid");
    var cat=$(this).attr("data-cat");
    var hotelname=$(this).attr("data-hotelname");
    var address=$(this).attr("data-address");
    console.log(hotelid);
    console.log(cat);
    console.log(hotelname);
    console.log(address);
var listhotelreview="";

$.ajax({
            url: "php/hotels.php",
            type: 'POST',
            dataType: "JSON",
            data: {
                status: "listhotelreview",
                hotelid:hotelid,
                category:cat
            },
            success: function(result) {
                console.log("list hotel");
                
                console.log(result);
                
                
                                         listhotelreview+= ' <table width="750" cellspacing="0" border="0" cellpadding="5" align="center">';
                                                      listhotelreview+= '  <tr>';
                                                           listhotelreview+= ' <td colspan="6" style="font-family:cambria; font-size:11.5px;"><span style="color:#009900"><strong>'+hotelname+'</strong></span></td>';
                                                    listhotelreview+= '    </tr>';
                                                       listhotelreview+= ' <tr>';
                                                         listhotelreview+= '   <td  colspan="6">&nbsp;</td>';
                                                     listhotelreview+= '   </tr>';

                                                       listhotelreview+= ' <tr id="one">';
                                                           listhotelreview+= ' <td width="129" valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Hotel Name:</strong></td>'
                                                         listhotelreview+= '   <td width="166" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+hotelname+'</td>';
                                                         listhotelreview+= '   <td width="135" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>Location:</strong></td>';
                                                 listhotelreview+='  <td colspan="3" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+address+'</td>';
                                                     listhotelreview+='   </tr>';
                                                       listhotelreview+=' <tr id="oneinner">';
                                                            listhotelreview+='<td valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Category of Hotel </strong></td>';
                                                          listhotelreview+='  <td colspan="5" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+cat+'</td>';
                                                     listhotelreview+='   </tr>';
                                                        listhotelreview+='<tr id="oneinner">';
                                                            listhotelreview+='<td valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Review:</strong></td>';
                                                        listhotelreview+='    <td colspan="5" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+result.data[0].Review+'</td>';
                                         listhotelreview+='               </tr>';
                                                     listhotelreview+='   <tr id="oneinner">';
                                                            listhotelreview+='<td valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Number of rooms:</strong></td>';
                                                            listhotelreview+='<td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+result.data[0].NumberOfRooms+'</td>';
                                                           listhotelreview+=' <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>Room Service</strong></td>';
                                                            listhotelreview+='<td colspan="3" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+result.data[0].RoomService+'</td>';
                                                  listhotelreview+='      </tr>';
                                                      listhotelreview+='  <tr id="oneinner">';
                                                          listhotelreview+='  <td valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Tea/ Coffee Maker in room:</strong></td>';
                                                         listhotelreview+='   <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+result.data[0].TeaCoffee+'</td>'
                                                            listhotelreview+='<td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>Intercom</strong></td>';
                                                            listhotelreview+='<td width="55" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+result.data[0].InterCom+'</td>';
                                                            listhotelreview+='<td width="82" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>Hot Water</strong></td>';
                                                       listhotelreview+='     <td width="73" valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+result.data[0].HotWater+'</td>';
                                                        listhotelreview+='</tr>';
                                                        listhotelreview+='<tr id="oneinner">';
                                                            listhotelreview+='<td valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Pool</strong></td>';
                                                            listhotelreview+='<td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+result.data[0].Pool+'</td>';
                                                                listhotelreview+='<td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>TV</strong></td>';
                                                            listhotelreview+='<td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+result.data[0].TV+'</td>';
                                                            listhotelreview+='<td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>Minifridge</strong></td>';
                                                               listhotelreview+='<td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+result.data[0].MiniFridge+'</td>';
                                                        listhotelreview+='</tr>';
                                                        listhotelreview+='<tr id="oneinner">';
                                                            listhotelreview+='<td valign="top" style="font-family:cambria; font-size:11.5px;"><strong>Bar</strong></td>';
                                                            listhotelreview+='<td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+result.data[0].Bar+'</td>';
                                                            listhotelreview+='<td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>Safe Locker</strong></td>';
                                                      listhotelreview+='      <td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+result.data[0].SafeLocker+'</td>';
                                                            listhotelreview+='<td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;"><strong>HairDryer</strong></td>';
                                                            listhotelreview+='<td valign="top" style="border-left:none; font-family:cambria; font-size:11.5px;">'+result.data[0].HairDryer+'</td>';
                                                        listhotelreview+='</tr>';
                                                    listhotelreview+='</table>';
                
                
                
                
                
                $(".listhotelreview").html('');
                $(".listhotelreview").html(listhotelreview);

            }
        });

});






    var sectorArray = [];
    var sectorTimingArray = [];

    if ((new URL(location.href)).searchParams.get("mode") == "edit") {        
        $("#steps-uid-0 ul li").removeClass("disabled");
        $("#steps-uid-0 ul li").addClass("done");
        updatePayment();
    }



    $.ajax({
        url: "php/hotels.php",
        type: 'POST',
        data: {
            status: "form31sector"
        },
        dataType: "JSON",
        success: function(result) {
    console.log("form 3.."+result);
            sectorArray = result;
            var str = '';
            str += '<div class="input-group"  style="margin-bottom:20px;">';
            for (var i = 0; i < sectorArray.data.length; i++) {
                str += '<input class="formF3check" type="checkbox" value="' + sectorArray.data[i]['SectorID'] + '" >' +
                        '<span style="padding-left:5px; margin-top:-7px; padding-right:30px">' + sectorArray.data[i]['Name'] + '</span>';
                if ((i + 1) % 4 == 0) {
                    str += '</div><div class="input-group">';
                }
            }
            str += '</div>';
            console.log(str);
            $("#ferryTicketForm3check").html('');
            $("#ferryTicketForm3check").html(str);

            if ((new URL(location.href)).searchParams.get("voucher")) {


                var url = new URL(location.href);
                var voucher_id = url.searchParams.get("voucher");
                console.log(voucher_id);
                //            For edit
                $.ajax({
                    url: "php/hotels.php",
                    type: 'POST',
                    data: {
                        status: "showForm33Check",
                        voucher_id: voucher_id
                    },
                    dataType: "JSON",
                    success: function(result) {
                        console.log("result from form33 ");
                        console.log(result);
                        for (var i = 0; i < result.data.length; i++) {
                            $(".formF3check").each(function() {

                                console.log("ferry name");
                                console.log(result.data[i].FerryName);
                                console.log("ferry value");
                                console.log($(this).val());
                                if ($(this).val() == result.data[i]["FerryTicket"]) {
                                    $(this).prop("checked", "true");
                                }
                            });
                        }
                        $(".formF3check").trigger("change");

                        for (var i = 0; i < result.data.length; i++) {
                            $(".form33Row").each(function() {
                                console.log("data-id");
                                console.log($(this).attr("data-id"));
                                console.log("Ferry Ticket");
                                console.log(result.data[i]["FerryTicket"]);

                                if (result.data[i]["FerryTicket"] == $(this).attr("data-id")) {
                                    $(this).find(".ferryTicketID").each(function() {
                                        $(this).attr("data-id", result.data[i]["TicketFerryID"]);
                                    });
                                    $(this).find(".from33Sailing").each(function() {
                                        (result.data[i]["SailingDate"]=="" || result.data[i]["SailingDate"]=="0000-00-00 00:00:00" )?"" :$(this).val(timestampToDate(new Date(result.data[i]["SailingDate"])));
                                    });
                                    $(this).find(".form33Status").each(function() {
                                        $(this).val(result.data[i]["Status"]);
                                    });
                                    $(this).find(".form33FerryName").each(function() {
                                        //                                        console.log(result);
                                        //                                        console.log(result.data[i].FerryName);
                                        //                                        console.log("ferry name is");
                                        //                                        var nameReturned = showFerryName(sectorTimingArray,result.data[i].TicketFerryID); 
                                        //                                        console.error(nameReturned);
                                        $(this).children().each(function() {
                                            console.log(result.data[i]["FerryName"]);
                                            console.log($(this).val());
                                            if (result.data[i]["FerryName"] == $(this).val()) {
                                                $(this).prop("selected", "true");
                                            }
                                        })
                                        //                                        $(this).val(result.data[i]["TicketFerryID"]);

                                    });
                                }
                            });
                        }



                    }
                });
            }
        }
    });
    $.ajax({
        url: "php/hotels.php",
        type: 'POST',
        data: {
            status: "form31sectorTiming"
        },
        dataType: "JSON",
        success: function(result) {
            console.log("hello");
            console.log(result);
            sectorTimingArray = result;
            console.log("sectorTimingArray");
            console.log(sectorTimingArray);
        }
    });

    //    ******************Date picker functionality
    date = $("#start_date_form1 , #end_date_form1 ");
    var start = $("#start_date_form1");
    var end = $("#end_date_form1");
    var nights = $("#nights");
    //    Cut off terms is used in form 6 while displaying modal and initialized here
    var cutOffTerms = [];
    var hotelNameArray = [];
    var islandName = [];
    var amountForm6 = [];
    var ExtraAWB = [];
    var ExtraCNB = [];
    var ExtraCWB = [];
    var additionalPriceGST = [];
    var BasePriceGST = [];
    var mealPlanPrice = [];

    var roomCategoryArray = [];
    //   Invokes on change in start date of end date 
    start.change(function() {
        if (!(new URL(location.href)).searchParams.get("voucher")) {
            $(".CheckInForm41").each(function() {
                $(this).val(start.val());
            });
        }

    });



    date.change(function() {
        if (end.val() != "" && start.val() != "") {
            console.log("date picked from bootstrap is");
            console.log(start.val());
            console.log($("#start_date_form1").val());
            console.log(new Date($("#start_date_form1").val()));
            console.log(new Date($("#start_date_form1").val()).toISOString().slice(0, 19).replace('T', ' '));
            var nightsdifference = dateDiff(start.val(), end.val());
            console.log(nightsdifference);
            nights.val(parseInt(nightsdifference));
        }
    });
    $(document).on("change", ".CheckInForm41 , .CheckOutForm41", function() {
        var startForm41 = $(this).closest(".form41Row").find(".CheckInForm41:first");
        var endForm41 = $(this).closest(".form41Row").find(".CheckOutForm41:first");
        console.log("startDate" + startForm41.val());
        console.log("starendtDate" + endForm41.val());
        var nightsForm41 = $(this).closest(".form41Row").find(".NumberOfNightsForm41:first");
        if (startForm41.val() != "" && endForm41.val() != "") {
            console.log("date picked from bootstrap is");
            console.log(startForm41.val());

            var nightsdifference = dateDiff(startForm41.val(), endForm41.val());
            console.log(nightsdifference);
            nightsForm41.val(parseInt(nightsdifference));
        }
    });

    //   Works on the change of the nights stay field
    $(document).on("change", ".NumberOfNightsForm41", function() {
        var startForm41 = $(this).closest(".form41Row").find(".CheckInForm41:first");
        var endForm41 = $(this).closest(".form41Row").find(".CheckOutForm41:first");
        if (startForm41.val() != "") {
            var someDate = new Date(startForm41.val());
            var numberOfDaysToAdd = parseInt($(this).val());
            someDate.setDate(someDate.getDate() + numberOfDaysToAdd);
            var mm = 1 + parseInt(someDate.getMonth());
            mm = ((mm < 10) ? '0' : '') + mm;
            var dd = someDate.getDate();
            dd = ((dd < 10) ? '0' : '') + dd;
            var yyyy = someDate.getFullYear();
            endForm41.val(mm + '/' + dd + "/" + yyyy);
        }
    });
    nights.change(function() {
        if (start.val() != "") {
            var someDate = new Date(start.val());
            var numberOfDaysToAdd = parseInt($(this).val());
            someDate.setDate(someDate.getDate() + numberOfDaysToAdd);
            var mm = 1 + parseInt(someDate.getMonth());
            mm = ((mm < 10) ? '0' : '') + mm;
            var dd = someDate.getDate();
            dd = ((dd < 10) ? '0' : '') + dd;
            var yyyy = someDate.getFullYear();
            end.val(mm + '/' + dd + "/" + yyyy);
        }
    });
    //   Returns the difference of the dates start and end
    function dateDiff(start, end) {
        var totalTime = 24 * 60 * 60 * 1000;
        start = new Date(start);
        end = new Date(end);
        return Math.round(Math.abs((start.getTime() - end.getTime()) / (totalTime)));
    }
    //    ******************Date picker functionality
    // **************Payment status 
    var paymentStatus = $("#paymentStatus");
    var cutOff = $("#cutOff");
    console.log(cutOff.text());
    paymentStatus.change(function() {
        console.log("payment status");
        console.log(paymentStatus.val());
        if (paymentStatus.val() == "Credit") {
            cutOff.text("Cut of for Confirmation");
        }
        else {
            cutOff.text("Cut of for Payment");
        }

    });
    // **************Payment status 
    // *************Islands Covered
    var portBlair = $("#portBlair");
    var havelock = $("#havelock");
    var diglipur = $("#diglipur");
    var neil = $("#neil");
    var portBlairCarCount = $("#count_car_port");
    var portBlairCoachCount = $("#count_coach_port");
    var portBlairTempoCount = $("#count_tempo_port");
    var havelockCarCount = $("#count_car_have");
    var havelockCoachCount = $("#count_coach_have");
    var diglipurCarCount = $("#count_car_diglipur");
    var diglipurCoachCount = $("#count_coach_diglipur");
    var neilCarCount = $("#count_car_neil");
    var carForm1 = $("#carForm1");
    var coachForm1 = $("#coachForm1");
    var tempoForm1 = $("#tempoForm1");
    var vehicle1 = $("#vehicle_portBlair");
    var vehicle2 = $("#vehicle_havelock");
    var vehicle2 = $("#vehicle_diglipur");
    var vehicle3 = $("#vehicle_neil");
    var nextDefault = $("a[href='#next']");
    nextDefault.attr("id", "nextButtonAll");
    var nextCustom = $("#nextButtonAll");
    console.log("value is");
    console.log(portBlair.val());
//    blockNext(1);

//    $("#firstName1").change(function() {
//
//        console.log("CHANGE TRIGGERED");
//        console.log($(this).val());
//        if ($(this).val() == '') {
////            blockNext(1);
//        }
//        else {
////            blockNext(0);
//        }
//    }).trigger("change");
    function blockNext(value) {
        if (value == 1) {
            nextCustom.attr("href", "javascript:void(0)");
            nextCustom.attr("style", "cursor:not-allowed");
            nextCustom.attr("title", "Fix name and nights");
        }
        if (value == 0) {
            nextCustom.attr("href", "#next");
            nextCustom.attr("style", "");
            nextCustom.attr("title", "");
        }
    }
    var totalSumForm1Nights = 0;
    $("#nights , #portBlairNights , #havelockNights , #neilIslandNights , #diglipurNights").change(function() {
        totalSumForm1Nights = 0;
        totalSumForm1Nights = parseInt($("#portBlairNights").val() != "" ? $("#portBlairNights").val() : 0) + parseInt($("#havelockNights").val() != "" ? $("#havelockNights").val() : 0) + parseInt($("#neilIslandNights").val() != "" ? $("#neilIslandNights").val() : 0) + parseInt($("#diglipurNights").val() != "" ? $("#diglipurNights").val() : 0);
        if (parseInt($("#nights").val()) == totalSumForm1Nights) {
            blockNext(0);
        }
        else {
            blockNext(1);
        }
        console.log(parseInt($("#nights").val()));
        console.log("total");
        console.log(totalSumForm1Nights);
    });
    $("#portBlairNights , #havelockNights , #neilIslandNights , #diglipurNights").keyup(function() {


        if ($(this).attr("id") == "portBlairNights" && parseInt($(this).val()) > 0) {
            $("#portBlair").prop("checked", true);
            $("#portBlair").trigger("change");
        }
        else if ($(this).attr("id") == "portBlairNights" && parseInt($(this).val()) < 1) {
            $("#portBlair").prop("checked", false);
            $("#portBlair").trigger("change");
        }
        if ($(this).attr("id") == "havelockNights" && parseInt($(this).val()) > 0) {
            $("#havelock").prop("checked", true);
            $("#havelock").trigger("change");
        }
        else if ($(this).attr("id") == "havelockNights" && parseInt($(this).val()) < 1) {
            $("#havelock").prop("checked", false);
            $("#havelock").trigger("change");
        }
        if ($(this).attr("id") == "neilIslandNights" && parseInt($(this).val()) > 0) {
            $("#neil").prop("checked", true);
            $("#neil").trigger("change");
        }
        else if ($(this).attr("id") == "neilIslandNights" && parseInt($(this).val()) < 1) {
            $("#neil").prop("checked", false);
            $("#neil").trigger("change", true);
        }
        if ($(this).attr("id") == "diglipurNights" && parseInt($(this).val()) > 0) {
            $("#diglipur").prop("checked", true);
            $("#diglipur").trigger("change");
        }
        else if ($(this).attr("id") == "diglipurNights" && parseInt($(this).val()) < 1) {
            $("#diglipur").prop("checked", false);
            $("#diglipur").trigger("change");
        }

    });
    
    
    $("#noOfAdultsDbl , #extraAdult , #extraChildWith, #extraChildWM, #infant24, #infant2, #SingleOccupancy, #SingleOccFamily").keyup(function() {
            console.log("keyUp");

        if ($(this).attr("id") == "noOfAdultsDbl") {
                if(($("#noOfAdultsDbl").val()!="" && $("#noOfAdultsDbl").val()!=0)){
                      $("#noOfAdultsDblRate").prop("disabled",false);
                }
                else {
            $("#noOfAdultsDblRate").val("");
            $("#noOfAdultsDblRate").prop("disabled",true);
        }
                  
        }
        
        if ($(this).attr("id") == "extraAdult" ) {
                if(($("#extraAdult").val()!="" && $("#extraAdult").val()!=0)){
                     $("#ExtraAdultRate").prop("disabled",false);
                }
                else {
            $("#ExtraAdultRate").val("");
            $("#ExtraAdultRate").prop("disabled",true);
        }
                   
        }
        
        if ($(this).attr("id") == "extraChildWith" ) {
                
                   if($("#extraChildWith").val()!="" && $("#extraChildWith").val()!=0){
                       $("#extraChildWithRate").prop("disabled",false);
                   }
                   else {
            $("#extraChildWithRate").val("");
            $("#extraChildWithRate").prop("disabled",true);
        }
        
        }
        if ($(this).attr("id") == "extraChildWM" ) {
            if($("#extraChildWM").val()!="" && $("#extraChildWM").val()!=0){
                 $("#extraChildWMRate").prop("disabled",false);
            }
            else {
            $("#extraChildWMRate").val("");
            $("#extraChildWMRate").prop("disabled",true);
        }
                   
        }
        
        if ($(this).attr("id") == "infant24" ) {
         if($("#infant24").val()!="" && $("#infant24").val()!=0){
                 $("#infant24Rate").prop("disabled",false);
        }
        else {
            $("#infant24Rate").val("");
            $("#infant24Rate").prop("disabled",true);
         }      
        }
        if ($(this).attr("id") == "infant2" ) {
                if($("#infant2").val()!="" && $("#infant2").val()!=0){
                   
                    $("#infant2Rate").prop("disabled",false);
        }
        else {
            $("#infant2Rate").val("");
            $("#infant2Rate").prop("disabled",true);
        }
        }
        if ($(this).attr("id") == "SingleOccupancy" ) {
          if($("#SingleOccupancy").val()!="" && $("#SingleOccupancy").val()!=0){
                   
                    $("#SingleOccupancyRate").prop("disabled",false);
        }
        else {
            $("#SingleOccupancyRate").val("");
            $("#SingleOccupancyRate").prop("disabled",true);
        }
        }
        if ($(this).attr("id") == "SingleOccFamily") {
         if ($("#SingleOccFamily").val()!="" && $("#SingleOccFamily").val()!=0){
                   
                    $("#SingleOccFamilyRate").prop("disabled",false);
        }
        else {
            $("#SingleOccFamilyRate").val("");
            $("#SingleOccFamilyRate").prop("disabled",true);
        }
        }

    });
    
    
    
    
    
    
    
    
    var firstTime = false;
    if (!(new URL(location.href)).searchParams.get("voucher")) {
        function genearateHotelsForm4(totalLimit) {
            if (!firstTime) {
                if (parseInt($("#portBlairNights").val()) > 0) {
                    $(".form41Row:first").find(".SelectedIslandForm41:first").find("option").each(function() {
                        if ($(this).text == "Port Blair") {
                            $(this).prop("selected", true);
                        }
                    })
                    $(".form41Row:first").find(".NumberOfNightsForm41:first").val($("#portBlairNights").val());
                }
                if (parseInt($("#havelockNights").val()) > 0) {
                    $("#form41add").trigger("click");

                    $(".form41Row:last").find(".SelectedIslandForm41:first").find("option").each(function() {
                        if ($(this).text == "Havelock") {
                            $(this).prop("selected", true);
                        }
                    })
                    $(".form41Row:last").find(".NumberOfNightsForm41:first").val($("#havelockNights").val());
                }
                if (parseInt($("#neilIslandNights").val()) > 0) {
                    $("#form41add").trigger("click");
                    $(".form41Row:last").find(".SelectedIslandForm41:first").find("option").each(function() {
                        if ($(this).text == "Neil Island") {
                            $(this).prop("selected", true);
                        }
                    })
                    $(".form41Row:last").find(".NumberOfNightsForm41:first").val($("#neilIslandNights").val());
                }
                if (parseInt($("#diglipurNights").val()) > 0) {
                    $("#form41add").trigger("click");
                    $(".form41Row:last").find(".SelectedIslandForm41:first").find("option").each(function() {
                        if ($(this).text == "Diglipur") {
                            $(this).prop("selected", true);
                        }
                    });
                    $(".form41Row:last").find(".NumberOfNightsForm41:first").val($("#diglipurNights").val());
                }
                $(".CheckInForm41").each(function() {
                    $(this).trigger("change");
                })
                $(".NumberOfNightsForm41").each(function() {
                    $(this).trigger("change");
                })
            }
        }
    }

    function genearateItenarary(totalLimit) {
        var already = parseInt($(".form5Row").length);
        var newItenarary = totalLimit - already > 0 ? totalLimit - already : 0;
        console.log("already" + already);
        console.log("New to create" + newItenarary);
        var dateInItenarary = "";
        for (var i = 0; i < newItenarary; i++) {
            dateInItenarary = start.val() != "" ? new Date(start.val()) : "";
            if(dateInItenarary!=""){
            dateInItenarary.setDate(dateInItenarary.getDate() + i);
            dateInItenarary = timestampToDate(dateInItenarary);
            console.log("date in tenarary is " + i + "Loop" + dateInItenarary);
            $(".SelectDateForm5").eq(i).val(dateInItenarary);
            }
            $(".form5Add").trigger("click");
        }
        
        dateInItenarary = start.val() != "" ? new Date(start.val()) : "";
        if(dateInItenarary!=""){
        dateInItenarary.setDate(dateInItenarary.getDate() + newItenarary);
        dateInItenarary = timestampToDate(dateInItenarary);
        $(".SelectDateForm5").eq(newItenarary).val(dateInItenarary);
        }       $(".SelectDateForm5").trigger("change");
    }
    //    end disable button next
    showHideDivs();
    //    Keep divs hidden by default
    // TO keep record of the numbers being added
    var islandString = "";
    var vehicleString = "";
    var vehicleCountString = "";
    $(".islandName , .vehicleName , .vehicleCount").trigger("change");
    $(".islandName , .vehicleName , .vehicleCount").change(function() {
        console.log("change triggered vehicle name count");
        showHideDivs();
        showHideNumbers();
        getVehicles();
        getNumbers();
    });
    //    Funtion get vehicles and their number
    function getVehicles() {
        vehicleString = "";
        vehicleCountString = "";
        $(".vehicleName").each(function(index) {
            var vehicleClassName = $(this).attr("class");
            if (this.checked) {
                var vehicleNameID = $(this).attr("id");
                vehicleString += $(this).val() + "###";
                $("[id$=" + vehicleNameID + "]").each(function() {
                    if ("vehicleCount" == $(this).attr("class")) {

                        $(this).show();
                    }
                });
            } else {
                var vehicleNameID = $(this).attr("id");
                vehicleString += '' + "###";
                $("[id$=" + vehicleNameID + "]").each(function() {
                    if ("vehicleCount" == $(this).attr("class")) {
                        $(this).hide();
                    }
                });
            }

        })
        console.log("string vehicle");
        console.log(vehicleString);
    }
    // FUnction update ticket info
    function updateTicketInfo(result) {
        $(".ferryTicketID").each(function(index) {
            $(this).attr("data-id", result[index]);
        });
    }
    //    Funtion get vehicles and their number
    function getNumbers() {
        vehicleCountString = "";
        $(".vehicleCount").each(function(index) {
            vehicleCountString += $(this).val() + "###";
        })
        console.log("vehicle string")
        console.log(vehicleCountString);
    }
    //    Function to show hide input numbers
    function showHideNumbers() {
        $(".vehicleName").each(function(index) {
            var vehicleClassName = $(this).attr("class");
            if (this.checked) {
                var vehicleNameID = $(this).attr("id");
                $("[id$=" + vehicleNameID + "]").each(function() {
                    if ("vehicleCount" == $(this).attr("class")) {
                        $(this).show();
                    }
                });
            } else {
                var vehicleNameID = $(this).attr("id");
                $("[id$=" + vehicleNameID + "]").each(function() {
                    if ("vehicleCount" == $(this).attr("class")) {
                        $(this).hide();
                    }
                });
            }
        })
    }
    //    Function to show hide divs
    function showHideDivs() {
        islandString = "";
        $(".islandName").each(function(index) {
            var classNameIsland = $(this).attr("class");
            if (this.checked) {
                islandString += $(this).val() + "###";
                var islandNameID = $(this).attr("id");
                $("[id$=" + islandNameID + "]").each(function() {
                    if (classNameIsland != $(this).attr("class")) {
                        $(this).show();
                    }
                });
            } else {
                var islandNameID = $(this).attr("id");
                islandString += '' + "###";
                $("[id$=" + islandNameID + "]").each(function() {
                    if (classNameIsland != $(this).attr("class")) {
                        $(this).hide();
                    }
                });
            }
        })
        console.log("island...");
        console.log(islandString);
    }




    // *************Islands Covered
    // Total number of occupants
    function addFieldsForm2() {
        var ExtraAdult = $("#extraAdult").val() != "" ? parseInt($("#extraAdult").val()) : 0;
        var noOfAdultsDbl = $("#noOfAdultsDbl").val() != "" ? parseInt($("#noOfAdultsDbl").val()) : 0;
        var extraChildWM = $("#extraChildWM").val() != "" ? parseInt($("#extraChildWM").val()) : 0;
        var extraChildWith = $("#extraChildWith").val() != "" ? parseInt($("#extraChildWith").val()) : 0;
        var infant24 = $("#infant24").val() != "" ? parseInt($("#infant24").val()) : 0;
        var infant2 = $("#infant2").val() != "" ? parseInt($("#infant2").val()) : 0;
        var SingleOccupancy = $("#SingleOccupancy").val() != '' ? parseInt($("#SingleOccupancy").val()) : 0;
        var SingleOccupancywithfamily = $("#SingleOccFamily").val() != '' ? parseInt($("#SingleOccFamily").val()) : 0;
        var sumOfOccupants = ExtraAdult + noOfAdultsDbl + extraChildWM + extraChildWith + infant24 + infant2 + SingleOccupancywithfamily + SingleOccupancy;
        console.log("sum of occupants is " + sumOfOccupants);
        form2ClickButton(sumOfOccupants);
    }
    ;
    // *************Form 1 ends
    // *************Form 2
    var addButtonF2 = $("#addForm2");
    var hiddenCountF2 = $("#form2count");
    var rowCopy = $(".form2row");
    var section2 = $("#steps-uid-0-p-1");
    var guestNameLabel = $(".guestNameLabel");
    function form2ClickButton(length) {
        var already = $(".form2Row").length;
        var diff = (length - already > 0) ? length - already : 0;
        for (var i = 0; i < diff; i++) {
            addButtonF2.trigger("click");
        }
    }


    addButtonF2.click(function() {
        addNewDiv("form2Row");
        $(".form2Row:last").find("label").each(function() {

            console.log($(this).attr("class"));
            if ($(this).attr("class") == "guestNameLabel") {
                $(this).text("Guest Name " + (parseInt($(this).closest(".form2Row").attr("data-id")) + 1));
            }

        });

        $(".form2row:last").find("input").each(function() {
            console.log("hello");
            console.log($(this));

            $(this).attr("value", '');
            $(this).val('');
            $(this).attr("name", ($(this).attr("name")).replace(/\d+/g, '') + present_index);
            console.log($(this).attr("name"));
        });
    });
    // get value of form 2
    var guestNames = "";
    var guestAges = "";
    function updateF2Added() {
        guestAges = "";
        $(".guestAge").each(function() {
            console.log($(this).val());
            guestAges = $(this).val() != "" ? guestAges + $(this).val() + "###" : guestAges + "###";
        })
        guestNames = "";
        $(".guestName").each(function() {

            console.log($(this).val());
            guestNames = $(this).val() != "" ? guestNames + $(this).val() + "###" : guestNames + "###";
        });
    }
    ;
    $("a[href='#finish']").click(function() {
        var currentID = 0;
        $("section.body").each(function() {
            var currentClass = $(this).attr("class");
            if (currentClass.indexOf("current") > -1) {
                currentID = $(this).attr("id");
                currentID = currentID.replace("steps-uid-0-p-", "");
                //$("#currentFormID").val(parseInt(currentID));
                currentID = parseInt(currentID);
                console.log("Current Integer ID: " + currentID);
            }
        });
        updateF2Added();
        update33F();
        updateForm31();
        updateSpeacialRemark();
        update41();
        update42();
        update5();
        update6();
        if (!(new URL(location.href)).searchParams.get("voucher")) {
            genearateHotelsForm4(totalSumForm1Nights);
        }
        firstTime = true;
        form1Submit(currentID);
        swal({
            title: "Successfully ",
            text: "Updated the data",
            timer: 1200,
            showConfirmButton: false
        });

    });
    nextDefault.click(function() {
        var currentID = 0;
        $("section.body").each(function() {
            var currentClass = $(this).attr("class");
            if (currentClass.indexOf("current") > -1) {
                currentID = $(this).attr("id");
                currentID = currentID.replace("steps-uid-0-p-", "");
                //$("#currentFormID").val(parseInt(currentID));
                currentID = parseInt(currentID) - 1;
                console.log("Current Integer ID: " + currentID);
            }
        });
        addFieldsForm2();
        updateF2Added();
        update33F();
        updateForm31();
        updateSpeacialRemark();
        update41();
        update42();
        update5();
        update6();
        if (!(new URL(location.href)).searchParams.get("voucher")) {
            genearateHotelsForm4(totalSumForm1Nights);
            $(".form2Row:first").find(".guestName:first").val($("#firstName1").val());
        }
        updatePayment();
        console.log("next default clicked");
        firstTime = true;
        form1Submit(currentID);
    });
    // ************* Form 2 ends
    // **************** Form 3
    addButtonF31 = $("#addForm31button");
    hiddenCountF31 = $("#hiddenCountF31");
    addButtonF31.click(function() {
        addNewDiv("form31Row");
    });
    $("#addForm31Departurebutton").click(function() {
        addNewDiv("form31DepartureRow");
    });
    var addButtonF32 = $("#addForm32button");
    hiddenCountF32 = $("#hiddenCountF32");
    addButtonF32.click(function() {
        addNewDiv("form32Row");
        $(".form32Row:last").find("label").each(function() {
            var dataId = parseInt($(this).closest(".form32Row").attr("data-id"));
            console.log($(this).attr("class"));
            if ($(this).attr("class") == "guestName32") {
                $(this).text("Remark " + (dataId + 1));
            }
        });
    });
    function updatePayment() {
        PackageAmount = 0;
        var no0fAdults=$("#noOfAdultsDbl").val()!="" && $("#noOfAdultsDblRate").val()!=""?parseInt($("#noOfAdultsDbl").val())*parseInt($("#noOfAdultsDblRate").val()):0;
        var extraAdult=$("#extraAdult").val()!=""&& $("#ExtraAdultRate").val()!=""?parseInt($("#extraAdult").val())*parseInt($("#ExtraAdultRate").val()):0;
        var extrachild=$("#extraChildWith").val()!=""&& $("#extraChildWithRate").val()!=""?parseInt($("#extraChildWith").val())*parseInt($("#extraChildWithRate").val()):0;
        var extraChildwb=$("#extraChildWM").val()!=""&& $("#extraChildWMRate").val()!=""?parseInt($("#extraChildWM").val())*parseInt($("#extraChildWMRate").val()):0;
        var infant24=$("#infant24").val()!=""&& $("#infant24Rate").val()!=""?parseInt($("#infant24").val())*parseInt($("#infant24Rate").val()):0;
        var infant2=$("#infant2").val()!=""&& $("#infant2Rate").val()!=""?parseInt($("#infant2").val())*parseInt($("#infant2Rate").val()):0;
        var singleOccupancy=$("#SingleOccupancy").val()!=""&& $("#SingleOccupancyRate").val()!=""?parseInt($("#SingleOccupancy").val())*parseInt($("#SingleOccupancyRate").val()):0;
        var singleOccupancyfamily=$("#SingleOccFamily").val()!=""&& $("#SingleOccFamilyRate").val()!=""?parseInt($("#SingleOccFamily").val())*parseInt($("#SingleOccFamilyRate").val()):0;
        
        
        PackageAmount=no0fAdults+extraAdult+extrachild+extraChildwb+infant24+infant2+singleOccupancy+singleOccupancyfamily;
        console.log("packageAmount123..."+PackageAmount);
        $("#PackageAmountForm61").val(PackageAmount).change();
        
        console.log("update package");
    }
    ;
    $(document).on("change", ".formF3check", function() {
        $(".formF3check").each(function() {
            var valueCheckedForm33 = $(this).val();
            if (this.checked) {
                console.log("checked");
                console.log($(this).val());

                var section33 = $(".form33Row").parent();
                if ($('.form33Row[data-id="' + valueCheckedForm33 + '"').length == 0) {
                    console.log("only one present , so making new");
                    section33.append($(".form33Row:first").wrap('<p/>').parent().html());
                    $(".form33Row:first").unwrap();
                    var ValueChecked = $(this).val();
                    console.log(ValueChecked);
                    $(".form33Row:last").attr("style", "");
                    $(".form33Row:last").attr("data-id", ValueChecked);
                    $(".form33Row:last").attr("style", '');
                    $(".form33Row:last").find('.form33FerryName').each(function() {
                        var str = '';
                        for (var i = 0; i < sectorTimingArray.data.length; i++) {
                            sectorTimingArray.data[i]['SectorID'] == ValueChecked ? str += '<option value="' + sectorTimingArray.data[i]['SectorTimingsID'] + '">' + sectorTimingArray.data[i]['Timings'] + '</option>' : '';
                        }
                        $(this).html('');
                        $(this).html(str);

                    });
                    $(".form33Row:last").find("strong").each(function() {
                        if ($(this).attr("id") == "form33Label") {
                            $(this).text(sectorArray.data[parseInt($(".form33Row:last").attr("data-id")) - 1]['Name']);
                        }
                    });
                }
                else {



                }
            }
            else {
                //If unchecked
                $(".form33Row").each(function() {
                    console.log(valueCheckedForm33);
                    console.log("valueCheckedForm33");
                    console.log('$(this).attr("data-id")');
                    console.log($(this).attr("data-id"));
                    if (valueCheckedForm33 == $(this).attr("data-id")) {
                        console.log("inside remove");
                        $(this).remove();
                    }
                });

            }
        })
    });
    var DepartureFlightName = "";
    var DepartureflightNumberForm3 = "";
    var DepartureTime = "";
    var ArrivalTime = "";
    var ArrivalFlightName = "";
    var ArrivalflightNumberForm3 = "";
    var SpeacialRemark = "";
    function updateForm31() {
        console.log("inside change funciton");
        DepartureFlightName = "";
        DepartureflightNumberForm3 = "";
        DepartureTime = "";
        ArrivalTime = "";
        ArrivalFlightName = "";
        ArrivalflightNumberForm3 = '';
        $(".departure-time-form3").each(function() {
            DepartureTime += $(this).val() != "" ? $(this).val() + "###" : "###";
        })
        $(".departure-flight-form3").each(function() {
            DepartureFlightName += $(this).val() != "" ? $(this).val() + "###" : "###";
        })
        $(".DepartureflightNumberForm3").each(function() {
            DepartureflightNumberForm3 += $(this).val() != "" ? $(this).val() + "###" : "###";
        })
        $(".arrival-flight-form3").each(function() {
            ArrivalFlightName += $(this).val() != "" ? $(this).val() + "###" : "###";
        })
        $(".ArrivalflightNumberForm3").each(function() {
            ArrivalflightNumberForm3 += $(this).val() != "" ? $(this).val() + "###" : "###";
        })
        $(".arrival-time-form3").each(function() {
            ArrivalTime += $(this).val() != "" ? $(this).val() + "###" : "###";
        })
        console.log("DepartureTime");
        console.log(DepartureTime);
        console.log("ArrivalFlightName");
        console.log(ArrivalFlightName);
    }
    ;

    var form33FerryName = "";
    var form33Status = "";
    var from33Sailing = "";
    var ferryTicketID = "";
    function updateSpeacialRemark() {
        SpeacialRemark = "";
        $(".SpeacialRemarkForm3").each(function() {
            SpeacialRemark += $(this).val() != "" ? $(this).val() + "###" : "###";
        });
        console.log("SpeacialRemark");
        console.log(SpeacialRemark);
    }
    ;

    var FerryTicket = "";
    function update33F() {
        form33FerryName = "";
        form33Status = "";
        ferryTicketID = "";
        from33Sailing = "";
        FerryTicket = "";
        $(".formF3check").each(function() {
            var thisVal = $(this).val();
            FerryTicket += this.checked ? $(this).val() + "###" : "###";
            if (this.checked) {
                $(".form33Row").each(function() {
                    if ($(this).attr("data-id") == thisVal && $(this).attr("data-id") != "noshow") {
                        console.log("this is the value");
                        $(this).find(".form33FerryName").each(function() {
                            console.log("children");
                            console.log($(this).val());
                            form33FerryName += $(this).val() != "" ? $(this).val() + "###" : "###";
                        });
                        $(this).find(".form33Status").each(function() {
                            form33Status += $(this).val() != "" ? $(this).val() + "###" : "###";
                        });
                        $(this).find(".ferryTicketID").each(function() {
                            ferryTicketID += $(this).attr("data-id") != "" ? $(this).attr("data-id") + "###" : "###";
                        });
                        $(this).find(".from33Sailing").each(function() {
                            from33Sailing += $(this).val() != "" ? dateToTimestamp($(this).val()) + "###" : "###";
                        });
                    }
                });
            }
            else {
                form33FerryName += "###";
                form33Status += "###";
                ferryTicketID += "###";
                from33Sailing += "###";
            }

        });
    }
    ; //Form 3 check




    var SpeacialRemarkForm3 = "";
    $(".SpeacialRemarkForm3").change(function() {
        SpeacialRemarkForm3 = "";
        $(".SpeacialRemarkForm3").each(function() {
            SpeacialRemarkForm3 += this.checked ? $(this).val() + "###" : "###";
        });
    });
    // ************* Form 3

    // ************* Form 4
    var recheckInVar = 0;
    function hideRecheckin() {
        $(".recheckInAdd").hide();
        $(".recheckInAdd:first").show();
    }
    setTimeout(function(){
        hideRecheckin();
    },2000);
    

    $("#form41add").click(function() {
        addNewDiv("form41Row");
        start.trigger("change");
        hideRecheckin();
    });
    $(document).on("click", ".recheckInAdd", function() {
        if (recheckInVar == 0) {
            $(".recheckInAdd:first").text("Remove ReCheck In");
            var present_index = $(".form41Row").length;
            console.log(present_index);
            var section32 = $(".form41Row").parent();
            $($(".form41Row:first").wrap('<p/>').parent().html()).insertAfter(".form41Row:first");

            $(".SelectedIslandForm41").eq(1).val($(".SelectedIslandForm41:first").val());

            $(".HotelSelectedForm41").eq(1).val($(".HotelSelectedForm41:first").val());

            $(".RoomSelectedForm41").eq(1).val($(".RoomSelectedForm41:first").val());

            console.log("chheckin form 41" + $(".CheckInForm41:first").val() + "");
            $(".MealPlanForm41").eq(1).val($(".MealPlanForm41:first").val() + "");
            $(".CheckInForm41").eq(1).val($(".CheckInForm41:first").val() + "");
            $(".CheckOutForm41").eq(1).val($(".CheckOutForm41:first").val() + "");
            $(".NumberOfNightsForm41").eq(1).val($(".NumberOfNightsForm41:first").val() + "");
            $(".NumberOfRoomsForm41").eq(1).val($(".NumberOfRoomsForm41:first").val() + "");
            $(".NumberOfRoomsForm41").eq(1).val($(".NumberOfRoomsForm41:first").val() + "");
            $(".StatusForm41").eq(1).val($(".StatusForm41:first").val());
            $(".HotelBlockingID_form41").eq(1).val('');

            $(".form41Row:first").unwrap();
            $(".form41Row").eq(1).attr("data-id", present_index + 1);
            $(".form41Row").eq(1).find(".recheckInAdd:first").attr("data-id", present_index + 1);
            $(".hideOnRecheck").eq(2).hide();

        }
        else {
            $(".form41Row").eq(1).remove();
            $(".recheckInAdd:first").text("ReCheck In");
        }
        start.trigger("change");
        hideRecheckin();
        recheckInVar = recheckInVar == 0 ? 1 : 0;
    });
    //    checking for edit mode and collapsing rechecking to 1

    if ((new URL(location.href)).searchParams.get("mode") == "edit") {
        setTimeout(function(){
            var indexMatching = 0;
            $(".form41Row").each(function(index) {
                console.log("inedxx..."+index);
                if(index!=0) {
                    if($(".SelectedIslandForm41").eq(0).val() == $(this).find(".SelectedIslandForm41:first").val() && $(".HotelSelectedForm41").eq(0).val() == $(this).find(".HotelSelectedForm41:first").val() && $(".RoomSelectedForm41").eq(0).val() == $(this).find(".RoomSelectedForm41:first").val()) {
                        if(indexMatching==0){
                            indexMatching = index;
                        }
                        console.log("matchindex...."+indexMatching);
                    }
                    else{
                        console.log("inner else"+indexMatching);
                        console.log("inner else...."+$(".SelectedIslandForm41").eq(0).val());
                        console.log("inner else...."+$(this).find(".SelectedIslandForm41:first").val());
                        console.log("inner else...."+$(".RoomSelectedForm41").eq(0).val());
                        console.log("inner else...."+$(this).find(".RoomSelectedForm41:first").val());
                        console.log("inner else...."+$(".HotelSelectedForm41").eq(0).val());
                        console.log("inner else...."+$(this).find(".HotelSelectedForm41:first").val());
                        
                    }
                }
                else{
                    console.log("outer else"+indexMatching);
                }
                
            });
            
                   if (indexMatching!=0) {

            var inputs="";
            console.log("matchindex removing...."+indexMatching);
        
            var hotelblockingid=$(".HotelBlockingID_form41").eq(indexMatching).val();;
            var checkin1 = $(".CheckInForm41").eq(indexMatching).val();
            var checkout1 = $(".CheckOutForm41").eq(indexMatching).val();
            var numberOfnights = $(".NumberOfNightsForm41").eq(indexMatching).val();
            var NumberOfRooms41 = $(".NumberOfRoomsForm41").eq(indexMatching).val();
            var Status41 = $(".StatusForm41").eq(indexMatching).val();
             var island = $(".SelectedIslandForm41").eq(indexMatching).val();
             var hotel = $(".HotelSelectedForm41").eq(indexMatching).val();
             console.log("hotelsssss"+hotel);
             var meal = $(".MealPlanForm41").eq(indexMatching).val();
             var roomselected = $(".RoomSelectedForm41").eq(indexMatching).val();
            console.log("roomselectedssss"+roomselected);
            $(".form41Row").eq(indexMatching).remove();
            $(".recheckInAdd:first").trigger("click");
            $(".SelectedIslandForm41").eq(1).val(island);
           
            $(".MealPlanForm41").eq(1).val(meal);
//            $(".HotelSelectedForm41").eq(1).remove();
//            $(".RoomSelectedForm41").eq(1).remove();
//           inputs+='<input value="'+hotel+'" class="HotelSelectedForm41">';
//          inputs+='<input value="'+roomselected+'" class="RoomSelectedForm41">';
            $(".HotelBlockingID_form41").eq(1).val(hotelblockingid);
             $(".HotelSelectedForm41").eq(1).val(hotel);
               $(".RoomSelectedForm41").eq(1).val(roomselected);
            $(".CheckInForm41").eq(1).val(checkin1);
            $(".CheckOutForm41").eq(1).val(checkout1);
            $(".NumberOfNightsForm41").eq(1).val(numberOfnights);
            $(".NumberOfRoomsForm41").eq(1).val(NumberOfRooms41);
            $(".NumberOfRoomsForm41").eq(1).val();
            $(".StatusForm41").eq(1).val(Status41);
//            $(".form41Row").eq(1).append(inputs);

        }
 
        },3000);
    }
    function checkInCheck() {
        $(".form41Row").each(function() {
            var dataId = $(this).attr("data-id");
            var checkin = $(this).attr("data-checkin");
            $(this).nextAll(".form41Row").each(function() {
                if ($(this).attr("data-id") == dataId && $(this).attr("data-checkin") != checkin) {
                    $(this).find(".hideOnRecheck").each(function() {
                        $(this).attr("style", "display:none");
                    });

                }
            });
        });
    }
//
//    $(document).on("click", ".recheckInAdd", function() {
////        $(this).closest(".form41Row").attr("");
//        var present_index = $(".form41Row").length;
//        var checkinID = parseInt($(this).closest(".form41Row").attr("data-id"));
//        var cID = parseInt($(".form41Row[data-id='" + checkinID + "']:last").attr("data-checkin"));
//        console.log(present_index);
//        console.log("checkin ID" + cID);
//        console.log($(".form41Row[data-checkin='" + checkinID + "']").wrap('<p/>').parent().html());
//        var section32 = $(".form41Row[data-checkin='" + checkinID + "']").parent();
//
//        $($(".form41Row[data-id='" + checkinID + "']").wrap('<p/>').parent().html()).insertAfter($(".form41Row[data-id='" + checkinID + "']:last").parent());
//        $(".form41Row").each(function() {
//            if ($(this).parent().is("p")) {
//                $(this).unwrap();
//            }
//
//        });
//        $(".form41Row[data-id='" + checkinID + "']:last").attr("data-checkin", cID + 1);
//        $(".form41Row[data-checkin='" + checkinID + "']").next().find(".form41RowDelete").attr("data-id", present_index + 1);
//        $(".form41Row[data-checkin='" + checkinID + "']").next().find(".form41RowDeleteButton").attr("data-id", present_index + 1);
//        $(".form41Row[data-id='" + checkinID + "']:last").find(".form41RowDelete").attr("style", '');
////        $(".form41Row[data-checkin='"+checkinID+"']").next().find("input").each(function(){
////            $(this).val('');
////        });
//        checkInCheck();
//        start.trigger("change");
//    });

    $("#form42Add").click(function() {
        console.log("42clicked");
        addNewDiv("form42Row");
    });
    $(document).on("click", ".form41NewRowButton", function() {
        console.log("form41HotelRow");
        addNewDiv("form41HotelRow");

    });
    var PriceForm42 = "";
    var DescriptionForm42 = "";
    function update42() {
        PriceForm42 = "";
        DescriptionForm42 = "";
        $(".PriceForm42").each(function() {
            PriceForm42 += $(this).val() != "" ? $(this).val() + "###" : "###";
        });
        $(".DescriptionForm42").each(function() {
            DescriptionForm42 += $(this).val() != "" ? $(this).val() + "###" : "###";
        });
    }
    ;
    var StatusForm41 = "";
    var NumberOfRoomsForm41 = "";
    var NumberOfNightsForm41 = "";
    var HotelBlockingID_form41 = "";
    var CheckInForm41 = "";
    var CheckOutForm41 = "";
    var RoomSelectedForm41 = "";
    var AmountUpdatedWithPax = "";
    var MealPlanForm41 = "";
    var HotelSelectedForm41 = "";
    var SelectedIslandForm41 = "";
    var PackageAmount=0;
   // console.log("zero ini....."+PackageAmount );
    function getPaxRateTotal() {
        var noOfAdultsDblR = $("#noOfAdultsDblRate").val() != '' ? parseInt($("#noOfAdultsDblRate").val()) : 0;
        var ExtraAdultR = $("#ExtraAdultRate").val() != '' ? parseInt($("#ExtraAdultRate").val()) : 0;
        var extraChildWMR = $("#extraChildWMRate").val() != '' ? parseInt($("#extraChildWMRate").val()) : 0;
        var extraChildWithR = $("#extraChildWithRate").val() != '' ? parseInt($("#extraChildWithRate").val()) : 0;
        var infant24R = $("#infant24Rate").val() != '' ? parseInt($("#infant24Rate").val()) : 0;
        var infant2R = $("#infant2Rate").val() != '' ? parseInt($("#infant2Rate").val()) : 0;
        var SingleOccupancyR = $("#SingleOccupancyRate").val() != '' ? parseInt($("#SingleOccupancyRate").val()) : 0;
        var SingleOccupancyFamilyR = $("#SingleOccFamilyRate").val() != '' ? parseInt($("#SingleOccFamilyRate").val()) : 0;
        var noOfAdultsDbl = $("#noOfAdultsDbl").val() != '' ? parseInt($("#noOfAdultsDbl").val()) : 0;
        var extraAdult = $("#extraAdult").val() != '' ? parseInt($("#extraAdult").val()) : 0;
        var extraChildWM = $("#extraChildWM").val() != '' ? parseInt($("#extraChildWM").val()) : 0;
        var extraChildWith = $("#extraChildWith").val() != '' ? parseInt($("#extraChildWith").val()) : 0;
        var infant24 = $("#infant24").val() != '' ? parseInt($("#infant24").val()) : 0;
        var infant2 = $("#infant2").val() != '' ? parseInt($("#infant2").val()) : 0;
        var SingleOccupancy = $("#SingleOccupancy").val() != '' ? parseInt($("#SingleOccupancy").val()) : 0;
        var SingleOccupancyFamily = $("#SingleOccFamily").val() != '' ? parseInt($("#SingleOccFamily").val()) : 0;
        return (noOfAdultsDbl * noOfAdultsDblR) + (extraAdult * ExtraAdultR) + (extraChildWMR * extraChildWM) + (extraChildWithR * extraChildWith) + (SingleOccupancy * SingleOccupancyR) + (SingleOccupancyFamily * SingleOccupancyFamilyR) + (infant24 * infant24R) + (infant2 * infant2R);
    }
    
    function getPaxRateTotalForAmount(ExtraAWB , ExtraCNB  , ExtraCWB , PayWOGST , additionalPriceGST , mealPlanPrice , BasePriceGST,numberOfRoomForCalculation) {
//        ExtraAWB, ExtraCNB, ExtraCWB, amountForm6, additionalPriceGST,  mealPlanPrice, BasePriceGST[$(this).val()]
       // ExtraAWB, ExtraCNB, ExtraCWB, amountForm6 , additionalPriceGST , mealPlanPrice , BasePriceGST
        
        ExtraAWB = parseInt(ExtraAWB);
        ExtraCNB = parseInt(ExtraCNB);
        ExtraCWB = parseInt(ExtraCWB);
        PayWOGST = parseInt(PayWOGST);
       var  numberofrooms = parseInt( numberOfRoomForCalculation);
        var noOfAdultsDblR = PayWOGST;
        console.log("PayWogst"+PayWOGST);
        var ExtraAdultR = ExtraAWB;
        console.log("Extra AWB"+ExtraAWB);
        var extraChildWMR = ExtraCWB;
        console.log("ExtraCWB"+ExtraCWB);
        var extraChildWithR = ExtraCNB;
        console.log("ExtraCNb "+ExtraCNB);

        var infant24R = 0;
        var infant2R = 0;
        
        var SingleOccupancyR = 0;
        var SingleOccupancyFamilyR = 0;
//        var SingleOccupancyR = PayWOGST;
//        var SingleOccupancyFamilyR = ExtraAWB;
        
        var noOfAdultsDbl = $("#noOfAdultsDbl").val() != '' ? parseInt($("#noOfAdultsDbl").val()) : 0;
        console.log("noOfAdultsDbl... "+noOfAdultsDbl);
        var extraAdult = $("#extraAdult").val() != '' ? parseInt($("#extraAdult").val()) : 0;
        console.log("extraAdult..."+extraAdult)
        var extraChildWM = $("#extraChildWM").val() != '' ? parseInt($("#extraChildWM").val()) : 0;
        console.log("extraChildWM.."+extraChildWM);
        var extraChildWith = $("#extraChildWith").val() != '' ? parseInt($("#extraChildWith").val()) : 0;
        console.log("extraChildwith.."+extraChildWith);
        var infant24 = $("#infant24").val() != '' ? parseInt($("#infant24").val()) : 0;
        console.log("infant24.."+infant24);
        var infant2 = $("#infant2").val() != '' ? parseInt($("#infant2").val()) : 0;
        console.log("infant2.."+infant2);
        var SingleOccupancy = $("#SingleOccupancy").val() != '' ? parseInt($("#SingleOccupancy").val()) : 0;
        console.log("SingleOccupancy.."+SingleOccupancy);
        var SingleOccupancyFamily = $("#SingleOccFamily").val() != '' ? parseInt($("#SingleOccFamily").val()) : 0;
        console.log("SingleOccupancyFamily..."+SingleOccupancyFamily);
        
        var mealPlanSum = mealPlanPrice * (extraAdult + extraChildWM + extraChildWith + noOfAdultsDbl);
        console.log("meal");
        console.log(mealPlanSum);
        
        
        var baseGST = noOfAdultsDblR*numberofrooms;
        console.log("baseGST");
        console.log(baseGST);
        console.log("child with..."+(extraChildWMR * extraChildWith));
        console.log("child without..."+(extraChildWithR * extraChildWM));
        console.log("Additional price gst..."+(extraChildWithR * extraChildWM));
        var additionalGST = (mealPlanSum + (extraChildWMR * extraChildWith) + (extraChildWithR * extraChildWM) + (extraAdult * ExtraAdultR)) + ((mealPlanSum + (extraChildWMR * extraChildWith) + (extraChildWithR * extraChildWM) + (extraAdult * ExtraAdultR)) * additionalPriceGST /100) ;
        console.log("additionalGST");
        console.log(additionalGST);
        
        return baseGST + additionalGST;
    }
    
    function PackageAmountForm6(ExtraAWB , ExtraCNB  , ExtraCWB , PayWOGST , additionalPriceGST , mealPlanPrice , BasePriceGST,numberOfRoomForCalculation) {
//        ExtraAWB, ExtraCNB, ExtraCWB, amountForm6, additionalPriceGST,  mealPlanPrice, BasePriceGST[$(this).val()]
       // ExtraAWB, ExtraCNB, ExtraCWB, amountForm6 , additionalPriceGST , mealPlanPrice , BasePriceGST
        
      //  ExtraAWB = parseInt(ExtraAWB);
        //ExtraCNB = parseInt(ExtraCNB);
        //ExtraCWB = parseInt(ExtraCWB);
        //PayWOGST = parseInt(PayWOGST);
        var baseGST=parseInt(BasePriceGST);
        
        var noOfAdultsDblR = parseInt(PayWOGST)*parseInt(numberOfRoomForCalculation);
        console.log("package PayWogst"+PayWOGST);
        var ExtraAdultR = parseInt(ExtraAWB);
        console.log("package Extra AWB"+ExtraAWB);
        var extraChildWMR =  parseInt(ExtraCWB);
        console.log("package ExtraCWB"+ExtraCWB);
        var extraChildWithR = parseInt(ExtraCNB);
        
        console.log("package ExtraCNb "+ExtraCNB);
        var meal = parseInt(mealPlanPrice);
//      
//          var infant24R = ExtraCNB;
//        var infant2R = ExtraCNB;
          var numberOfRoom=parseInt(numberOfRoomForCalculation);
        var infant24R = 0;
        var infant2R = 0;
        
        var SingleOccupancyR = 0;
        var SingleOccupancyFamilyR = 0;
//        var SingleOccupancyR = PayWOGST;
//        var SingleOccupancyFamilyR = ExtraAWB;
        
        var noOfAdultsDbl = $("#noOfAdultsDbl").val() != '' ? parseInt($("#noOfAdultsDbl").val()) : 0;
        console.log("noOfAdultsDbl... "+noOfAdultsDbl);
        var extraAdult = $("#extraAdult").val() != '' ? parseInt($("#extraAdult").val()) : 0;
        console.log("extraAdult..."+extraAdult)
        var extraChildWM = $("#extraChildWM").val() != '' ? parseInt($("#extraChildWM").val()) : 0;
        console.log("extraChildWM.."+extraChildWM);
        var extraChildWith = $("#extraChildWith").val() != '' ? parseInt($("#extraChildWith").val()) : 0;
        console.log("extraChildWM.."+extraChildWM);
        var infant24 = $("#infant24").val() != '' ? parseInt($("#infant24").val()) : 0;
        console.log("infant24.."+infant24);
        var infant2 = $("#infant2").val() != '' ? parseInt($("#infant2").val()) : 0;
        console.log("infant2.."+infant2);
        var SingleOccupancy = $("#SingleOccupancy").val() != '' ? parseInt($("#SingleOccupancy").val()) : 0;
        console.log("SingleOccupancy.."+SingleOccupancy);
        var SingleOccupancyFamily = $("#SingleOccFamily").val() != '' ? parseInt($("#SingleOccFamily").val()) : 0;
        console.log("SingleOccupancyFamily..."+SingleOccupancyFamily);
        
        var mealPlanSum = meal * (extraAdult + extraChildWM + extraChildWith + noOfAdultsDbl);
        console.log(" package meal"+mealPlanSum);
        console.log(mealPlanSum);
        
        
        var baseGST = noOfAdultsDblR;
        console.log("package baseGST"+baseGST);
        console.log(baseGST);
        
        var additionalGST = (mealPlanSum + (extraChildWMR * extraChildWM) + (extraChildWithR * extraChildWith) + (extraAdult * ExtraAdultR)) + ((mealPlanSum + (extraChildWMR * extraChildWM) + (extraChildWithR * extraChildWith) + (extraAdult * ExtraAdultR)) * additionalPriceGST /100) ;
        console.log("package additionalGST"+additionalGST);
        console.log(additionalGST);
        var total= baseGST + additionalGST;
        console.log("package total"+total);
        console.log(total);
        return total;
    }
    
    
    function update41() {



        StatusForm41 = "";
        $(".StatusForm41").each(function() {
            StatusForm41 += $(this).val() != "" ? $(this).val() + "###" : "###";
        });
        NumberOfRoomsForm41 = "";
        $(".NumberOfRoomsForm41").each(function() {
            NumberOfRoomsForm41 += $(this).val() != "" ? $(this).val() + "###" : "###";
        });
        NumberOfNightsForm41 = "";
        $(".NumberOfNightsForm41").each(function() {
            NumberOfNightsForm41 += $(this).val() != "" ? $(this).val() + "###" : "###";
        });
        HotelBlockingID_form41 = "";
        $(".HotelBlockingID_form41").each(function() {
            HotelBlockingID_form41 += $(this).val() != "" ? $(this).val() + "###" : "###";
        });
        CheckInForm41 = "";
        $(".CheckInForm41").each(function() {
            CheckInForm41 += $(this).val() != "" ? dateToTimestamp($(this).val()) + "###" : "###";
        });
        CheckOutForm41 = "";
        $(".CheckOutForm41").each(function() {
            CheckOutForm41 += $(this).val() != "" ? dateToTimestamp($(this).val()) + "###" : "###";
        });
        MealPlanForm41 = "";
        $(".MealPlanForm41").each(function() {
            MealPlanForm41 += $(this).val() != "" ? $(this).val() + "###" : "###";
        });
        HotelSelectedForm41 = "";
        $(".HotelSelectedForm41").each(function() {
            HotelSelectedForm41 += $(this).val() != "" ? $(this).val() + "###" : "###";
        });
        SelectedIslandForm41 = "";
        $(".SelectedIslandForm41").each(function() {
            SelectedIslandForm41 += $(this).val() != "" ? $(this).val() + "###" : "###";
        });
        RoomSelectedForm41 = "";
        AmountUpdatedWithPax = 0;
        PackageAmount=0;
        $(".RoomSelectedForm41").each(function(index) {
            RoomSelectedForm41 += $(this).val() != "" ? $(this).val() + "###" : "###";
            //var numberOfNightsForm41ForCalculation = $(".NumberOfNightsForm41").eq(index).val();
            var numberOfNightsForm41ForCalculation = $(".NumberOfNightsForm41").eq(index).val()!=""?parseInt($(".NumberOfNightsForm41").eq(index).val()):0;
            var numberOfRoomForCalculation = $(".NumberOfRoomsForm41").eq(index).val()!=""?parseInt($(".NumberOfRoomsForm41").eq(index).val()):0;
            console.log("number of nights");
            console.log(numberOfNightsForm41ForCalculation);
                        
            AmountUpdatedWithPax += ((getPaxRateTotalForAmount(ExtraAWB[$(this).val()] , ExtraCNB[$(this).val()] , ExtraCWB[$(this).val()] , amountForm6[$(this).val()] , additionalPriceGST[$(this).val()]  ,  mealPlanPrice[$(this).val()] , BasePriceGST[$(this).val()],numberOfRoomForCalculation)))  * numberOfNightsForm41ForCalculation  + "###" ;
            PackageAmount += (PackageAmountForm6(ExtraAWB[$(this).val()] , ExtraCNB[$(this).val()] , ExtraCWB[$(this).val()] , amountForm6[$(this).val()] , additionalPriceGST[$(this).val()]  ,  mealPlanPrice[$(this).val()] , BasePriceGST[$(this).val()],numberOfRoomForCalculation) * numberOfNightsForm41ForCalculation)   ;
            console.log("Amount updated with pax...."+AmountUpdatedWithPax);
            console.log("Package Amount...."+PackageAmount);
            console.log(PackageAmount);
        });
    }
    
    $("#saveAndGenerate").click(function() {
        console.log("Button Clicked");
        var currentID = 3;

        addFieldsForm2();
        updateF2Added();
        update33F();
        updateForm31();
        updateSpeacialRemark();
        update41();
        update42();
        update5();
        update6();
        if (!(new URL(location.href)).searchParams.get("voucher")) {
            genearateHotelsForm4(totalSumForm1Nights);
            $(".form2Row:first").find(".guestName:first").val($("#firstName1").val());
        }
        updatePayment();
        console.log("next default clicked");
        firstTime = true;
        form1Submit(currentID);
        generateBlockingRequest(3);
    });
    $(document).on("click", "#save , .save", function() {

        var currentID = 0;
        $("section.body").each(function() {
            var currentClass = $(this).attr("class");

            if (currentClass.indexOf("current") > -1) {
                currentID = $(this).attr("id");
                currentID = currentID.replace("steps-uid-0-p-", "");
                //$("#currentFormID").val(parseInt(currentID));
                currentID = parseInt(currentID);
                console.log("Current Integer ID: " + currentID);
            }
        });
        updateF2Added();
        update33F();
        updateForm31();
        updateSpeacialRemark();
        update41();
        update42();
        update5();
        update6();
        if (!(new URL(location.href)).searchParams.get("voucher")) {

            genearateHotelsForm4(totalSumForm1Nights);
        }
        firstTime = true;
        form1Submit(currentID);
        swal({
            title: "Successfully",
            text: "Updated the data",
            timer: 1200,
            showConfirmButton: false
        });
    });

    // ************   Form 4 ui

    //            Select island for form 4


    $('body').on('change', ".SelectedIslandForm41", function() {
        var hotelName = $(this).closest(".form41Row").find(".HotelSelectedForm41");
        var categoryName = $(this).closest(".form41Row").find(".RoomSelectedForm41");
        console.log($(this).val());
        console.log($(this).closest(".form41Row").attr("data-id"));
        console.log(hotelName.html());
        if ($.trim($(this).val()) != "Select") {
            hotelName.prop("disabled", false);
            $.ajax({
                url: "php/hotels.php",
                type: 'GET',
                data: {
                    id: $(this).val()
                },
                dataType: "JSON",
                success: function(result) {
                    console.log(result);
                    var str = '<option value="">Select</option>';
                    for (var i = 0; i < result.data.length; i++) {
                        str += '<option value="' + result.data[i]['HotelID'] + '">' + result.data[i]['HotelName'] + '</option>';
                        cutOffTerms[result.data[i]['HotelID']] = result.data[i]['PaymentTerms'];
                        hotelNameArray[result.data[i]['HotelID']] = result.data[i]['HotelName'];
                    }
                    hotelName.html(str);
                    //                    ****For editing
                    if (typeof AccomodationInfoForm4 !== 'undefined') {
                        for (var i = 0; i < AccomodationInfoForm4.length; i++) {
                            $(".form41Row").each(function() {
                                if ($(this).attr("data-id") == i) {
                                    console.log("xxxnnnxxx");
                                    $(this).find(".HotelSelectedForm41:first").children().each(function() {
                                        console.log("zzzzxxxxxzzzz");
                                        console.log("zzzzzzzz $(this).val()");
                                        console.log($(this).val());
                                        console.log("xxxxxxxx AccomodationInfoForm4[i].HotelSelected");
                                        console.log(AccomodationInfoForm4[i].HotelSelected);
                                        if ($(this).val() == AccomodationInfoForm4[i].HotelSelected) {
                                            $(this).prop("selected", true);
                                            $(this).closest(".HotelSelectedForm41").trigger("change");
                                        }

                                    });

                                }
                            });
                        }

                    }
                }
            });
        }
        else {
            hotelName.prop("disabled", true);
            categoryName.prop("disabled", true);
        }

    });
    //            Select hotel for form 4

    $('body').on('change', ".HotelSelectedForm41", function() {
        var categoryName = $(this).closest(".form41Row").find(".RoomSelectedForm41");
        console.log($(this).val());
        if ($.trim($(this).val()) != "Select") {
            console.log($(this).val());
            categoryName.prop("disabled", false);
            $.ajax({
                url: "php/hotels.php",
                type: 'GET',
                data: {
                    hotel_info_id: $(this).val()
                },
                dataType: "JSON",
                success: function(result) {
                    console.log("hello");
                    console.log(result);
                    var str = '<option value="">Select</option>';
                    for (var i = 0; i < result.data.length; i++) {
                        str += '<option value="' + result.data[i]['HotelInfoID'] + '">' + result.data[i]['RoomCat'] + '</option>';
                        roomCategoryArray[result.data[i]['HotelInfoID']] = result.data[i]['RoomCat'];
                        amountForm6[result.data[i]['HotelInfoID']] = parseInt(result.data[i]['PayWOGST']) + Math.round(result.data[i]['PayWOGST'] * result.data[i]['BasePriceGST'] / 100);
                        additionalPriceGST[result.data[i]['HotelInfoID']] = parseInt(result.data[i]['AddonPriceGST']);
                        BasePriceGST[result.data[i]['HotelInfoID']] = parseInt(result.data[i]['BasePriceGST']);
                        
                        ExtraAWB[result.data[i]['HotelInfoID']] = parseInt(result.data[i]['ExtraAWB']);
                        ExtraCNB[result.data[i]['HotelInfoID']] = parseInt(result.data[i]['ExtraCNB']);
                        ExtraCWB[result.data[i]['HotelInfoID']] = parseInt(result.data[i]['ExtraCWB']);
                        
                        mealPlanPrice[result.data[i]['HotelInfoID']] = parseInt(result.data[i]['MealPlan']);
                    }
                    categoryName.html(str);
                    //                    ************This is for the edit part only
                    if (typeof AccomodationInfoForm4 !== 'undefined') {
                        for (var i = 0; i < AccomodationInfoForm4.length; i++) {
                            $(".form41Row").each(function() {
                                if ($(this).attr("data-id") == i) {
                                    console.log("xxxnnnxxx");
                                    $(this).find(".RoomSelectedForm41:first").children().each(function() {
                                        if ($(this).val() == AccomodationInfoForm4[i].RoomSelected) {
                                            $(this).prop("selected", true);
                                        }
                                    });

                                }
                            });
                        }

                    }
                }
            });
            (function() {
                $(".summernote:not(:first)").each(function() {
                    $(this).summernote();
                });
            })();
            console.log("categoryName");
            console.log(categoryName);
        }
        else {
            categoryName.prop("disabled", true);
        }

    });
    // ************   Form 4 ui
    // ************ Form 4 during edit time

    if (typeof AccomodationInfoForm4 !== 'undefined') {
        $(".SelectedIslandForm41").trigger("change");
    }
    // ************* Form 4 end

    // ************* Form 5 start
    $(".form5Add").click(function() {
        addNewDiv("form5Row");
        var dataId = $(".form5Row:last").attr("data-id");
        //        $(".form5Row:last").find(".summernote").summernote("destroy");
        //        $(".form5Row:last").find(".summernote");
        //        $(".form5Row:last").find(".summernote").attr("id", "d" + dataId).summernote('destroy');

        $(".form5Row:last").find(".dayOnTheDate");
        $(".form5Row:last").find(".dayOnTheDate").html('');
        
        $(".form5Row:last").find(".summernote");
        $(".form5Row:last").find(".summernote").html('');
        $(".form5Row:last").remove('.card');

        var str = '';

        str += '<div class="card">' + '<div class="card-block">' + '<div class="summernote" id="d"' + dataId + '>' + '<h3>Paste Itinerary Here...</h3>' + '</div></div></div>';
        $(".form5Row:last").find("detailedItinearary").append(str);
        $(".form5Row:last").find(".summernote").summernote();
        $(".form5Row:last").find(".note-editor:last").remove();


    });
    var SelectDateForm5 = "";
    var RemarkForm5 = "";
    var SelectedIslandForm5="";
    var BriefItenararyForm5 = "";
    var summernote = "";
    function update5() {
        if (!(new URL(location.href)).searchParams.get("voucher")) {
            genearateItenarary(parseInt($("#nights").val()) + 1);
        }
        console.log("Update 5 called");
        SelectDateForm5 = "";
        RemarkForm5 = "";
        BriefItenararyForm5 = "";
        summernote = "";
        SelectedIslandForm5="";
        $(".form5Row").each(function() {
            console.log("inside fomr 5");
            console.log($(this).find(".SelectDateForm5").val());
            SelectDateForm5 += $(this).find(".SelectDateForm5").val() != "" ? dateToTimestamp($(this).find(".SelectDateForm5").val()) + "###" : "###";
            SelectedIslandForm5 += $(this).find(".SelectedIslandForm5").val() != "" ? $(this).find(".SelectedIslandForm5").val() + "###" : "###";
            RemarkForm5 += $(this).find(".RemarkForm5").val() != "" ? $(this).find(".RemarkForm5").val() + "###" : "###";
            BriefItenararyForm5 += $(this).find(".BriefItenararyForm5").val() != "" ? $(this).find(".BriefItenararyForm5").val() + "###" : "###";
            summernote += $(this).find(".summernote").summernote("code") != "" ? $(this).find(".summernote").summernote("code") + "###@@@###@@@###" : "###@@@###@@@###";
        });
        console.log(SelectDateForm5);
        console.log("select island form.........."+SelectedIslandForm5);
        console.log(RemarkForm5);
        console.log(BriefItenararyForm5);
        console.log(summernote);
    }
    // ************* FOrm 5 ends
    // ************* FOrm 6 starts
    $("#addForm62").click(function() {
        addNewDiv("form62Row");
    });
    var DateOfPaymentForm6 = "";
    var ConfirmationViaForm6 = "";
    var PaymentAmountForm6 = "";
    var TDSCutForm6 = "";
    function update6() {
        DateOfPaymentForm6 = "";
        ConfirmationViaForm6 = "";
        PaymentAmountForm6 = "";
        TDSCutForm6 = "";
        $(".form62Row").each(function() {
            console.log("inside fomr 5");
            console.log($(this).find(".SelectDateForm5").val());
            DateOfPaymentForm6 += $(this).find(".DateOfPaymentForm62").val() != "" ? dateToTimestamp($(this).find(".DateOfPaymentForm62").val()) + "###" : "###";
            ConfirmationViaForm6 += $(this).find(".ConfirmationViaForm62").val() != "" ? $(this).find(".ConfirmationViaForm62").val() + "###" : "###";
            PaymentAmountForm6 += $(this).find(".PaymentAmountForm62").val() != "" ? $(this).find(".PaymentAmountForm62").val() + "###" : "###";
            TDSCutForm6 += $(this).find(".TDSCutForm62").val() != "" ? $(this).find(".TDSCutForm62").val() + "###" : "###";
        });
        console.log(DateOfPaymentForm6);
        console.log(ConfirmationViaForm6);
        console.log(PaymentAmountForm6);
        console.log(TDSCutForm6);
    }
    $(document).on("change", "#PackageAmountForm61, .TDSCutForm62 ,  .PaymentAmountForm62,#GSTIncludedForm61", function() {
        updateDiscrepancy();
    });
    $(".TDSCutForm62").trigger("change");
    function updateDiscrepancy() {
        console.log("inside update");
        var gst=$("#GSTIncludedForm61").val();
        
        var packageAmount = $("#PackageAmountForm61").val() != "" ? parseInt($("#PackageAmountForm61").val()) : 0;
        if(gst=="No")
            {
               packageAmount+=(packageAmount*5/100);
            }
        var finalAmountWithGST = $("#PackageAmountForm61").val() != "" ? $("#PackageAmountForm61").val() : 0;
        var TDS = 0;
        var paymentAmount = 0;
        var Discrepancy = 0;
        var valueToceil=0
        $(".TDSCutForm62").each(function() {
            TDS += $(this).val() != "" ? parseInt($(this).val()) : 0;
        });
        $(".PaymentAmountForm62").each(function() {
            paymentAmount += $(this).val() != "" ? parseInt($(this).val()) : 0;
        });
        valueToceil = (paymentAmount + TDS) - packageAmount;
        Discrepancy=Math.ceil(valueToceil);
        console.log(paymentAmount);
        console.log(TDS);
        if (Discrepancy) {
            $("#DiscrepancyForm61").val(Discrepancy);
            console.log("Sum");
            $("#DiscrepencyAmount").text(Discrepancy);
            console.log(Discrepancy);
        }
        else {
            $("#DiscrepencyAmount").text("N.A");
        }

    }
    $("#roomPaymentForm6").click(function() {
        console.log(cutOffTerms);
        console.log(amountForm6);
        roomPaymentStatus();
    });
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
    $("#AgentForm61").change(function() {
        console.log("change triggered");
        getAgentFileHandler();
    });
    $("#DataType").change(function() {
        console.log($(this).val())
        if ($(this).val() == 2) {
            $("#agentForm6Modal").hide();
        }
        else {
            $("#agentForm6Modal").attr("style", "");
            $("#agentForm6Modal").show();
        }
    });
    $("#addFttModalForm6").click(function() {
        $("#FileHandlerName").val("");
    });
    // ************* FOrm 6 ends
    // commen function to add a new div
    function formatDate(nowDate) {
        nowDate = new Date(nowDate);
        return nowDate.getDate() + "/" + nowDate.getMonth() + '/' + nowDate.getFullYear();
    }

    $("#addForm6Modal").click(function() {
        addFileHandlerForm6();
    });
    $("#DataType").html()
    getDataType(2);
    getAgentFileHandler();
    function addNewDiv(ClassName) {
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
    //    The delete button on every step is working from this don't remove the classes or anything they are working in systematic way
    $('body').on("click", ".form41RowDeleteButton , .form2RowDeleteButton , .form31RowDeleteButton , .form42RowDeleteButton  , .form62RowDeleteButton, .form32RowDeleteButton , .form5RowDeleteButton , .form31DepartureRowDeleteButton , .recheckinRowDeleteButton", function() {
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
    // commen function ends
    function form1Submit(currentID) {
        //alert(currentID);
        /*str11= $("#PackageName4").val();
         package=str11.replace("'","''");
         console.log("pakage111 "+);*/
        $.ajax({
            url: "php/voucher-common-api.php",
            type: 'POST',
            data: {
                currentFormID: currentID,
                GuestName: $("#firstName1").val(),
                Arrival: $("#start_date_form1").val() != "" ? dateToTimestamp($("#start_date_form1").val()) : "",
                Departure: $("#end_date_form1").val() != "" ? dateToTimestamp($("#end_date_form1").val()) : "",
                PaymentStatus: $("#paymentStatus").val(),
                PortBlairNights: $("#portBlairNights").val(),
                HavelockNights: $("#havelockNights").val(),
                NeilIslandNights: $("#neilIslandNights").val(),
                DiglipurNights: $("#diglipurNights").val(),
                TotalNights: $("#nights").val(),
                CutOff: $("#cutOffInput").val() != "" ? dateToTimestamp($("#cutOffInput").val()) : "",
                Occupancy: $("#noOfAdultsDbl").val(),
                ExtraAdult: $("#extraAdult").val(),
                ExtraChild: $("#extraChildWM").val(),
                ExtraChildWithMat: $("#extraChildWith").val(),
                Infant: $("#infant24").val(),
                InfantUnder2: $("#infant2").val(),
                SingleOccupancy: $("#SingleOccupancy").val(),
                Islands: islandString,
                Vehicles: vehicleString,
                VehicleCount: vehicleCountString,
                GuestAges: guestAges,
                GuestNames: guestNames,
                ContactNumber: $("#contactNumber").val(),
                DepartureFlightName: DepartureFlightName,
                DepartureflightNumber: DepartureflightNumberForm3,
                DepartureTime: DepartureTime,
                ArrivalTime: ArrivalTime,
                ArrivalflightNumber: ArrivalflightNumberForm3,
                ArrivalFlightName: ArrivalFlightName,
                SpeacialRemark: SpeacialRemark,
                FerryTicket: FerryTicket,
                SailingDate: from33Sailing,
                FerryName: form33FerryName,
                Status: form33Status,
                ferryTicketID: ferryTicketID,
                StatusF4: StatusForm41,
                NumberOfRooms: NumberOfRoomsForm41,
                NumberOfNights: NumberOfNightsForm41,
                HotelBlockingID: HotelBlockingID_form41,
                CheckIn: CheckInForm41,
                CheckOut: CheckOutForm41,
                RoomSelected: RoomSelectedForm41,
                AmountUpdatedWithPax: AmountUpdatedWithPax,
                MealPlan: MealPlanForm41,
                HotelSelected: HotelSelectedForm41,
                SelectedIsland: SelectedIslandForm41,
                Price: PriceForm42,
                Description: DescriptionForm42,
                SelectDate: SelectDateForm5,
                islanditinerary:SelectedIslandForm5,
                Remark: RemarkForm5,
                BriefItenarary: BriefItenararyForm5,
                DetailedItenarary: summernote,
                Agent: $("#AgentForm61").val(),
                FileHandlerFTT: $("#FileHandlerForm61").val(),
                FileHandlerAgent: $("#FileHandlerAgentForm61").val(),
                PackageAmount: $("#PackageAmountForm61").val(),
                GSTIncluded: $("#GSTIncludedForm61").val(),
                PaymentTerms: $("#PaymentTermsForm61").val(),
                FileReferenceNumber: $("#FileReferenceNumberForm61").val(),
                AdditionalPayement: $("#AdditionalPaymentForm61").val(),
                DueBy: $("#DueByForm61").val() != "" ? dateToTimestamp($("#DueByForm61").val()) : "",
                Status6: $("#StatusForm61").val(),
                Discrepancy: $("#DiscrepancyForm61").val(),
                DateOfPayment: DateOfPaymentForm6,
                ConfirmationVia: ConfirmationViaForm6,
                PaymentAmount: PaymentAmountForm6,
                TDSCut: TDSCutForm6,
                OccupancyRate: $("#noOfAdultsDblRate").val(),
                ExtraAdultRate: $("#ExtraAdultRate").val(),
                ExtraChildRate: $("#extraChildWMRate").val(),
                ExtraChildWithMatRate: $("#extraChildWithRate").val(),
                InfantRate: $("#infant24Rate").val(),
                InfantUnder2Rate: $("#infant2Rate").val(),
                SingleOccupancyRate: $("#SingleOccupancyRate").val(),
                SingleOccFamily: $("#SingleOccFamily").val(),
                SingleOccFamilyRate: $("#SingleOccFamilyRate").val(),
                PackageName4: $("#PackageName4").val()

            },
            dataType: "JSON",
            success: function(result) {
                console.log("result is here");
                console.log(result);
            }
        });
    }
    function addFileHandlerForm6() {
        console.log($("#FileHandlerName").val());
        if ($("#DataType").val() == 2) {
            console.log("inside file handler 2");
            
            $("#waitForm6").attr("style", "");
            $.ajax({
                url: "commons/add-common.php",
                type: 'POST',
                data: {
                    status: "addFileHandler",
                    DataType: $("#DataType").val(),
                    FileHandlerName: $("#FileHandlerName").val()
                },
                success: function(result) {
                    $("#waitForm6").attr("style", "display:none");
                    $("#successForm6").attr("style", "");

                    getDataType(2);
                    setTimeout(function() {
                        
                    
                    }, 1000);
                    console.log("result is here");
                    console.log(result);
                swal({
                    title: "Successfully",
                    text: "Updated the data",
                    timer: 1500,
                    showConfirmButton: false
                });
                   $("#close6Modalclose").trigger("click");
                
                }
            });
            //$("#close6Modal").click();
          
        }
        else {
            
            console.log("inside file handler");
            $("#waitForm6").attr("style", "");
            $.ajax({
                url: "commons/add-common.php",
                type: 'POST',
                data: {
                    status: "addFileHandlerAgent",
                    AgentName: $("#AgentListModal").val(),
                    FileHandlerName: $("#FileHandlerName").val()
                },
                success: function(result) {
                    $("#waitForm6").attr("style", "display:none");
                    $("#successForm6").attr("style", "");
                    console.log("result is 22222222");
//                    jQuery("#close6Modalclose").trigger("click");
//                    jQuery('#exampleModal').modal('hide');
//                    jQuery('.modal').modal('hide');
                    
                    getAgentFileHandler();
                    setTimeout(function() {
//                        console.log("result is here11111111");
//                        $("#close6Modalclose").trigger("click");
//                        $('#exampleModal').modal('hide');
//                        $('.modal').modal('hide');
//                        jQuery("#close6Modalclose").trigger("click");
//                        jQuery('#exampleModal').modal('hide');
//                        jQuery('.modal').modal('hide');
                    }, 1000);
                    
                  
                    //$("#close6Modalclose").trigger("click");
                    //$('#exampleModal').modal('hide');
                swal({
                    title: "Successfully",
                    text: "Updated the data",
                    timer: 1500,
                    showConfirmButton: false
                });
                 $("#close6Modalclose").trigger("click");
                //$('#exampleModal').modal('hide');
                
                //jQuery('#close6Modalclose')[0].click();
                
                  //$("#close6Modalclose").trigger("click");
                    console.log("result is here44444444");
                    console.log(result);
                }
                
            });
           
        }

    }
    function generateBlockingRequest(currentID) {
        console.log("inside function ajax");
        console.log("hotelName is");
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            dataType: "JSON",
            data: {
                status: "getVocherID"
            },
            success: function(result) {

                window.open("hotel-room-blocking.php?voucher=" + result, "_blank");
            }
        });

    }
//    testing comment

//    testing comment
    $("#serviceConfirmation , #roomBlockingConfirmed , #generateInvoice").click(function() {
        var clicked = $(this).attr("id");
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            dataType: "JSON",
            data: {
                status: "getVocherID"
            },
            success: function(result) {
                if (clicked == "serviceConfirmation") {
                    $.ajax({
                        url: "php/hotels.php",
                        type: 'POST',
                        dataType: "JSON",
                        data: {
                            status: "client-service-confirmation",
                            start_date: dateToTimestamp(start.val())
                        },
                        success: function(result) {
                            window.open("client-service-confirmation.php?voucher=" + result, "_blank");
                        }
                    });
                }

                else if (clicked == "generateInvoice") {
                    window.open("invoice.php?voucher=" + result, "_blank");
                }
                else {
                    window.open("room-block-confirmed.php?voucher=" + result, "_blank");
                }

            }
        });
    });


    function showFerryName(arraySector, SectorTimingsID) {
        var name = '';
        for (var i = 0; i < arraySector.data.length; i++) {
            console.log(arraySector.data[i].SectorTimingsID);
            console.log(SectorTimingsID);

            if (arraySector.data[i].SectorTimingsID == SectorTimingsID) {
                name = arraySector.data[i].Timings;
                console.log("function ferry name name is");
                console.log(name);
                break;
                return name;

            }
        }
        return name;
    }
    //    function translateName(id, name) {
    //        console.log("id : " + id + "Name : " + name);
    //        var resultName = "";
    //        $.ajax({
    //            url: "php/hotels.php",
    //            type: 'POST',
    //            data: {
    //                status: name == "island" ? "island" : "hotel",
    //                name_id: id
    //            },
    //            success: function(result) {
    //                console.log("Result");
    //                console.log(result);
    //                resultName = result;
    //                return resultName;
    //            }
    //        });
    //    }
    var ifRecheckin = 0;
    function roomPaymentStatus() {
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            dataType: "JSON",
            data: {
                status: "form41"
            },
            success: function(result) {
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
                    $.trim(cutOffTerms[result.data[i]['HotelSelected']]) == "Advance" ? str += "<td>Advanced</td>" : str += "<td>Credit</td>";
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

    $(document).on("change", ".AmountPayableForm6Modal:first , .cutOffDateForm6Modal:first , .paymentStatusForm6Modal:first", function() {
        if (ifRecheckin == 1) {            
            
            $(".AmountPayableForm6Modal").eq(1).val($(".AmountPayableForm6Modal:first").val());
            console.log($(".AmountPayableForm6Modal:first").val());
            $(".cutOffDateForm6Modal").eq(1).val($(".cutOffDateForm6Modal:first").val());
            console.log($(".cutOffDateForm6Modal:first").val());
            $(".paymentStatusForm6Modal").eq(1).val($(".paymentStatusForm6Modal:first").val());
            console.log($(".paymentStatusForm6Modal:first").val());
            console.log($(".paymentStatusForm6Modal").eq(2).val());
            console.log($(".AmountPayableForm6Modal").eq(2).val());
            
        }
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

    getAgent();
    function getAgent() {
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            dataType: "JSON",
            data: {
                status: "AgentFor6"
            },
            success: function(result) {


                console.log(result);
                var str = '<option value="">Select</option>';
                for (var i = 0; i < result.data.length; i++) {
                    if (typeof ClosureForm6 !== 'undefined' && ClosureForm6 != null && ClosureForm6.length > 0) {
                        if (ClosureForm6[0].Agent == result.data[i]['CompanyName']) {
                            str += '<option value="' + result.data[i]['AgentID'] + '">' + result.data[i]['CompanyName'] + '</option>';
                        }
                        else {
                            str += '<option value="' + result.data[i]['AgentID'] + '" >' + result.data[i]['CompanyName'] + '</option>';
                        }
                    }
                    else {
                        str += '<option value="' + result.data[i]['AgentID'] + '">' + result.data[i]['CompanyName'] + '</option>';
                    }

                }
                $("#AgentForm61").html('');
                $("#AgentForm61").html(str);

                var strModal = '<option value="">Select</option>';
                for (var i = 0; i < result.data.length; i++) {
                    strModal += '<option value="' + result.data[i]['AgentID'] + '">' + result.data[i]['CompanyName'] + '</option>';

                }
                $("#AgentListModal").html('');
                $("#AgentListModal").html(strModal);

            }
        });
    }
    getAgentFileHandler();
    function getAgentFileHandler() {

        if ($("#AgentForm61").val() != "") {
            console.log("test11 is   " + $("#AgentForm61").val());
            $.ajax({
                url: "php/hotels.php",
                type: 'POST',
                dataType: "JSON",
                data: {
                    status: "form61getAgent",
                    agentId: $("#AgentForm61").val()
                },
                success: function(result) {
                    var str = '<option value="">Select</option>';
                    for (var i = 0; i < result.data.length; i++) {
                        if (typeof ClosureForm6 !== 'undefined' && ClosureForm6 != null && ClosureForm6.length > 0) {
                            if (ClosureForm6[0].FileHandlerAgent == result.data[i]['AgentName']) {
                                str += '<option value="' + result.data[i]['AgentName'] + '"   selected>' + result.data[i]['AgentName'] + '</option>';
                            }
                            else {
                                str += '<option value="' + result.data[i]['AgentName'] + '" >' + result.data[i]['AgentName'] + '</option>';
                            }
                        }
                        else {
                            str += '<option value="' + result.data[i]['AgentName'] + '">' + result.data[i]['AgentName'] + '</option>';
                        }
                    }
                    $("#FileHandlerAgentForm61").html('');
                    $("#FileHandlerAgentForm61").html(str);
                    console.log("Result");
                    console.log(result);
                    console.log("testing filehandlerAgent");
                    return result;

                }
            });
        }

    }
    function getDataType(datatype) {
        $.ajax({
            url: "php/hotels.php",
            type: 'POST',
            dataType: "JSON",
            data: {
                status: "form61",
                fileHandler: datatype
            },
            success: function(result) {
                if (datatype == 1) {
                    console.log(datatype);
                    console.log("datatype is 1");
                    console.log(result);
                    var str = '<option value="">Select</option>';
                    for (var i = 0; i < result.data.length; i++) {
                        if (typeof ClosureForm6 !== 'undefined' && ClosureForm6 != null && ClosureForm6.length > 0) {
                            if (ClosureForm6[0].Agent == result.data[i]['FileHandlerID']) {
                                str += '<option value="' + result.data[i]['FIleHandlerName'] + '">' + result.data[i]['FIleHandlerName'] + '</option>';
                            }
                            else {
                                str += '<option value="' + result.data[i]['FIleHandlerName'] + '" >' + result.data[i]['FIleHandlerName'] + '</option>';
                            }
                        }
                        else {
                            str += '<option value="' + result.data[i]['FIleHandlerName'] + '">' + result.data[i]['FIleHandlerName'] + '</option>';
                        }

                    }
                    $("#AgentForm61").html('');
                    $("#AgentForm61").html(str);
                }
                if (datatype == 2) {
                    console.log(datatype);
                    console.log("datatype is 2");
                    console.log(result);
                    var str = '<option value="">Select</option>';
                    for (var i = 0; i < result.data.length; i++) {
                        if (typeof ClosureForm6 !== 'undefined' && ClosureForm6 != null && ClosureForm6.length > 0) {
                            if (ClosureForm6[0].FileHandlerFTT == result.data[i]['FileHandlerID']) {
                                str += '<option value="' + result.data[i]['FIleHandlerName'] + '"   selected>' + result.data[i]['FIleHandlerName'] + '</option>';
                            }
                            else {
                                str += '<option value="' + result.data[i]['FIleHandlerName'] + '" >' + result.data[i]['FIleHandlerName'] + '</option>';
                            }
                        }
                        else {
                            str += '<option value="' + result.data[i]['FIleHandlerName'] + '">' + result.data[i]['FIleHandlerName'] + '</option>';
                        }
                    }
                    $("#FileHandlerForm61").html('');
                    $("#FileHandlerForm61").html(str);
                }
                if (datatype == 3) {
                    console.log(datatype);
                    console.log("datatype is 3");
                    console.log(result);
                    var str = '<option value="">Select</option>';
                    for (var i = 0; i < result.data.length; i++) {
                        if (typeof ClosureForm6 !== 'undefined' && ClosureForm6 != null && ClosureForm6.length > 0) {
                            if (ClosureForm6[0].FileHandlerAgent == result.data[i]['FileHandlerID']) {
                                str += '<option value="' + result.data[i]['FIleHandlerName'] + '"   selected>' + result.data[i]['FIleHandlerName'] + '</option>';
                            }
                            else {
                                str += '<option value="' + result.data[i]['FIleHandlerName'] + '" >' + result.data[i]['FIleHandlerName'] + '</option>';
                            }
                        }
                        else {
                            str += '<option value="' + result.data[i]['FIleHandlerName'] + '">' + result.data[i]['FIleHandlerName'] + '</option>';
                        }
                    }
                    $("#FileHandlerAgentForm61").html('');
                    $("#FileHandlerAgentForm61").html(str);
                }



                console.log("Result");
                console.log(result);
                $("#AgentForm61").trigger("change");
                return result;
            }
        });
    }
     $("body").on("change",".SelectDateForm5",function(){
          var newdate= $(this).val();
       var ad= new Date(newdate);
       var mydateArray= new Array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
       console.log(mydateArray[ad.getDay()]);
       $(this).closest(".form5Row").find(".dayOnTheDate:first").html(mydateArray[ad.getDay()]);
     });
         
   
     
     
     
});
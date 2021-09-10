<html>
  <head>
    <title>PRAZ Bid Bond Letter</title>
  </head>
  <body>
  
<div style="width:725px; height:920px;  text-align:center; border: 1px solid #787878">
        <p style="text-align:center"><img  src="./img/logo.jpg"></p>
       <span style="font-size:30px; font-weight:bold">BID BOND LETTER</span>
       <br/>
       <br/>
         <span style="font-size:25px;"><b><i>{{$bidbond->tendernumber}}</i></b></span>
       <br><br>            
      <span style="font-size:18px">
      The Procurement Regulatory Authority of Zimbabwe has received  a refundable BID BOND of <b>{{$bidbond->currency}}{{$bidbond->amount}}</b> from <b>{{$bidbond->company->name}}({{$bidbond->company->regnumber}})</b>
        to participate in a tender for {{$bidbond->entity->name}} identified using {{ $bidbond->tendernumber}}. The  BID BOND  has validity period of {{$bidbond->validityperiod}} days  and is expected to  mature on  {{$bidbond->maturitydate}}
      </span>
     <br/><br/>
     <span style="font-size:20px">Verification Code: <b>{{$bidbond->code}}</b></span><br/><br/>
       <span style="font-size:18px"><b><i>Please note that the authenticity and validity of this letter must be verified on our PRAZ portal at http://portal.praz.org.zw</i></b></span><br>
      
        <span style="font-size:30px; margin-top:10px;"><img src="./img/code.jpg" width="200" height="200"style="margin-top:50px;"></span>
</div>
  </body>
</html>
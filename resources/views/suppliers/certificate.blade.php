<html>
  <head>
    <title>PRAZ SUPPLIER CERTIFICATE</title>
    <style>
table, td, th {
  border: 1px solid black;
}

table {
  width: 100%;
  border-collapse: collapse;
}
.layout {
  border: 1px solid black;
  margin-top: 5px;
  margin-bottom: 5px;
  height:990px;
  margin-right: 5px;
  margin-left: 5px;
  text-align:center;
  padding:3px 3px 3px 3px;
}
</style>
  </head>
  <body>
  
<div class="layout">
        <p style="text-align:center"><img  src="./img/logo.jpg"></p>
       <span style="font-size:30px; font-weight:bold">{{$supplier->expire_year}} ANNUAL REGISTRATION OF A BIDDER</span>
       <br/>
       <br/>
         <span style="font-size:25px;"><b><i>{{$supplier->category->name}}({{$supplier->category->code}})</i></b></span>
       <br><br>            
      <span style="font-size:18px">The Procurement Regulatory Authority of Zimbabwe has approved <b><i>{{$supplier->company->name}}'s</i></b> application for inclusion on the Registered List of Bidders for the above category , in terms of Section 4 of the Public Procurement and Disposal of Public Assets (General) Regulations, 2018 for a period expiring {{$supplier->expiry_date}}</span>
     <br/><br/>
     <table>
       <tbody>
         <tr><th>Issued On</th><td>{{$supplier->issuedOn}}</td></tr>
         <tr><th>Expiration Date</th><td>{{$supplier->expiry_date}}</td></tr>
         <tr><th>Verification Code:</th><td> <b>{{$supplier->code}}</b></td></tr>
       </tbody>
     </table>
     @if($supplier->option=='QUARTERLY')
     <br/>
     <br/>
     <span style="font-size:18px;color:red"><b><i>Please note this is a quarterly certificate that will expire on {{$supplier->expiry_date}}. This certificate cannot be used  for any business after the expiry date. </i></b></span><br>
      
     @endif
     <br/>
     <br/>
   
       <span style="font-size:18px;margin-top:5px;"><b><i>Please note that the authenticity and validity of this certificate must be verified on our PRAZ portal using https://portal.praz.org.zw</i></b></span><br>
         <br/>
         <br/>
        <div class="mb-3">{!! '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($supplier->code, 'C39+',1,100,array(1,1,1), true) . '" alt="barcode"   />'!!}</div>

</div>
  </body>
</html>
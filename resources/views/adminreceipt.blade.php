<html>
  <head>
    <title>PRAZ Letter</title>
  </head>
  <body>
  
<div style="width:725px; height:920px;  text-align:center; border: 1px solid #787878">
        <p style="text-align:center"><img  src="./img/logo.jpg"></p>
       <span style="font-size:30px; font-weight:bold">{{$admin->description}}</span>
       <br/>
       <br/>
         <span style="font-size:25px;"><b><i>{{$admin->tendernumber}}</i></b></span>
       <br><br>            
      <span style="font-size:18px">
      The Procurement Regulatory Authority of Zimbabwe has received  a nonrefundable {{$admin->description}} fee of <b>{{$admin->currency->name}}{{$admin->amount}}</b> from <b>{{$admin->company->name}}({{$admin->company->regnumber}})</b>
        to participate in a tender for {{$admin->entity->name}} tender number {{ $admin->tendernumber}}. 
      </span>
     <br/><br/>
     <span style="font-size:20px">Verification Code: <b>{{$admin->code}}</b></span><br/><br/>
       <span style="font-size:18px"><b><i>Please note that the authenticity and validity of this letter must be verified on our PRAZ portal at http://portal.praz.org.zw</i></b></span><br>
      
        <span style="font-size:30px; margin-top:10px;"><img src="./img/code.jpg" width="200" height="200"style="margin-top:50px;"></span>
</div>
  </body>
</html>
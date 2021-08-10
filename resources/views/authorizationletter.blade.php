<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
<body>

<h2>Bid Bond Refund Authorization Letter</h2>

<table>
 
  <tr>
    <td>Tender Number</td><td>{{$bid->tendernumber}}</td></tr>
    <tr><td>Entity</td><td>{{$bid->entity->name}}</td></tr>
    <tr><td>Tender Closing Date</td><td>{{$bid->closing_date}}</td></tr>
   <tr><td>Validity Period</td><td>{{$bid->validityperiod}}</td></tr>
    <tr><td>Maturity Date</td><td>{{$bid->maturitydate}}</td></tr>
  
</table>
 <h3>Request Details</h3>
<table>
 
<tr><td>Company</td><td>{{$bid->company->name}}({{$bid->company->regnumber}})</td></tr>
<tr><td>Amount</td><td>{{$bid->currency}}({{$bid->amount}})</td></tr>
<tr><td>Bank</td><td>({{$bid->refunddata->bank}})</td></tr>
<tr><td>Account name</td><td>({{$bid->refunddata->name}})</td></tr>
<tr><td>Account number</td><td>({{$bid->refunddata->accountnumber}})</td></tr>  
<tr><td>Transfer reference</td><td>({{$bid->refunddata->referencenumber}})</td></tr> 
</table>

<h3>Requested By</h3>
<table>
    <tr>
        <td>Name</td><td>{{$bid->refunddata->requester->name}}{{$bid->refunddata->requester->surname}}</td>
    </tr>
    <tr>
        <td>Date</td><td>...../...../.....</td>
    </tr>

    <tr>
        <td>Signature</td><td>.......................</td>
    </tr>
</table>

<h3>Approved By</h3>
<table>
    <tr>
        <td>Name</td><td>{{$bid->refunddata->authorisor->name}}{{$bid->refunddata->authorisor->surname}}</td>
    </tr>
    <tr>
        <td>Date</td><td>...../...../.....</td>
    </tr>

    <tr>
        <td>Signature</td><td>.......................</td>
    </tr>
</table>

</body>
</html>
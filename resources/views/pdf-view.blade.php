<div class="content-wrapper">
    <!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Untitled Document</title>
    <link href="https://fonts.googleapis.com/css2?family=Muli:wght@200;300;400;500;700&display=swap" rel="stylesheet">
    <style type="text/css">
       .print
       {
           width:140px;
           height:35px;
           line-height:32px;
           text-align:center;
           border:none;
           border-radius:20px;
           background:#f60;
           margin-bottom:20px;
           cursor:pointer;
           color:#fff;
           font-family: 'Muli', sans-serif;
       }
    </style> 
    <script> 
            function printDiv() { 
                var divContents = document.getElementById("panel").innerHTML; 
                var a = window.open('', '', 'height=800, width=800'); 
                a.document.write('<html>'); 
                a.document.write('<body > <h1>Div contents are <br>'); 
                a.document.write(divContents); 
                a.document.write('</body></html>'); 
                a.document.close(); 
                a.print(); 
            } 
        </script>
        </head>
        <body>    
    <div onclick="printDiv()" class="print">Print Invoice</div>    
    <div id="panel">
    <table style="border:1px solid #999999;" width="100%" border="0" cellpadding="0" cellspacing="0" class="tb">
      <tbody>
        <tr>
          <td height="35" colspan="4" align="center" class="txt" style="border-bottom:1px solid #ddd; color:#d04e00; font-weight:800; font-family: 'Muli', sans-serif;">Rent Invoice format</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tbody>
              <tr>
                <td height="49" valign="bottom" style=" font-size:20px; color:#d04e00; font-weight:800; font-family: 'Muli', sans-serif;"></td>
                </tr>
              <tr>                
                <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Email.email@example.com</td>
                </tr>
              <tr>
                <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">www.example.com</td>
                </tr>
            </tbody>
          </table></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td height="36" colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td width="3%">&nbsp;</td>
          <td colspan="2"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="tb1">
            <tbody>                
              <tr>
                <td><table style="border:1px solid #999999;" width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tbody>
                    <tr>
                      <td width="16%" height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Client Name </span></strong></td>
                      <td width="49%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Mr.Ramakant SIngh</span></td>
                      <td width="20%"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Date</span></strong></td>
                      <td width="15%"><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">07 June 2020</span></td>
                    </tr>
                    <tr>                      
                      <td><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Invoice Number</span></strong></td>
                      <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">#333GHG</span></td>
                    </tr>
                    <tr>
                      <td height="25"><strong><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">Phone Number</span></strong></td>
                      <td><span style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">9876546125</span></td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                  </tbody>
                </table></td>
              </tr>
              <tr>
                <td height="31" style="border-top:1px solid #999999;">&nbsp;</td>
              </tr>
              <tr>
                <td><table style="border:1px solid #999999;" width="100%" border="1" cellpadding="0" cellspacing="0" class="tb2">
                  <tbody>
                    <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                      <td width="7%" height="30" align="center"><strong>S.N</strong></td>
                      <td width="30%" align="center"><strong>Description </strong></td>
                      <td width="8%" align="center"><strong>Electricy</strong></td>
                      <td width="8%" align="center"><strong>Water </strong></td>
                      <td width="12%" align="center"><strong>Rent Amount</strong></td>
                      <td width="13%" align="center"><strong>Net Amount</strong></td>
                    </tr>
                    <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                      <td height="30" align="center">1.</td>
                      <td align="center">Name</td>
                      <td align="center">10</td>
                      <td align="center">10</td>
                      <td align="center">350</td>
                      <td align="center">3500</td>                  
                    </tr>
                    <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                      <td height="30" align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center">&nbsp;</td>
                      <td align="center"><strong>Paid Amount</strong></td>
                      <td align="center">365432</td>
                    </tr>
                    <tr style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;">
                      <td width="7%" height="30" align="center"><strong></strong></td>
                      <td width="30%" align="center"><strong></strong></td>
                      <td width="8%" align="center"><strong>&nbsp;</strong></td>
                      <td width="8%" align="center"><strong>&nbsp;</strong></td>
                      <td width="12%" align="center"><strong>Due Amount</strong></td>
                      <td width="13%" align="center"><strong>98765464</strong></td>
                    </tr>
                  </tbody>
                </table></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
              </tr>              
              <tr>
                <td>&nbsp;</td>
              </tr>
            </tbody>
          </table></td>
          <td width="3%">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td height="32">&nbsp;</td>
          <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" height="32"><strong>Date : 07 JUNE 2020</strong></td>
          <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" width="47%" align="right"><strong>For : Online Reciept</strong></td>
          <td height="32">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td height="72">&nbsp;</td>
          <td>&nbsp;</td>
          <td style=" font-size:13px; color:#000; padding:5px; font-family: 'Muli', sans-serif;" align="right" valign="bottom"><strong>Authorised Signature</strong></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
      </tbody>
    </table>
    </div>
</body>
</html>    
{{-- 
@extends('layouts.front-layout')
@section('content')

<!DOCTYPE html>
<html>
 <head>
  <title>Laravel - How to Generate Dynamic PDF from HTML using DomPDF</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Laravel - How to Generate Dynamic PDF from HTML using DomPDF</h3><br />
   
   <div class="row">
    <div class="col-md-7" align="right">
     <h4>Customer Data</h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="{{ route('pdf-generate') }}" class="btn btn-danger">Convert into PDF</a>
    </div>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
       <th>Name</th>
       <th>Address</th>
       <th>City</th>
       <th>Postal Code</th>
       <th>Country</th>
      </tr>
     </thead>
     <tbody>
     @foreach($customer_data as $customer)
      <tr>
       <td>{{ $customer->CustomerName }}</td>
       <td>{{ $customer->Address }}</td>
       <td>{{ $customer->City }}</td>
       <td>{{ $customer->PostalCode }}</td>
       <td>{{ $customer->Country }}</td>
      </tr>
     @endforeach
     </tbody>
    </table>
   </div>
  </div>
 </body>
</html>
@endsection --}}
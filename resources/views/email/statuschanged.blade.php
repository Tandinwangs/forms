<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
      /* Email styles need to be inline */
      body{
        font-family: "Century Gothic";
      }
      .box{
        border:5px solid #E0E0E0;
        border-radius: 10px;
        padding: 2px;
        box-shadow: 2px 2px 10px rgba(0,0,0,0.5)
      }
      .box .head{
        background-color: #26578c;
        padding: 5px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
      }
      .box .body{
        padding: 5px;
      }
      .box .footer{
        background-color: #E0E0E0;
        padding: 5px;
        border-bottom-left-radius: 3px;
        border-bottom-right-radius: 3px;
      }
      h2{
        color: white;
      }
      .text-center{
        text-align: center;
      }
      .text-justify{
        text-align: justify;
      }
      .message{
        color: #6d7379;
      }
      .leave-detail{
        font-size: 14px;
        color: #868e96;
      }
      .footer p{
        color: #868e96;
        font-size: 11px;
        font-weight: bold;
      }
      .text-red{
        color:  #dc3545;
      }
      .text-blue{
        color: #26578c;
      }
      .text-green{
        color: #28a745;
      }
    </style>
  </head>

  <body>
    <div class="box">
      <div class="head text-center">
        <h2>Bhutan National Bank Limited </h2>
      </div>
      
      <div class="body text-center">
        <p>Your form : {{$code}} submitted to the Bank has been :</p>
        <h1 class="text-blue"> {{$status}} </h1>
        @if($status == 'approved' && substr($code,0,3) == 'DCR')
          <p>and your debit card can be collected after two working days.</p>
        @endif
        @if($status == 'rejected')
          <small>Because {{$reason}}</small>
        @endif
      </div>
      
      <div class="footer text-center">
        <p>This mail is auto generated by BNBL Form Management System, Please <span class="text-blue">do not reply</span>.</p>
      </div>
    </div>
  </body>
</html>

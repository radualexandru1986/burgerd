<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        table{
            border-top:1px solid black;
        }
        th , td{
            text-align: left;
        }
         table , th, td {
            border-bottom: 1px solid black;
            border-collapse: collapse;
            padding: .8rem 0;
        }
        body{
            font-family: 'Roboto', sans-serif;
        }
        .py-1{
            padding-top:10px;
            padding-bottom:10px;
        }
        button{
            width:100%;
            padding:2rem;
            background:black;
            color:white;
            border:1px solid red;
        }
        .border{
            border : 1px solid black;
        }
        .flex-row {
            display: flex;
            flex-direction: row;
            justify-content: left;
            align-items: center;
        }

        .w-100 {
            width: 100%;
        }

        .text-center{
            text-align: center;
        }
        @media print {
            .hidden-for-printing{
                display: none;
            }
        }
    </style>
</head>
<body>


    <div class="details w-100 flex-row border ">
        <img src="{{asset('burger.png')}}" alt="" width="30px">   <span style="padding:0.2rem 1rem;font-size: 25px"><strong>Emily's Burgers</strong></span>
    </div>

    <div class="details w-100 flex-row "  >
        <img src="{{asset('images/receipt/date.svg')}}" alt="" width="25">  <span style="padding:0.2rem 1rem;font-size: 18px">{{\Carbon\Carbon::today()->format('d M y')}}</span>
    </div>
    <div class="details w-100 flex-row "  >
        <img src="{{asset('images/receipt/call.svg')}}" alt="" width="25">  <span style="padding:0.2rem 1rem;font-size: 18px">07564 005 466</span>
    </div>
    <div class="details w-100 flex-row "  >
        <img src="{{asset('images/receipt/world-wide-web.svg')}}" alt="" width="25">  <span style="padding:0.2rem 1rem;font-size: 18px">thebeastburgers.co.uk</span>
    </div>
    <div class="details w-100 flex-row  " style="justify-content: center; padding-top:1.3rem;" >
        <img src="{{asset('images/receipt/hashtag-symbol.svg')}}" alt="" width="25">  <span style="font-size: 30px"><strong>{{$order->id}}</strong></span>
    </div>

    <h3 style="padding-bottom: 0; margin-bottom: 0;;">Order details</h3>
    <table style="width:100%" style="table-border:1px solid black; border-bottom: 1px solid black">
        <tr>
            <th>Item</th>
            <th>Qty.</th>
            <th>Tot.</th>
        </tr>
        @foreach($order->items as $product)
            <tr>
                <td>{{$product->item->name}} @if($product->drink()) <br><span style="font-size: 12px;">{{$product->drink()}}</span>  @endif</td>
                <td>{{$product->quantity}}</td>
                <td>£ {{$product->quantity* $product->item->price}}</td>
            </tr>
        @endforeach
    </table>
    <h3 class="w-100" style="text-align: right; padding-right: 30px;">Total :  £{{$order->total}}</h3>

    <div class="details w-100 flex-row" style="margin-top:5px; margin-bottom: 50px;">
        <img src="{{asset('images/receipt/placeholder.svg')}}" alt="" width="25">  <span style="font-size: 18px; padding:.5rem">{{$order->customer->address->fullAddress()}}, {{$order->customer->phone}}</span>
    </div>
    <hr>
<div class="hidden-for-printing">
    <button onclick="receipt()">Print</button>
</div>
<script>
    function receipt()
    {
        window.print()
        window.history.back()
    }
</script>
</body>
</html>

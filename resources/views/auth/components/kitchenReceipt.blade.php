<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        button{
            width:100%;
            padding:2rem;
            background:black;
            color:white;
            border:1px solid red;
        }

        .text-center{
            text-align: center;
        }
        @media print {
            p.bodyText {font-family:georgia, times, serif;}
            .hidden-for-printing{
                display: none;
            }
        }
    </style>
</head>
<body>
<h1 class="text-center">Items</h1>
@foreach($order->items as $product)
    <div class="item" style="border-bottom:1px solid black; border-top: 1px solid black">
        <h1 class="text-center"># {{$product->item->id}} <br> - <strong>{{$product->item->name}} x {{$product->quantity}}</strong></h1>
        <h2 class="text-center">{{$product->drink()}}</h2>
    </div>
@endforeach
<h1 class="text-center" style="font-size:50px">{{$order->id}}</h1>
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

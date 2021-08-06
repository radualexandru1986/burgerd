<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>You have a new order</h1>
    <hr>
    <table width="600" cellpadding="0" cellspacing="0" border="0" class="container">
        <tr>
            <th>Bundle Name</th> <th>Drink</th> <th>Qty.</th>
        </tr>

        @foreach($order->items  as $item )
            <tr>
                <td align="center" valign="top"> {{$item->item->name}}</td>
                <td align="center" valign="top">{{$item->drink()}}</td>
                <td align="center" valign="top">{{$item->quantity}}</td>
            </tr>
        @endforeach

    </table>
    <h3><strong>Order total : {{$order->total}}</strong></h3>
    <hr>
<h2>Customer : {{$order->customer->phone}}</h2>
<h3>Address : {{$order->customer->address->fullAddress()}}</h3>
</body>
</html>



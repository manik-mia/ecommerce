<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/backend/css/bootstrap.min.css')}}" type="text/css" media="all">
    <style>
        body {
            font-family:'Quikcand';
        }
        .container {
            width: 90%;
            margin: auto;
        }
        .p-3 {
            padding: 30px;
        }
        .bg {
            background-color: #f3f3f3;
        }
        .text-green {
            color: rgb(34, 182, 34);
        }
    </style>
</head>
<body>
    <header class="header-section">
        <div class="container p-3 bg">
            <div class="row">
                <div class="col-3 mt-5">
                    <h2 style="font-size:30px;" class="text-green">Eassy Shop</h2>
                </div>
                <div class="col-6"></div>
                <div class="col-3">
                    <h3 style="font-size: 20px;" class="text-green">Eassy Shop Head Office</h3>
                    <p>Email: eassyshop@gmail.com</p>
                    <p>Phone: +8801959306576</p>
                    <p>Mirpur#10, Dhaka, Bangladesh</p>
                </div>
            </div>
        </div>
    </header>
    <section class="content-section mt-2">
        <div class="container bg p-3">
            <h3 style="font-size: 20px;" class="text-green">Shipping Information</h3>
            <hr>
            <div class="row">
                <div class="col-6">
                    <h4 style="font-size: 18px;" class="text-green">Invoice NO: {{$order->invoice_no}}</h4>
                    <p>Name: {{$order->name}}</p>
                    <p>Email: {{$order->email}}</p>
                    <p>Phone: {{$order->phone}}</p>
                </div>
                <div class="col-6">
                    <p>Address: {{$order->state->name}}, {{$order->district->name}}, {{$order->division->name}}</p>
                    <p>Post Code: {{$order->post_code}}</p>
                    <p>Order Date: {{$order->order_date}}</p>
                    <p>Payment Method: {{$order->payment_method}}</p>
                </div>
            </div>
        </div>
    </section>
    <section class="product-info mt-2">
        <div class="container bg p-3">
            <div class="row">
                <div class="col-12">
                    <h3 style="font-size: 20px;" class="text-green">Products</h3>
                    <table class="table">
                        <thead>
                            <tr class="text-green">
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderItems as $orderItem)
                                
                                <tr>
                                    <td style="width: 200px;">{{$orderItem->product->product_name_en}}</td>
                                    <td style="width: 200px;">
                                        <img style="width: 100%;" src="{{public_path($orderItem->product->product_thumbnail)}}" alt="">
                                    </td>
                                    <td>{{$orderItem->product->product_color_en}}</td>
                                    <td>{{$orderItem->product->product_size_en}}</td>
                                    <td>{{$orderItem->qty}}</td>
                                    <td>{{$orderItem->product->selling_price}}</td>
                                    <td>{{$orderItem->product->selling_price*$orderItem->qty}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <h4 style="font-size: 25px;text-align:right;align-items: end;" class="text-green">Total: {{$order->amount}}TK (With Discount)</h4>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-section">
        <div class="container bg p-3">
            <div class="row">
                <div class="col-md-3">
                    <p>Thanks for buy product</p>
                </div>
                <div class="col-6"></div>
                <div class="col-3">
                    <p>---------------------------------------</p>
                    <p>Authority Signature</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
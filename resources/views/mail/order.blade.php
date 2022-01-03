<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Complete Mail</title>
    <style>
        .container {
            width: 90%;
            margin: auto;
        }
        .row {
            overflow: hidden;
        }
        .row .col-md-12 {
            display: flex;
            align-content: center;
        }
        .table {
            width: 100%;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 16px;
        }
        .table:nth-child(odd) {
            background: rgb(219, 214, 214);
        }

        .table:nth-child(even) {
            background: rgb(186, 186, 197);
        }
        .table tr td {
            padding: 5px;
        }
    </style>

</head>
<body>
    
    <div class="contaier">
        <div class="row">
            <div class="col-md-12">
                <h3>Order Complete Mail</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="text-muted">Order No</th>
                            <th class="text-muted">Invoice No</th>
                            <th class="text-muted">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$mailInfo['order_id']}}</td>
                            <td>{{$mailInfo['invoice_no']}}</td>
                            <td>{{$mailInfo['price']*85}}TK</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</body>
</html>
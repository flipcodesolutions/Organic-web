<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <title>Document</title>
    <style>
        body {
            font-family: 'DejaVu Sans',sans-serif;
            font-size: 12px;
        }

        .container {
            border: 1px solid #6c757d;
            padding: 20px;
        }

        .logo img {
            width: 120px;
            height: auto;
        }

        h5{
            margin: 0;
            font-size: 14px;
        }

        h6 {
            margin: 0;
            font-size: 12px
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table td,
        .table th {
            border: 1px solid #dee2e6;
            padding: 6px;
        }

        .table-secondary {
            background-color: #e9ecef;
        }

        .text-end {
            text-align: right;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .mt-5 {
            margin-top: 3rem;
        }

        .m-0 {
            margin: 0;
        }

        .fw-semibold {
            font-weight: 600;
        }

        img {
            max-width: 100%;
        }
    </style>

</head>

<body>
    <div class="container border border-secondary py-3 px-5">
        
        {{-- Header --}}
        <table width="100%">
            <tr>
                <td align="left" width="50%">
                    <img src="{{ $logo_path }}" alt="Logo" style="width: 120px;">
                </td>
                <td align="right" width="50%">
                    <h5 style="margin: 0;">Bill of Supply/Cash Memo</h5>
                    <h6 style="margin: 0;">(Original for Recipient)</h6>
                </td>
            </tr>
        </table>

        {{-- Address Block --}}
        <table width="100%" style="margin-top: 40px;">
            <tr>
                <td valign="top" width="50%">
                    <h6>Sold By:</h6>
                    <p class="m-0">RETAILEZ PRIVATE LIMITED</p>
                    <p class="m-0">Plot no. 120 X and part portion of plot no. 119 W2,</p>
                    <p class="m-0">Gallops Industrial Park 1, Village Rajoda, Taluka</p>
                    <p class="m-0">Bavla, District Ahmedabad</p>
                    <p class="m-0">Ahmedabad, GUJARAT, 38222</p>
                </td>
                <td valign="top" width="50%" align="right" style="max-width: 250px; word-wrap: break-word; overflow-wrap: break-word;">
                    <h6>Shipping Address:</h6>
                    <p class="m-0">{{ session('user')->name }}</p>
                    <p class="m-0">{{ $order->shippingadd->address_line1 }}</p>
                    <p class="m-0">{{ $order->shippingadd->address_line2 }}</p>
                    <p class="m-0">{{ $order->shippingadd->landmark->landmark_eng }}</p>
                    <p class="m-0">{{ $order->shippingadd->landmark->citymaster->city_name_eng }},
                        {{ $order->shippingadd->pincode }}</p>
                </td>
            </tr>
        </table>

        {{-- Vendor & Invoice Info --}}
        <table width="100%" style="margin-top: 20px;">
            <tr>
                <td valign="top" width="50%">
                    <p class="m-0"><strong>PAN No:</strong> AALCR3173P</p>
                    <p class="m-0"><strong>GST Registration No:</strong> 24AALCR3173P1ZT</p>
                    <p class="m-0"><strong>PAN No:</strong> AALCR3173P</p>
                </td>
                <td valign="top" width="50%" align="right">
                    <p class="m-0"><strong>Invoice Number:</strong> {{ $order->id }}</p>
                    <p class="m-0"><strong>Invoice Date:</strong>
                        {{ \Carbon\Carbon::parse($order->orderDate)->format('d.m.Y') }}</p>
                </td>
            </tr>
        </table>

        {{-- Items Table --}}
        <table class="table table-bordered mt-4" width="100%" style="margin-top: 30px; border-collapse: collapse;">
            <thead style="background-color: #e9ecef;">
                <tr>
                    <th>Sr No.</th>
                    <th>Description</th>
                    <th>Unit Price</th>
                    <th>Qty</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->orderDetails as $key => $orderData)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $orderData->product->productName }} <br> {{ $orderData->Unit->unitMaster->unit }}</td>
                        <td>₹ {{ $orderData->price }}</td>
                        <td>{{ $orderData->qty }}</td>
                        <td>₹ {{ $orderData->total }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td>Delivery Charge</td>
                    <td>00</td>
                    <td></td>
                    <td>00</td>
                </tr>
                <tr>
                    <td colspan="4">Total Net Ammount:</td>
                    <td>₹ {{ $order->total_order_amt }}</td>
                </tr>
                <tr>
                    <td colspan="4">Discount</td>
                    <td><strong>{{ $order->dis_amt_point }} %</strong></td>
                </tr>
                <tr>
                    <td colspan="4"><strong>Total</strong></td>
                    <td style="background-color: #e9ecef;"><strong>₹ {{ $order->total_bill_amt }}</strong></td>
                </tr>
                {{-- Optional Amount in Words --}}
                {{-- <tr>
                    <td colspan="5">Amount in Words: <br> Three Hundred Nine only </td>
                </tr> --}}
                <tr>
                    <td colspan="5" align="right">
                        <img src="{{ $logo_path }}" alt="Authorized Signature" style="width: 80px;"> <br>
                        <span>Authorized Signatory</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>


</html>

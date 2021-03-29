<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nihusubu | Subscription Print</title>

    <link href="{{ asset('inspinia') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="{{ asset('inspinia') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('inspinia') }}/css/style.css" rel="stylesheet">

</head>

<body class="white-bg">
<div class="wrapper wrapper-content p-xl">
    <div class="ibox-content p-xl">
        <div class="row">
            <div class="col-sm-6">
                <h5>From:</h5>
                <address>
                    <strong>{{$institution->name}}</strong><br>
                    {{$institution->address->address_line_1}}<br>
                    {{$institution->address->town}}, {{$institution->address->street}}<br>
                    {{-- @if ($institution->address->po_box) P. O. Box {{$institution->address->po_box}}, {{$institution->address->postal_code}} @endif <br> --}}
                    <abbr title="Phone">P:</abbr> {{$institution->phone_number}}
                </address>
            </div>

            <div class="col-sm-6 text-right">
                <h4>Subscription No.</h4>
                <h4 class="text-navy">{{$subscription->reference}}</h4>
                <span>To:</span>
                <address>
                    <strong>{{$subscription->institution->name}}</strong><br>
                    <abbr title="Phone">tell:</abbr> {{$subscription->institution->phone_number}}<br>
                    <abbr title="Email">email:</abbr> {{$subscription->institution->email}}
                </address>
                <p>
                    <span><strong>Subscription Date:</strong> {{$subscription->start_date}} </span><br/>
                </p>
            </div>
        </div>

        <div class="table-responsive m-t">
            <table class="table order-table">
                <thead>
                <tr>
                    <th>Item List</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($subscription->subscriptionModules as $subscription_module)
                    <tr>
                        <td>
                            <div>
                                <strong>
                                    {{$subscription_module->module->name}}
                                </strong>
                            </div>
                            <small>
                                {!!$subscription_module->module->description!!}
                            </small>
                        </td>
                        <td>1</td>
                        <td>{{$subscription_module->amount}}</td>
                        <td>{{$subscription_module->amount}}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div><!-- /table-responsive -->

        <table class="table invoice-total">
            <tbody>
            <tr>
                <td><strong>Sub Total :</strong></td>
                <td>{{$subscription->subtotal}}</td>
            </tr>
            <tr>
                <td><strong>TAX :</strong></td>
                <td>{{$subscription->tax}}</td>
            </tr>
            <tr>
                <td><strong>Adjustment :</strong></td>
                <td>{{$subscription->discount}}</td>
            </tr>
            <tr>
                <td><strong>TOTAL :</strong></td>
                <td>{{$subscription->amount}}</td>
            </tr>
            </tbody>
        </table>
        <div class="well m-t"><strong>Notes</strong>
            {{$subscription->customer_notes}}
        </div>

    </div>

</div>

<!-- Mainly scripts -->
<script src="{{ asset('inspinia') }}/js/jquery-2.1.1.js"></script>
<script src="{{ asset('inspinia') }}/js/bootstrap.min.js"></script>
<script src="{{ asset('inspinia') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('inspinia') }}/js/inspinia.js"></script>

<script type="text/javascript">
    window.print();
</script>

</body>

</html>

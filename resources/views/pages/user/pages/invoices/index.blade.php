<!doctype html>
<html lang="en">

<head>
    <title>:: Iconic :: Invoices</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('dist/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/assets/vendor/font-awesome/css/font-awesome.min.css') }} ">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('dist/assets/css/main.css') }}">

</head>

<body data-theme="light" class="font-nunito">

    <div id="wrapper" class="theme-cyan">
        <!-- mani page content body part -->

        <div class="container ">
            <div class="row clearfix mt-4">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <h3>Invoice Details : <strong class="text-primary">{{ $transaction->id }}</strong>
                            </h3>
                            <ul class="nav nav-tabs-new2">
                                <li class="nav-item inlineblock"><a class="nav-link active" data-toggle="tab"
                                        href="#details" aria-expanded="true">Details</a></li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane in active" id="details" aria-expanded="true">
                                    <div class="row clearfix">
                                        <div class="col-md-6 col-sm-6">
                                            <address>
                                                <strong>{{ $transaction->user->name }}</strong><br>
                                                {{ $transaction->user->email }}<br>
                                                {{ $transaction->user->address_one }}<br>

                                                <abbr title="Phone">Phone:</abbr>{{ $transaction->user->phone_number }}
                                            </address>
                                        </div>
                                        <div class="col-md-6 col-sm-6 text-right">
                                            <p class="mb-0"><strong>Order Date: </strong>
                                                {{ $transaction->created_at }}</p>
                                            <p class="mb-0"><strong>Order Status: </strong> <span
                                                    class="badge badge-warning mb-0">{{ $transaction->transaction_status }}}</span>
                                            </p>
                                            <p><strong>Order ID: </strong> {{ $transaction->id }}</p>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table class="table table-hover">
                                                    <thead class="thead-dark">
                                                        <tr>

                                                            <th>Item</th>

                                                            <th>Quantity</th>
                                                            <th class="hidden-sm-down">Unit Cost</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($transactionDetail as $item)
                                                            <tr>
                                                                <td>{{ $item->product->name }}</td>
                                                                <td>{{ number_fromat($item->quantity) }}</td>
                                                                <td class="hidden-sm-down">
                                                                    {{ number_fromat($item->product->price) }}
                                                                </td>
                                                                <td>{{ number_fromat($item->price) }}</td>
                                                            </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row clearfix">
                                        <div class="col-md-6">
                                            <h5>Note</h5>
                                            <p>Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity jajah
                                                plickers sifteo edmodo ifttt zimbra.</p>
                                        </div>
                                        <div class="col-md-6 text-right">
                                            <p class="mb-0">total:
                                                {{ $total }}</p>
                                            <p class="mb-0">tax: 10%</p>
                                            <h3 class="mb-0 m-t-10"> {{ $transaction->total_price }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Javascript -->
    <script src="{{ asset('dist/ssets/bundles/libscripts.bundle.js') }}a"></script>
    <script src="{{ asset('dist/assets/bundles/vendorscripts.bundle.js') }}"></script>

    <!-- page js file -->
    <script src="{{ asset('dist/assets/bundles/mainscripts.bundle.js') }}"></script>
</body>

</html>

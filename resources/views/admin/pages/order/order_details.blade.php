<x-admin-app-layout :title="'All Order'">


    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Order</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Order</li>
                    </ol>
                </nav>
            </div>
            
        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">All Order In Site</h6>
        <hr />

        <div class="card">
            <div class="card-body">

                <div class="row">

                    <div class="col-12 col-md-4">
                        <h5>Billing Information</h5>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:95%">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $order->billing_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $order->billing_email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $order->billing_phone }}</td>
                                </tr>
                                <tr>
                                    <th>Address One</th>
                                    <td>{{ $order->billing_address_line1 }}</td>
                                </tr>
                                <tr>
                                    <th>Address Two</th>
                                    <td>{{ $order->billing_address_line2 }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $order->billing_city }}</td>
                                </tr>
                                <tr>
                                    <th>Postal Code</th>
                                    <td>{{ $order->billing_postal_code }}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{ $order->billing_country }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <h5>Shipping Information</h5>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:95%">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $order->shipping_name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $order->shipping_email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $order->shipping_phone }}</td>
                                </tr>
                                <tr>
                                    <th>Address One</th>
                                    <td>{{ $order->shipping_address_line1 }}</td>
                                </tr>
                                <tr>
                                    <th>Address Two</th>
                                    <td>{{ $order->shipping_address_line2 }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $order->shipping_city }}</td>
                                </tr>
                                <tr>
                                    <th>Postal Code</th>
                                    <td>{{ $order->shipping_postal_code }}</td>
                                </tr>
                                <tr>
                                    <th>Country</th>
                                    <td>{{ $order->shipping_country }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-12 col-md-4">
                        <h5>Details Information</h5>
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:95%">
                                <tr>
                                    <th>Order Number</th>
                                    <td>{{ $order->order_number }}</td>
                                </tr>
                                <tr>
                                    <th>Invoice Number</th>
                                    <td>{{ $order->invoice_number }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Method</th>
                                    <td>{{ $order->payment_method }}</td>
                                </tr>
                                <tr>
                                    <th>Transcation Number</th>
                                    <td>{{ $order->transaction_number }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <td>{{ $order->payment_status }}</td>
                                </tr>
                                <tr>
                                    <th>Order Status</th>
                                    <td>{{ $order->status }}</td>
                                </tr>

                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <h6 class="mb-0 text-uppercase">Product Information</h6>
        <hr />

        <div class="card">
            <div class="card-body">

                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:3%">Sl</th>
                                <th style="width:6%">Image</th>
                                <th style="width:20%">Name</th>
                                <th style="width:10%">Qty</th>
                                <th style="width:10%">Size</th>
                                <th style="width:10%">Color</th>
                                <th style="width:10%">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--begin::Table row-->
                            @foreach ($orderItems as $key => $item)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>
                                        <img src="{{ !empty($item->product->image) ? url('storage/' . $item->product->image) : 'https://ui-avatars.com/api/?name=' . urlencode($item->product->name) }}"
                                            style="width: 50px;height: 50px;" alt="">
                                    </td>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->qty }}</td>

                                    <td>{{ $item->size ? $item->size : 'N/A' }}</td>
                                    <td>{{ $item->color ? $item->color : 'N/A' }}</td>


                                    <td>$ {{ $item->price }}</td>



                                </tr>
                            @endforeach
                            <!--end::Table row-->
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>


</x-admin-app-layout>

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

            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('admin.brand.create') }}" class="btn btn-dark rounded-0 px-3">Create Brand
                    </a>
                </div>
            </div>

        </div>
        <!--end breadcrumb-->

        <h6 class="mb-0 text-uppercase">All Order In Site</h6>
        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width:3%">Sl</th>
                                <th style="width:5%">Order Date</th>
                                <th style="width:10%">Name</th>
                                <th style="width:6%">Phone</th>
                                <th style="width:6%">Order Number</th>
                                <th style="width:7%">Total Amount</th>
                                <th style="width:5%">Payment Status</th>
                                <th style="width:7%">Status</th>
                                <th style="width:5%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--begin::Table row-->
                            @foreach ($items as $key => $item)
                                <tr>

                                    <td>{{ $key + 1 }}</td>

                                    <td class="text-danger">{{ $item->order_date }}</td>
                                    <td>{{ $item->billing_name }}</td>
                                    <td>{{ $item->billing_phone }}</td>
                                    <td>{{ $item->order_number }}</td>
                                    <td>${{ $item->total_amount }}</td>
                                    <td><span class="badge bg-danger text-white">{{ $item->payment_status }}</span></td>
                                    <td>{{ $item->status }}</td>

                                    <td>
                                        <a href="{{ route('admin.order.details', $item->id) }}"><i
                                                class="fa-solid fa-eye fs-6 text-primary"></i></a>
                                                
                                        <a href=""><i class="fa-solid fa-download fs-6 text-success"></i></a>
                                    </td>

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

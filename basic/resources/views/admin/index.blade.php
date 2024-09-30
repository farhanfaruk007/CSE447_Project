@extends('admin.admin_master')
@section('admin')

<style>
.circle-card {
    border-radius: 50%;
    overflow: hidden;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    box-shadow: 0px 3px 10px rgba(0, 0, 0, 0.2);
    position: relative;
    height: 250px;
    width: 250px;
    border: 2px solid;
}

.circle-card:hover {
    transform: translateY(-10px);
    box-shadow: 0px 7px 25px rgb(7 86 203 / 47%);
}

.circle-card .card-body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100%;
}
.card-body h4{
    color:#fff;
    font-size: 45px;
    
}
.row{
    justify-content: center;
}
.card-icon {
    position: absolute;
    bottom: 20px;
    font-size: 24px;
}

.font-size-14 {
    font-size: 14px;
}
</style>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <!-- Each card in its own column -->

            <!-- Total Suppliers section -->
            <div class="col-xl-4 col-md-6">
                <div class="card circle-card">
                    <div class="card-body">
                        <h4>{{ \App\Models\Supplier::whereNull('deleted_at')->count() }}</h4>
                        <p class="text-truncate font-size-14 mb-2">Total Suppliers</p>
                        <i class="ri-shopping-cart-2-line card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- New Customers section -->
            <div class="col-xl-4 col-md-6">
                <div class="card circle-card">
                    <div class="card-body">
                        <h4>{{ \App\Models\Customer::where('created_at', '>=', now()->subDays(7))->count() }}</h4>
                        <p class="text-truncate font-size-14 mb-2">New Customers</p>
                        <i class="ri-user-line card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Total Customers section -->
            <div class="col-xl-4 col-md-6">
                <div class="card circle-card">
                    <div class="card-body">
                        <h4>{{ \App\Models\Customer::count() }}</h4>
                        <p class="text-truncate font-size-14 mb-2">Total Customers</p>
                        <i class="ri-group-line card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Total Units section -->
            <div class="col-xl-4 col-md-6">
                <div class="card circle-card">
                    <div class="card-body">
                        <h4>{{ \App\Models\Unit::count() }}</h4>
                        <p class="text-truncate font-size-14 mb-2">Total Units</p>
                        <i class="ri-ruler-line card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Total Categories section -->
            <div class="col-xl-4 col-md-6">
                <div class="card circle-card">
                    <div class="card-body">
                        <h4>{{ \App\Models\Category::count() }}</h4>
                        <p class="text-truncate font-size-14 mb-2">Total Categories</p>
                        <i class="ri-list-check card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Total Products section -->
            <div class="col-xl-4 col-md-6">
                <div class="card circle-card">
                    <div class="card-body">
                        <h4>{{ \App\Models\Product::count() }}</h4>
                        <p class="text-truncate font-size-14 mb-2">Total Products</p>
                        <i class="ri-stack-line card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Approved Purchases section -->
            <div class="col-xl-4 col-md-6">
                <div class="card circle-card">
                    <div class="card-body">
                        <h4>{{ \App\Models\Purchase::where('status', 1)->count() }}</h4>
                        <p class="text-truncate font-size-14 mb-2">Approved Purchases</p>
                        <i class="ri-file-list-3-line card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Pending Purchases section -->
            <div class="col-xl-4 col-md-6">
                <div class="card circle-card">
                    <div class="card-body">
                        <h4>{{ \App\Models\Purchase::where('status', 0)->count() }}</h4>
                        <p class="text-truncate font-size-14 mb-2">Pending Purchases</p>
                        <i class="ri-file-list-2-line card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Approved Orders section -->
            <div class="col-xl-4 col-md-6">
                <div class="card circle-card">
                    <div class="card-body">
                        <h4>{{ \App\Models\Invoice::where('status', 1)->count() }}</h4>
                        <p class="text-truncate font-size-14 mb-2">Approved Orders</p>
                        <i class="ri-receipt-2-line card-icon"></i>
                    </div>
                </div>
            </div>

            <!-- Pending Orders section -->
            <div class="col-xl-4 col-md-6">
                <div class="card circle-card">
                    <div class="card-body">
                        <h4>{{ \App\Models\Invoice::where('status', 0)->count() }}</h4>
                        <p class="text-truncate font-size-14 mb-2">Pending Orders</p>
                        <i class="ri-receipt-line card-icon"></i>
                    </div>
                </div>
            </div>

        </div><!-- end row -->
    </div>
</div>

@endsection

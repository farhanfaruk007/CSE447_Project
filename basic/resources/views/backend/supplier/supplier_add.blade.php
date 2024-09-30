<!-- resources/views/backend/supplier/supplier_add.blade.php -->

@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Supplier Page </h4><br><br>

                        <form method="post" action="{{ route('supplier.store') }}" id="myForm">
                            @csrf

                            <!-- Supplier Name -->
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Supplier Name</label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end Supplier Name -->

                            <!-- Supplier Mobile -->
                            <div class="row mb-3">
                                <label for="mobile_no" class="col-sm-2 col-form-label">Supplier Mobile</label>
                                <div class="form-group col-sm-10">
                                    <input name="mobile_no" class="form-control" type="text" value="{{ old('mobile_no') }}">
                                    @error('mobile_no')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end Supplier Mobile -->

                            <!-- Supplier Email -->
                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">Supplier Email</label>
                                <div class="form-group col-sm-10">
                                    <input name="email" class="form-control" type="email" value="{{ old('email') }}">
                                    @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end Supplier Email -->

                            <!-- Supplier Address -->
                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Supplier Address</label>
                                <div class="form-group col-sm-10">
                                    <input name="address" class="form-control" type="text" value="{{ old('address') }}">
                                    @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end Supplier Address -->

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Supplier">
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>

    </div>
</div>

<script type="text/javascript">
    // JavaScript validation code remains the same
</script>

@endsection

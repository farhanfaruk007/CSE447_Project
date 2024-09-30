@extends('admin.admin_master')
@section('admin')
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile Page</h4>
                        <form method="post" action="{{ route('store.profile') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input name="name" class="form-control" type="text" value="{{ $decryptedData['name'] }}" id="name">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="email" class="col-sm-2 col-form-label">User Email</label>
                                <div class="col-sm-10">
                                    <input name="email" class="form-control" type="email" value="{{ $decryptedData['email'] }}" id="email">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input name="username" class="form-control" type="text" value="{{ $editData->username }}" id="username">
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- Add Date of Birth Field -->
                            <div class="row mb-3">
                                <label for="date_of_birth" class="col-sm-2 col-form-label">Date of Birth</label>
                                <div class="col-sm-10">
                                    <input name="date_of_birth" class="form-control" type="date" value="{{ $decryptedData['date_of_birth'] }}" id="date_of_birth">
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- Add Address Field -->
                            <div class="row mb-3">
                                <label for="address" class="col-sm-2 col-form-label">Address</label>
                                <div class="col-sm-10">
                                    <input name="address" class="form-control" type="text" value="{{ $decryptedData['address'] }}" id="address">
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- Add Phone Number Field -->
                            <div class="row mb-3">
                                <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
                                <div class="col-sm-10">
                                    <input name="phone_number" class="form-control" type="text" value="{{ $decryptedData['phone_number'] }}" id="phone_number">
                                </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
@endsection

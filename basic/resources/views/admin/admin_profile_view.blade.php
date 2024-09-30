@extends('admin.admin_master')
@section('admin')

<style>
  .page-content {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background-color: #000;
}

.container-fluid {
  width: 100%;
  max-width: 800px;
}

.card {
  margin: 20px auto;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  background-color: #56433964;
  border: none;
  border-radius: 10px;
  text-align: center;
}

.card-title {
  margin-bottom: 10px;
  font-size: 1rem;
  color: #333;
}

.card-body {
  margin-top: 10px;
}

.btn-info {
  background-color: #17a2b8;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 0.7rem;
  text-transform: uppercase;
  letter-spacing: 0.8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-info:hover {
  background-color: #138496;
}

.btn-rounded {
  border-radius: 5px;
}

.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}
</style>


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Name : {{ $decryptedData['name'] }} </h4>
                        <hr>
                        <h4 class="card-title">User Email : {{ $decryptedData['email'] }}  </h4>
                        <hr>
                        <h4 class="card-title">User Name : {{ $adminData->username }} </h4>
                        <hr>
                        <!-- Additional Fields -->
                        <h4 class="card-title">Date of Birth : {{ $decryptedData['date_of_birth'] }} </h4>
                        <hr>
                        <h4 class="card-title">Address : {{ $decryptedData['address'] }} </h4>
                        <hr>
                        <h4 class="card-title">Phone Number : {{ $decryptedData['phone_number'] }} </h4>
                        <hr>
                        <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Edit Profile</a>
                    </div>
                </div>
            </div> 
        </div> 
    </div>
</div>


@endsection 

<!-- resources/views/admin/unit_add.blade.php -->

@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Unit Page</h4><br><br>

                        <form method="post" action="{{ route('unit.store') }}" id="myForm">
                            @csrf

                            <!-- Unit Name -->
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Unit Name</label>
                                <div class="form-group col-sm-10">
                                    <input name="name" class="form-control" type="text" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- end Unit Name -->

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Unit">
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

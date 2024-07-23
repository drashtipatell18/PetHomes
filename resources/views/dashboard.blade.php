@extends('layouts.main')

@section('content')
<style>
    .table-specing{
        margin-top: 27px;
    }
    .tablehead{
        background-color: bisque;
    }
</style>
<div class="col-md-12 col-sm-12">
    <div class="card">
        <div class="card-header py-3">Role List</div>
        <hr>
        <div class="card-body py-3">
            <div class="card-title">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                <div class="button-container text-right mb-2">
                    <button type="button" class="btn btn-info btn-sm mt-1" id="addRoleBtn">
                        <i class="bi bi-plus-lg"></i> Add Role
                    </button>
                </div>
            </div>
            <div class="table-responsive mt-3">
                <table class="table table-sm table-specing">
                    <thead>
                        <tr class="tablehead">
                            <th class="text-center">No</th>
                            <th class="text-center">Role Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table body will be populated by JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

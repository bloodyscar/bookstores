@extends('layouts.admin')

@section('content')
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <a href="{{ route('member')}}">Back</a>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between my-4">
            <h1 class="h3 mb-0 text-gray-800">Edit User</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/member/{{ $user->id }}/edit" method="post">
                            @method('patch')
                            @csrf
                            
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ $user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" id="email" value="{{ $user->email}}">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection


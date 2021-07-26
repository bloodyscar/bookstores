@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Book</h1>
            
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('member.edit' , $user->id)}}"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('member.destroy', $user->id)}}" method="post" class="d-inline ml-3">
                                        @csrf
                                        @method('delete')
                                        <button onclick="{ return confirm();}" class="btn btn-link text-danger"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
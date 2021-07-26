@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Book</h1>
            {{-- <a href="{{ route('book.create')}}" class="btn btn-primary">New Book</a> --}}
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Buyer's Name</th>
                            <th>Total Amount</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $item)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $item->book->title}}</td>
                                <td>{{ $item->user->name}}</td>
                                <td>{{ $item->total_amount}}</td>
                                <td>${{ $item->total_price}}</td>
                                <td>{{ $item->status }}</td>
                                <td>
                                    <a href="{{ route('transaction.edit' , $item->id )}}"><i class="fas fa-edit"></i></a>
                                    <form action="#" method="post" class="d-inline ml-3">
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
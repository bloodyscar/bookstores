@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Book</h1>
            <a href="{{ route('book.create')}}" class="btn btn-primary">New Book</a>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="card-body">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Publisher</th>
                            <th>Genre</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <div class="d-flex justify-content-between">
                                    {{ $book->title }}
                                    <a href="book/{{ $book->slug}}" class="text-primary"><i class="fas fa-eye"></i></a>
                                </div>
                            </td>
                            <td>{{ $book->author }}</td>
                            <td>{{ $book->publisher }}</td>
                            <td>
                                @foreach ($book->genres as $genre)
                                    <div>
                                        &#183; {{ $genre->name }}
                                    </div>
                                @endforeach
                            </td>
                            <td>${{ $book->price }}</td>
                            <td>{{ $book->stock }}</td>
                            <td>
                                <a href="{{ route('book.edit' , $book->slug)}}"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('book.destroy', $book->slug)}}" method="post" class="d-inline ml-3">
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
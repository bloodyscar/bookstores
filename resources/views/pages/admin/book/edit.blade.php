@extends('layouts.admin')

@section('content')
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <a href="{{ route('book')}}">Back</a>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between my-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Book</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/book/{{ $book->slug }}/edit" method="post" enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            
                            
                            <div class="form-group">
                                <input type="file" name="thumbnail" id="thumbnail">
                            </div>
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ $book->title}}">
                            </div>
                            <div class="form-group">
                                <label for="author">Author</label>
                                <input type="text" class="form-control" name="author" id="author" value="{{ $book->author}}">
                            </div>
                            <div class="form-group">
                                <label for="publisher">Publisher</label>
                                <input type="text" class="form-control" name="publisher" id="publisher" value="{{ $book->publisher}}">
                            </div>
                            <div class="form-group">
                                <label for="genres">Genre</label>
                                <select name="genres[]" id="genres" class="form-control" multiple>
                                    <option disabled selected>== Pilih Genre ==</option>
                                    @foreach ($genres as $genre)
                                        <option value="{{ $genre->id }}" 
                                            @foreach ($book->genres as $item)
                                                {{ $genre->id == $item->id ? 'selected' : ''}}
                                            @endforeach
                                            >{{ $genre->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="blurb">Blurb</label>
                                <textarea rows="3" type="text" class="form-control" name="blurb" id="blurb" > {{$book->blurb}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" name="price" id="price" value="{{ $book->price }}">
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="text" class="form-control" name="stock" id="stock" value="{{ $book->stock }}">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img class="img-fluid" src="{{ asset( 'storage/'.$book->thumbnail)}}" alt="">
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection


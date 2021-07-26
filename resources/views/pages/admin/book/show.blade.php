@extends('layouts.admin')

@section('content')
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <a href="{{ route('book')}}">Back</a>
        <!-- Page Heading -->
        <div class="my-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $book->title }}</h1>
            <div class="d-flex">
                Genre : &nbsp;
                @foreach ($book->genres  as $genre)
                <div>#{{ $genre->name }} &nbsp;</div>
                @endforeach
            </div>
            
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="position-relative" style="height:100%;">
                    <img class="rounded img-fluid mx-auto d-block"  src="{{ asset( 'storage/'.$book->thumbnail)  }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Author by {{ $book->author }}</div>
                    <div class="card-body text-dark">
                        <div><small class="text-secondary">Publication on {{ $book->created_at->format("F d, Y")}}</small></div>
                        <div class="mt-3">   
                            {!! nl2br($book->blurb) !!}
                        </div>
                    </div>
                    <div class="card-footer"><small>{{ $book->publisher }}</small></div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection


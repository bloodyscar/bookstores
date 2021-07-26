@extends('layouts.admin')

@section('content')
    
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <a href="{{ route('transaction')}}">Back</a>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between my-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Book</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="/admin/transaction/{{ $transaction->id }}/edit" method="post">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label for="status" class="form-label">Transaction Status</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="{{ $transaction->status }}" class="{{ $transaction->status ? 'selected' : ''}}" disabled selected>{{ $transaction->status }}</option>
                                    <option value="SUCCESS">SUCCESS</option>
                                    <option value="FAILED">FAILED</option>
                                    <option value="PENDING">PENDING</option>
                                    <option value="CANCEL">CANCEL</option>
                                </select>
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



@extends('layouts.app')

@section('content')
    <h1>Step 3</h1>
    <hr>
    @if(isset($register->productImg))
    <img alt="Product Image" src="/storage/productimg/{{$register->productImg}}"/>
    @endif
    <form action="/register3" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h3>Upload Image</h3><br/><br/>

        <div class="form-group">
            <input type="file" {{ (!empty($register->productImg)) ? "disabled" : ''}} class="form-control-file" name="productimg" id="productimg" aria-describedby="fileHelp">
            <small id="fileHelp" class="form-text text-muted">Please upload a valid image file. Size of image should not be more than 2MB.</small>
        </div>
        <button type="submit" class="btn btn-primary">Review Details</button>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form><br/>
    @if(isset($register->productImg))
    <form action="/remove-image" method="post">
        {{ csrf_field() }}
    <button type="submit" class="btn btn-danger">Remove Image</button>
    </form>
    @endif
@endsection 
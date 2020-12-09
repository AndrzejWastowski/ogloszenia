@extends('layouts.app')

@section('content')
    <h1>Step 1</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
     <form action="/register2" method="POST">
        @csrf
     <input type="text" name="description" class="form-controll" placeholder="Enter description" value="{{ session()->get('register.description') }}">
       <a type="button" href="/register1" class="btn btn-warning">Back to Step 1</a>
         <button type="submit" class="btn btn-primary">Continue</button>
     </form>
@endsection 
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
     <form action="/register1" method="POST">
        @csrf
     <input type="text" name="name" class="form-controll" placeholder="Enter name" value="{{ session()->get('register.name') }}">
         <button type="submit" class="btn btn-primary">Continue</button>
     </form>
@endsection 
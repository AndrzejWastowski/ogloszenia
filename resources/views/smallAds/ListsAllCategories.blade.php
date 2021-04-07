
@extends('layouts.app')

@section('content')


<div class="container">
<div class="row">
    <div class="col-3">
    </div>
    <div class="col-7">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"> <a href="/">Start</a></li> 
                <li class="breadcrumb-item"> <a href="/drobne/">Drobne</a></li>
            </ol>
        </nav> 
    </div>
    <div class="col-2">
        @include('addons.2col')          
    </div>
</div>
</div>
@endsection 



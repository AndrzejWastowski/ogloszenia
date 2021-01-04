
@extends('layouts.app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nazwa ogłoszenia</th>
            <th scope="col">Data dodania</th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <th scope="row">{{$product->id}}</th>
                <td><a href="">{{$product->name}}</a></td>
                <td>{{$product->description}}</td>
            </tr>
        @endforeach
        </tbody>                                                                                                
    </table>
@endsection 
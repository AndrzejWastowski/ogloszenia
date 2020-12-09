@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <div class="col-md-3">
        @include('user.sidebar')
    </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tablica') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('Cześć  użytkowniku:') }} <strong> {{ Auth::user()->name }}</strong>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section ('java_script')
<script type="text/javascript">

</script>
@endsection
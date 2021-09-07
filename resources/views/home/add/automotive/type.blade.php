@extends('home.dashboard')
@section('step')


<div class="row justify-content-center">
    
    <h4><strong>MOTORYZACJA - WYBIERZ DZIAŁ</strong></h4>
        <li><a href="{{ route('cars_content') }}">Samochody Osobowe</a></li>       
        <li>Motocykle i Quady</li>
        <li>Sprzęt rolniczy</li>
        <li>Pojazdy budowlane</li>
</div> 

@endsection

@section('java_script')

<script type="text/javascript">


</script>
   
@endsection

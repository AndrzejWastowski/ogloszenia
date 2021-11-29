@extends('home.dashboard')
@section('step')

<div class="row justify-content-center">
 {{-- <form action="https://secure.przelewy24.pl/trnRegister" method="post" class="form">  --}}
    
    Przygotowywanie płatności
   <form action="https://sandbox.przelewy24.pl/trnDirect" method="post" class="form">

    <input type="hidden"   name="p24_session_id" value="{{ $payment['p24_session_id'] }}" /> 
    <input type="hidden"   name="p24_merchant_id" value="{{ $payment['p24_merchant_id'] }}" />
    <input type="hidden"   name="p24_pos_id" value="{{ $payment['p24_pos_id'] }}" />

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Treść</th>            
          </tr>
        </thead>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
          
        </tr>
    </table>
  

    <h3>Kwota do zapłaty: {{ $payment['p24_amount']/100 }} PLN</h3>
    <input type="hidden"  name="p24_amount" value="{{ $payment['p24_amount'] }}" />

    <input type="text"   name="p24_currency" value="{{ $payment['p24_currency'] }}" />
    <input type="text"   name="p24_description" value="{{ $payment['p24_description'] }}" />
    <input type="text"   name="p24_client" value="{{ $payment['p24_client'] }}" />
    <input type="text"   name="p24_address" value="{{ $payment['p24_address'] }}" />
    <input type="text"   name="p24_zip" value="{{ $payment['p24_zip'] }}" />
    <input type="text"   name="p24_city" value="{{ $payment['p24_city'] }}" />
    <input type="text"   name="p24_country" value="{{ $payment['p24_country'] }}" />
    <input type="text"   name="p24_email" value="{{ $payment['p24_email'] }}" />


    <input type="hidden"   name="p24_language" value="{{ $payment['p24_language'] }}" />
    <input type="hidden"   name="p24_url_return" value="{{ $payment['p24_url_return'] }}" />
    <input type="hidden"   name="p24_api_version" value="{{ $payment['p24_api_version'] }}" /> 
    <input type="hidden" name="p24_sign" value="{{ $payment['p24_sign'] }}" />
    {{ $payment['p24_crc'] }}
    <input name="submit_send" value="wyślij" type="submit" />
    </form>
    @endsection
</div>
@section ('java_script')
<script type="text/javascript">

</script>
@endsection
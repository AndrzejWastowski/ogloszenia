<?php

namespace App\Http\Controllers\Home\Payments;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Platnosci24Controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()    
    {

       // dd(uniqid());

        //dd(md5('abcdefghijk|9999|2500|PLN|a123b456c789d012'));

        $payments['p24_session_id'] = uniqid();   
        $payments['p24_merchant_id'] =  env('PLATNOSCI24_MARSHANT_ID');
        $payments['p24_pos_id'] =  env('PLATNOSCI24_POS_ID');
        $payments['p24_amount'] = '1234';
        $payments['p24_currency'] = 'PLN';
        $payments['p24_description'] = 'T1D1';
        $payments['p24_client'] = 'Jan Kowalski';
        $payments['p24_address'] = 'ul. Polska 33/33';
        $payments['p24_zip'] = '99-300';
        $payments['p24_city'] = 'Kutno';
        $payments['p24_country'] = 'PL';
        $payments['p24_email'] = 'email@host.pl';
        $payments['p24_language'] = 'pl';
        $payments['p24_url_return'] =  env('PLATNOSCI24_URL_RETURN');
        $payments['p24_api_version'] = '3.2';
        $payments['p24_crc'] = env('PLATNOSCI24_CRC_KEY');

        //p24_session_id, p24_merchant_id,  p24_amount, p24_currency, CRC
        $SIGN_STRING = $payments['p24_session_id'].'|'.$payments['p24_merchant_id'].'|'.$payments['p24_amount'].'|'.$payments['p24_currency'].'|'.$payments['p24_crc'];
        //sandbox
       // $SIGN_STRING = $payments['p24_pos_id'].'|'.$payments['p24_crc'];
     // dd($SIGN_STRING);
        $payments['p24_sign'] = md5($SIGN_STRING);
      


        return view('home/payments/transaction',[

         
            'payment' => $payments,
         
        ]);
    }


    public function form(Request $request)    
    {
        $data = $request->capture();
        dd($data);

        $transactions[] = ''; //tablica z danymi powiązanymi z daną transakcją
        $TRANSACTION_LABEL = 'nazwa transakcji';

        $payments['p24_session_id'] = uniqid();   
        $payments['p24_merchant_id'] =  env('PLATNOSCI24_MARSHANT_ID');
        $payments['p24_pos_id'] =  env('PLATNOSCI24_POS_ID');
        $payments['p24_amount'] = '1234';
        $payments['p24_currency'] = 'PLN';
        $payments['p24_description'] = 'T1D1';
        $payments['p24_client'] = 'Jan Kowalski';
        $payments['p24_address'] = 'ul. Polska 33/33';
        $payments['p24_zip'] = '99-300';
        $payments['p24_city'] = 'Kutno';
        $payments['p24_country'] = 'PL';
        $payments['p24_email'] = 'email@host.pl';
        $payments['p24_language'] = 'pl';
        $payments['p24_url_return'] =  env('PLATNOSCI24_URL_RETURN');
        $payments['p24_url_status'] =  env('PLATNOSCI24_URL_STATUS');
        $payments['p24_time_limit'] =  0;
        $payments['p24_wait_for_result'] =  1;
        $payments['p24_channel'] =  16;
        $payments['p24_transfer_label'] =  $TRANSACTION_LABEL;
        
        $payments['p24_api_version'] = '3.2';
        $payments['p24_crc'] = env('PLATNOSCI24_CRC_KEY');

        //p24_session_id, p24_merchant_id,  p24_amount, p24_currency, CRC
        $SIGN_STRING = $payments['p24_session_id'].'|'.$payments['p24_merchant_id'].'|'.$payments['p24_amount'].'|'.$payments['p24_currency'].'|'.$payments['p24_crc'];
        //sandbox
       // $SIGN_STRING = $payments['p24_pos_id'].'|'.$payments['p24_crc'];
     // dd($SIGN_STRING);
        $payments['p24_sign'] = md5($SIGN_STRING);

        //tutaj tworzymy listę transakcji - co zostało zakupione

        foreach ($transactions as $row)
        {
            $payments['p24_name_X'] = $row['id']; //STRING(127)T Nazwa towaru id ogłoszenia
            //$payments['p24_description_X']; //STRING(127) N Dodatkowy opis towaru
            $payments['p24_quantity_X']; //INT T Ilość sztuk towaru
            $payments['p24_price_X']; // INT T Cena jednostkowatowaru
            $payments['p24_number_X']; //INTNID towaru w systemiesprzedawcy //id ceny
}
      


        return view('home/payments/form',[

         
            'payment' => $payments,
         
        ]);
    }

    public function callback(Request $request)
    {
        $data = $request->capture();
        
        dd($data);

        return view('home/payments/callback',[

         
            'data' => $data,
         
        ]);
    }



    public function status(Request $request)
    {
        //$data = $request->capture();
        $data = $request->capture();
        
        $data['p24_merchant']; //ID Sprzedawcy
        
        $data['p24_pos_id']; //  ID Sklepu Sprzedawcy)
        
        $data['p24_session_id']; // (STRING(100)Unikalny identyfikator z systemu sprzedawcy)

        $data['p24_amount']; // INTKwota transakcji wyrażona WALUTA/100 (1.23 PLN = 123)
        $data['p24_currency']; // STRING(3)PLN, EUR, GBP, CZK
        $data['p24_order_id']; // INTNumer transakcji nadany przez Przelewy24
        $data['p24_method']; // INTMetoda klienta
        $data['p24_statement']; // STRINGTytuł przelewu
        $data['p24_sign']; // STRING Suma kontrolna wyliczana wg opisu poniżej (patrz pkt. 7.1) z pól: p24_session_id,p24_order_id,p24_amount ,p24_currency,„Klucz CRC”
       // dd($data);
        return view('home/payments/status', [

         
            'data' => $data,
         
        ]);
    }



    public function verify(Request $request)
    {
        $data = $request;
        dd($data);

        return view('home/payments/verify',[
            'data' => $data,
        ]);
    }


    

}
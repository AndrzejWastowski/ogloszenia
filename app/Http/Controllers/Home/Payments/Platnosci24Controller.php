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
        $this->middleware('auth');
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
        $payments['p24_url_return'] =  env('PLATNOSCI24_REDIRECT_LINK');
        $payments['p24_api_version'] = '3.2';
        $payments['p24_crc'] = env('PLATNOSCI24_CRC_KEY');

        //p24_session_id, p24_merchant_id,  p24_amount, p24_currency, CRC
        $SIGN_STRING = $payments['p24_session_id'].'|'.$payments['p24_merchant_id'].'|'.$payments['p24_amount'].'|'.$payments['p24_currency'].'|'.$payments['p24_crc'];
        //sandbox
       // $SIGN_STRING = $payments['p24_pos_id'].'|'.$payments['p24_crc'];
     // dd($SIGN_STRING);
        $payments['p24_sign'] = md5($SIGN_STRING);
      


        return view('home/payments/payments',[

         
            'payment' => $payments,
         
        ]);
    }

    public function callback(Request $request)
    {
        $data = $request;
        dd($data);

        return view('home/payments/callback',[

         
            'data' => $data,
         
        ]);
    }



    public function status(Request $request)
    {

        $data = $request->value(); 
        
        $data['p24_merchant']; //ID Sprzedawcy
        
        $data['p24_pos_id']; //  ID Sklepu Sprzedawcy)
        
        $data['p24_session_id']; // (STRING(100)Unikalny identyfikator z systemu sprzedawcy)

        $data['p24_amount']; // INTKwota transakcji wyrażona WALUTA/100 (1.23 PLN = 123)
        $data['p24_currency']; // STRING(3)PLN, EUR, GBP, CZK
        $data['p24_order_id']; // INTNumer transakcji nadany przez Przelewy24
        $data['p24_method']; // INTMetoda klienta
        $data['p24_statement']; // STRINGTytuł przelewu
        $data['p24_sign']; // STRING Suma kontrolna wyliczana wg opisu poniżej (patrz pkt. 7.1) z pól: p24_session_id,p24_order_id,p24_amount ,p24_currency,„Klucz CRC”
        return view('home/payments/status');
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
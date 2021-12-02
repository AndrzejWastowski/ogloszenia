<?php

namespace App\Http\Controllers\Home\Payments;


use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Repositories\Eloquent\PriceRepository;
use App\Repositories\Eloquent\OrdersRepository;
use App\Http\Requests\PaymentFormRequest;

use Money\Currencies\AggregateCurrencies;
use Money\Currencies\BitcoinCurrencies;
use Money\Currencies\ISOCurrencies;
use Money\Converter;
use Money\Currency;
use Money\Exchange\FixedExchange;
use Money\Formatter\AggregateMoneyFormatter;
use Money\Formatter\BitcoinMoneyFormatter;
use Money\Formatter\IntlMoneyFormatter;
use Money\Money; 
// int is accepted


class Platnosci24Controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
     private $priceRepository;
    private $ordersRepository;

    public function __construct(
        PriceRepository $priceRepository,
        OrdersRepository $ordersRepository
    )
    {
        $this->middleware('auth');
        $this->priceRepository = $priceRepository;
        $this->ordersRepository = $ordersRepository;
       
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


    public function form(PaymentFormRequest $request)    
    {

        $data = $request->validated();        
        //dd($data);
        $order = $this->ordersRepository->getOrderById($data['order_id']);

        $currencies = new AggregateCurrencies([new ISOCurrencies()]);          
        $numberFormatter = new \NumberFormatter('pl_PL', \NumberFormatter::CURRENCY); 
        $intlFormatter = new IntlMoneyFormatter($numberFormatter, $currencies);
        $moneyFormatter = new AggregateMoneyFormatter(['*' => $intlFormatter]); 
        $money = new Money($order->price_summary, new Currency('PLN'));

               
       // dd($order->OrderList);
       // dd($order->price_summary*100);
        
        $TRANSACTION_LABEL = 'Zamówienie: '.$order->name;

        $payments['p24_session_id'] = uniqid();   
        $payments['p24_merchant_id'] =  env('PLATNOSCI24_MARSHANT_ID');
        $payments['p24_pos_id'] =  env('PLATNOSCI24_POS_ID');
        $payments['p24_amount'] = $order->price_summary;
        $payments['view_amount'] = $moneyFormatter->format($money);
        $payments['p24_currency'] = 'PLN';
        $payments['p24_description'] = 
        $payments['p24_client'] = $order->User->name;
        $payments['p24_address'] = $order->User->adress;
        $payments['p24_zip'] = $order->User->zip;
        $payments['p24_city'] = $order->User->city;
        $payments['p24_country'] = $order->User->country;
        $payments['p24_email'] = $order->User->email;
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

        $i=(int)0;
        foreach ($order->OrderList as $OrderList)
        {
            $i++;
            $payments['p24_name_'.$i] = $OrderList['name']; //STRING(127)T Nazwa towaru id ogłoszenia
            $payments['p24_description_'.$i]  = $OrderList['description'];  //STRING(127) N Dodatkowy opis towaru
            $payments['p24_quantity_'.$i]  = $OrderList['quantity']; //INT T Ilość sztuk towaru
            $payments['p24_price_'.$i]  = ($OrderList['price']*100);  // INT T Cena jednostkowatowaru
           // $payments['p24_number_'.$i];  = $OrderList['name'];  //INTNID towaru w systemiesprzedawcy //id ceny
        }

        return view('home/payments/form',[

            'order' => $order,
            'moneyFormatter' => $moneyFormatter,
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
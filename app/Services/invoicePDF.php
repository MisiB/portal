<?php


namespace App\Services;
use  App\Models\nonrefundable_invoices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class invoicePDF extends \Dompdf\Dompdf
{
    public function __construct(array $config=[])
    {
        parent::__construct($config);
    }

    public function action()
    {
        return request()->has('download') ?'attachment' :'inline';
    }
    public function generate($inv){
        $invoice = nonrefundable_invoices::where(['invoice_number'=>$inv,'company_id'=>Auth::user()->company->id])->get();
        $this->loadHtml( View::make('invoiceprint',compact('invoice','inv'))->render());
        $this->render();
        return $this->output();
    }
}

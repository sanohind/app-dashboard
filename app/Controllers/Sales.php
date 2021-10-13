<?php

namespace App\Controllers;

class Sales extends BaseController
{
    public function index()
    {
        return view('transaction/inv-form');
    }

    public function invoice()
    {
        $getInv = file_get_contents("http://localhost/slim-rest/public/invoice/?type=&invoice=");
        $invData = json_decode($getInv);
        $data['invoice'] = $invData->data;
        return view('transaction/inv-form', $data);
    }

    public function set_invoice($trans, $invoice)
    {
        $getInv = file_get_contents("http://localhost/slim-rest/public/invoice/?type=$trans&invoice=$invoice");
        $invData = json_decode($getInv);
        $data['invoice'] = $invData->data;
        $data['invDetail'] = file_get_contents("http://localhost/slim-rest/public/invoice-detail/?type=$trans&invoice=$invoice");
        //print_r($data);
        return view('transaction/inv-set', $data);
    }

    public function print_invoice()
    {
        $data = $this->request->getPost();
        print_r($data);
        echo "<br/>";
        print_r($data['invLine']);
        echo "<br/>";
        print_r($data['boxQty']);
        echo "<br/>";
        print_r($data['box']);
    }

    public function invoice_report()
    {
        return "hallo, invoice report";
    }

    public function shipment_report()
    {
        return view('report/shipment');
    }
}

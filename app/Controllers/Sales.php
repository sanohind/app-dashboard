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
        $getInv = file_get_contents("http://10.1.10.101/api-display/public/invoice/?type=&invoice=");
        $invData = json_decode($getInv);
        $data['invoice'] = $invData->data;
        return view('transaction/inv-form', $data);
    }

    public function set_invoice($trans, $invoice)
    {
        $getInv = file_get_contents("http://10.1.10.101/api-display/public/invoice/?type=$trans&invoice=$invoice");
        $invData = json_decode($getInv);
        $data['invoice'] = $invData->data;
        $data['invDetail'] = file_get_contents("http://10.1.10.101/api-display/public/invoice-detail/?type=$trans&invoice=$invoice");
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
        return view('report/invoice');
    }

    public function shipment_report()
    {
        return view('report/shipment');
    }

    public function invoice_detail_report()
    {
        return view('report/invoice-detail');
    }

    public function planned_load( $wh = null )
    {
        //$warehouse = $wh;

        $warehouse = $wh != '' ? $wh : '';

        $getData = file_get_contents("http://10.1.10.101/api-display/public/get-planned-load/?warehouse=$warehouse");
        $plData = json_decode($getData);
        $data['plannedload'] = $plData->data;
        $data['wh'] = $warehouse;
        return view('report/planned-load',$data);
    }
}

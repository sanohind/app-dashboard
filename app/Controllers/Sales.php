<?php

namespace App\Controllers;
use Dompdf\Dompdf;

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
        $dataPost = $this->request->getPost();
        // print_r($dataPost);
        // // echo "<br/>";
        // // print_r($data['invLine']);
        // // echo "<br/>";
        // // print_r($data['boxQty']);
        // // echo "<br/>";
        // // print_r($data['box']);
        // // echo "<br/>";
        // // print_r($data['box']);
        // echo "<br/>";
        // print_r($dataPost['invNo']);

        $trans = substr($dataPost['invNo'],0,3) ;
        $invoice = substr($dataPost['invNo'],3) ;
        // echo "<br/>";
        // print_r($invoice);

        $getInv = file_get_contents("http://10.1.10.101/api-display/public/invoice/?type=$trans&invoice=$invoice");
        $invData = json_decode($getInv);
        $data['invoice'] = $invData->data;
        $data['invDetail'] = file_get_contents("http://10.1.10.101/api-display/public/invoice-detail/?type=$trans&invoice=$invoice");
        $data['shipment'] = $dataPost;
        //return view('transaction/invpdf', $data);
        $filename = $dataPost['invNo'];

        $pdf = new Dompdf();
        //$content = file_get_contents(view('transaction/invpdf', $data));
        $pdf->loadHtml(view('transaction/invpdf', $data));
        $pdf->setPaper('A4','Potrait');
        $pdf->render();

        $pdf->stream($filename,array("Attachment"=>0));
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

        $from = date('Y-m-d', strtotime('-1 month', strtotime(date('Y-m-d'))));
        $to = date('Y-m-d', strtotime('+1 day', strtotime(date('Y-m-d'))));
        $getData2 = file_get_contents("http://10.1.10.101/api-display/public/shipment-data/?datefrom=$from&dateto=$to");
        $shp = json_decode($getData2);
        $data['shipment'] = $shp->data;
        return view('report/planned-load',$data);
    }

    public function billable()
    {
        return view('report/billable');
    }
}

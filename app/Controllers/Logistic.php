<?php

namespace App\Controllers;
use Dompdf\Dompdf;

use App\Controllers\BaseController;

class Logistic extends BaseController
{
    public function index()
    {
        if (isset($_GET['submit'])) {
            $bp = $this->request->getGet('bpcode');
            $year = $this->request->getGet('periodyear');
            $month = $this->request->getGet('periodmonth');
            $status = $this->request->getGet('status');

            $data['param'] = [
                'bp' => $bp,
                'year' => $year,
                'month' => $month,
                'status' => $status
            ];

            $getData = file_get_contents("http://10.1.10.101/api-display/public/so-invoice-line/?bp=$bp&year=$year&month=$month&status=$status");
        } else {
            $getData = file_get_contents("http://10.1.10.101/api-display/public/so-invoice-line/?bp=&year=&month=");
        }
        $getCustomer = file_get_contents("http://10.1.10.101/api-display/public/customer-so/");

        $shpData = json_decode($getData);
        $custData = json_decode($getCustomer);
        $data['shipment'] = $shpData->data;
        $data['customer'] = $custData->data;
        return view('report/shipmentlist', $data);
    }

    public function planned_load($wh = null)
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
        return view('report/planned-load', $data);
    }

    public function print_shipment($shipment)
    {
        return view('report/shppdf');
        //$pdf = new Dompdf();
        //$content = file_get_contents(view('transaction/invpdf', $data));
        //$pdf->loadHtml(view('transaction/invpdf', $data));
        //$pdf->setPaper('A4','Potrait');
        //$pdf->render();

        //$pdf->stream($filename,array("Attachment"=>0));
    }
}

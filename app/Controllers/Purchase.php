<?php

namespace App\Controllers;

class Purchase extends BaseController
{
    public function index()
    {
        if (isset($_GET['submit'])) {
            $dateFrom = $this->request->getGet('datefrom');
            $dateTo = $this->request->getGet('dateto');

            $data['dtfrom'] = $dateFrom;
            $data['dtto'] = $dateTo;
        } else {
            $dateFrom = date('Y-m-d', strtotime('-30 day', strtotime(date('Y-m-d'))));
            $dateTo = date('Y-m-d');
        }
        $getData = file_get_contents("http://10.1.10.101/api-display/public/purchase-summary/?datefrom=$dateFrom&dateto=$dateTo");
        //$data['datapr'] = json_decode($getData)->data_pr;
        //$data['po_receipt'] = json_decode($getData)->po_receipt;
        $data['purchase'] = json_decode($getData);
        $data['period'] = "tanggal $dateFrom sampai $dateTo";
        return view('purchase/dashboard',$data);
    }

    public function receipt()
    {
        return view('report/receipt');
    }

}

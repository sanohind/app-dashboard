<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Logistic extends BaseController
{
	public function index()
	{
		$getData = file_get_contents("http://10.1.10.101/api-display/public/so-invoice-line/");
        $shpData = json_decode($getData);
		$data['shipment'] = $shpData->data;
		return view('report/shipmentlist',$data);
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
}
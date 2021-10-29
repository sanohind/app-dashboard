<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StockOpnameModel;

class Warehouse extends BaseController
{
	function __construct()
	{
		$this->stoscnmodel = new StockOpnameModel();
	}

	public function index()
	{
		//
	}

	public function stock_scan()
	{
		return view('transaction/stock-scan');
	}

	public function scanproses()
	{
		$dataPost = $this->request->getPost();
		//print_r($dataPost);
		$limiter = ";";
		$limCount = substr_count($dataPost['label'], $limiter);
		if ($limCount == "4") {
			$check = $this->stoscnmodel->checkexist($dataPost['label']);

			if ($check > 0) {
				$response = [
					'success' => false,
					'msg' => 'label already scan!!!',
				];
			} else {

				$extract = explode($limiter, $dataPost['label']);
				$saveData = [
					"period" => $dataPost['period'],
					"datescan" => date('Y-m-d H:i:s'),
					"nik" => $dataPost['nik'],
					"wh" => $dataPost['wh'],
					"label" => $dataPost['label'],
					"part" => strtoupper($extract[0]),
					"qty" => $extract[1],
					"lot" => $extract[2],
					"customer" => strtoupper($extract[3]),
					"prod" => $extract[4]
				];

				$save = $this->stoscnmodel->insert($saveData);

				if ($save) {
					$response = [
						'success' => true,
						'msg' => 'data save!!!',
					];
				} else {
					$response = [
						'success' => false,
						'msg' => 'error while saving data!!!',
					];
				}
			}
		} else {
			$response = [
				'success' => false,
				'msg' => 'format not supported!!!',
			];
		}

		return $this->response->setJSON($response);
	}

	public function getdatascan($period, $nik = '')
	{
		$data = $this->stoscnmodel->getdata($period, $nik);
		return $this->response->setJSON(["data" => $data]);
	}
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Inventory extends BaseController
{
	public function index($group = null)
	{
		if ($group == null) {
			$data['gp'] = 'FG';
		} else {
			$data['gp'] = $group;
		}
		return view('inventory/main', $data);
	}

	public function stockbywh($wh)
	{
		$data['wh'] = $wh;
		return view('inventory/invwh', $data);
	}

	public function newmonitor($divisi = null)
	{
		if ($divisi == null) {
			$data['divisi'] = 'All';
		} else {
			$data['divisi'] = $divisi;
		}
		$data['year'] = date('Y');
		$data['month'] = date('m');
		return view('inventory/monitor', $data);
	}

	public function monitor($divisi = null)
	{
		if ($divisi == null) {
			$data['divisi'] = 'All';
		} else {
			$data['divisi'] = $divisi;
		}

		$getdata = file_get_contents("http://10.1.10.101/api-display/public/stock-monitor/?wh=".$divisi);
		$data['stock'] = json_decode($getdata);
		return view('inventory/monitor2', $data);
	}
}

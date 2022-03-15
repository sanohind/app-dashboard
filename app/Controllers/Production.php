<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Production extends BaseController
{
	public function index($id,$period)
	{
		if ($id == 'nl') {
			$div = 'Nylon';
			$dv = 'NL';
		} elseif ($id == 'ch') {
			$div = 'Chassis';
			$dv = 'CH';
		} elseif ($id == 'bz') {
			$div = 'Brazing';
			$dv = 'BZ';
		}else{
			$div = 'Passthrough';
			$dv = 'PS';
		}
		//$period = date('ym');
		//echo $period;
		$y = substr($period,0,2);
		$m = substr($period,2)+1;
		$getData = file_get_contents("http://10.1.10.101/api-display/public/production-summary/?divisi=$dv&period=$period");
		$data['dashboard'] = json_decode($getData);
		$data['period'] = date('M Y',mktime(0,0,0,$m,0,$y));
		$data['div'] = $div;
		return view('production/dashboard', $data);
	}
}

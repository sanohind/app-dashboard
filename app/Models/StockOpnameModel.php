<?php

namespace App\Models;

use CodeIgniter\Model;

class StockOpnameModel extends Model
{
	protected $table                = 'tstoscn';
	protected $primaryKey           = ['id'];
	protected $returnType           = 'array';
	protected $allowedFields        = [
		'period',
		'datescan',
		'nik',
		'wh',
		'label',
		'part',
		'qty',
		'lot',
		'customer',
		'prod'
	];

	public function insertWeldmap($data)
	{
		return $this->table($this->table)->insert($data);
	}

	public function checkexist($label)
	{
		return $this->table($this->table)
			->where('label', $label)
			->get()
			->getNumRows();
	}

	public function getdata($period, $nik = '')
	{
		if ($nik == '') {
			return $this->table($this->table)
				->where('period', $period)
				->get()
				->getResultObject();
		} else {
			return $this->table($this->table)
				->where('period', $period)
				->where('nik', $nik)
				->get()
				->getResultObject();
		}
	}
}

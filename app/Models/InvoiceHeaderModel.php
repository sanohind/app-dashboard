<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceHeaderModel extends Model
{
	protected $table                = 'inv_header';
	protected $primaryKey           = 'inv_no';
	protected $returnType           = 'array';
	protected $allowedFields        = [
		'ship_by',
		'sail_date',
		'vessel',
		'port_loading',
		'port_discharge',
		'place_delv',
		'total_pallet',
		'gross_weight',
		'net_weight',
		'incoterm',
		'insurance',
		'freight_cost'
	];

}

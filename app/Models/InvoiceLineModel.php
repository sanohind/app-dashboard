<?php

namespace App\Models;

use CodeIgniter\Model;

class InvoiceLineModel extends Model
{
	protected $table                = 'inv_line';
	protected $primaryKey           = ['inv_no','line'];
	protected $returnType           = 'array';
	protected $allowedFields        = [
		'line',
		'box_qty',
		'box',
		'remark'
	];
}

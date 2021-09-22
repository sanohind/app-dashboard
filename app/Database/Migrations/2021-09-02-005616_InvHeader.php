<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InvHeader extends Migration
{
	public function up()
	{
		//generating field for table inv_header
		$this->forge->addField([
			'inv_no'	=> [
				'type'			=> 'CHAR',
				'constraint'	=> '12'
			],
			'ship_by'		=> [
				'type'			=> 'ENUM',
				'constraint'	=> "'air', 'sea'"
			],
			'sail_date'		=> [
				'type'			=> 'DATE'
			],
			'vessel'		=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> '60'
			],
			'port_loading'	=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> '60'
			],
			'port_discharge' => [
				'type'			=> 'VARCHAR',
				'constraint'	=> '60'
			],
			'place_delv'	=> [
				'type'			=> 'VARCHAR',
				'constraint'	=> '60'
			],
			'total_pallet'	=> [
				'type'			=> 'DECIMAL',
				'constraint'	=> '10,2'
			],
			'gross_weight'	=> [
				'type'			=> 'DECIMAL',
				'constraint'	=> '10,2'
			],
			'net_weight'	=> [
				'type'			=> 'DECIMAL',
				'constraint'	=> '10,2'
			],
			'incoterm'		=> [
				'type'			=> 'CHAR',
				'constraint'	=> '5'
			],
			'insurance'		=> [
				'type'			=> 'DECIMAL',
				'constraint'	=> '10,2'
			],
			'freight_cost' => [
				'type'			=> 'DECIMAL',
				'constraint'	=> '10,2'
			]
		]);

		//define primary key
		$this->forge->addKey('inv_no', TRUE);

		//table generated
		$this->forge->createTable('inv_header');
	}

	public function down()
	{
		//rollback mode, delete table
		$this->forge->dropTable('inv_header');
	}
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class InvLine extends Migration
{
	public function up()
	{
		//generating field for table inv_line
		$this->forge->addField([
			'inv_no'	=> [
				'type'			=> 'CHAR',
				'constraint'	=> '12'
			],
			'line'		=> [
				'type'			=> 'INT',
				'constraint'	=> '3'
			],
			'box_qty'	=> [
				'type'			=> 'decimal',
				'constraint'	=> '10,2'
			],
			'box'		=> [
				'type'			=> 'varchar',
				'constraint'	=> '12'
			],
			'remark'	=> [
				'type'			=> 'varchar',
				'constraint'	=> '60'
			]
		]);

		//define primary key
		$this->forge->addKey('inv_no', true);
		$this->forge->addKey('line', true);

		//table generated
		$this->forge->createTable('inv_line');

	}

	public function down()
	{
		//
	}
}

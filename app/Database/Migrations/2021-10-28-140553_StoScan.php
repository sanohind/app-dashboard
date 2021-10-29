<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StoScan extends Migration
{
	public function up()
	{
		//
		$this->forge->addField([
			'id'          => [
				'type'           => 'INT',
				'constraint'     => 7,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'period'       => [
				'type'           => 'CHAR',
				'constraint'     => '6'
			],
			'datescan'      => [
				'type'           => 'datetime',
			],
			'nik' => [
				'type'           => 'CHAR',
				'constraint'     => '6'
			],
			'wh' => [
				'type'           => 'CHAR',
				'constraint'     => '12'
			],
			'label' => [
				'type'           => 'VARCHAR',
				'constraint'     => '100'
			],
			'part' => [
				'type'           => 'VARCHAR',
				'constraint'     => '25'
			],
			'qty' => [
				'type'			=> 'DECIMAL',
				'constraint'	=> '10,2'
			],
			'lot' => [
				'type'           => 'VARCHAR',
				'constraint'     => '15'
			],
			'customer' => [
				'type'           => 'VARCHAR',
				'constraint'     => '8'
			],
			'prod' => [
				'type'           => 'VARCHAR',
				'constraint'     => '12'
			],
		]);

		// Membuat primary key
		$this->forge->addKey('id', TRUE);

		// Membuat tabel news
		$this->forge->createTable('tstoscn', TRUE);
	}

	public function down()
	{
		//
	}
}

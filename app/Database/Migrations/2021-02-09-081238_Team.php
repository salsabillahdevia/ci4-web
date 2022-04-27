<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Team extends Migration
{
	public function up()
	{
		$this->forge->addField([
			'id_team' => [
				'type' => 'INT',
				'constraint' => 3,
				'unsigned' => true,
				'auto_increment' => true
			],
			'nama_team' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			],
			'kapten' => [
				'type' => 'VARCHAR',
				'constraint' => 50
			],
			'created_at' => [
				'type' => 'DATETIME',
				'null' => true
			],
			'updated_at' => [
				'type' => 'DATETIME',
				'null' => true
			]
		]);
		$this->forge->addKey('id_team', true);
		$this->forge->createTable('team');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('team');
	}
}

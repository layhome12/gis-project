<?php

namespace App\Libraries;

class SelectBuilder
{

	#=====================================#
	#	     USE SELECT2 BUILDER		  #
	#=====================================#
	# new \App\Libraries\SelectBuilder([  #
	#	'table' => 'tabel',				  #
	#	'val_id' => 'tabel_id',           #
	#	'val_text' => 'tabel_nama',       #
	#	'id' => 'tabel_id',               #
	#	'where' => ['status' => 1]        #
	#	]);                               #
	#=====================================#

	function __construct($data = [])
	{
		$str = '';
		$db      = \Config\Database::connect();
		$builder = $db->table($data['table']);

		if (@$data['select'])
			$builder = $builder->select($data['select']);

		if (@$data['val_id'] && @$data['val_text'])
			$builder = $builder->select("$data[val_id] as id, $data[val_text] as text");

		if (@$data['where'])
			$builder = $builder->where($data['where']);

		foreach ($builder->get()->getResult() ?: [] as $key => $value) {
			if (is_array(@$data['id'])) {
				$selected = '';
				foreach (@$data['id'] as $val) {
					if ($value->id == $val) {
						$selected = 'selected';
					}
				}
				$str .= "<option " . $selected . " value=\"" . $value->id . "\">" . $value->text . "</option>" . PHP_EOL;
			} else {
				$selected = ($value->id == @$data['id']) ? 'selected=""' : '';
				$str .= "<option " . $selected . " value=\"" . $value->id . "\">" . $value->text . "</option>" . PHP_EOL;
			}
		}

		echo $str;
	}
}

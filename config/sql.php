<?php
declare(strict_types = 1);

namespace Config;

Class SQL {
	
	private $column_set = [];
	private $where_columns_set = [];
	private $select = 'SELECT * FROM `';
	private $count = 'SELECT Count(*) AS result FROM `';

	public function limit($table, $column, $limit, $offset)
	{
		return 'SELECT * FROM `'.$table.'` WHERE '.$column.' = ? LIMIT '.$limit.' OFFSET '.$offset;
	}

	public function select($table, $array_column = null)	{

		if (empty($array_column)) {

			return $this->select.$table.'`';

		} else {
			
			if (count($array_column) > 0) {

				$column_set = [];
		  
				foreach ($array_column as $column) {
					  
				  array_push($column_set, $column.' = ? AND ');
				}
		  
				$last_element = str_replace(' = ? AND ', ' = ?' , end($column_set));
				array_pop($column_set);
				array_push($column_set, $last_element);
		  
				return $this->select.$table.'` WHERE '.implode($column_set);
				
			} else {
				
				error('SQL ERROR');

			}
		}
	}

	public function __limit($table, $int)
	{
		return 'SELECT * FROM `'.$table.'` LIMIT '.$int;
	}

	public function __limit_Offset($table, $limit, $offset)
	{
		return 'SELECT * FROM `'.$table.'` LIMIT '.$limit.' OFFSET '.$offset;
	}

	public function __deleteAll($table, $db)
	{
		return 'TRUNCATE '.$db.'.'.$table;
	}

	public function Delete($table, $column)
	{
		return 'DELETE FROM `'.$table.'` WHERE '.$column.' = ?';
	} 

	public function Insert($table, $columns)
	{
		return 'INSERT INTO `'.$table.'`('.implode(', ', $columns).') 
		        VALUES('.implode(', ', array_fill(intval(0), count($columns), "?")).')';
	}

	public function update($table, $array_column, $where_columns)
	{

		foreach ($array_column as $column) {

			array_push($this->column_set, $column.' = ?');

		}

		foreach ($where_columns as $column) {
							
			array_push($this->where_columns_set, $column.' = ? AND ');

		}

		$last_element = str_replace(' = ? AND ', ' = ?' , end($this->where_columns_set));
		array_pop($this->where_columns_set);
		array_push($this->where_columns_set, $last_element);

		return 'UPDATE `'.$table.'` SET '.implode(', ', $this->column_set).' 
                WHERE '.implode($this->where_columns_set);
	}

	public function count($table, $array_column)	{

		return 'SELECT Count(*) AS result FROM `'.$table.'`';

		if (empty($array_column)) {

			return $this->count.$table.'`';

		} else {
			
			if (count($array_column) > 0) {
		  
				foreach ($array_column as $column) {
					  
				  array_push($this->column_set, $column.' = ? AND ');
				}
		  
				$last_element = str_replace(' = ? AND ', ' = ?' , end($this->column_set));
				array_pop($this->column_set);
				array_push($this->column_set, $last_element);
		  
				return $this->count.$table.'` WHERE '.implode($this->column_set);
				
			} else {
				
				error('SQL ERROR');

			}
		}
	}

	public function find($table, $column)
	{
		return "SELECT * FROM `.$table.` WHERE `.$column.` LIKE ?";
	}
		
	public function column_sum($column, $table, $column1)	{
		return 'SELECT SUM('.$column.') AS results FROM `'.$table.'` WHERE '.$column1.' = ?';
	}

	public function sum($table, $column, $column1)	{
		return 'SELECT SUM('.$column.') AS results FROM `'.$table.'` WHERE '.$column1.' = ?';
	}
}
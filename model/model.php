<?php 
declare(strict_types = 1);

namespace Model;

use Config\Connection;
use PDO;
use Config\SQL;

class Model extends SQL {
	
	public function DB()
	{
		return new Connection();
	}
	
	/**
	 * runQuery - provides a flexible way to run executeQuery()
	 *
	 */
	public function runQuery($query, $mixed = NULL, $fetchMode = PDO::FETCH_OBJ)
	{
		if($mixed == NULL) {

			return $this->executeQuery($query, NULL, $fetchMode);

		} elseif (gettype($mixed) == 'array') {

			return $this->executeQuery($query, $mixed, $fetchMode);

		} elseif (gettype($mixed) == 'integer') {

			return $this->executeQuery($query, NULL, $mixed);
		}
	}
	
	
	public function executeQuery($query, $data, $fetchMode)
	{
		$sql = $this->DB()->connect()->prepare($query);

		if (!empty($data)) {

			$sql->execute($data);
			return $sql->fetchAll($fetchMode);
		
		} else {

		    $sql->execute();
		    return $sql->fetchAll($fetchMode);
		}
	}

	public function execute($query, $data = NULL)
	{
		$sql = $this->DB()->connect()->prepare($query);

		if (!empty($data)) {

			return $sql->execute($data);

			// if ($sql->execute($data) == true) {

			// 	return true;	

			// } else {

			// 	return false;
			// }
			
		
		} else {

			return $sql->execute();

			// if ($sql->execute() == true) {

			// 	return true;	

			// } else {

			// 	return false;
			// }
		}
	}
}
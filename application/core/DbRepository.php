<?php

abstract class DbRepository
{
	protected $con;

	public function __construct($con)
	{
		$this->setConnection($con);
	}

	public function setConnectin($con)
	{
		$this->con = $con;
	}

	public function execute($sql, $params = [])
	{
		$stmt = $this->con->prepare($sql);
		$stmt->execute($params);
		return $stmt;
	}

	public function fetch($sql, $params =[])
	{
		return $this->execute($sql, $params)->fetch(PDO::FETCH_ASSOC);
	}

	public function fetchAll($sql, $params = [])
	{
		return $this->execute($sql, $params)->fetchAll(PDO::FETCH_ASSOC);

	}
}

<?php
/*	MythicCMS v0.1, created by Corey Caswick
 *	Copyright © 2009 Mythic Web Design <http://www.mythicwebdesign.com/>
 */

// The constants _DB_SERVER, _DB_USER, _DB_PASS and _DB_NAME must be declared before calling this file
define('_DB_DATE_FORMAT', 'Y-m-d H:i:s');

// Database class for MySQL
class Database {
	private $server;
	private $user;
	private $pass;
	private $name;
	private $result;
	private $errno;
	private $error;
	private $link;
	private $num_rows;
	private $affected_rows;
	private $insert_id;
	private $auto_escape_data = 1;

	public function __construct($server=_DB_SERVER, $user=_DB_USER, $pass=_DB_PASS, $name=_DB_NAME) {
	// Setup basic variables
		$this->server		= $server;
		$this->user			= $user;
		$this->pass			= $pass;
		$this->name			= $name;
		$this->errno		= FALSE;
		$this->error		= FALSE;
	}

	// Base Methods
	public function connect() {
		$this->link = mysql_connect($this->server, $this->user, $this->pass);
		mysql_select_db($this->name, $this->link);
		return $this->link;
	}

	public function query($sql) {
		$this->result = mysql_query($sql, $this->connect());
		$this->num_rows = @mysql_num_rows($this->result);
		$this->affected_rows = mysql_affected_rows($this->connect());
		$this->insert_id = mysql_insert_id($this->connect());
		$this->errno = mysql_errno($this->connect());
		$this->error = mysql_error($this->connect());
		return $this->result;
	}

	public function escapeString($string) {
		if (get_magic_quotes_gpc()) $string = stripslashes($string);
		//return mysql_real_escape_string($string);
		return addslashes($string);
	}

	// SQL Commands
	public function select($table, $columns='*', $where='0') {
		$sql = "SELECT $columns FROM $table";
		if ($where) $sql .= " $where";
		return $this->query($sql);
	}

	public function insert($table, $data) {
		foreach ($data as $col => $val) {
			$val = $this->escapeString($val);
			$columns .= "`$col`, ";
			$values .= "'$val', ";
		}
		$columns = rtrim($columns, ', ');
		$values = rtrim($values, ', ');
		return $this->query("INSERT INTO $table ($columns) VALUES ($values)");
	}

	public function update($table, $data, $where='') {
		foreach ($data as $col => $val) {
			$val = $val;
			$assignments .= "`$col`='$val', ";
		}
		$assignments = rtrim($assignments, ', ');
		return $this->query("UPDATE $table SET $assignments $where");
	}

	public function delete($table, $where='0') {
		$sql = "DELETE FROM $table";
		if ($where) $sql .= " $where";
		return $this->query($sql);
	}

	// Informational functions

	public function getResult() {
		return $this->result;
	}

	public function getRow($resource=0) {
		if (!$resource) $resource = $this->getResult();
		return mysql_fetch_assoc($resource);
	}

	public function getInsertID() {
		return $this->insert_id;
	}

	public function getNumRows() {
		return $this->num_rows;
	}

	public function getAffectedRows() {
		return $this->affected_rows;
	}
	
	public function getRowExists($table, $column, $value) {
	// Checks if a row exists in $table where $column = $value
	// Returns TRUE or FALSE
		$result = $this->select($table, '*', 'WHERE '. $column .' = \''. $this->escapeString($value) .'\'');
		if ($this->getNumRows() > 0) return TRUE;
		else return FALSE;
	}
}

?>
<?php

/**
 * Database Provider
 * 
 * @author     Fredrik Borggren
 * @copyright  Fredrik Borggren
 * @package    Framework\Provider\Database
 */

namespace Framework\Provider;

use PDO;

class Database {

    /**
     * @var object|null
     */

    private $pdo;

    /**
     * @var string
     */

    private $config = 'your_config_file.php';

    /**
     * @var integer
     */

    private $mode = PDO::FETCH_OBJ;

    /**
     * @var string|null
     */

    private $table;

    /**
     * @var string|null
     */

    private $column;

    /**
     * @var string|null
     */

    private $where;

    /**
     * Constructor
     */

    public function connect()
    {
        if (!$this->pdo)
        {
            try {
                include_once $this->config;
                $this->pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
            } catch(PDOException $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
    }

    /**
     * Prepare select clause in query task
     * @param string
     * @return Framework\Provider\Database
     */

    public function select(string $column)
    {
        $this->column = 'SELECT ' . preg_replace('/,\s+/', ', ', $column);
        return $this;
    }

    /**
     * Prepare table clause in query task
     * @param string
     * @return Framework\Provider\Database
     */

    public function from(string $table)
    {
        $this->table = ' FROM ' . $table;
        return $this;
    }

    /**
     * Prepare where clause in query task
     * @param string
     * @return Framework\Provider\Database
     */

    public function where($where)
    {
        switch (gettype($where))
        {
            case 'array':
                $where = array_map(function($val) {
                    return $val = $val . ' = ?';
                }, $where);
                $this->where = ' WHERE ' . join(' AND ', $where);
            break;
            case 'string':
                $where = array_map(function($val) {
                    return $val = $val . ' = ?';
                }, explode(',', $where));
                $this->where = ' WHERE ' . join(' AND ', $where);
            break;
        }
        return $this;
    }

    /**
     * Execute query by arguments
     * @return object
     */

    public function query()
    {
        $this->connect();
        $args = func_get_args();
        $query = array_shift($args);
        $query = $this->pdo->prepare($query);
        $query->setFetchMode($this->mode);
        $query->execute($args);
        return $query;
    }

    /**
     * Execute query by class properties
     * @return object
     */

    public function execute(array $param)
    {
        $this->connect();
        if (is_string($this->column) && is_string($this->table) && is_string($this->where))
        {
            $query = $this->pdo->prepare($this->column . $this->table . $this->where);
            $query->setFetchMode($this->mode);
            $query->execute($param);
            return $query;
        }
    }

}
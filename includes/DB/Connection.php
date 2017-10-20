<?php

/**
 * Class Connection to Database
 * with Mysqli driver
 *
 * @author José Luis Cortés <jluis.cortes.cuevas@gmail.com> @lscortesc
 *
 */
class Connection
{
    /**
     * @var string
     */
    private $host;

    /**
     * @var string
     */
    private $user;

    /**
     * @var string
     */
    private $pass;

    /**
     * @var string
     */
    private $db;

    /**
     * @return string
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param string $host
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * @return string
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param string $db
     */
    public function setDb($db)
    {
        $this->db = $db;

        return $this;
    }

    /**
     * @var mysqli
     */
    private $connection;

    /**
     * Connection constructor.
     */
    public function __construct($connect = true)
    {
        $this->host = 'localhost';
        $this->user = 'sgssi';
        $this->pass = 'sgssi';
        $this->db = 'proyect_name';

        if ($connect) {
            $this->connect();
        }
    }

    public function connect()
    {
        if (
            ! $this->connection = mysqli_connect(
                $this->host,
                $this->user,
                $this->pass,
                $this->db
            )
        ) {
            die('Could not connect to database: ' . mysqli_connect_error());
        }
    }

    /**
     * @param $query
     * @return bool|mysqli_result
     */
    public function query($query)
    {
        return $this->connection->query($query);
    }

    /**
     * @return bool
     */
    public function close()
    {
        return $this->connection->close();
    }
}
<?php

namespace src\Integration;
use src\Integration\DataProviderConfig;

/**
 * @author Almat Aubakirov <alaues@gmail.com>
 */
class DataProviderConnection
{
    private static $instance; 
    
    /**
     * instantiate class as Singleton
     * @return class instance
     */
    static public function init()
    {
        if (self::$instance == null)
        {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * 
     * @return \PDO
     */
    public function connect(DataProviderConfig $config)
    {
        //f.e. mysql connection
        $host = $config->getHost();
        $port = $config->getPort();
        $login = $config->getLogin();
        $password = $config->getPassword();
        return new \PDO('dblib:host='.$host.';dbname=dbname;charset=UTF-8', $login, $password);
    }

    /**
     * 
     */
    public function getCaseData()
    {
        //selects data	
    }
    
    public function __construct(){}
    public function __clone(){}
}

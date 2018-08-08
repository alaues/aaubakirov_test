<?php

namespace src\Integration;
use src\Integration\DataProviderConfig;

/**
 * @author Almat Aubakirov <alaues@gmail.com>
 */
class DataProviderConnection
{
    private static $pdo; 

    /**
     * 
     * @param DataProviderConfig $config
     */
    public function __construct(DataProviderConfig $config)
    {
        $host = $config->getHost();
        $port = $config->getPort();
        $login = $config->getLogin();
        $password = $config->getPassword();
        //f.e. mysql
        $this->pdo = new \PDO('dblib:host='.$host.';dbname=dbname;charset=UTF-8', $login, $password);
    }

    /**
     * 
     */
    public function getCaseData()
    {
        //selects data	
    }   
}

<?php

namespace src\Integration;

/**
 * @author Almat Aubakirov <alaues@gmail.com>
 */
class DataProviderConfig
{
    private $host;
    private $port;
    private $login;
    private $password;

    /**
     * 
     * @param string $host
     * @param string $port
     * @param string $login
     * @param string $password
     */
    public function __construct($host, $port, $login, $password)
    {
	     $this->host = $host;
	     $this->port = $port;
	     $this->login = $login;
	     $this->password = $password;
    }

    /**
     * 
     * @return string
     */
    public function getHost()
    {
	      return $this->host;
    }

    /**
     * 
     * @return string
     */
    public function getPort()
    {
	      return $this->port;
    }

    /**
     * 
     * @return string
     */
    public function getLogin()
    {
	      return $this->login;
    }

    /**
     * 
     * @return string
     */
    public function getPassword()
    {
	       return $this->password;
    }

}

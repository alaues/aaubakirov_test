<?php

namespace src\Integration;
use src\Integration\DataProviderConfig;
use src\Integration\DataProviderConnection;
use Psr\Log\Logger;
use DateTime;
use Psr\Cache\CacheItemPool;

class DataProvider
{
    private $connection;

    /**
     * 
     * @param \src\Integration\DataProviderConfig $config
     */
    public function __construct(DataProviderConfig $config)
    {
        $this->cache = new CacheItemPool();
        $this->logger = new Logger();
        $this->connection = new DataProviderConnection($config);
    }
    
    /**
     * @param array $input
     * @return array
     */
    public function get(array $input) : array
    {
        try {
            $cacheKey = $this->getCacheKey($input);
            if ($cacheKey && !empty($result = $this->checkCache($cacheKey))){
                return $result;
            }
            $result = $this->connection->getCaseData($input);

            if ($cacheKey){
                $this->saveCache($result, $cacheKey);
            }

            return $result;
        } catch (Exception $e) {
            $this->logger->critical('Error');
        }
    }

    /**
     * 
     * @param array $input
     * @return string
     */
    private function getCacheKey(array $input) : string
    {
        $keysAr = json_encode($input); 
        $keysStr = $keysAr['element'];//probably here should be returned some element 
        //
        return $keysStr;
    }

    /**
     * 
     * @param array $input
     * @param type $key
     * @return array
     */
    private function checkCache(array $input, $key) : array
    {
        $cacheItem = $this->cache->getItem($key);
        if ($cacheItem->isHit()) {
            return $cacheItem->get();
        }
        return array();
    }

    /**
     * 
     * @param array $data
     * @param string $key
     */
    private function saveCache(array $data, $key)
    {
        $this->cache->getItem($key)
                ->set($data)
                ->expiresAt(
                    (new DateTime())->modify('+1 day')
        );
    }
}

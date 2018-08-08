<?php

namespace src\Decorator;

use src\Integration\DataProvider;
use src\Decorator\DecoratorInterface;

/**
 * @author Almat Aubakirov <alaues@gmail.com>
 */
final class DecoratorOne implements DecoratorInterface
{
    protected $dataProvider;

    /**
     * 
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    /**
     * 
     * @param array $input
     * @return array
     */
    public function getResponse(array $input) : array
    {
        $data = $this->dataProvider->get($input);
        //TODO some actions with $data
        //f.e. $data = array_merge(array('name' => 123), $data);
        return $data;
    }
}

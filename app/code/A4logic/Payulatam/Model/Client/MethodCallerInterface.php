<?php
/**
 * @copyright Copyright (c) 2017 a4logic Colombia (https://www.a4logic.com)
 */

namespace A4logic\Payulatam\Model\Client;

interface MethodCallerInterface
{
    /**
     * @param string $methodName
     * @param array $args
     * @return mixed
     */
    public function call($methodName, array $args = []);
}

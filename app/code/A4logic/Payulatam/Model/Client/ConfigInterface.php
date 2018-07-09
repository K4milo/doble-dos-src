<?php
/**
 * @copyright Copyright (c) 2017 a4logic Colombia (https://www.a4logic.com)
 */

namespace A4logic\Payulatam\Model\Client;

interface ConfigInterface
{
    public function setConfig();

    public function getConfig($key);
}

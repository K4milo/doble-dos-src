<?php
/**
 * @copyright Copyright (c) 2017 a4logic Colombia (https://www.a4logic.com)
 */

namespace A4logic\Payulatam\Model\Client;

class Rest extends \A4logic\Payulatam\Model\Client
{
    /**
     * @param Rest\Config $configHelper
     * @param Rest\Order $orderHelper
     */
    public function __construct(
        Rest\Config $configHelper,
        Rest\Order $orderHelper
    ) {
        parent::__construct(
            $configHelper,
            $orderHelper
        );
    }
}

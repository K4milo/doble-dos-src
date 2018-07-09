<?php
/**
 * Copyright © 2016 Cleavercoder. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Cleavercoder\Advanceshiping\Api\Quote;

/**
 * Interface ShippingMethodManagementInterface
 * @api
 */
interface ShippingMethodManagementInterface extends \Magento\Quote\Model\ShippingMethodManagementInterface
{
    /**
     * Estimate shipping
     *
     * @param int $cartId The shopping cart ID.
     * @param \Cleavercoder\Advanceshiping\Api\Quote\Data\EstimateAddressInterface $address The estimate address
     * @return \Magento\Quote\Api\Data\ShippingMethodInterface[] An array of shipping methods.
     */
    public function estimateRatesByAddress($cartId, \Cleavercoder\Advanceshiping\Api\Quote\Data\EstimateAddressInterface $address);
}

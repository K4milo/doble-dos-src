<?php
/**
 * Copyright © 2016 Cleavercoder. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Cleavercoder\Advanceshiping\Api\Quote;

/**
 * Shipping method management interface for guest carts.
 * @api
 */
interface GuestShippingMethodManagementInterface extends \Magento\Quote\Api\GuestShippingMethodManagementInterface
{
    /**
     * Estimate shipping
     *
     * @param string $cartId The shopping cart ID.
     * @param \Cleavercoder\Advanceshiping\Api\Quote\Data\EstimateAddressInterface $address The estimate address
     * @return \Magento\Quote\Api\Data\ShippingMethodInterface[] An array of shipping methods.
     */
    public function estimateRatesByAddress($cartId, \Cleavercoder\Advanceshiping\Api\Quote\Data\EstimateAddressInterface $address);
}

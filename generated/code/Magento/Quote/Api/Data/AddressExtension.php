<?php
namespace Magento\Quote\Api\Data;

/**
 * Extension class for @see \Magento\Quote\Api\Data\AddressInterface
 */
class AddressExtension extends \Magento\Framework\Api\AbstractSimpleObject implements AddressExtensionInterface
{
    /**
     * @return string|null
     */
    public function getCity2()
    {
        return $this->_get('city2');
    }

    /**
     * @param string $city2
     * @return $this
     */
    public function setCity2($city2)
    {
        $this->setData('city2', $city2);
        return $this;
    }
}

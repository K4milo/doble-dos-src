<?php
/**
 * Copyright © 2016 ShopGo. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Cleavercoder\Advanceshiping\Model\Quote;

use Cleavercoder\Advanceshiping\Api\Quote\Data\EstimateAddressInterface;

class EstimateAddress extends \Magento\Quote\Model\EstimateAddress implements EstimateAddressInterface
{
    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->getData(self::KEY_CITY);
    }

    /**
     * Set city
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city)
    {
        return $this->setData(self::KEY_CITY, $city);
    }


/**
     * Get street
     *
     * @return string[]
     */
    public function getStreet()
    {
        return $this->getData(self::KEY_STREET);
    }

    /**
     * Set street
     *
     * @param string[] $street
     * @return $this
     */
    public function setStreet($street)
    {
        return $this->setData(self::KEY_STREET, $street);
    }


/**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->getData(self::KEY_FIRSTNAME);
    }

    /**
     * Set street
     *
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname)
    {
        return $this->setData(self::KEY_FIRSTNAME, $firstname);
    }



/**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->getData(self::KEY_LASTNAME);
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return $this
     */
    public function setLastname($lastname)
    {
        return $this->setData(self::KEY_LASTNAME, $lastname);
    }

/**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->getData(self::KEY_COMPANY);
    }

    /**
     * Set company
     *
     * @param string $company
     * @return $this
     */
    public function setCompany($company)
    {
        return $this->setData(self::KEY_COMPANY, $company);
    }

/**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->getData(self::KEY_TELEPHONE);
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return $this
     */
    public function setTelephone($telephone)
    {
        return $this->setData(self::KEY_TELEPHONE, $telephone);
    }


/**
     * Get CheckoutFields
     *
     * @return string
     */
    public function getCheckoutFields()
    {
        return $this->getData(self::KEY_CheckoutFields);
    }

    /**
     * Set CheckoutFields
     *
     * @param string $CheckoutFields
     * @return $this
     */
    public function setCheckoutFields($CheckoutFields)
    {
        return $this->setData(self::KEY_CheckoutFields, $CheckoutFields);
    }
	
	
	/**
     * Get CheckoutFields
     *
     * @return string
     */
    public function getSaveInAddressBook()
    {
        return $this->getData(self::KEY_SAVE_IN_ADDRESS_BOOK);
    }

    /**
     * Set CheckoutFields
     *
     * @param string $save_in_address_book
     * @return $this
     */
    public function setSaveInAddressBook($save_in_address_book)
    {
        return $this->setData(self::KEY_SAVE_IN_ADDRESS_BOOK, $save_in_address_book);
    }

   /**
	Get TriggerReload
     *
     * @return string
     */
    public function getTriggerReload()
    {
        return $this->getData(self::KEY_TRIGGERRELOAD);
    }
    /**
     * Set TriggerReload
     *
     * @param string $TriggerReload
     * @return $this
     */
    public function setTriggerReload($TriggerReload)
    {
        return $this->setData(self::KEY_TRIGGERRELOAD, $TriggerReload);
    }

	
	
	

}

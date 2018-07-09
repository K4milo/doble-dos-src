<?php
/**
 * Copyright © 2016 Cleavercoder. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Cleavercoder\Advanceshiping\Api\Quote\Data;

/**
 * Interface EstimateAddressInterface
 * @api
 */
interface EstimateAddressInterface extends \Magento\Quote\Api\Data\EstimateAddressInterface
{
    /**#@+
     * Constants defined for keys of array, makes typos less likely
     */
    const KEY_CITY = 'city';

    /**#@-*/

    /**
     * Get city
     *
     * @return string
     */
    public function getCity();

    /**
     * Set city
     *
     * @param string $city
     * @return $this
     */
    public function setCity($city);




const KEY_STREET = 'street';

    /**#@-*/

    /**
     * Get street
     *
     * @return string[]
     */
    public function getStreet();

    /**
     * Set street
     *
     * @param string[] $street
     * @return $this
     */
    public function setStreet($street);



const KEY_FIRSTNAME = 'firstname';

    /**#@-*/

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname();

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return $this
     */
    public function setFirstname($firstname);




const KEY_LASTNAME = 'lastname';

    /**#@-*/

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname();

    /**
     * Set lastname
     *
     * @param string $lastname
     * @return $this
     */
    public function setLastname($lastname);


const KEY_COMPANY = 'company';

    /**#@-*/

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany();

    /**
     * Set company
     *
     * @param string $company
     * @return $this
     */
    public function setCompany($company);


const KEY_CHECKOUTFIELDS = 'checkoutfields';

    /**#@-*/

    /**
     * Get checkoutfields
     *
     * @return string
     */
    public function getCheckoutfields();

    /**
     * Set checkoutfields
     *
     * @param string $checkoutfields
     * @return $this
     */
    public function setCheckoutfields($checkoutfields);

	const KEY_TELEPHONE = 'telephone';

    /**#@-*/

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone();

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return $this
     */
    public function setTelephone($telephone);

	const KEY_SAVE_IN_ADDRESS_BOOK = 'save_in_address_book';

    /**#@-*/

    /**
     * Get save_in_address_book
     *
     * @return string
     */
    public function getSaveInAddressBook();

    /**
     * Set save_in_address_book
     *
     * @param string $save_in_address_book
     * @return $this
     */
    public function setSaveInAddressBook($save_in_address_book);



///////////


const KEY_TRIGGERRELOAD = 'TriggerReload';

    /**#@-*/

    /**
     * Get TriggerReload
     *
     * @return string
     */
    public function getTriggerReload();

    /**
     * Set TriggerReload
     *
     * @param string $TriggerReload
     * @return $this
     */
    public function setTriggerReload($TriggerReload);





}

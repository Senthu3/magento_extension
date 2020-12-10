<?php
/**
 * 
 * Checkout custom fields interface
 * 
 * 
 * Agentur Loop
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to Agentur Loop
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade this extension to newer
 * version in the future.
 *
 * @package     Agentur_Loop
 * @copyright   © 2020 by LOOP New Media GmbH. All rights reserved. (https://www.agentur-loop.com/)
 */

declare(strict_types=1);

namespace Loop\CheckoutCustomForm\Api\Data;

/**
 * Interface CustomFieldsInterface
 *
 * @category Api/Data/Interface
 * @package  Loop\CheckoutCustomForm\Api\Data
 */
interface CustomFieldsInterface
{
    const CHECKOUT_PURPOSE = 'checkout_purpose';


    /**
     * Get checkout purpose
     *
     * @return string|null
     */
    public function getCheckoutPurpose();

    
    /**
     * Set checkout purchase order number
     *
     * @param string|null $checkoutPurpose
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutPurpose(string $checkoutPurpose = null);

}

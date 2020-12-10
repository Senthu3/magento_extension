<?php
/**
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

namespace Loop\CheckoutCustomForm\Model\Data;

use Magento\Framework\Api\AbstractExtensibleObject;
use Loop\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

/**
 * Class CustomFields
 *
 * @category Model/Data
 * @package  Loop\CheckoutCustomForm\Model\Data
 */
class CustomFields extends AbstractExtensibleObject implements CustomFieldsInterface
{
    
    /**
     * Get checkout purchase order number
     *
     * @return string|null
     */
    public function getCheckoutPurpose()
    {
        return $this->_get(self::CHECKOUT_PURPOSE);
    }

    
    /**
     * Set checkout purchase order number
     *
     * @param string|null $checkoutPurpose Purchase order number
     *
     * @return CustomFieldsInterface
     */
    public function setCheckoutPurpose(string $checkoutPurpose = null)
    {
        return $this->setData(self::CHECKOUT_PURPOSE, $checkoutPurpose);
    }
}

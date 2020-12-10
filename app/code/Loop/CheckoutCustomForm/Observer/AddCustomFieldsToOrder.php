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

namespace Loop\CheckoutCustomForm\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer;
use Loop\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

/**
 * Class AddCustomFieldsToOrder
 *
 * @category Observer
 * @package  Loop\CheckoutCustomForm\Observer
 */
class AddCustomFieldsToOrder implements ObserverInterface
{
    /**
     * Execute observer method.
     *
     * @param Observer $observer Observer
     *
     * @return void
     */
    public function execute(Observer $observer)
    {
        $order = $observer->getEvent()->getOrder();
        $quote = $observer->getEvent()->getQuote();

        $order->setData(
            CustomFieldsInterface::CHECKOUT_PURPOSE,
            $quote->getData(CustomFieldsInterface::CHECKOUT_PURPOSE)
        );
    }
}

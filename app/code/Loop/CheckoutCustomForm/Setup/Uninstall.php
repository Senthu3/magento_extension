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

namespace Loop\CheckoutCustomForm\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UninstallInterface;
use Loop\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

/**
 * Class Uninstall
 *
 * @category Uninstall
 * @package  Loop\CheckoutCustomForm\Setup
 */
class Uninstall implements UninstallInterface
{
    /**
     * SchemaSetupInterface
     *
     * @var SchemaSetupInterface
     */
    protected $setup;

    /**
     * Uninstall data
     *
     * @param SchemaSetupInterface   $setup   SchemaSetupInterface
     * @param ModuleContextInterface $context ModuleContextInterface
     *
     * @return void
     */
    public function uninstall(
        SchemaSetupInterface $setup,
        ModuleContextInterface $context
    ) {
        $this->setup = $setup->startSetup();
        $this->uninstallQuoteData();
        $this->uninstallSalesData();
        $this->setup = $setup->endSetup();
    }

    /**
     * Uninstall quote custom data
     *
     * @return void
     */
    public function uninstallQuoteData()
    {
        $this->setup->getConnection()->dropColumn(
            $this->setup->getTable('quote'),
            CustomFieldsInterface::CHECKOUT_PURPOSE
        );
    }

    /**
     * Uninstall sales custom data
     *
     * @return void
     */
    public function uninstallSalesData()
    {
        $this->setup->getConnection()->dropColumn(
            $this->setup->getTable('sales_order'),
            CustomFieldsInterface::CHECKOUT_PURPOSE
        );
    }
}

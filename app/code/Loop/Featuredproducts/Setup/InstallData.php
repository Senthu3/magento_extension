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

namespace Loop\Featuredproducts\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	/**
	* EAV setup factory
	*
	* @var EavSetupFactory
	*/
	private $eavSetupFactory;

	/**
	* Init
	*
	* @param EavSetupFactory $eavSetupFactory
	*/
	public function __construct(EavSetupFactory $eavSetupFactory)
	{
		$this->eavSetupFactory = $eavSetupFactory;
	}
 
	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		/** @var EavSetup $eavSetup */
		$eavSetup = $this->eavSetupFactory
						 ->create(['setup' => $setup]);

		/**
		* Add attributes to the eav/attribute
		*/
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'is_featured',
				[
					'group' => 'General',
					'type' => 'int',
					'backend' => '',
					'frontend' => '',
					'label' => 'Featured',
					'input' => 'boolean',
					'class' => '',
					'source' => '',
					'global' => \Magento\Catalog\Model\ResourceModel\Eav\Attribute::SCOPE_GLOBAL,
					'visible' => true,
					'required' => false,
					'user_defined' => true,
					'default' => '',
					'searchable' => false,
					'filterable' => false,
					'comparable' => false,
					'visible_on_front' => false,
					'used_in_product_listing' => true,
					'unique' => false,
					'apply_to' => 'simple,configurable,virtual,bundle,downloadable'
				]
		);
	}
}
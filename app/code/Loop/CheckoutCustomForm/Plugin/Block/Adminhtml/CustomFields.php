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

namespace Loop\CheckoutCustomForm\Plugin\Block\Adminhtml;

use Magento\Framework\Exception\LocalizedException;
use Magento\Sales\Block\Adminhtml\Order\View\Info;
use Loop\CheckoutCustomForm\Api\CustomFieldsRepositoryInterface;

/**
 * Class CustomFieldsRepository
 *
 * @category Adminhtml/Plugin
 * @package  Loop\CheckoutCustomForm\Plugin
 */
class CustomFields
{
    /**
     * CustomFieldsRepositoryInterface
     *
     * @var CustomFieldsRepositoryInterface
     */
    protected $customFieldsRepository;

    /**
     * CustomFields constructor.
     *
     * @param CustomFieldsRepositoryInterface $customFieldsRepository Repository Interface
     */
    public function __construct(CustomFieldsRepositoryInterface $customFieldsRepository)
    {
        $this->customFieldsRepository = $customFieldsRepository;
    }

    /**
     * Modify after to html.
     *
     * @param Info   $subject Info
     * @param string $result  Result
     *
     * @return string
     * @throws LocalizedException
     */
    public function afterToHtml(Info $subject, $result) {
        $block = $subject->getLayout()->getBlock('order_custom_fields');
        if ($block !== false) {
            $block->setOrderCustomFields(
                $this->customFieldsRepository->getCustomFields($subject->getOrder())
            );
            $result = $result . $block->toHtml();
        }

        return $result;
    }
}

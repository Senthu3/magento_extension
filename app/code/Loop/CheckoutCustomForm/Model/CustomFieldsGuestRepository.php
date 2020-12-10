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

namespace Loop\CheckoutCustomForm\Model;

use Magento\Quote\Model\QuoteIdMaskFactory;
use Loop\CheckoutCustomForm\Api\CustomFieldsGuestRepositoryInterface;
use Loop\CheckoutCustomForm\Api\CustomFieldsRepositoryInterface;
use Loop\CheckoutCustomForm\Api\Data\CustomFieldsInterface;

/**
 * Class CustomFieldsGuestRepository
 *
 * @category Model/Repository
 * @package  Loop\CheckoutCustomForm\Model
 */
class CustomFieldsGuestRepository implements CustomFieldsGuestRepositoryInterface
{
    /**
     * @var QuoteIdMaskFactory
     */
    protected $quoteIdMaskFactory;

    /**
     * @var CustomFieldsRepositoryInterface
     */
    protected $customFieldsRepository;

    /**
     * @param QuoteIdMaskFactory              $quoteIdMaskFactory
     * @param CustomFieldsRepositoryInterface $customFieldsRepository
     */
    public function __construct(
        QuoteIdMaskFactory $quoteIdMaskFactory,
        CustomFieldsRepositoryInterface $customFieldsRepository
    ) {
        $this->quoteIdMaskFactory     = $quoteIdMaskFactory;
        $this->customFieldsRepository = $customFieldsRepository;
    }

    /**
     * @param string                $cartId
     * @param CustomFieldsInterface $customFields
     * @return CustomFieldsInterface
     */
    public function saveCustomFields(
        string $cartId,
        CustomFieldsInterface $customFields
    ): CustomFieldsInterface {
        $quoteIdMask = $this->quoteIdMaskFactory->create()->load($cartId, 'masked_id');
        return $this->customFieldsRepository->saveCustomFields((int)$quoteIdMask->getQuoteId(), $customFields);
    }
}

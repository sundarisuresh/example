<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Around\Cart\Controller\Placeorder;

use Exception;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    protected $cart;
    protected $quoteManagement;

    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     */
    public function __construct(PageFactory $resultPageFactory,
                                \Magento\Checkout\Model\Cart $cart,
                                \Magento\Quote\Api\CartRepositoryInterface $quoteRepository,
                                \Magento\Customer\Api\CustomerRepositoryInterface $customerRepository,
                                \Magento\Customer\Model\AddressFactory $addressFactory,
                                \Magento\Customer\Model\SessionFactory $customerSessionFactory,
                                \Magento\Quote\Model\QuoteManagement $quoteManagement,
                                Context                        $context

    )
    {
        $this->cart= $cart;
        $this->resultPageFactory = $resultPageFactory;
        $this->quoteManagement=$quoteManagement;
        $this->quoteRepository = $quoteRepository;
        $this->customerRepository = $customerRepository;
        $this->addressFactory  = $addressFactory;
        $this->_customerSessionFactory = $customerSessionFactory;
        parent::__construct($context);
    }

    /**
     * Execute view action
     *
     * @return ResultInterface
     */
    public function execute()
    {
        $quote = $this->cart->getQuote();
        $this->setBillingAddressToQuote($quote->getId());

      try {
          $orderid = $this->quoteManagement->placeOrder($quote->getId());
      }
      catch(Exception $e) {
          echo 'Message: ' .$e->getMessage();
          exit;
      }

        return $this->resultPageFactory->create();
    }

    public function setBillingAddressToQuote($cartId) {
        $quote = $this->quoteRepository->getActive($cartId);

        $customerId = $this->_customerSessionFactory->create()->getCustomerId();
        //get customer default billing address using customerId.
        $customer = $this->customerRepository->getById($customerId);
        $billingAddressId = $customer->getCustomAttribute('default_delivery_add')->getValue();
        $billingAddress = $this->addressFactory->create()->load($billingAddressId);
        $address = $billingAddress->getData();
        //now setting the address as the quote billing address
        $quote->getBillingAddress()->setFirstname($address['firstname']);
        $quote->getBillingAddress()->setLastname($address['lastname']);
        $quote->getBillingAddress()->setStreet($address['street']);
        $quote->getBillingAddress()->setCity($address['city']);
        $quote->getBillingAddress()->setTelephone($address['telephone']);
        $quote->getBillingAddress()->setPostcode($address['postcode']);
        $quote->getBillingAddress()->setCountryId($address['country_id']);
    }
}


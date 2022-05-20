<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\View\Result\PageFactory;


class Vote extends \Magento\Framework\App\Action\Action
{
    protected $customerSession;
    protected $vote;
    protected $resultJsonFactory;

    /**
     * Constructor
     * //     * @param PageFactory $resultPageFactory
     */
    public function __construct (JsonFactory                     $resultJsonFactory, Context $context,
                                 \Magento\Customer\Model\Session $customerSession,
                                 \Sundari\Pqa\Model\VoteFactory  $vote
    )
    {
        $this->customerSession = $customerSession;
        $this->vote = $vote;
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
//        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute ()
    {
        $question = $this->request->getParam("que_id");
        $vote = $this->request->getParam("type");
        $customerid = $this->getCustomer();

        $tableresult = $this->getVoteCollection($question, $customerid);
        if ($customerid && $tableresult->count() == 0) {
            $vote = $this->vote->create();
            $vote->setData('questionid', $question);
            $vote->setData('customerid', $customerid);
            if ($vote == 'up') {
                $vote->setData('up', 1);
                $vote->setData('down', 0);
            } else {
                $vote->setData('up', 0);
                $vote->setData('down', 1);
            }
            $vote->save();
        }
        if ($customerid && $tableresult->count() == 1) {
            $row = $tableresult->getFirstItem();
//            $row->getData('up');
//            $row->getData('down');

            if ($vote == 'up' && $row->getData('up') == '1') {
//                you vted

            } elseif ($vote == 'down' && $row->getData('down') == '1') {
//                you already voted
            } elseif ($vote == 'up' && $row->getData('down') == '1') {
                $row->setData('up', 1);
                $row->setData('down', 0);
                $row->save();
//                your vte has updated
            } elseif ($vote == 'down' && $row->getData('up') == '1') {
                $row->setData('up', 0);
                $row->setData('down', 1);
                $row->save();

//                your vte has updated
            }

        } else {
//            please login tovote first;
        }


//if ($vote == 'up')


        $resultJson = $this->resultJsonFactory->create();
        return $resultJson->setData(['json_data' => 'come from json']);
//        return $this->resultPageFactory->create();
    }

    /**
     * Execute view action
     * @return ResultInterface
     */
    public
    function getCustomer ()
    {
        return $this->customerSession->getCustomer()->getId();

    }

    public
    function getVoteCollection ($question, $customerid)
    {
        $collection = $this->vote->create()
            ->getCollection()->addFieldToSelect('*')
            ->addFieldToFilter('questionid', $question)
            ->addFieldToFilter('customerid', $customerid)
            ->load();
        return $collection;
    }
}


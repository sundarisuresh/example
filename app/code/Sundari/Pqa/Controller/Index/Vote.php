<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Pqa\Controller\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;

//use Magento\Framework\View\Result\PageFactory;


class Vote extends \Magento\Framework\App\Action\Action
{
    protected $request;

    protected $customerSession;
    protected $vote;
    protected $resultJsonFactory;

    /**
     * Constructor
     * //     * @param PageFactory $resultPageFactory
     */
    public function __construct (JsonFactory                         $resultJsonFactory, Context $context,
                                 \Magento\Customer\Model\Session     $customerSession,
                                 \Magento\Framework\App\Request\Http $request,
                                 \Sundari\Pqa\Model\VoteFactory      $vote
    )
    {
        $this->customerSession = $customerSession;
        $this->vote = $vote;
        $this->request = $request;
        parent::__construct($context);
        $this->resultJsonFactory = $resultJsonFactory;
//        $this->resultPageFactory = $resultPageFactory;
    }

    public function execute ()
    {
        $question = $this->request->getParam("que_id");
        $type = $this->request->getParam("type");
        $customerid = $this->getCustomer();
        $resultJson = $this->resultJsonFactory->create();

        $tableresult = $this->getVoteCollection($question, $customerid);
        if ($customerid && $tableresult->count() == 0) {
            $vote = $this->vote->create();
            $vote->setData('questionid', $question);
            $vote->setData('customerid', $customerid);
            if ($type == 'up') {
                $vote->setData('up', 1);
                $vote->setData('down', 0);
            } else {
                $vote->setData('up', 0);
                $vote->setData('down', 1);
            }
            $vote->save();
            $count=$this->getCount($question);
            return $resultJson->setData(['response' => 'your vote has been registered', 'up' => $count[0] ,'down' => $count[1] ]);

        }
        if ($customerid && $tableresult->count() == 1) {
            $row = $tableresult->getFirstItem();

            if ($type == 'up' && $row->getData('up') == '1') {
                $count=$this->getCount($question);
                return $resultJson->setData(['response' => 'you already voted', 'up' => $count[0] ,'down' => $count[1]]);

            } elseif ($type == 'down' && $row->getData('down') == '1') {
                $count=$this->getCount($question);
                return $resultJson->setData(['response' => 'you already voted', 'up' => $count[0] ,'down' => $count[1]]);

            } elseif ($type == 'up' && $row->getData('down') == '1') {
                $row->setData('up', 1);
                $row->setData('down', 0);
                $row->save();
                $count=$this->getCount($question);
                return $resultJson->setData(['response' => 'your vote has updated', 'up' => $count[0] ,'down' => $count[1]]);

            } elseif ($type == 'down' && $row->getData('up') == '1') {
                $row->setData('up', 0);
                $row->setData('down', 1);
                $row->save();
                $count=$this->getCount($question);
                return $resultJson->setData(['response' => 'your vote has updated', 'up' => $count[0] ,'down' => $count[1]]);

            }

        } else {
            $count=$this->getCount($question);
            return $resultJson->setData(['response' => 'please login to vote first', 'up' => $count[0] ,'down' => $count[1]]);


        }

    }


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

    public
    function getCount ($question)
    {
        $count1 = $this->vote->create()
            ->getCollection()->addFieldToSelect('*')
            ->addFieldToFilter('questionid', $question)
            ->addFieldToFilter('up', 1)
            ->load()->count();

        $count2 = $this->vote->create()
            ->getCollection()->addFieldToSelect('*')
            ->addFieldToFilter('questionid', $question)
            ->addFieldToFilter('down', 1)
            ->load()->count();
        $result = [$count1, $count2];

        return $result;
    }

}


<?php

/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */

declare(strict_types=1);

namespace Sundari\Productfaq\Controller\Index;

use Exception;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Message\ManagerInterface;
use Sundari\Productfaq\Model\VoteFactory;


class Vote extends Action
{
    protected $messageManager;
    protected $customerSession;
    protected $resultJsonFactory;

    // protected $date;


    /**
     * @var PageFactory
     */
    // protected $resultRedirectFactory;
    protected $vote;

    /**
     * Constructor
     * @param PageFactory $resultPageFactory
     */
    public function __construct (
        // RedirectFactory $resultRedirectFactory,
        VoteFactory      $vote,
        Context          $context,
        ManagerInterface $messageManager,
        Session          $customerSession,
        JsonFactory      $resultJsonFactory
        // \Magento\Framework\Stdlib\DateTime\DateTime $date

    )
    {

        $this->_messageManager = $messageManager;
        // $this->resultRedirectFactory = $resultRedirectFactory;
        $this->vote = $vote;
        $this->customerSession = $customerSession;
        $this->resultJsonFactory = $resultJsonFactory;

        // $this->date = $date;

        parent::__construct($context);
        // parent::__construct($context);

    }

    public function execute ()
    {
        $resultJson = $this->resultJsonFactory->create();
        $data = $this->getRequest()->getParams();

        $collection = $this->vote->create()->getCollection();
        $collection = $collection->addFieldToSelect('*')
            ->addFieldToFilter('questionid', $data['questionid'])
            ->addFieldToFilter('customerid', $this->getCustomer())
            ->load();

        // echo "<pre>";
        // print_r($collection->getData());
        // exit;


        if ($this->getCustomer() && $collection->count() == 0) {

            if ($data) {
                try {
                    $customerid = $this->getCustomer();
                    $vote = $this->vote->create();
                    $vote->setData('questionid', $data['questionid']);
                    $vote->setData('customerid', $customerid);
                    if ($data['vote'] == 'up') {
                        $vote->setData('upvote', 1);
                    } else {
                        $vote->setData('downvote', 1);
                    }
                    $vote->save();
                    return $resultJson->setData(['result' => 'sucess', 'vote' => $this->getCount($data['questionid'])]);
                } catch (Exception $e) {
                    return $resultJson->setData(['result' => 'failure', 'vote' => $this->getCount($data['questionid'])]);
                }
            }
        } elseif ($this->getCustomer() && $collection->count() > 0) {
            $vote = $collection->getFirstItem();
            if ($data['vote'] == 'up' && $vote->getUpvote() == 1) {
                return $resultJson->setData(['result' => 'you already voted', 'vote' => $this->getCount($data['questionid'])]);
            }
            if ($data['vote'] == 'down' && $vote->getDownvote() == 1) {
                return $resultJson->setData(['result' => 'you already voted', 'vote' => $this->getCount($data['questionid'])]);
            }
            if ($data['vote'] == 'up' && $vote->getDownvote() == 1) {
                $vote->setData('upvote', 1);
                $vote->setData('downvote', 0);
                $vote->save();
                return $resultJson->setData(['result' => 'your vote has updated', 'vote' => $this->getCount($data['questionid'])]);
            }
            if ($data['vote'] == 'down' && $vote->getUpvote() == 1) {
                $vote->setData('upvote', 0);
                $vote->setData('downvote', 1);
                $vote->save();
                return $resultJson->setData(['result' => 'your vote has updated', 'vote' => $this->getCount($data['questionid'])]);
            }
            // return $resultJson->setData(['result' => 'your vote has updated']);
        }
        return $resultJson->setData(['result' => 'vote to login first', 'vote' => $this->getCount($data['questionid'])]);
    }

    /**
     * Execute view action
     * @return ResultInterface
     */

    public function getCustomer ()
    {
        // echo"nbv";

        //Your block code
        $customer = $this->customerSession->getCustomer()->getId();
        return $customer;
        // exit;
    }

    public function getCount ($qid)
    {
        $collection = $this->vote->create()->getCollection();
        $collection->addFieldToSelect('*')
            ->addFieldToFilter('questionid', $qid)
            ->addFieldToFilter('upvote', 1)
            ->load();
        $count1 = $collection->count();
        $collection1 = $this->vote->create()->getCollection();
        $collection1->addFieldToSelect('*')
            ->addFieldToFilter('questionid', $qid)
            ->addFieldToFilter('downvote', 1)
            ->load();
        $count2 = $collection1->count();
        $result2 = $count1 - $count2;
        return $result2;
    }
}

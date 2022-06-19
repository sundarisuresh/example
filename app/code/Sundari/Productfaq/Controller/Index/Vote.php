<?php
/**
 * Copyright © free All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sundari\Productfaq\Controller\Index;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Framework\Controller\Result\Redirect;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Controller\ResultInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Sundari\Productfaq\Model\VoteFactory;

/**
 *
 */
class Vote extends Action
{
    /**
     * @var
     */
    protected $resultJsonFactory;

    /**
     * @var PageFactory
     */
    protected $resultRedirectFactory;
    /**
     * @var Session
     */
    protected $customerSession;
    /**
     * @var TimezoneInterface
     */
    /**
     * @var PqaFactory
     */
    protected $vote;
    /**
     * @var ManagerInterface
     */
    protected $messageManager;

    /**
     * Constructor
     * @param Context $context
     * @param Session $customerSession
     * @param VoteFactory $vote
     * @param ManagerInterface $messageManager
     * @param RedirectFactory $resultRedirectFactory
     */
    public function __construct(
        Context          $context,
        Session          $customerSession,
        VoteFactory      $vote,
        JsonFactory      $resultJsonFactory,
        ManagerInterface $messageManager,
        RedirectFactory  $resultRedirectFactory
    )
    {
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->customerSession = $customerSession;
        $this->vote = $vote;
        $this->messageManager = $messageManager;
        $this->jsonResultFactory = $resultJsonFactory;

        return parent::__construct($context);
    }

    /**
     * @return Page|Redirect|ResultInterface
     */

    public function execute()
    {
        $customerid = $this->getCustomerId();
        if (!$customerid) {
            $result = $this->jsonResultFactory->create();
            return $result->setData(["result" => "please login to vote first"]);
        }
        $data = $this->getRequest()->getParams();
        $qid = $data['qid'];
        $type = $data['type'];
        $collection = $this->vote->create()
            ->getCollection()->addFieldToSelect('*')
            ->addFieldToFilter('customerid', $customerid)
            ->addFieldToFilter('questionid', $qid)
            ->load();
        if ($collection->count() == 0) {
            $vote = $this->vote->create();
            $vote->setData('questionid', $qid);
            $vote->setData('customerid', $this->getCustomerId());
            if ($type == "up") {
                $vote->setData('upvote', 1);
                $vote->setData('downvote', 0);
            } elseif ($type == "down") {
                $vote->setData('upvote', 0);
                $vote->setData('downvote', 1);
            }
            $vote->save();
            $votecount = $this->getvoteqaCollection($qid);
            $result = $this->jsonResultFactory->create();
            return $result->setData(["result" => "your vote has registered sucessfully", "voteup" => $votecount[0], "votedown" => $votecount[1]]);
        } elseif ($collection->count() > 0) {
            $item = $collection->getFirstItem();
            if ($type == "up" && $item->getData('upvote') == 1) {
                $votecount = $this->getvoteqaCollection($qid);
                $result = $this->jsonResultFactory->create();
                return $result->setData(
                    ["result" => "you already voted",
                        "voteup" => $votecount[0], "votedown" => $votecount[1]]
                );
            }
            if ($type == "down" && $item->getData('downvote') == 1) {
                $votecount = $this->getvoteqaCollection($qid);
                $result = $this->jsonResultFactory->create();
                return $result->setData(["result" => "you already voted", "voteup" => $votecount[0], "votedown" => $votecount[1]]);
            }
            if ($type == "up" && $item->getData('downvote') == 1) {
                $item->setData('upvote', 1);
                $item->setData('downvote', 0);
                $item->save();
                $votecount = $this->getvoteqaCollection($qid);
                $result = $this->jsonResultFactory->create();
                return $result->setData(["result" => "your vote has been updated", "voteup" => $votecount[0], "votedown" => $votecount[1]]);
            }
            if ($type == "down" && $item->getData('upvote') == 1) {
                $item->setData('upvote', 0);
                $item->setData('downvote', 1);
                $item->save();
                $votecount = $this->getvoteqaCollection($qid);
                $result = $this->jsonResultFactory->create();
                return $result->setData(["result" => "your vote has been updated", "voteup" => $votecount[0], "votedown" => $votecount[1]]);
            }
        }
    }

    /**
     * @return ResultInterface
     * public function execute()
     */
    public function getCustomerId()
    {
        return $this->customerSession->getCustomer()->getId();
    }

    /**
     * geet votecount fr up d for 1 ques
     * @param $qid
     * @return array
     */
    public function getvoteqaCollection($qid)
    {
        $collection = $this->vote->create()
            ->getCollection()->addFieldToSelect('*')
            ->addFieldToFilter('questionid', $qid)
            ->addFieldToFilter('upvote', 1)
            ->load();
        $collection1 = $this->vote->create()
            ->getCollection()->addFieldToSelect('*')
            ->addFieldToFilter('questionid', $qid)
            ->addFieldToFilter('downvote', 1)
            ->load();

        return $count = [$collection->count(), $collection1->count()];

        /**
         * @return string
         */
    }
}

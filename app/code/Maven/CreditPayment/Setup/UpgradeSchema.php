<?php

namespace Maven\CreditPayment\Setup;

use Magento\Framework\Exception\AlreadyExistsException;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Sales\Model\Order\StatusFactory;
use Magento\Sales\Model\ResourceModel\Order\StatusFactory as StatusResourceFactory;

class UpgradeSchema implements UpgradeSchemaInterface
{
    const CUSTOM_STATUS_CODE = 'credit';
    const CUSTOM_STATE_CODE = 'pending';
    const CUSTOM_STATUS_LABEL = 'credit';

    protected $statusFactory;
    protected $statusResourceFactory;

    public function __construct(
        StatusFactory         $statusFactory,
        StatusResourceFactory $statusResourceFactory
    )
    {
        $this->statusFactory = $statusFactory;
        $this->statusResourceFactory = $statusResourceFactory;
    }

    public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        if (version_compare($context->getVersion(), '1.2.0', '<')) {
            $this->addCustomOrderStatus();
        }


        $installer->endSetup();
    }


    protected function addCustomOrderStatus()
    {
        $statusResource = $this->statusResourceFactory->create();
        $status = $this->statusFactory->create();
        $status->setData([
            'status' => self::CUSTOM_STATUS_CODE,
            'label' => self::CUSTOM_STATUS_LABEL,
        ]);
        try {
            $statusResource->save($status);
        } catch (AlreadyExistsException $exception) {
            return;
        }
        $status->assignState(self::CUSTOM_STATE_CODE, true, true);
    }
}

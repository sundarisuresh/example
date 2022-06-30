<?php

ini_set('memory_limit','2048M');

require 'app/bootstrap.php';

use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\Filesystem;


class CronRunManually
    extends \Magento\Framework\App\Http
    implements \Magento\Framework\AppInterface
{
    public function launch()
    {

        $this->_state->setAreaCode(\Magento\Framework\App\Area::AREA_ADMINHTML);
        $myClass = $this->_objectManager->create('Sundari\AutoCancel\Cron\OrderAutoCancel');
        $myClass->execute();
        return $this->_response;
    }

}

$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $_SERVER);
/** @var \Magento\Framework\App\Http $app */
$app = $bootstrap->createApplication('CronRunManually');
$bootstrap->run($app);

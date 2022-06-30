# Mage2 Module Maven CreditPayment

    ``maven/module-creditpayment``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
CreditPayment

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Maven`
 - Enable the module by running `php bin/magento module:enable Maven_CreditPayment`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require maven/module-creditpayment`
 - enable the module by running `php bin/magento module:enable Maven_CreditPayment`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - Credit - payment/credit/*


## Specifications

 - Observer
	- checkout_submit_all_after > Maven\CreditPayment\Observer\Checkout\SubmitAllAfter

 - Payment Method
	- Credit


## Attributes

 - Customer - creditbalance (creditbalance)


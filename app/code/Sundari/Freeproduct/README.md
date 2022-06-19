# Mage2 Module Sundari Freeproduct

    ``sundari/module-freeproduct``

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Main Functionalities
Freeproduct

## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Sundari`
 - Enable the module by running `php bin/magento module:enable Sundari_Freeproduct`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
    - private repository `repo.magento.com`
    - public repository `packagist.org`
    - public github repository as vcs
 - Add the composer repository to the configuration by running `composer config repositories.repo.magento.com composer https://repo.magento.com/`
 - Install the module composer by running `composer require sundari/module-freeproduct`
 - enable the module by running `php bin/magento module:enable Sundari_Freeproduct`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration




## Specifications

 - Block
	- Freeproduct > freeproduct.phtml

 - Observer
	- checkout_cart_add_product_complete > Sundari\Freeproduct\Observer\Checkout\CartAddProductComplete


## Attributes

 - Product - freeproduct (freeproduct)


<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Training\Engrave\Plugin;

use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Type\AbstractType;
use Magento\Quote\Model\Quote;
/**
 *
 */
class Engrave
{
    /**
     * @param Quote $subject
     * @param $result
     * @param Product $product
     * @param $request
     * @param $processMode
     * @return mixed
     */
    public function afterAddProduct(Quote $subject, $result, Product $product,
                                          $request = null,
                                          $processMode = AbstractType::PROCESS_MODE_FULL
    )
    {
        $engrave =$request->getEngrave();
        $result->setEngrave($engrave);
        return $result;
    }
}













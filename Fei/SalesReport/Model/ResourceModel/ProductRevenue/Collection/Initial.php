<?php
declare(strict_types=1);

namespace Fei\SalesReport\Model\ResourceModel\ProductRevenue\Collection;

use Fei\SalesReport\Model\ResourceModel\ProductRevenue\Collection as ProductRevenueCollection;
use Magento\Reports\Model\ResourceModel\Report\Collection as CoreReportCollection;

class Initial extends CoreReportCollection
{
    /**
     * Report sub-collection class name
     *
     * @var string
     */
    protected $_reportCollection = ProductRevenueCollection::class;
}

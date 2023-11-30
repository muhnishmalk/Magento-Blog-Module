<?php 
namespace Cloud\Blog\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    
    protected $_idFieldName = 'post_id';

   
    protected function _construct()
    {
        $this->_init('Cloud\Blog\Model\Post', 'Cloud\Blog\Model\ResourceModel\Post');
    }

}

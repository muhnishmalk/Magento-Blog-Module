<?php
namespace Cloud\Blog\Block;

use Cloud\Blog\Api\Data\PostInterface;
use Cloud\Blog\Model\ResourceModel\Post\Collection as PostCollection;

class PostList extends \Magento\Framework\View\Element\Template implements
    \Magento\Framework\DataObject\IdentityInterface
{
   
    protected $_postCollectionFactory;

    
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Cloud\Blog\Model\ResourceModel\Post\CollectionFactory $postCollectionFactory,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->_postCollectionFactory = $postCollectionFactory;
    }

    
    public function getPosts()
    {
       
        if (!$this->hasData('posts')) {
            $posts = $this->_postCollectionFactory
                ->create()
                ->addFilter('is_active', 1)
                ->addOrder(
                    PostInterface::CREATION_TIME,
                    PostCollection::SORT_ORDER_DESC
                );
            $this->setData('posts', $posts);
        }
        return $this->getData('posts');
    }

    
    public function getIdentities()
    {
        return [\Cloud\Blog\Model\Post::CACHE_TAG . '_' . 'list'];
    }

}

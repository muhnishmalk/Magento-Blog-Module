namespace Cloud\Blog\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Cloud\Blog\Model\PostFactory;

class InstallData implements InstallDataInterface
{
    private $postFactory;

    public function __construct(PostFactory $postFactory)
    {
        $this->postFactory = $postFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            'url_key' => 'sample-post',
            'title' => 'Post',
            'content' => 'This is a sample blog post content.',
            'description' => 'Sample post description.',
            'is_active' => 1,
            'creation_time' => '2023-01-01 00:00:00',
            'update_time' => '2023-01-01 00:00:00',
        ];

        $post = $this->postFactory->create();
        $post->setData($data);
        $post->save();
    }
}

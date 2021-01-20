<?php
namespace Migue\Biblos\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'libros';

	protected $_cacheTag = 'libros';

	protected $_eventPrefix = 'libros';

	protected function _construct()
	{
		$this->_init('Migue\Biblos\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
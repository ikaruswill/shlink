<?php
declare(strict_types=1);

namespace Shlinkio\Shlink\Core\Service;

use Shlinkio\Shlink\Core\Entity\ShortUrl;
use Shlinkio\Shlink\Core\Exception\InvalidShortCodeException;
use Shlinkio\Shlink\Core\Model\ShortUrlMeta;
use Zend\Paginator\Paginator;

interface ShortUrlServiceInterface
{
    /**
     * @param string[] $tags
     * @param array|string|null $orderBy
     * @return ShortUrl[]|Paginator
     */
    public function listShortUrls(int $page = 1, ?string $searchQuery = null, array $tags = [], $orderBy = null);

    /**
     * @param string[] $tags
     * @throws InvalidShortCodeException
     */
    public function setTagsByShortCode(string $shortCode, array $tags = []): ShortUrl;

    /**
     * @throws InvalidShortCodeException
     */
    public function updateMetadataByShortCode(string $shortCode, ShortUrlMeta $shortUrlMeta): ShortUrl;
}

<?php namespace App;

class Parser implements ParserInterface
{
    private $html = null;
    private $dom = null;
    private $pageInfo = null;

    public function __construct(string $html)
    {
        $this->html = $html;

        $this->dom = new \DOMDocument;
        libxml_use_internal_errors(true);

        $this->dom->loadHTML($this->html);

        $pageInfo = new PageInfo();
        $pageInfo->images = $this->get('img', 'src');
        $pageInfo->links = $this->get('a', 'href');
        $pageInfo->imagesCount = count($pageInfo->images) - 1;
        $pageInfo->linksCount = count($pageInfo->links) - 1;

        $this->pageInfo = $pageInfo;
    }

    private function get(string $tagName, string $attributeName): array
    {
        $obResult = $this->dom->getElementsByTagName($tagName);

        $arResult = [];

        foreach ($obResult as $obItem) {
            $arResult[] = $obItem->getAttribute($attributeName);
        }

        return $arResult;
    }

    public function getPageInfo(): PageInfo
    {
        return $this->pageInfo;
    }
}
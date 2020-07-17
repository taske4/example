<?php namespace App;

use mysql_xdevapi\Exception;

class Main
{
    private $url = '';
    private $html = '';

    public function main(string $url, string $outputFileName)
    {
        $this->url = $url;
        $this->setHtml();

        $parser = new Parser($this->html);
        $jsonResult = json_encode($parser->getPageInfo(), true);

        if (!file_put_contents($outputFileName, $jsonResult)) {
            throw new \Exception('Cant write result');
        }
    }

    private function setHtml()
    {
        $url = $this->url;
        if (!$this->html = file_get_contents($url)) {
            throw new \Exception('Cant get contents');
        }
    }
}
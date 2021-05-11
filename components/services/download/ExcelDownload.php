<?php


namespace app\components\services\download;


use app\components\services\download\interfaces\DocumentInterface;

class ExcelDownload implements DocumentInterface
{
    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function download()
    {
        // TODO: Implement download() method.
    }
}
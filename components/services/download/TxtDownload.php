<?php


namespace app\components\services\download;


use app\components\services\download\interfaces\DocumentInterface;

class TxtDownload implements DocumentInterface
{
    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function download()
    {
        return $this->content;
    }
}
<?php


namespace app\components\services\download;


use app\components\services\download\interfaces\DocumentInterface;
use kartik\mpdf\Pdf;

class PdfDownload implements DocumentInterface
{
    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function download()
    {
        $pdf = new Pdf([
            'mode' => Pdf::MODE_UTF8,
            // A4 paper format
            'format' => Pdf::FORMAT_A4,
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT,
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER,
            // your html content input
            'content' => $this->content,
        ]);

        return $pdf->render();
    }
}
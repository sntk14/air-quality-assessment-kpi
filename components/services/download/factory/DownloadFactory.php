<?php


namespace app\components\services\download\factory;

use app\components\services\download\ExcelDownload;
use app\components\services\download\PdfDownload;
use app\components\services\download\TxtDownload;
use Yii;

class DownloadFactory
{
    public $headers;

    public function getFile($data)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_RAW;
        $this->headers = Yii::$app->response->headers;
        switch ($data['type']) {
            case 'pdf':
                $doc = new PdfDownload($data['content']);
                $this->headers->add('Content-Type', 'application/pdf');
                break;
            case 'txt':
                $doc = new TxtDownload($data['content']);
                $this->headers->add('Content-Type', 'text/plain');
                $this->headers->add('Content-Disposition', 'attachment');
                break;
//            case 'excel':
//                $doc = new ExcelDownload($data['content']);
//                $this->headers->add('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
//                break;
            default:
                throw new \Exception('Неіснуючий тип файла!');
        }

        return $doc;
    }
}
<?php

namespace app\controllers;
use kartik\mpdf\Pdf;

class ReportsController extends \yii\web\Controller
{
    const REPORT_TITLE = 'ASOCAM - Sistema de Gestión de lista de Participantes';

    public function actionIndex()
    {
        return $this->render('index');
    }
    // Funcijón para impresión

    public function actionMpdfDemo1() {
        $datos="JC";
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'content' => $this->renderPartial('privacy',['id'=>$datos]),
            'options' => [
                'title' => 'Privacy Policy - Krajee.com',
                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'methods' => [
                'SetHeader' => [self::REPORT_TITLE.'||Generado en: ' . date("r")],
                'SetFooter' => ['|Página {PAGENO}|'],
            ]
        ]);
        return $pdf->render();
    }

    public function actionForo() {
        $foro="phforum_id";
        $pdf = new Pdf([
            'mode' => Pdf::MODE_CORE, // leaner size using standard fonts
            'content' => $this->renderPartial('foroEstadistica',['id'=>$foro]),
            'options' => [
                'title' => 'Privacy Policy - Krajee.com',
                'subject' => 'Generating PDF files via yii2-mpdf extension has never been easy'
            ],
            'methods' => [
                'SetHeader' => [self::REPORT_TITLE.'||Generado en: ' . date("r")],
                'SetFooter' => ['|Página {PAGENO}|'],
            ]
        ]);
        return $pdf->render();
    }

}

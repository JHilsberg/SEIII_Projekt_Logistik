<?php

/**
 * Created by PhpStorm.
 * User: Excel
 * Date: 06.01.2015
 * Time: 13:15
 */
class PDFController extends BaseController
{
    public function start()
    {

        $action = Input::get('action');
        return $this->$action();

    }

    public function savePDF()
    {
        $file = public_path() . "/pdf/file.pdf";
        if (file_exists($file)) {
            $headers = array('content-type' => 'application/pdf');
            return Response::download($file, 'filename.pdf', $headers);
        }
    }

    public function showPDF()
    {
        $file = public_path() . "/pdf/file.pdf";
        if (file_exists($file)) {
            $headers = array('content-type' => 'application/pdf');
            $content = file_get_contents($file);
            return Response::make($content, 200, $headers);
        }
    }
}
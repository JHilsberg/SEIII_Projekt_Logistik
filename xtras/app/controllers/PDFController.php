<?php

/**
 * Created by PhpStorm.
 * User: Excel
 * Date: 06.01.2015
 * Time: 13:15
 */
class PDFController extends BaseController
{
    public function start($orderid)
    {

       if(Input::has('showPDF'))return $this->showPDF($orderid);
       elseif (Input::has('savePDF'))return $this->savePDF($orderid);

    }

    public function savePDF($orderid)
    {
        $file = public_path().DIRECTORY_SEPARATOR.'pdf'.DIRECTORY_SEPARATOR.Auth::user()->email.DIRECTORY_SEPARATOR.$orderid.DIRECTORY_SEPARATOR."file.pdf";
        if (file_exists($file)) {
            $headers = array('content-type' => 'application/pdf');
            return Response::download($file, 'order_'.$orderid.'.pdf', $headers);
        }
    }

    public function showPDF($orderid)
    {
        $file = public_path().DIRECTORY_SEPARATOR.'pdf'.DIRECTORY_SEPARATOR.Auth::user()->email.DIRECTORY_SEPARATOR.$orderid.DIRECTORY_SEPARATOR."file.pdf";
        if (file_exists($file)) {
            $headers = array('content-type' => 'application/pdf');
            $content = file_get_contents($file);
            return Response::make($content, 200, $headers);
        }
    }
}
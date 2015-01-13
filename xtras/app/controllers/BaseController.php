<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public function showPDF()
	{
		$file = public_path() . "/pdf/file.pdf";
		if (file_exists($file)) {
			$headers = array('content-type' => 'application/pdf',);
			$content = file_get_contents($file);
			return Response::make($content, 200, $headers);
		}
	}

}

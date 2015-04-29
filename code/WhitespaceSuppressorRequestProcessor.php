<?php

class WhitespaceSuppressorRequestProcessor extends RequestProcessor {

	// false or 'none' - disable processing
	// 'always'        - enable processing in all environments
	// 'live-only'     - enable processing only on live environment
	private static $suppress = 'live-only'; // set to false or 'none' to disable processing


	public function postRequest(SS_HTTPRequest $request, SS_HTTPResponse $response, DataModel $model) {
		if (preg_match('/text\/html/', $response->getHeader('Content-Type'))) {
			$response->setBody(
				$this->SuppressWhitespace($response->getBody())
			);
		}
	}

	public function SuppressWhitespace($html) {
		if ($this->config()->suppress == 'always' || ($this->config()->suppress == 'live-only' && Director::isLive())) {
			$html = preg_replace("/\s+/", ' ', trim($html));
			$html = str_replace(array('<!-- -->', ' //<![CDATA[', '//]]> '), '', $html);
			// TODO: remove all comments?
		}
		return $html;
	}

}
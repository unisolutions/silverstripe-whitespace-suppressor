<?php

class WhitespaceSuppressorControllerExtension extends Extension
{

    public function onAfterInit()
    {
        Injector::inst()->get('RequestProcessor')->setFilters(
            array(new WhitespaceSuppressorRequestProcessor())
        );
    }
}

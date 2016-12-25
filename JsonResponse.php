<?php

require 'IFormatter.php';

class JsonResponse implements IFormatter
{
    public function format($data)
    {
        return json_encode($data);
    }
}

<?php

namespace Laravel;

use Macroable;

class HtmlBuilder
{
    use Macroable;

    public function hr()
    {
        return "<hr>";
    }

}
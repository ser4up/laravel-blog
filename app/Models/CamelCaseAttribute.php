<?php

namespace App\Models;

use Illuminate\Support\Str;

trait CamelCaseAttribute
{
    /**
     * Getter for camelCase attribute
     */
    public function getAttribute($key)
    {
        if (array_key_exists($key, $this->relations)) {
            return parent::getAttribute($key);
        } else {
            return parent::getAttribute(Str::snake($key));
        }
    }

    /**
     * Setter for camelCase attribute
     */
    public function setAttribute($key, $value)
    {
        return parent::setAttribute(Str::snake($key), $value);
    }
}

<?php

namespace App\Exceptions;

use Exception;

class OfferInvalidException extends Exception
{
    protected $message = 'Offer less than current bid or does not meet increment';

    public function render()
    {
        return response()->json([
            'error' => class_basename($this),
            'message' => $this->getMessage(),
        ], 401);
    }
}

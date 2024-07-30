<?php

namespace Core;

use Exception;

class ValidationException extends Exception
{

  public readonly array $old;
  public readonly array $errors;

  public static function throw($errors, $old)
  {
    $instance = new static;
    $instance->errors = $errors;
    $instance->old = $old;

    throw $instance;
  }
}

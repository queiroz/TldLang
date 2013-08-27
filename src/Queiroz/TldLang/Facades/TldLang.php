<?php namespace Queiroz\TldLang\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class TldLang extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'TldLang'; }
 
}
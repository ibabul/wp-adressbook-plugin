<?php
namespace WeDevs\Academy\Traits;
/**
 * Error handler trait
 */
trait Form_Error
{
  /**
     * Collect the errors of form
     * @var array
     */
   public $errors =[];

    /**
     * Check the form error
     *
     * @param mixed $key
     *
     * @return [type]
     */
    public function has_error($key)
    {
        if (isset($this->errors[$key])) {
            return $this->errors[$key];
        }
        return false;
    }
    /**
     * Get the form errors by key
     * @param mixed $key
     *
     * @return [type]
     */
    public function get_error($key)
    {
        if (isset($this->errors[$key])) {
            return $this->errors[$key];
        }
        return false;
    }
}

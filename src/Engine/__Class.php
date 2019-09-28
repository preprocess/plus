<?php

namespace Pre\Plus\Engine;

trait __Class
{
    /**
     * Creates a new instance of the class.
     *
     * @return  void
     */
    public function __construct()
    {
        $this->__plus();
    }

    /**
     * 1. Loads properties of a class, if any.
     *
     * @return void
     */
    protected function __plus(): void
    {
        foreach (get_class_methods($this) as $method) {
            preg_match("/__plus_[a-zA-Z]+Property/", $method, $matches);
            if (count($matches) > 0) {
                $this->$method();
            }
        }
    }
}

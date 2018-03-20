<?php
/**
 * Created by PhpStorm.
 * User: richard
 * Date: 19/03/18
 * Time: 14:07
 */

namespace App\Entity;


abstract class EntityAbstract
{

    public function __call($name, $arguments)
    {
        $started_string = substr($name,0,3);
        if($started_string === "get" or $started_string === "set")
        {
            $propertie = substr($name,3);
            $propertie = strtolower($propertie);
            $this->$propertie = $arguments[0];
        }
        // TODO: Implement __call() method.
    }

    public function __get($name)
    {
        $methodName = $this->toMethod($name,'get');
        if(method_exists($this,$methodName))
        {
            return $this->$methodName();
        }
        return $this->$name ?? null;
        // TODO: Implement __call() method.
    }

    public function __set($name, $value)
    {
        $methodName = $this->toMethod($name,'get');
        if(method_exists($this,$methodName))
        {
            return $this->$name = $this->$methodName($value);
        }
        return $this->$name = $value;
    }

    protected function toMethod($name, $prefix)
    {
        $name = str_replace('_',' ',$name);

        $name = ucwords(strtolower($name));
        $name = str_replace(' ','',$name);
        return $prefix.$name;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 15.06.17
 * Time: 15:14
 */

namespace Shop;

class Test
{
    private $text;

    public function __construct(Test2Contract $first_args)
    {
        $this->text = $first_args->run();
    }
    public function out(){
        return "hiii ".$this->text;
    }
}
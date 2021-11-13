<?php

namespace DerCooleVonDem\StaffUtil;

use pocketmine\plugin\PluginBase;

class StaffUtil extends PluginBase
{

    private static StaffUtil $instance;

    public function onLoad(){
        self::$instance = $this;
    }

    public function getInstance(): StaffUtil{
        return self::$instance;
    }

    public function onEnable()
    {

    }

}
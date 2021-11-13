<?php

namespace DerCooleVonDem\StaffUtil;

use DerCooleVonDem\StaffUtil\commands\StaffCommand;
use DerCooleVonDem\StaffUtil\listener\PlayerListener;
use DerCooleVonDem\StaffUtil\staffchat\StaffChat;
use pocketmine\plugin\PluginBase;

class StaffUtil extends PluginBase
{

    private static StaffUtil $instance;
    public static StaffChat $staffChat;

    public function onLoad(){
        self::$instance = $this;
    }

    public function getInstance(): StaffUtil{
        return self::$instance;
    }

    public function onEnable()
    {
        self::$staffChat = new StaffChat();
        $this->getServer()->getPluginManager()->registerEvents(new PlayerListener(), $this);

        $this->getServer()->getCommandMap()->register("staff", new StaffCommand());
    }

}
<?php

namespace DerCooleVonDem\StaffUtil\listener;

use DerCooleVonDem\StaffUtil\session\SessionManager;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;

class PlayerListener implements Listener
{

    public function onJoin(PlayerJoinEvent $event)
    {
        SessionManager::createSession($event->getPlayer());
    }

    public function onQuit(PlayerQuitEvent $event)
    {
        SessionManager::removeSession($event->getPlayer());
    }

}
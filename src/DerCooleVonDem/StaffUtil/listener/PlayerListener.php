<?php

namespace DerCooleVonDem\StaffUtil\listener;

use DerCooleVonDem\StaffUtil\session\SessionManager;
use DerCooleVonDem\StaffUtil\StaffUtil;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerChatEvent;
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

    public function onChat(PlayerChatEvent $chatEvent)
    {

        $session = SessionManager::getSession($chatEvent->getPlayer());

        $msg = $chatEvent->getMessage();

        if (str_starts_with($msg, "@staff") && $session->isAllowedToChatInStaffChat()) {
            $chatEvent->setCancelled(true);
            $msg = substr($msg, 7);
            $session->sendStaffChatMessage($msg);
            $session->getPlayer()->sendMessage(StaffUtil::$staffChat->formatMessage($session->getPlayer(), $msg));
            return;
        } elseif (str_starts_with($chatEvent->getMessage(), "@mod") && $session->isAllowedToChatInStaffChat()) {
            $chatEvent->setCancelled(true);
            $msg = substr($msg, 5);
            $session->sendStaffChatMessage($msg);
            $session->getPlayer()->sendMessage(StaffUtil::$staffChat->formatMessage($session->getPlayer(), $msg));
            return;
        }

        if($session->isInStaffChat()) {
            $chatEvent->setCancelled(true);
            $session->sendStaffChatMessage($chatEvent->getMessage());
        }
    }


}
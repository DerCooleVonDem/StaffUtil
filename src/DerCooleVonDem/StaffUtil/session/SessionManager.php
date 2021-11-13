<?php

namespace DerCooleVonDem\StaffUtil\session;

use pocketmine\Player;

class SessionManager
{
    
    private static array $sessions = [];
    
    public static function createSession(Player $player)
    {
        // Check if the player is allowed to write in the staff chat
        $allowedToWrite = $player->hasPermission("staffutil.chat.write");

        $session = new Session($player, $allowedToWrite, false);
        self::$sessions[$player->getName()] = $session;
    }
    
    public static function getSessions(): array
    {
        return self::$sessions;
    }
    
    public static function getSession(Player $player): Session
    {
        if (!isset(self::$sessions[$player->getName()])) {
            self::createSession($player);
        }
        
        return self::$sessions[$player->getName()];
    }
    
    public static function hasSession(Player $player): bool
    {
        return isset(self::$sessions[$player->getName()]);
    }
    
    public static function removeSession(Player $player)
    {
        if (!isset(self::$sessions[$player->getName()])) {
            return;
        }
        unset(self::$sessions[$player->getName()]);
    }
    
    
}
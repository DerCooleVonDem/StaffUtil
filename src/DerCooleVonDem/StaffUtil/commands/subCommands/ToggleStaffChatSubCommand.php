<?php

namespace DerCooleVonDem\StaffUtil\commands\subCommands;

use DerCooleVonDem\StaffUtil\session\SessionManager;
use pocketmine\Player;

class ToggleStaffChatSubCommand extends StaffSubCommand
{
    /**
     * @param Player $player
     * @param array $args
     * @return void
     */
    public function execute(Player $player, array $args): void
    {
        $session = SessionManager::getSession($player);

        if($session->isAllowedToChatInStaffChat()){

            if($session->isInStaffChat()){
                $session->setInStaffChat(false);
                $player->sendMessage("§cYou left the §6Staff-Chat §c!");
            }else{
                $session->setInStaffChat(true);
                $player->sendMessage("§aYou joined the §6Staff-Chat §a!");
            }

        }else{
            $player->sendMessage("§cYou are not allowed to chat in the §6Staff-Chat §c!");
        }

    }
}
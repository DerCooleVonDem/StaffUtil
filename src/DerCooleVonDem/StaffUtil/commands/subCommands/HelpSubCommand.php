<?php

namespace DerCooleVonDem\StaffUtil\commands\subCommands;

use pocketmine\Player;

class HelpSubCommand extends StaffSubCommand
{

    // A bit hardcoded xd will fix in the future

    /**
     * @param Player $player
     * @param array $args
     * @return void
     */
    public function execute(Player $player, array $args): void
    {
        $player->sendMessage("§e------------------StaffUtil-----------------");
        $player->sendMessage("§a/staff help - Displays the help for commands");
        $player->sendMessage("§e------------------StaffUtil-----------------");
    }

}
<?php

namespace DerCooleVonDem\StaffUtil\commands\subCommands;

use pocketmine\Player;

class NoticeSubCommand extends StaffSubCommand
{

    public function execute(Player $player, array $args): void
    {
        // Switch between the first argument
        switch ($args[0]) {
            case "set":
                break;
        }
    }

}
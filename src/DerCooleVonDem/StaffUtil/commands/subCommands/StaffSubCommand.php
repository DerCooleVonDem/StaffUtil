<?php

namespace DerCooleVonDem\StaffUtil\commands\subCommands;

use pocketmine\Player;

abstract class StaffSubCommand{

    public string $name = "";

    public function getName(): string{
        return $this->name;
    }

    public function __construct(string $name){
        $this->name = $name;
    }

    public abstract function execute(Player $player, array $args): void;

}
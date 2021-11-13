<?php

namespace DerCooleVonDem\StaffUtil\commands;

use DerCooleVonDem\StaffUtil\commands\subCommands\HelpSubCommand;
use DerCooleVonDem\StaffUtil\commands\subCommands\StaffSubCommand;
use DerCooleVonDem\StaffUtil\commands\subCommands\ToggleStaffChatSubCommand;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\Player;

class StaffCommand extends Command {

    private array $subCommands = [];

    public function registerSubcommand(StaffSubCommand $subCommand) : void {
        $this->subCommands[$subCommand->getName()] = $subCommand;
    }

    public function hasSubCommand(string $name) : bool {
        return isset($this->subCommands[$name]);
    }

    public function getSubCommand(string $name) : StaffSubCommand {
        return $this->subCommands[$name];
    }

    public function __construct() {
        parent::__construct("staff", "StaffUtil main command");
        $this->registerSubcommand(new HelpSubCommand("help"));
        $this->registerSubcommand(new ToggleStaffChatSubCommand("toggle"));
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if(isset($args[0]) && $this->hasSubCommand($args[0]) && $sender instanceof Player) {
            array_shift($args);
            $this->getSubCommand($args[0])->execute($sender, $args);
        } else {
            $sender->sendMessage("Please use /staff help for help");
        }
    }

}
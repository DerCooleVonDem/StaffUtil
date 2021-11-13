<?php

namespace DerCooleVonDem\StaffUtil\staffchat;

use JetBrains\PhpStorm\Pure;
use pocketmine\Player;

class StaffChat{

    private array $chatMembers = [];

    public function addPlayerToChatMembers(Player $player){
        $this->chatMembers[] = $player;
    }

    public function getChatMembers(){
        return $this->chatMembers;
    }

    public function removePlayerFromChatMembers(Player $player){
        $this->chatMembers = array_diff($this->chatMembers, [$player]);
    }

    public function sendMessageToAllChatMemebers(string $message){
        foreach($this->chatMembers as $member){
            $member->sendMessage($message);
        }
    }

    public function sendToChat(string $message, Player $player){
        $this->sendMessageToAllChatMemebers($this->formatMessage($player, $message));
    }

    #[Pure] public function formatMessage(Player $player, $message): string
    {
        return "§c§l[STAFF]§r §e(" . $player->getName() . ")§r " . $message;
    }

}
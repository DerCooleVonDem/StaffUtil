<?php

namespace DerCooleVonDem\StaffUtil\session;

use DerCooleVonDem\StaffUtil\StaffUtil;
use pocketmine\Player;

class Session
{
    private Player $player;

    private bool $isAllowedToChatInStaffChat;
    private bool $isInStaffChat;

    private string $notes;

    public function __construct(Player $player, bool $isAllowedToChatInStaffChat, bool $isInStaffChat, string $notes = ""){
        $this->player = $player;
        $this->isAllowedToChatInStaffChat = $isAllowedToChatInStaffChat;
        $this->isInStaffChat = $isInStaffChat;
        $this->notes = $notes;
    }

    public function getPlayer(): Player{
        return $this->player;
    }

    public function isAllowedToChatInStaffChat(): bool{
        return $this->isAllowedToChatInStaffChat;
    }

    public function setAllowedToChatInStaffChat(bool $isAllowedToChatInStaffChat): void{
        $this->isAllowedToChatInStaffChat = $isAllowedToChatInStaffChat;
    }

    public function isInStaffChat(): bool{
        return $this->isInStaffChat;
    }

    public function setInStaffChat(bool $isInStaffChat): void{

        if($isInStaffChat){
            StaffUtil::$staffChat->addPlayerToChatMembers($this->player);
        }else{
            StaffUtil::$staffChat->removePlayerFromChatMembers($this->player);
        }

        $this->isInStaffChat = $isInStaffChat;
    }

    public function sendStaffChatMessage(string $message): void{
        StaffUtil::$staffChat->sendToChat($message, $this->player);
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }

}
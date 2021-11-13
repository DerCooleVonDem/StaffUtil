<?php

namespace DerCooleVonDem\StaffUtil\form\forms;

use DerCooleVonDem\StaffUtil\form\Form;
use DerCooleVonDem\StaffUtil\form\SimpleForm;
use pocketmine\Player;

class NoticeForm{

    public function getForm(string $notice): Form
    {
        $simpleForm = new SimpleForm(function (Player $player, $data) {});
        $simpleForm->setTitle("§l§bNotice");
        $simpleForm->setContent($this->formatLines($notice));
        return $simpleForm;
    }

    public function formatLines(string $notice): string
    {
        $lines = explode("\n", $notice);
        $formattedLines = [];
        foreach ($lines as $line) {
            $formattedLines[] = "§l§b" . $line;
        }
        return implode("\n", $formattedLines);
    }
}
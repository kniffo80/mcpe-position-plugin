<?php
namespace kniffman\position;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\Player;


class Main extends PluginBase implements Listener, CommandExecutor
{
    public function onEnable()
    {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $cmd, $label, array $args)
    {
        if ($cmd->getName() != "position") return false;

        $onlinePlayers = $this->getServer()->getOnlinePlayers();

        if (sizeof($onlinePlayers) > 0) {
            foreach ($onlinePlayers as $player) {
                $sender->sendMessage($player->getName() . ": X=" . $player->getFloorX() . " Y=" . $player->getFloorY() . " Z=" . $player->getFloorZ());
            }
        } else {
            $sender->sendMessage("No player online!");
        }
        return true;
    }
}

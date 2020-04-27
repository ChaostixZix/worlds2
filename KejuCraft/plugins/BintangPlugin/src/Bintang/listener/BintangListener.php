<?php


namespace Bintang\listener;


use Bintang\LibSkin\SkinConverter;
use Bintang\Main;

use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;

class BintangListener implements Listener
{
    protected $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
    }

    public function onPlayerJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        $fileName = $args[1] ?? $player->getLowerCaseName() . ".png";
        $skinData = $player->getSkin()->getSkinData();
        $savePath = $this->plugin->getDataFolder() . $fileName;
        try {
            SkinConverter::skinDataToImageSave($skinData, $savePath);
        } catch (\Exception $exception) {

        }

    }

}
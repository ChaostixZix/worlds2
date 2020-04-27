<?php


namespace Bintang\RPGItem\commands;


use _64FF00\PurePerms\PurePerms;
use Bintang\Main;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\utils\CommandException;
use pocketmine\item\Armor;
use pocketmine\Player;
use pocketmine\utils\Color;
use pocketmine\utils\TextFormat;

class GetSarungCommand extends Command
{
    protected $plugin;

    public function __construct(Main $plugin)
    {
        $this->plugin = $plugin;
    }

    /**
     * @inheritDoc
     */
    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        // TODO: Implement execute() method.
        if ($sender instanceof Player) {
            $api = $this->plugin->getServer()->getPluginManager()->getPlugin("PurePerms");
            if ($api instanceof PurePerms) {
                $group = $api->getUserDataMgr()->getGroup($sender)->getName();
                if($group !== "GUEST")
                {
                    $legging = Armor::get(Armor::LEATHER_LEGGINGS);
                    $armor = Armor::get(Armor::LEATHER_CHESTPLATE);
                    if ($legging instanceof Armor && $armor instanceof Armor) {
                        $legging->setCustomColor(new Color(170, 214, 131));
                        $legging->setCustomName(TextFormat::GOLD . 'Celana ' . TextFormat::GREEN . 'Taraweh');
                        $legging->setLore([
                            TextFormat::GOLD . 'Rare',
                            TextFormat::AQUA . 'Celana untuk taraweh xD'
                        ]);
                        $armor->setCustomColor(new Color(178, 207, 116));
                        $armor->setCustomName(TextFormat::GOLD . 'Baju ' . TextFormat::GREEN . 'Koko');
                        $armor->setLore([
                            TextFormat::GOLD . 'Rare',
                            TextFormat::AQUA . 'Baju Koko Ramadan'
                        ]);
                    }
                    $sender->getInventory()->addItem($armor);
                    $sender->getInventory()->addItem($legging);
                }else{
                    $sender->sendMessage(TextFormat::YELLOW . 'Kamu harus minimal memiliki rank ' .TextFormat::WHITE . '|' . TextFormat::GOLD . 'BETA' .TextFormat::WHITE . '|');
                }
            }
        }
    }
}
<?php

namespace Guisss\TheBlast;

use muqsit\invmenu\InvMenu;
use muqsit\invmenu\InvMenuHandler;
use muqsit\invmenu\transaction\InvMenuTransaction;
use muqsit\invmenu\transaction\InvMenuTransactionResult;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase{

	public function onEnable(){
		$this->getLogger()->info("sw Gui Enabled made by TheBlast");
		if(!InvMenuHandler::isRegistered()){
			InvMenuHandler::register($this);
		}
		$command = new PluginCommand("swtrio", $this);
		$command->setDescription("Open games gui");
		$this->getServer()->getCommandMap()->register("swtrio", $command);
	}

	public function onDisable(){
		$this->getLogger()->info("sw Gui disabled made by TheBlast");
	}

	public function onCommand(CommandSender $player, Command $cmd, string $label, array $args) : bool{
		switch($cmd->getName()){
			case "swtrio":
				if(!$player instanceof Player){
					$player->sendMessage("Select games");
					return true;
				}
				$this->swtrio($player);
				break;
		}
		return true;
	}

	public function swtrio(Player $player){
		$menu = InvMenu::create(InvMenu::TYPE_DOUBLE_CHEST);
		$menu->readOnly();
		$menu->setListener(\Closure::fromCallable([$this, "GUIListener"]));
		$menu->setName("Trios Sw Games");
		$menu->send($player);
		$inv = $menu->getInventory();
		$quartz = Item::get(Item::QUARTZ_BLOCK)->setCustomName("Sw Desert");
		$bow = Item::get(Item::BOW)->setCustomName("Sw NetherCastle");
                $bed = Item::get(Item::BED)->setCustomName("Sw Cave");
		$red_concrete = Item::get(Item::CONCRETE, 14)->setCustomName("Sw Sand spikes");
		$grass = Item::get(Item::GRASS)->setCustomName("Sw City");
		$tnt = Item::get(Item::TNT)->setCustomName("Sw Valey");
		$snowball = Item::get(Item::SNOWBALL)->setCustomName("Sw Racetrack");
		$soul = Item::get(Item::SOUL_SAND)->setCustomName("Sw Maze");
		$inv->setItem(27, $quartz);
		$inv->setItem(11, $bow);
                $inv->setItem(12, $bed);
		$inv->setItem(13, $red_concrete);
		$inv->setItem(14, $grass);
		$inv->setItem(15, $tnt);
		$inv->setItem(16, $snowball);
		$inv->setItem(20, $soul);
		
	}

	public function GUIListener(InvMenuTransaction $action) : InvMenuTransactionResult{
		$itemClicked = $action->getOut();
		$player = $action->getPlayer();
		if($itemClicked->getId() == 155){
			$action->getAction()->getInventory()->onClose($player);
			$this->getServer()->dispatchCommand($player, "sw join HellWorld");
			return $action->discard();
		}
		if($itemClicked->getId() == 261){
			$action->getAction()->getInventory()->onClose($player);
			$this->getServer()->dispatchCommand($player, "sw join NetherMassacre");
			return $action->discard();
		}
                if($itemClicked->getId() == 355){
			$action->getAction()->getInventory()->onClose($player);
			$this->getServer()->dispatchCommand($player, "say this map is not available yet");
			return $action->discard();
		}
		if($itemClicked->getId() == 159 && $itemClicked->getDamage() === 14){
			$action->getAction()->getInventory()->onClose($player);
			$this->getServer()->dispatchCommand($player, "say this map is not available yet");
			return $action->discard();
		}
		if($itemClicked->getId() == 2){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "say this map is not available yet");
		  return $action->discard();
		}
		if($itemClicked->getId() == 46){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "say this map is not available yet");
		  return $action->discard();
		}
		if($itemClicked->getId() == "276"){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "say this map is not available yet");
		  return $action->discard();
		}
		if($itemClicked->getId() == 88){
		  $action->getAction()->getInventory()->onClose($player);
		  $this->getServer()->dispatchCommand($player, "say this map is not available yet");
		  return $action->discard();
		}
		return $action->discard();
	}
}

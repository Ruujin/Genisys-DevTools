<?php

namespace DevTools\commands;

use DevTools\DevTools;

use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class LoadPluginCommand extends DevToolsCommand{

	public function __construct(DevTools $plugin, $name){
		parent::__construct(
			$plugin,
			$name,
			"Load a plugin",
			"/loadplugin <file name or folder name>",
			["lp"]
		);
		$this->setPermission("devtools.command.loadplugin");
	}

	public function execute(CommandSender $sender, $commandLabel, array $args){
		if(!$this->testPermission($sender)){
			return false;
		}

		if(count($args) === 0){
			$sender->sendMessage(TextFormat::RED . "Usage: " . $this->usageMessage);
			return true;
		}

		if(!isset($args[0])) return false;

		$plugin = $sender->getServer()->getPluginManager()->loadPlugin($sender->getServer()->getPluginPath() . DIRECTORY_SEPARATOR . $args[0]);
		if($plugin != null){
			$sender->getServer()->getPluginManager()->enablePlugin($plugin);
			return true;
		}
		return false;
	}
}
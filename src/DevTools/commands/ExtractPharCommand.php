<?php

namespace DevTools\commands;

use DevTools\DevTools;

use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;

class ExtractPharCommand extends DevToolsCommand{

	public function __construct(DevTools $plugin, $name){
		parent::__construct(
			$plugin,
			$name,
			"Extracts the source code from a Phar file",
			"/extractphar <Phar file Name>"
		);
		$this->setPermission("devtools.command.extractphar");
	}

	public function execute(CommandSender $sender, $currentAlias, array $args){
		if(!$this->testPermission($sender)){
			return false;
		}

		if(count($args) === 0){
			$sender->sendMessage(TextFormat::RED . "Usage: ".$this->usageMessage);
			return true;
		}
		if(!isset($args[0]) or !file_exists($args[0])) return \false;
		$folderPath = $sender->getServer()->getPluginPath().DIRECTORY_SEPARATOR . "DevTools" . DIRECTORY_SEPARATOR . basename($args[0]);
		if(file_exists($folderPath)){
			$sender->sendMessage("Phar already exists, overwriting...");
		}else{
			@mkdir($folderPath);
		}
		
		$pharPath = "phar://$args[0]";

		foreach(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($pharPath)) as $fInfo){
			$path = $fInfo->getPathname();
			@mkdir(dirname($folderPath . str_replace($pharPath, "", $path)), 0755, true);
			file_put_contents($folderPath . str_replace($pharPath, "", $path), file_get_contents($path));
		}
		$sender->sendMessage("Source Phar $args[0] has been created on $folderPath");
	}
}

<?php

/*
 * DevTools plugin for PocketMine-MP
 * Copyright (C) 2014 PocketMine Team <https://github.com/PocketMine/DevTools>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
*/

namespace DevTools;

use DevTools\commands\ExtractPluginCommand;
use DevTools\commands\ExtractPharCommand;
use DevTools\commands\LoadPluginCommand;
use DevTools\commands\MakePluginCommand;
use DevTools\commands\MakeServerCommand;
use pocketmine\command\Command;
use pocketmine\command\CommandExecutor;
use pocketmine\command\CommandSender;
use pocketmine\network\protocol\Info;
use pocketmine\permission\Permission;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\plugin\PluginBase;
use pocketmine\plugin\PluginLoadOrder;
use pocketmine\Server;
use pocketmine\utils\TextFormat;

class DevTools extends PluginBase implements CommandExecutor{

	public function onLoad(){
		$commandMap = $this->getServer()->getCommandMap();
		$commandMap->register("devtools", new ExtractPharCommand($this, "extractphar"));
		$commandMap->register("devtools", new ExtractPluginCommand($this, "extractplugin"));
		$commandMap->register("devtools", new LoadPluginCommand($this, "loadplugin"));
		$commandMap->register("devtools", new MakePluginCommand($this, "makeplugin"));
		$commandMap->register("devtools", new MakeServerCommand($this, "makeserver"));		
	}

	public function onEnable(){
		@mkdir($this->getDataFolder());
	}

	// public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		// switch($command->getName()){
			// case "makeplugin":
				// if(isset($args[0]) and $args[0] === "FolderPluginLoader"){
					// return $this->makePluginLoader($sender, $command, $label, $args);
				// }else{
					// return $this->makePluginCommand($sender, $command, $label, $args);
				// }
			// case "makeserver":
				// return $this->makeServerCommand($sender, $command, $label, $args);
			// case "checkperm":
				// return $this->permissionCheckCommand($sender, $command, $label, $args);
			// default:
				// return false;
		// }
	// }

	// private function permissionCheckCommand(CommandSender $sender, Command $command, $label, array $args){
		// $target = $sender;
		// if(!isset($args[0])){
			// return false;
		// }
		// $node = strtolower($args[0]);
		// if(isset($args[1])){
			// if(($player = $this->getServer()->getPlayer($args[1])) instanceof Player){
				// $target = $player;
			// }else{
				// return false;
			// }
		// }

		// if($target !== $sender and !$sender->hasPermission("devtools.command.checkperm.other")){
			// $sender->sendMessage(TextFormat::RED . "You do not have permissions to check other players.");
			// return true;
		// }else{
			// $sender->sendMessage(TextFormat::GREEN . "---- ".TextFormat::WHITE . "Permission node ".$node.TextFormat::GREEN. " ----");
			// $perm = $this->getServer()->getPluginManager()->getPermission($node);
			// if($perm instanceof Permission){
				// $desc = TextFormat::GOLD . "Description: ".TextFormat::WHITE . $perm->getDescription()."\n";
				// $desc .= TextFormat::GOLD . "Default: ".TextFormat::WHITE . $perm->getDefault()."\n";
				// $children = "";
				// foreach($perm->getChildren() as $name => $true){
					// $children .= $name . ", ";
				// }
				// $desc .= TextFormat::GOLD . "Children: ".TextFormat::WHITE . substr($children, 0, -2)."\n";
			// }else{
				// $desc = TextFormat::RED . "Permission does not exist\n";
				// $desc .= TextFormat::GOLD . "Default: ".TextFormat::WHITE . Permission::$DEFAULT_PERMISSION."\n";
			// }
			// $sender->sendMessage($desc);
			// $sender->sendMessage(TextFormat::YELLOW . $target->getName() . TextFormat::WHITE . " has it set to ".($target->hasPermission($node) === true ? TextFormat::GREEN . "true" : TextFormat::RED . "false"));
			// return true;
		// }
	// }

	// private function makePluginLoader(CommandSender $sender, Command $command, $label, array $args){
		// $pharPath = $this->getDataFolder() . DIRECTORY_SEPARATOR . "FolderPluginLoader.phar";
		// if(file_exists($pharPath)){
			// $sender->sendMessage("Phar plugin already exists, overwriting...");
			// @unlink($pharPath);
		// }
		// $phar = new \Phar($pharPath);
		// $phar->setMetadata([
			// "name" => "FolderPluginLoader",
			// "version" => "1.0.0",
			// "main" => "FolderPluginLoader\\Main",
			// "api" => ["1.0.0"],
			// "depend" => [],
			// "description" => "Loader of folder plugins",
			// "authors" => ["PocketMine Team"],
			// "website" => "https://github.com/PocketMine/DevTools",
			// "creationDate" => time()
		// ]);
		// $phar->setStub('<?php __HALT_COMPILER();');
		// $phar->setSignatureAlgorithm(\Phar::SHA1);
		// $phar->startBuffering();

		// $phar->addFromString("plugin.yml", "name: FolderPluginLoader\nversion: 1.0.0\nmain: FolderPluginLoader\\Main\napi: [1.0.0]\nload: STARTUP\n");
		// $phar->addFile($this->getFile() . "src/FolderPluginLoader/FolderPluginLoader.php", "src/FolderPluginLoader/FolderPluginLoader.php");
		// $phar->addFile($this->getFile() . "src/FolderPluginLoader/Main.php", "src/FolderPluginLoader/Main.php");

		// foreach($phar as $file => $finfo){
			// /** @var \PharFileInfo $finfo */
			// if($finfo->getSize() > (1024 * 512)){
				// $finfo->compress(\Phar::GZ);
			// }
		// }
		// $phar->stopBuffering();
		// $sender->sendMessage("Folder plugin loader has been created on ".$pharPath);
		// return true;
	// }

	
}
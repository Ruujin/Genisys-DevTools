# Plugin and Server Development Tools for Genisys

[![Travis-CI](https://travis-ci.org/iTXTech/Genisys-DevTools.svg?branch=master)](https://travis-ci.org/iTXTech/Genisys-DevTools)

This plugin is based on the original DevTools plugin by the PocketMine team. The original source code can be found [here](https://github.com/PocketMine/DevTools).

## Installation
- Drop it into your server's `plugins/` folder.
- Restart the server. The plugin will be loaded

## Commands
* `/extractphar <pharPath>`: Extract the source code from a phar file
* `/extractplugin <pluginName>`: Extract the source code from the specified phar plugin
* `/loadplugin <pluginName|folderPath>`: Load a plugin manually
* `/makeplugin <pluginName> [no-gz] [no-echo]`: Creates a plugin phar
* `/makeserver [no-gz] [no-echo]`: Creates a server phar

### Note on arguments
* `no-gz`: Skips compressing the generated phar file
* `no-echo`: Suppresses "Adding xxx.php" messages

## Create .phar from console
Download [DevTools.phar](https://github.com/PocketMine/DevTools/releases)

	php -dphar.readonly=0 DevTools.phar \
	--make="./plugin/" \
	--relative="./plugin/" \
	--out "plugin.phar"

or [ConsoleScript.php](https://github.com/PocketMine/DevTools/blob/master/src/DevTools/ConsoleScript.php)

	php -dphar.readonly=0 ConsoleScript.php \
	--make="./plugin/" \
	--relative="./plugin/" \
	--out "plugin.phar"
	
	
## Licence

	This program is free software: you can redistribute it and/or modify
	it under the terms of the GNU Lesser General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU Lesser General Public License for more details.

	You should have received a copy of the GNU Lesser General Public License
	along with this program.  If not, see <http://www.gnu.org/licenses/>.

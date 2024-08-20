# ReadSpeaker

This plugin adds the ReadSpeaker function to ILIAS.

The key words "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD",
"SHOULD NOT", "RECOMMENDED", "MAY", and "OPTIONAL"
in this document are to be interpreted as described in
[RFC 2119](https://www.ietf.org/rfc/rfc2119.txt).

**Table of Contents**

* [Requirements](#requirements)
* [Installation](#installation)
* [Configuration](#configuration)
* [Specifications](#specifications)
* [Other Information](#other-information)
    * [Correlations](#correlations)
    * [Bugs](#bugs)
    * [License](#license)

## Requirements

*  [![Minimum ILIAS Version](https://img.shields.io/badge/Minimum_ILIAS-7.0-orange.svg)](https://ilias.de/) [![Maximum ILIAS Version](https://img.shields.io/badge/Maximum_ILIAS-7.999-orange.svg)](https://ilias.de/)
*  ![Plugin Slot](https://img.shields.io/badge/Slot-UIHook-blue)
*  ![Plugin Version](https://img.shields.io/badge/plugin_version-0.1.0-yellow)
*  [![Minimum PHP Version](https://img.shields.io/badge/Minimum_PHP-7.0-blue.svg)](https://php.net/) [![Maximum PHP Version](https://img.shields.io/badge/Maximum_PHP-7.3-blue.svg)](https://php.net/)

## Installation

Before installing the plugin ensure all requirements are given.
The files MUST be saved in the following directory:<ILIAS>/Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/ReadSpeaker

Correct file and folder permissions MUST be
ensured by the responsible system administrator.
The plugin's files and folder SHOULD NOT be created as root.

The cache directory '/Customizing/global/plugins/Services/UIComponent/UserInterfaceHook/ReadSpeaker/cache' needs write permission.

After saving the files to the correct directory, run the command 'composer du' in the main directory of the ILIAS installation. This will add the plugin in the plugin list of the ILIAS plugin administration page.

Open up your ILIAS site in your browser, log in and navigate to: Administration -> Extending ILIAS -> Plugins.
Install and activate the plugin. Proceed to configuration.

## Configuration

Each setting in the configuration of the plugin includes information on how to fill in the configuration options.

#### Templates

#### ContentPage Elements

## Specifications

## Other information

#### Correlations

#### Bugs

#### License

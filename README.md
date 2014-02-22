Titan-Framework-Embedding-Demo
==============================

A demo plugin that has Titan Framework embedded in it. No need to require the framework plugin.

Download the zip package, unzip it into your plugins directory then activate the **Titan - EMBED TEST** plugin.

This plugin creates an admin menu and page named **EMBED TEST**

How does this work?
=======

The plugin has an embedded copy of Titan Framework in a folder named `titan-framework`

This plugin can be activated independently without requiring the framework plugin. When the framework plugin is activated, that is used instead of the embedded one. This is to ensure that the framework being used is the most updated one. We're assuming that the plugin copy is always the most updated.

Check the first lines of `titan-framework-embed-test.php` for the implementation and inclusion of the embedded framework.

TldLang
=======

Laravel 4 - auto select language based on domain .tld

Installation
============

Add TldLang to your composer.json file:


	"require": {
		"queiroz/tld-lang": "dev-master"
	}


Use composer to install this package.

	$ composer update

Configuration
=============

#### Registering the Package

register this service provider at the bottom of the $providers array: app.php

	'Queiroz\TldLang\TldLangServiceProvider'

Usage
=====

#### Basic usage

Supose you have domain.com (English), domain2.es (Spanish), domain3.fr (French)
you can simply change the system language based on this .tlds

	TldLang::set(array(
		'.com' 	=> 	'en',
		'.es'	=> 	'es',
		'.fr'	=>	'fr'
	));

and finally initialize

`TldLang::init();`
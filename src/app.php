<?php

/*
 * This file is part of the CRUD Admin Generator project.
 *
 * Author: Jon Segador <jonseg@gmail.com>
 * Web: http://crud-admin-generator.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class queryData {
	public $start;
	public $recordsTotal;
	public $recordsFiltered;
	public $data;

	function queryData() {
	}
}

use Silex\Application;

$app = new Application();

$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__.'/../web/views',
));
$app->register(new Silex\Provider\FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
	'translator.messages' => array(),
));
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());
$app->register(new Silex\Provider\SessionServiceProvider());
$app->register(new Silex\Provider\DoctrineServiceProvider(), array(

		'dbs.options' => array(
			'db' => array(
				'driver'   => 'pdo_mysql',
				'dbname'   => 'DATABASE_NAME',
				'host'     => '127.0.0.1',
				'user'     => 'DATABASE_USER',
				'password' => 'DATABASE_PASS',
				'charset'  => 'utf8',
			),
		)
));

$app['asset_path'] = '/resources';

$app['application_name'] = 'Admin Generator';

// determine image path for image fields in database
// I.E field value would be image.jpg, result would be <img src="http://somepath/dist/images/image.jpg" />
$app['image_fields'] = array(
    //'table_name.field_name' => 'http://somepath/dist/images/',
);

// If the automapping of foreign key for drop down list does not the job, you can
// force a mapping here
$app['foreign_key_mapping'] = array(
    //'main_table_name.main_table_field' => 'foreign_table_name.foreign_table_field'
);

// Allow user to add additional menu links
$app['menu_links'] = array(
    //['name' => 'MENU NAME', 'url' => 'http://menu-url.com', 'fa-icon' => ''],
);

$app['debug'] = true;
	// array of REGEX column name to display for foreigner key insted of ID
	// default used :'name','title','e?mail','username'
$app['usr_search_names_foreigner_key'] = array();

return $app;

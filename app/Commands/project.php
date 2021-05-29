<?php

namespace App\Commands;

use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;

class project extends Command {
	/**
	 * The signature of the command.
	 *
	 * @var string
	 */
	protected $signature = 'new 
							{name : The name of the project}';

	/**
	 * The description of the command.
	 *
	 * @var string
	 */
	protected $description = 'Creates a new Capabl project';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function handle() {


		$name = $this->argument( 'name' );
		$this->info( "Creating new Capabl project $name..." );
		$db         = [];
		$db['name'] = $this->ask( 'Database Name:', "wp_$name" );
		$db['user'] = $this->ask( 'Database Password:', 'root' );
		$db['pass'] = $this->ask( 'Database User:', 'root' );
		$db['host'] = $this->ask( 'Database Host:', 'localhost' );

		$output = shell_exec( "git clone git@bitbucket.org:bmediallc/capabl.io.git $name" );
		$output = shell_exec( "cd $name && wp core download" );
		file_put_contents( "$name/wp-config.php", $this->generate_wp_config( $name, $db ) );

		$this->newLine();
		$this->info( "$name created successfully" );


	}

	public function generate_wp_config( $name, $db ) {
		$db_name = $db['name'];
		$user = $db['user'];
		$pass = $db['pass'];
		$host = $db['host'];

		return "<?php
		
define( 'DB_NAME', '$db_name' );
define( 'DB_USER', '$user' );
define( 'DB_PASSWORD', '$pass' );
define( 'DB_HOST', '$host' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

\$table_prefix = 'wp_';

define( 'WP_DEBUG', false );
define( 'WP_HOME', 'http://$name.test' );
define( 'WP_SITEURL', 'http://$name.test' );

if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
		";
	}
}

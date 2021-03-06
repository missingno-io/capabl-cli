# Capabl CLI

The capabl CLI is meant to help get users up and running as fast as possible. It makes many assumptions about your
development environment so please read the requirements carefully.

## Documentation

### 1) Install Project Dependencies

**All Project Dependencies must be installed for this tool to work**

- Composer
- Git
- WP CLI

It's recommended that you install al dependencies required for Capabl development and Brew when running OSX

- Node JS, for NPM
- Laravel Valet
- Brew

### 2) Setup environment

To run the tool effectively you must be connected to the capabl.io repository.  This means your bitbucket SSH keypairs must be setup and working on your machine.
It's also recommended that you've setup your Laravel Valet enviroment to park a directory.

### 3) Install CLI

```bash
composer global require missingno/capabl-cli:dev-master
```

## Usage

**Create a new Capabl project:**

This will install a fresh version of the repository and pull the latest version of Wordpress.  You will be asked for your local database credentials and the  `wp_config.php` file will be automatically generated.

```bash
capabl new <project-name>
```

**Clone and setup an existing project:**

The project name must match the bitbucket repository name.  I.E. if the repository url is `https://bitbucket.org/bmediallc/<project-name>` enter `<project-name>`

```bash
capabl clone <project-name>
```


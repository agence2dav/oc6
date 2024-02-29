# Oc6 - project for openclassroom

## Mission

Create a website for SnowTricks, using the framework Symfony 7.0. <img src="https://img.shields.io/badge/symfony-7-0" alt="symfony 7.0">
The project will let the users create and edit some Tricks, the name given to some figures of snowboard.

## Requirements

Based on the last Php-8.2 <img src="https://img.shields.io/badge/php-8.2-%23777BB4?logo=php" alt="php banner">, the architecture of the software is oriented <a href="https://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller">MVC</a>, in respect of the segregation of the functions, recommended by the <a href="https://fr.wikipedia.org/wiki/SOLID_(informatique)">SOLID principle</a>.

## Uml Graphics
The UML for this project are in the directory `/_docs/uml`.
You can see :
- the diagram of use
- the diagram of sequence
- the classes diagram
- the model of datas, with all the relations between the tables

## Components

We use <a href="https://www.dotenv.org/docs/languages/php.html">Dotenv</a> to store the access for the Odbc. Use Composer to install it :

We use the templater <a href="https://twig.symfony.com/doc/3.x/tags/extends.html">Twig</a> to dissociate the front-end from the back-end.

We use <a href="https://github.com/squizlabs/PHP_CodeSniffer">PhpCs</a> as a linter in the <a href="https://fr.wikipedia.org/wiki/Environnement_de_d%C3%A9veloppement">EDI</a> <a href="https://code.visualstudio.com/">VsCode</a> for the respect of the standard <a href="https://www.php-fig.org/psr/psr-12/">Psr-12</a>.

Le list of the components used in this project is :
    "php": ">=8.2",
    "ext-ctype": "*",
    "ext-iconv": "*",
    "fakerphp/faker": "*",
    "symfony/console": "7.0.*",
    "symfony/debug-bundle": "7.0.*",
    "symfony/dotenv": "7.0.*",
    "symfony/filesystem": "7.0.*",
    "symfony/finder": "7.0.*",
    "symfony/flex": "^2",
    "symfony/framework-bundle": "7.0.*",
    "symfony/mailer": "7.0.*",
    "symfony/runtime": "7.0.*",
    "symfony/security-bundle": "7.0.*",
    "symfony/sendgrid-mailer": "7.0.*",
    "symfony/string": "7.0.*",
    "symfony/validator": "7.0.*",
    "symfony/webapp-pack": "*",
    "symfony/yaml": "7.0.*",
    "symfonycasts/reset-password-bundle": "*",
    "symfonycasts/verify-email-bundle": "*",
    "vich/uploader-bundle": "*"

The css used for this project is from <a href="https://bootswatch.com/5/darkly/bootstrap.min.css/startbootstrap-freelancer/">Bootstrap</a>. And the FontFaces are from https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css.

## Installation

You will need a Webserver Apache2 using Php 8.2+, and an <a href="https://fr.wikipedia.org/wiki/Open_Database_Connectivity">ODBC</a> like Mysql. We prefer to use MariaDb which is open source and built in opposition of the buyback of Mysql by Oracle.

Supposing you have <a href="https://git-scm.com/">GIT</a> installed, clone this repository :

    git clone https://github.com/agence2dav/oc6

Then, let <a href="https://getcomposer.org/">Composer</a> install the components from the `composer.json`:

    composer install

Then, follow this sequence :

    scoop install symfony-cli
    symfony check:requirements
    symfony new SnowTricks --version="7.0.*" --webapp

Security Audit
    composer audit

Now it's time to :
    composer install

In localhosting, you can using the server of Symfony :
    symfony server:start -d

Debug Bundle
    composer require symfony/debug-bundle 

Profiler, to follow the errors
    composer require --dev symfony/profiler-pack

Then, set the DATABASE_URL in your .ENV, and install the database
    php bin/console doctrine:database:create

No databe is given with this project.
You can load the Fixture to create random Datas :
    php bin/console doctrine:fixtures:load

## Usage

The user can :
- create new Tricks
- import and use images
- set a serie of Tags for his Trick
- set the Home prevalent image for the Trick
- publish some commentarieson all Tricks
- edit or unpublish a Trick
- publish or unpublish some comments
- choose an avatar for his profile
- change his password
- recover his account

### Roles

In this configuration, two roles are set hierarchically, `ROLE_EDIT` and `ROLE_ADMIN`.
As required, all two can edit ALL the datas of the site. If you yant to let this privilege to the USER_ADMIN only, and let user edit his own Tricks, you will have to change the variable `ROLE_EDIT` to `ROLE_ADMIN` in the templates `home`, `trick`, `tricks`, `admin/tricks`, `admin/comments`.

## Learnt

This is our first project in Symfony, so be kind with me :)
There is a lot of ways to perform the chooses taken. 
Most of time theses ways are let in comments in the code.

We ave learnt :
- to init a blank project
- to use the .ENV files
- to use the CLI instead of try to do all itself :)
- to know concepts of autowiring
- to understand concepts of HttpKernel and HttpFundation, and how the Url are made
- to understand concepts of ObjectManager and AbstractController
- to use the ORM, create entities, and "migrate" the table from them (because the config know how it is, but not again the Database).
- to make associations between tables without errors (because that can works with errors)
- to understand the principle of lazy datas, who are called from the template if necessary only. That's why errors in the bottom of the code are warning first.
- to separate the code following the SOLID precepts, using Mapping and Models, some times recursively.
- to build Fixtures with the bundle Faker
- to create and understand how works the Forms (and it's a big thing) :
-- to createForm from a specific class
-- to know and use all the options of all the types of fields
-- to understand the EventListeners
-- to manage the savings in services
- to customize error pages
- to hierarchize the Roles
- to config correctly the config.yaml, in general term
- to apply some principles of security
- to better use Twig

## Conclusion

Symfony is a big thing, and it let create some projects understandable for whose know Symfony, of course.
Most of classical parts of a software are industrialized in some trademarks processes, with common ways to use them and to combine them.


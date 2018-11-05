# SnowTricks [![Codacy Badge](https://api.codacy.com/project/badge/Grade/e0a1dd0962654e3f9673a35e800b4b62)](https://www.codacy.com/app/amelie.haladjian/SnowTricks?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=Dzov/SnowTricks&amp;utm_campaign=Badge_Grade)

A social platform allowing snow trick lovers to share images, videos, tips and tricks about snow related figures. 

All content is accessible to all visitors. You must however register in order to add, edit or delete content. 
Visitors can read comments, however one must register in order to comment.  

## Getting Started

### Requirements

PHP 7.2

MySQL 5.7.8 

### Installing

Install the project on your computer.
```
git clone git@github.com:Dzov/SnowTricks.git
```

Install the dependencies using composer.
```
composer install
```

#### Database and fixtures
In the `.env` file at the root of the project, adapt the `DATABASE_URL` variable by replacing the parameters `db_user`, `db_password` and `db_name` with your own configuration.

Create a new database by executing the command `php bin/console doctrine:database:create`. 
Then, execute the command `php bin/console doctrine:schema:update --force` in order to create the different tables based on the entity mapping. 

If your MySQL version is inferior to 5.7.8, run the command `php bin/console doctrine:migrations:migrate` in order to create the tables.

Once your database has been properly set up, run the following command in order to import the data fixtures : `php bin/console doctrine:fixtures:load
`

#### Swiftmailer

In the `.env` file, adapt the `MAILER_URL` variable with your email information.
Check out the [SwiftMailer Documentation](https://symfony.com/doc/current/reference/configuration/swiftmailer.html) if you need help with SwiftMailer's configuration.

Set the `APP_URI` variable in the `.env` file to the path to the public directory.
Set the `DELIVERY_ADDRESS=` variable to the email of your choice.

### Tests

In order to run the tests, execute the following command in the console : 
``` php bin/phpunit ```

## Resources 

Diagrams can be found here : [UML Diagrams](https://github.com/Dzov/SnowTricks/tree/master/resources)

Code quality has been analyzed with [Codacy](https://app.codacy.com/project/amelie.haladjian/SnowTricks/dashboard)

The different issues can be found on [Github](https://github.com/Dzov/SnowTricks/issues?q=is%3Aissue+is%3Aclosed)

## Versioning

I used [GitHub](https://github.com/Dzov/SnowTricks) for versioning. 

## Authors

**Amélie-Dzovinar Haladjian** 

## Acknowledgments

Many thanks to my mentor Sébastien Duplessy

<p align="center">
<a href="https://github.com/imranmailbd/mvc">PHP MVC</a>
</p>

## Project Requirements:

Please check project requirements before run:

- [PHP 7.4](https://www.php.net/releases/7_4_0.php).

- [MySQL]

- [Apache2 with modrewrite enabled]

- [Composer (project have only one dependencies, comoser need if clone from git to create dependencies)]

- [PHP command line version must be 7.4 also (please be sure)]


## Project Installation Step By Steps:

1. Unzip the project folder to the root directory, project name now is 'mvc', no need to change this. After unzip it should be look 
like below:
C:\wamp64\www\mvc

2. If you need to rename the project folder, then in that case please change all the default routing renamed to your desired 
name in index.php file located on root. Do not use index.php located on public folder(it use for php web server). Just run 
the project from root like below:
http://localhost/mvc

3. Open terminal from project root and run 'composer install' to create vendor folder on root
[Note:incase you clone from git, else escape this step]

4. Create a new blank database with default name 'phpmvc' in your MySQL server

5. Open .env file from project root folder and change database access according to your own database credential

6. Open terminal from project root, then run 'php migration.php' command from commandline for Database migration 
start to create DB tables need for project initial features enable.
[Note:command line PHP version must PHP7.4, else error show]

If all thing ok then you will see project home page, thank you!!
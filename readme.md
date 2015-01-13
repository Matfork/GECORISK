GecoRisk:
=========
"Sistema de Gestion de Conocimientos para la Gestion de Riesgos"

The abbrevation GecoRisk comes from the spanish title ("GEstion de COnocimiento de Riesgos"), 
this is a short/handy sytem which helps you manage the risks of differents projects, by letting you register 
risks with their respective solutions in order to keep track of the projects' risks information.

At the same time, there are two modules(queries and charts) which gives you general an specific information of risks as well as
their frecuency and risk level in projects. 

The system has 5 main modules and the admin module (for parameters stuff):
- Risk Module
- Project Module
- Link Module
- Queries
- Charts
* Admin Module  

The system is build in PHP using laravel 4.2 as framework, it also uses grunt, bower and confide for simple authentication stuff.
The system is open source! Feel free to modify it the way you like it according to your curent necessities.

Installation:
============
To make a clen instalation follow all the steps in the correct order they are shown.  

- Pull Repository to your local envirioment by forking or using:
<pre>git clone https://github.com/Matfork/GECORISK</pre>

From app root directory run:

- To install Laravel:
<pre>composer install</pre>

- To install Grunt
<pre>npm install</pre>

- To install Bower
<pre>cd /public/assets/js
bower install</pre>

- Next, set your database configuration in app/config/database (for production), if you want to test app in local database, create a folder in app/config named local and inside that folder add database.php, and change the credentials to your local db.

- Run migrations and seeder with
<pre> php artisan migrate --seeder</pre>

- If you don't want to send email as confirmation after creating a new user account, go to 
/vendor/zizaco/confide/src/config/config.php and change to false the next lines:

<pre>'signup_email'   => false,
    'signup_confirm' => false,
</pre> 

- For documents storage: create  folder named "uploads/gecorisk" inside public folder.

- Don't forget to set a virtual host to the system application, if you have problems you can follow the next guide:
https://www.digitalocean.com/community/tutorials/how-to-set-up-apache-virtual-hosts-on-ubuntu-14-04-lts

That's all you can start now using the application.


Matt Hernandez
Matfork
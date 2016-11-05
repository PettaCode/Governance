
##Problem We find?

- Government Application filling / Processing 
   
		[Size of the Problem] = {Individual < Group/Family}

- Hard to Find the proper process for solving Corruption 




## Requirements

**The Application requirements are limited.**

- PHP 5.6 or greater.
- Apache Web Server or equivalent with mod rewrite support.
- IIS with URL Rewrite module installed - [http://www.iis.net/downloads/microsoft/url-rewrite](http://www.iis.net/downloads/microsoft/url-rewrite)

**The following PHP extensions should be enabled:**

- Fileinfo (edit php.ini and uncomment php_fileinfo.dll or use php selector within cpanel if available.)
- OpenSSL
- INTL

> **Note:** Although a database is not required, if a database is to be used, the system is designed to work with a MySQL database using PDO.

## Installation

This framework was designed and is **strongly recommended** to be installed above the document root directory, with it pointing to the `public` folder.

Additionally, installing in a sub-directory, on a production server, will introduce severe security issues. If there is no choice still place the framework files above the document root and have only index.php and .htacess from the public folder in the sub folder and adjust the paths accordingly.

## Regular User Password : 
User Name : john
pass : john
Uses -> Reqular User ,Access to his profile,list of family members

## Admin
user : admin
pass : admin
uses -> report checking ,user creation,form view,system setting,server files

## employe
user : marcus
pass : marcus
uses -> form checking ,profile,user creation

Please setup the virtual server to run this project properly

Please locate the db file in Script folder



Front Side :

front side is basicaly navigate to the services that will push to the backend of the system.

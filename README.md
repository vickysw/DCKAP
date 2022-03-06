# dckap

## Requirenments
1. PHP > 5.0
2. Mysql >= 5.7
3. Apache server
4. Composer
5. Github credential

## To Run this project, You need to follow below steps: 
1. Go to your www directory
2. Clone the repository with the help of this command: ``` git clone https://github.com/vickysw/dckap.git ```
3. Create a Virtualhost with the name *local.socialmgmt.com*  for google social login.
4. Create directory followed by *uploads/users* and *uploads/logs*. (It should be recursively writable permission).    
5. Database setup with help of [local_socialmgmt.sql](https://github.com/vickysw/dckap/blob/main/local_socialmgmt.sql)
6. Add your Database Credentail in the file: `{YOUR_DIR_NAME}\src\Core\Database\MySql.php` [help?](https://www.screencast.com/t/vlxPAnfcu7).
7. Go to project directory from terminal and execute the command `composer dump-autoload` OR `composer dump-autoload -o`  
8. Now you can see Sign In button of Google. [Login Page](https://www.screencast.com/t/3QFyUdoHFtnx)


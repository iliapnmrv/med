# med

Employees medical examination
![Demo](https://github.com/iliapnmrv/med/assets/static/images/demo.jpg)

## Description

The project was created to facilitate the control and sending of employees to the medical examination. In many companies, workers are required to attend a medical check-up at least once a year. For each employee, a report must be generated and the number of days monitored, which greatly complicates this task in large companies. Everything is made with javascript, jquery, PHP and AJAX.

### Features

- Аdd employee to an exception (The person will no longer appear in "must go" workers)
- Set and update "harmful and dangerous working conditions" (an important parameter in sending people to medical examination)
- Search by last name
- Filtering by shift number (in a large number of companies there is a shift work, which does not allow some employees who may not be working to undergo an examination)
- View the date ahead (this way you can see people who need to go through a medical exam in the near future)
- Export data in export data as excel table

#### Unfortunately, medical examination repository is not able to:

- delete and add employees (during development process it was not necessary and was created manually by dumping from another database)
- update the list of "harmful and dangerous working conditions"

### Other pros

- This project does not use a PHP composer, which makes it very quick to install and use.
- The database is already created and requires only a couple of clicks. (I used [mockaroo](https://www.mockaroo.com/) to create database with test data because it is impossible to use corporate data)
- It is completely free to use.

## Instalation

The things you need:

- Local web server such as [xampp](https://www.apachefriends.org/ru/index.html), [openserver](https://ospanel.io/) and others to run PHP and create database

Read the following steps carefully to avoid unexpected errors:

### 1. Download

Download this github repository to where you want it to be, usually it is htdocs (xampp) or localhost (openserver) folders
using:

```
git clone https://github.com/iliapnmrv/med.git
```

You also can download the project using the github archive

### 2. Create database

In your server's database management system you must choose `import database`. Then select `med.sql` file and simply click next, everything will be created automatically.
You can always edit the table later, however this can lead to errors

### 3. Home stretch

- Inside `db.php` file change your `servername`, `username` and `password` fields. And `database` if you have changed your database name
- If you have a problem on the first start, simply reload the page, PHP files `database/db-check.php` will create a few new database records
- Enjoy this project and to send employees to the medical examination with less effort

## Contact me if you have any issues

[iliapnmrvv@gmail.com](mailto:iliapnmrvv@gmail.com)

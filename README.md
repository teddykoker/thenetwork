#The Network
This is my final project for my senior year in High School. I still need to think of a name...
##Author
[Tom Koker](http://tomkoker.com)
##Run Locally using Docker
Download thenetork source code:
```bash
git clone https://github.com/tomkoker/thenetwork.git
```

Make a config file:
 - Copy `config.php.sample` to `config.php` and open it
 - Change `database_name` to `thenetwork`
 - Change `mysql_username` to `user` and `mysql_password` to `password`
 - Add email credentials

Download my LAMP Docker Image:
```bash
wget https://www.dropbox.com/s/xupzh19fkszymfp/lamp.tar
```

Load the image into Docker:
```bash
docker load -i lamp.tar
```

Run the image:
```bash
docker run -p 80:80 -it -v /path/to/thenetwork:/var/www/site lamp /bin/bash
```
This should put you in a root shell of your container. Then run:
```bash
service apache2 start && service mysql start
```
Initialize the MySQL database:
```bash
mysql -u user --password=password < /var/www/site/init.sql #the default password is 'password'
```

You should now be able to visit the site at [localhost](http://localhost).
# Facemash
Facemash is a website created by Mark Zuckerberg in 2003, where people had to choose between two photos. This is clone of facemash in the Social Network Movie.

![http://img11.hostingpics.net/pics/231959Capturedu20170213132608.png](http://img11.hostingpics.net/pics/231959Capturedu20170213132608.png)

# Database Structure

```sql
CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '2000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);
```

# init.php
Modify `init.php` according to your environment. Here I am using mySqli!

```php
$host = 'localhost'; // Put here your host
$db_username = 'root'; // Put here your database username
$db_password = ''; // Put here your database password
$db_name = 'facemash'; // Put here your database name
$mysqli = new mysqli($host, $db_username, $db_password, $db_name);
```


TYPE=VIEW
query=select `teasystem`.`brand`.`shopname` AS `shopname`,`teasystem`.`brand`.`brandname` AS `brandname`,`teasystem`.`drink`.`category` AS `category`,`teasystem`.`drink`.`name` AS `name`,`teasystem`.`drink`.`price` AS `price`,`teasystem`.`drink`.`size` AS `size`,`teasystem`.`drink`.`info` AS `info` from (`teasystem`.`brand` join `teasystem`.`drink` on(`teasystem`.`brand`.`shopname` = `teasystem`.`drink`.`shopname`))
md5=c9253e274f3ed924da5ca05fd911a620
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2022-01-10 10:39:07
create-version=2
source=SELECT * \nFROM `brand` NATURAL JOIN `drink`
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `teasystem`.`brand`.`shopname` AS `shopname`,`teasystem`.`brand`.`brandname` AS `brandname`,`teasystem`.`drink`.`category` AS `category`,`teasystem`.`drink`.`name` AS `name`,`teasystem`.`drink`.`price` AS `price`,`teasystem`.`drink`.`size` AS `size`,`teasystem`.`drink`.`info` AS `info` from (`teasystem`.`brand` join `teasystem`.`drink` on(`teasystem`.`brand`.`shopname` = `teasystem`.`drink`.`shopname`))
mariadb-version=100422

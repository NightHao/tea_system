TYPE=VIEW
query=select `teasystem`.`drink`.`shopname` AS `shopname`,`teasystem`.`drink`.`category` AS `category`,`teasystem`.`drink`.`name` AS `name`,`teasystem`.`drink`.`price` AS `price`,`teasystem`.`drink`.`size` AS `size`,`teasystem`.`drink`.`info` AS `info`,`teasystem`.`drinkshop`.`address` AS `address`,`teasystem`.`drinkshop`.`brandname` AS `brandname`,`teasystem`.`drinkshop`.`time` AS `time` from (`teasystem`.`drink` left join `teasystem`.`drinkshop` on(`teasystem`.`drink`.`shopname` = `teasystem`.`drinkshop`.`shopname`))
md5=08b5ae9754e71510ddbb4ad5273db7ad
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2022-01-10 10:49:50
create-version=2
source=SELECT * FROM `drink` NATURAL LEFT OUTER JOIN `drinkshop`
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `teasystem`.`drink`.`shopname` AS `shopname`,`teasystem`.`drink`.`category` AS `category`,`teasystem`.`drink`.`name` AS `name`,`teasystem`.`drink`.`price` AS `price`,`teasystem`.`drink`.`size` AS `size`,`teasystem`.`drink`.`info` AS `info`,`teasystem`.`drinkshop`.`address` AS `address`,`teasystem`.`drinkshop`.`brandname` AS `brandname`,`teasystem`.`drinkshop`.`time` AS `time` from (`teasystem`.`drink` left join `teasystem`.`drinkshop` on(`teasystem`.`drink`.`shopname` = `teasystem`.`drinkshop`.`shopname`))
mariadb-version=100422

TYPE=VIEW
query=select `teasystem`.`brand`.`brandname` AS `brandname`,`teasystem`.`brand`.`shopname` AS `shopname`,`teasystem`.`drinkshop`.`address` AS `address`,`teasystem`.`drinkshop`.`time` AS `time` from (`teasystem`.`brand` join `teasystem`.`drinkshop` on(`teasystem`.`brand`.`brandname` = `teasystem`.`drinkshop`.`brandname` and `teasystem`.`brand`.`shopname` = `teasystem`.`drinkshop`.`shopname`))
md5=90febdffe6101bb71c3a1f6e5eb3604e
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2022-01-10 10:45:38
create-version=2
source=SELECT * FROM `brand` NATURAL JOIN `drinkshop`
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `teasystem`.`brand`.`brandname` AS `brandname`,`teasystem`.`brand`.`shopname` AS `shopname`,`teasystem`.`drinkshop`.`address` AS `address`,`teasystem`.`drinkshop`.`time` AS `time` from (`teasystem`.`brand` join `teasystem`.`drinkshop` on(`teasystem`.`brand`.`brandname` = `teasystem`.`drinkshop`.`brandname` and `teasystem`.`brand`.`shopname` = `teasystem`.`drinkshop`.`shopname`))
mariadb-version=100422

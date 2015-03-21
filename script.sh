#!/bin/bash

#service mysql start 

/usr/bin/mysqld_safe > /dev/null 2>&1 &
RET=1
while [[ RET -ne 0 ]]; do
    echo "=> Waiting for confirmation of MySQL service startup"
    sleep 5
    mysql -uroot -e "status" > /dev/null 2>&1
    RET=$?
done

PASS=${MYSQL_PASS:-$(pwgen -s 12 1)}
_word=$( [ ${MYSQL_PASS} ] && echo "preset" || echo "random" )
echo "=> Creating MySQL admin user with ${_word} password"

mysql -uroot -e "CREATE USER 'admin'@'%' IDENTIFIED BY '$PASS'"
mysql -uroot -e "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%' WITH GRANT OPTION"
echo "=> Creating MySQL DATABASE ecb"
mysql -u admin -p$PASS < /var/www/database.sql
echo "=> Creating tunelko user for DATABASE ecb"
mysql -uroot -e "CREATE USER 'tunelko'@'%' IDENTIFIED BY 'dhWuSEKR7LCgibBt'"
mysql -uroot -e "GRANT ALL PRIVILEGES ON ecb.* TO 'tunelko'@'%' WITH GRANT OPTION"
echo "=> Done!"

echo "========================================================================"
echo "You can now connect to this MySQL Server using:"
echo ""
echo "    mysql -uadmin -p$PASS -h<host> -P<port>"
echo ""
echo "Please remember to change the above password as soon as possible!"
echo "MySQL user 'root' has no password but only allows local connections"
echo "========================================================================"

#mysqladmin -uroot shutdown
#service mysql stop
service mysql start
ps faxu 
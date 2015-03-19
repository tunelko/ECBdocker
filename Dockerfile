FROM debian:stable
RUN apt-get -q update && apt-get install -y apache2
RUN apt-get install -y php5 libapache2-mod-php5 php5-mcrypt pwgen 
RUN apt-get install -y php5-common
RUN apt-get install -y mysql-client-5.5 mysql-common mysql-server-5.5 mysql-server-core-5.5 
ADD src /var/www/
ADD allmysql.sh /root 
RUN chmod -R 755 /var/www/
ADD php.ini /etc/php5/apache2/php.ini
ENV DEBIAN_FRONTEND noninteractive
CMD chmod +x /root/allmysql.sh
CMD sh /root/allmysql.sh
CMD /usr/sbin/apache2ctl -D FOREGROUND
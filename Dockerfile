FROM debian:stable

# Install packages
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update && \
  apt-get -y install supervisor git apache2 libapache2-mod-php5 curl \ 
  	mysql-server php5-mysql pwgen php5-mcrypt mysql-client-5.5 mysql-common mysql-common mysql-server-5.5 mysql-server-core-5.5  && \
  echo "ServerName localhost" >> /etc/apache2/apache2.conf


ADD src /var/www/
RUN ls -lasth /var/www/
RUN chmod -R 755 /var/www/
ADD php.ini /etc/php5/apache2/php.ini
CMD /usr/sbin/apache2ctl -D FOREGROUND
CMD curl https://raw.githubusercontent.com/tunelko/ECBdocker/master/allmysql.sh -o /root/allmysql.sh
RUN chmod 755 /root/allmysql.sh
RUN /root/./allmysql.sh


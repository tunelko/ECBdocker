FROM debian:stable

# Install packages
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update && \
  apt-get -y install supervisor git apache2 libapache2-mod-php5 php5-mysql pwgen php5-mcrypt mysql-client-5.5 mysql-common mysql-server-5.5 mysql-server-core-5.5  && \
  echo "ServerName localhost" >> /etc/apache2/apache2.conf


ADD src /var/www/
RUN chmod -R 755 /var/www/
ADD php.ini /etc/php5/apache2/php.ini
CMD /usr/sbin/apache2ctl -D FOREGROUND
ADD allmysql.sh /var/www/allmysql.sh
RUN chmod +x /var/www/allmysql.sh
RUN sh /var/www/allmysql.sh

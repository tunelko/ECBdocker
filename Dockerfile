FROM debian:stable

# Install packages
ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update && \
  apt-get -y install supervisor git apache2 libapache2-mod-php5 mysql-server php5-mysql pwgen php5-mcrypt && \
  echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN mkdir /app
ADD allmysql.sh /app/allmysql.sh
RUN chmod +x /app/allmysql.sh
RUN sh /app/allmysql.sh
ADD src /var/www/
RUN chmod -R 755 /var/www/
ADD php.ini /etc/php5/apache2/php.ini
CMD /usr/sbin/apache2ctl -D FOREGROUND
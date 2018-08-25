FROM ubuntu:latest

# Set the locale
RUN apt-get clean && apt-get update && apt-get install -y locales
RUN locale-gen en_US.UTF-8 \
  && export LANG=en_US.UTF-8 \
  && apt-get update \
  && apt-get -y install apache2

ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get -y install libapache2-mod-php7.2 php7.2 php7.2-cli php-xdebug php7.2-mbstring sqlite3 php7.2-mysql php-imagick php-memcached php-pear curl imagemagick php7.2-dev php7.2-phpdbg php7.2-gd npm nodejs php7.2-json php7.2-curl php7.2-sqlite3 php7.2-intl apache2 vim git-core wget libsasl2-dev libssl-dev libcurl4-openssl-dev autoconf g++ make openssl libssl-dev libcurl4-openssl-dev pkg-config libsasl2-dev libpcre3-dev \
  && a2enmod headers \
  && a2enmod rewrite

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid
ENV APACHE_RUN_DIR /var/run/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
RUN ln -sf /dev/stdout /var/log/apache2/access.log && \
    ln -sf /dev/stderr /var/log/apache2/error.log
RUN mkdir -p $APACHE_RUN_DIR $APACHE_LOCK_DIR $APACHE_LOG_DIR

VOLUME [ "/var/www/html" ]
WORKDIR /var/www/html

EXPOSE 80

ENTRYPOINT [ "/usr/sbin/apache2" ]
CMD ["-D", "FOREGROUND"]

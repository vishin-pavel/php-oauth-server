FROM phpdockerio/php7-fpm:latest

RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.0-memcached php7.0-mongodb php7.0-mysql php7.0-redis php7.0-xdebug php7.0-mbstring php7.0-bcmath php7.0-gd \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
	&& composer global require fxp/composer-asset-plugin

WORKDIR "/var/www/myobject"

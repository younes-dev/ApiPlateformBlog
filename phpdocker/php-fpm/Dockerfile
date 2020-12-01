FROM phpdockerio/php74-fpm:latest
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php-memcached php7.4-mysql php-xdebug php7.4-xsl php-yaml php7.4-xml php7.4-pgsql pdo_sqlite \
    && docker-php-ext-install pdo pdo_mysql zip php7.4-pgsql \
#    && docker-php-ext-enable pdo_sqlite
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*


# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
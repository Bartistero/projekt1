# syntax=docker/dockerfile:1.3
FROM scratch
ADD alpine-minirootfs-3.14.2-x86_64.tar.gz /

LABEL "author"="Bartosz Sterniczuk"
LABEL "email"="bartosz.sterniczuk@pollub.edu.pl"

RUN apk --no-cache update && apk --no-cache upgrade && apk add --no-cache apache2 php$phpverx-apache2 \
    && apk add --no-cache php7-json \
        && apk --purge del apk-tools

COPY ./index.php /var/www/localhost/htdocs

CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]
FROM scratch
ADD alpine-minirootfs-3.14.2-x86_64.tar.gz /

LABEL "author"="Bartosz Sterniczuk"
LABEL "email"="bartosz.sterniczuk@pollub.edu.pl"

RUN apk update && apk upgrade && apk add apache2 php$phpverx-apache2 \
    && apk add php7-json
COPY ./index.php /var/www/localhost/htdocs

CMD ["/usr/sbin/httpd", "-D", "FOREGROUND"]
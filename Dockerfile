FROM php:7.4-cli
COPY . /root/leaflet
WORKDIR /root/leaflet
CMD [ "php", "./index.php" ]

FROM httpd:2.4
COPY ./public-html/ /usr/local/apache2/htdocs/


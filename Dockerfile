FROM php:7.4-cli
COPY . /root/leaflet
WORKDIR /root/leaflet
CMD [ "php", "./index.php" ]

FROM httpd:2.4
COPY ./root/leaflet /usr/local/apache2/htdocs/
CMD docker build -t my-apache2 .
CMD docker run -dit --name my-running-app -p 8080:80 my-apache2


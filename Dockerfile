FROM httpd:2.4
COPY /home/usr/lealet /usr/local/apache2/htdocs/
CMD docker build -t my-apache2 .
CMD docker run -dit --name leaflet_app -p 8080:80 my-apache2

FROM php:7.4-cli
COPY . /home/usr/leaflet
WORKDIR /home/usr/leaflet
CMD [ "php", "./index.php" ]

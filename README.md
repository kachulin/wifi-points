Данное приложение реализовано на базе фреймворка Yii2-basic 

Работоспособность проверялась на linux-машине ОС Ubuntu 20.04 с конфигурацией:

PHP 7.4

MySql 8.0  

Git 2.25.1

Инструкция по установке:

Копируем репозиторий view

git clone https://github.com/kachulin/wifi-points.git wifi-points

Заходим в папку проекта

cd wifi-points

Устанавливаем зависимости

composer install

Конфигурируем настройки базы данных в файле

/config/db.php

Применяем миграции

php yii migrate

Запускаем веб-сервер

php yii serve --port=8880

Открываем страницу в браузере

http://localhost:8880/

Примеры запросов к api:

http://localhost:8880/api/v1/points/22-00-00-00-00-A2

http://localhost:8880/api/v1/points/22-00-00-00-00-A2/language

http://localhost:8880/api/v1/points/22-00-00-00-00-A2/city

где '22-00-00-00-00-A2' - предполагаемый идентификатор wifi-точки доступа

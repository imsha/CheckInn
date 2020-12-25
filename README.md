#Задание
https://drive.google.com/file/d/1DSwfsm0Ha32xZI_8KlkxoCBC7hy_NiV_/view?usp=sharing

## Деплой 
- создайте .env файл в корне приложения, скопируйте из .env.example
- Разверните docker, выполните команду "docker-compose up"
- Установите php библиотеки командой "docker-compose run --rm composer update"
- Установите ключ шифрования сессий и кук "docker-compose run --rm key:generate"
- Установите миграции командой "docker-compose run --rm artisan migrate"
- Запустите воркер очереди командой "docker-compose exec php php artisan queue:work"

## Тестирование
- Откройте сайт по адресу localhost:8080
- Проверьте работу "Прямой запрос к api"
- Проверьте работу "Асинхронный запрос к api"

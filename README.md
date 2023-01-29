## Orchid Screencast

<a href="https://raw.githubusercontent.com/agoalofalife/orchid-screencast/master/.github/IMAGES/promo.png">
  <img src="https://raw.githubusercontent.com/agoalofalife/orchid-screencast/master/.github/IMAGES/promo.png" alt="Laravel Orchid Platform Screencast" align="center" />
</a>

# Версии и зависимости

| Название | Версия |
|----------|--------|
| Mysql    | 8      |
| Laravel  | 8      |
| Orchid   | 10.3   |
| Php      | 8      |

### Как установить(развернуть у себя)?
#### Стянуть репозиторий
```shell
git clone https://github.com/agoalofalife/orchid-screencast.git

#or

git clone git@github.com:agoalofalife/orchid-screencast.git
```

#### Установить зависимости
```shell
composer install
```

#### Скопировать файл окружения
```shell
cp .env.example .env
```
#### Сгенерировать ключ
```shell
php artisan key:generate
```
#### Поменять конфигурацию базы данных - на ту которая у вас 

```shell
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=orchid-screencasts
DB_USERNAME=root
DB_PASSWORD=
```

#### Накатить схему базы
```shell
php artisan migrate
```

#### Заполнить данными

```shell
php artisan db:seed
```

#### Поднять сервер
```shell
php artisan serve
```

### [Библиотека](https://github.com/agoalofalife/orchid-fields) с дополнительными полями из видео курса

| Название урока                  | Ссылка                       |
|---------------------------------|------------------------------|
| Введение                        | https://youtu.be/za1VYGG1BOg |
| Установка                       | https://youtu.be/T5qQsQ-wI1w |
| Экраны                          | https://youtu.be/BP74mie5pWs |
| Первый Layout                   | https://youtu.be/sQ_Wi44wycM |
| Простая сортировка и фильтрация | https://youtu.be/EfG6NlvYhJY |
| Модальное окно                  | https://youtu.be/B3CDMHmFl8o |
| Асинхронное модальное окно      | https://youtu.be/F0WfStUk1gw |
| Хлебные крошки                  | https://youtu.be/bK1yhUzCgBE |
| Права и роли                    | https://youtu.be/89eXPG8zxZY |
| Графики                         | https://youtu.be/rXOLR7PXunE |
| Отчеты                          | https://youtu.be/1GG47Z8dduQ |
| Кастомный field                 | https://youtu.be/Gkfswuh0gDg |
| Кастомный компонент             | https://youtu.be/j44xvN6wsPo |
| Вложение                        | https://youtu.be/iNthMN8Lap8 |
| Продвинутая фильтрация          | https://youtu.be/nGQ7fISWw6U |
| Уведомления                     | https://youtu.be/2n6YJXXtC1k |
| Обратная связь или Issue        | https://youtu.be/7XEQVkRg1iM |
| Pull Request                    | https://youtu.be/I2xrO5ctR7I |

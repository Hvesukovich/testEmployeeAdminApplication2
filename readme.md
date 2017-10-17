<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

## Требования
Используя Laravel в качестве платформы веб-приложений, создайть приложение, которое позволяет зарегистрированному пользователю добавлять / редактировать / удалять информацию о сотрудниках. Все
вошедшие в систему пользователи для этого приложения считаются администраторами с полными привилегиями. Администраторам приложений должно быть разрешено просматривать текущих
сотрудников, редактировать действующих сотрудников, а также добавлять сотрудников. Информация о сотруднике должна храниться в базе данных. Информация
о сотруднике, как минимум, должно включать их имя, дату рождения и домашний адрес. Всякий раз, когда информация о сотруднике добавляется или редактируется, необходимо удостовериться, что введенный адрес является действительным почтовым адресом Соединенных Штатов, используя сторонний провайдер, прежде чем разрешить его сохранение
в базе данных.

## Задания
Создайть консольную команду, которая позволит добавлять новых администраторов в приложение
Отобразить список сотрудников, которые уже были добавлены в базу данных.
Разрешить администраторам редактировать существующие записи сотрудников
Разрешить администраторам добавлять новые записи сотрудников
Разрешить администраторам удалять существующие записи сотрудников
Когда записи сотрудника добавляются или редактируются, проверяйте адресс сотрудника с помощью внешней службы

## Дополнительные задания
Создайте конечную точку API REST для аутентификации и входа в систему администратора
Создайте конечную точку API REST для добавления или сохранения информации сотрудника
Создайте конечную точку API REST для удаления информации сотрудника
Напишите единичные и / или функциональные тесты, чтобы проверить, что написанное вами приложение работает должным образом

# Выполнение

## Технологии
Для выполнения проекта были использованы следующие технологии:
1. Laravel 5.5.8
2. MySQL 5.6.34 
3. jQuery
4. Ajax
5. Bootstrap 4.0.0-beta
6. Шрифты Font Awesome

## Выполнения заданий
1. Реализована возможность аутентификации пользователя.
2. Реализована возможность создания / просмотра / редактирования / удаления карточки сотрудника.
3. При создании / редактировании карточки сотрудника осуществлена проверка адресса (США) с помощью GOOGLE MAPS API. При неверном адрессе создать / отредактировать карточку невозможно.
4. Создан API http://site.com/api/login-verification - для аутентификации пользователя
5. Создан API http://site.com/api/get-all-users - для вывода вывода всех сотрудников 
6. Создан API http://site.com/api/delete-user/{id} - для удаления карточки сотрудника
7. Создан API http://site.com/api/save-user - для сохранения карточки сотрудника
8. Реализована возможность заполнения базы данных тестовыми данными AdminsFactory и UserFactory (запускается с помощью команды php artisan db:seed).
9. Реализована возможность создания администратора через терминал. А именно была созданна говая команда php artisan admin:create с 2-мя аргументами логин и пароль.
Пример команды целеком:
php artisan admin:create login password
10. Создано 2 теста: 
1 - проверка аутентификации с переходом на страницу отображения всех сотрудников.
2 - проверка аутентификации с переходом на страницу отображения всех сотрудников, поиск пользователя "Liam" и переход в его личную карточку.
![Employee admin page](https://cloud.mail.ru/home/%D0%9F%D0%BE%D1%80%D1%82%D1%84%D0%BE%D0%BB%D0%B8%D0%BE/LaravelEmployeeAdminApplication/%D0%90%D1%83%D1%82%D0%B5%D0%BD%D1%82%D0%B8%D1%84%D0%B8%D0%BA%D0%B0%D1%86%D0%B8%D1%8F.jpg)
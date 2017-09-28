$(document).ready(function(){
    var users;
    /*-----------------------Enter admin-panel------------------------------------------*/

    $(".enter_the_site").submit(function(event) {
        event.preventDefault();
        var login = $('#userName').val();// узнаю логин
        var password = $('#userPassword').val();// узнаю пароль
        // alert("Логин: " + login + ". Пароль: " + password);
        $.post('api/login-verification', {
            login: login,
            password: password
            }, function (data) {
            console.log(typeof data);
                if(data === false) {
                    alert('Данные введены не верно');
                    $('#userName').val('');
                    $('#userPassword').val('');
                } else if (data === true) {
                    location="/users";
                }
            }, 'json'
        );
    });


    /*-----------------------End enter admin-panel------------------------------------------*/

    /*-----------------------List of all users------------------------------------------*/
    //Проверяю открытата ли нужная мне страница для построения таблицы категорий
    if (location.href == 'http://testemployeeadminapplication2/users') {
        //Создание объекта "Все категории"(если он уже не существует) и вызов функции по созданию таблицы "категории"
        getAllUsers();
    }

    function getAllUsers() {
        if (!users) {
            return new Promise((resolve, reject) => {
                //Создаю объект users в который заношу все данные из таблицы "users" из БД
                getAllUsersInServer().then(users => {
                    //Функция очистки таблицы + вызов функции построения строк для таблицы
                    createTableUsers(users);
                });
            });
        } else {
            //Функция очистки таблицы + вызов функции построения строк для таблицы категорий
            createTableUsers(users);
        }
    }

    function getAllUsersInServer() {
        return new Promise((resolve, reject) => {
            $.post('api/get-all-users', function (data) {
            users = [];
            for (let key in data) {
                users[data[key].id] = data[key];
            }
            resolve(users);
        }, 'json');

        });
    }

    //Функция очистки таблицы + вызов функции построения строк для таблицы USERS
    function createTableUsers() {
        $('tbody.users-table').empty();
        for (var key in users) {
            // Функция для построения строк в таблице категорий
            createRowUser(users[key]);
        }
    }

    function createRowUser(user) {
        var row = $("<tr marker ='" + user.id + "'>" +
            "<td><span>" + user.id + "</span></td>" +
            "<td><span>" + user.firstName + "</span></td>" +
            "<td><span>" + user.lastName + "</span></td>" +
            "<td><span>" + user.DateOfBirth + "</span></td>" +
            "<td><div>" +
                "<button class='btn btn-secondary cursor-pointer text-dark' title='Edit' data-toggle='modal' data-target='#userEditModal'>" +
                    "<i class='fa fa-pencil'></i>" +
                "</button>" +
                "<button class='btn btn-secondary cursor-pointer text-danger margin-left' title='Delite'>" +
                    "<i class='fa fa-trash'></i>" +
                "</button>" +
            "</div></td>" +
            "</tr>");
        row.appendTo("tbody.users-table");
        //Функция для работы с элементами созданной строки
        // rowUserEvents(row);
    }

    /*-----------------------End list of all users------------------------------------------*/


});
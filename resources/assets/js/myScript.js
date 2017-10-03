window.$ = window.jQuery = require('jquery');

$(document).ready(function(){
    let users;
    /*-----------------------Enter admin-panel------------------------------------------*/

    $(".enter_the_site").submit(function(event) {
        event.preventDefault();
        const login = $('#userName').val();// узнаю логин
        const password = $('#userPassword').val();// узнаю пароль
        // alert("Логин: " + login + ". Пароль: " + password);
        $.post('api/login-verification', {
            login: login,
            password: password
            }, function (data) {
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
    $('#userAdd').click(function () {
        const user = {
            id: 0,
            img: '../../images/holder.jpg',
            firstName: '',
            lastName: '',
            DateOfBirth: '',
            email: '',
            password: '',
            address: ''
        };
        fillingModal(user);
    });
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
            users = {};
            for (const key in data) {
                // users[data[key].id] = data[key];
                users[data[key].id]= data[key];
            }
            resolve(users);
        }, 'json');

        });
    }

    //Функция очистки таблицы + вызов функции построения строк для таблицы USERS
    function createTableUsers() {
        $('tbody.users-table').empty();
        for (const key in users) {
            // console.log(users[key]);
            // Функция для построения строк в таблице категорий
            createRowUser(users[key]);
        }
    }

    function createRowUser(user) {
        const row = $("<tr id ='row_" + user.id + "'>" +
            "<td><span class='id'>" + user.id + "</span></td>" +
            "<td><a href='/user-details/" + user.id + "''><span class='firstName'>" + user.firstName + "</span></a></td>" +
            "<td><span class='lastName'>" + user.lastName + "</span></td>" +
            "<td><span class='dateOfBirth'>" + user.DateOfBirth + "</span></td>" +
            "<td><div class='text-center'>" +
                "<button id='" + user.firstName + user.id + "Edit' class='edit btn btn-secondary cursor-pointer text-dark'" +
                        "title='Edit' data-toggle='modal' data-target='#userEditModal'>" +
                    "<i class='fa fa-pencil'></i>" +
                "</button>" +
                "<button id='" + user.firstName + user.id + "Del' " +
                        "class='del btn btn-secondary cursor-pointer text-danger margin-left' title='Delite'>" +
                    "<i class='fa fa-trash'></i>" +
                "</button>" +
            "</div></td>" +
            "</tr>");
        row.appendTo("tbody.users-table");
        //Функция для работы с элементами созданной строки
        rowUserEvents(row, user);
    }

    function rowUserEvents(row, user) {
        //User edit
        $(row).find(".edit").bind("click", function () {
            fillingModal(user);
        });
        //User del
        $(row).find(".del").bind("click", function () {
            // const marker = $(this).closest('tr').attr("marker");
            return new Promise((resolve, reject) => {
                $.post('api/delete-user/' + user.id,
                    {id: user.id},
                    function (data) {
                        console.log(data);
                        if (data) {
                            // $('tr[marker = ' + marker + ']').remove();
                            $('tr#row_' + user.id).remove();
                            delete users[user.id];
                            console.log(users);
                        }
                    },
                    'json');
            });
        });
    }

    //filling the modal window
    function fillingModal(user) {
        $('#editImgPhoto').attr("src", user.img);
        $('#editImgPhoto').attr("title", user.firstName + ' ' + user.lastName);
        $('#firstName').val(user.firstName);
        $('#lastName').val(user.lastName);
        $('#dateOfBirth').val(user.DateOfBirth);
        $('#email').val(user.email);
        $('#password').val(user.password);
        $('#address').val(user.address);
        $('#UserId').val(user.id);
    }


    $('#saveUser').submit(function(event) {
        event.preventDefault();
        const firstName = $('#firstName')[0].value;
        const lastName = $('#lastName')[0].value;
        const dateOfBirth = $('#dateOfBirth')[0].value;
        const email = $('#email')[0].value;
        const password = $('#password')[0].value;
        const address = $('#address')[0].value;
        const id = $('#UserId')[0].value;

        $.post('api/save-user',
            {
                firstName: firstName,
                lastName: lastName,
                dateOfBirth: dateOfBirth,
                email: email,
                password: password,
                address: address,
                id: id
            },
            function (data) {
            console.log(data);
                if (data !== 'false'){
                    if (data === 'update') {
                        // let row = $('tr[marker = '+ id +']');
                        let row = $('#row_'+ id );
                        row.find('.firstName').html(firstName);
                        row.find('.lastName').html(lastName);
                        row.find('.dateOfBirth').html(dateOfBirth);

                        users[id].firstName = firstName;
                        users[id].lastName = lastName;
                        users[id].DateOfBirth = dateOfBirth;
                        users[id].email = email;
                        users[id].password = password;
                        users[id].address = address;
                    } else {
                        const id = parseInt(data);
                        const user = {
                            id: id,
                            img: '../../images/holder.jpg',
                            firstName: firstName,
                            lastName: lastName,
                            DateOfBirth: dateOfBirth,
                            email: email,
                            password: password,
                            address: address
                        };
                        users[id] = user;
                        createRowUser(user);
                        console.log(users);
                    }
                    $('#userEditModal').modal('hide');
                } else {
                    alert("Error saving data");
                }
            }
        );
    });

    /*-----------------------End list of all users------------------------------------------*/


});
# Задание

Необходимо создать административную панель, которая состоит из единого раздела “Выплаты”.

Описание:

-   Раздел “Выплаты” должен быть представлен в виде таблицы с полями:
    -   Логин
    -   Реквизиты (много текста)
    -   Сумма
    -   Валюта
    -   Статус заявки
-   Поле “Статус заявки” должно содержать в себе переменную со значениями “Оплачен”/”Не оплачен”. По умолчанию каждой новой записи в таблице присваивается значение статуса “Не оплачен”, по клику на это поле через дроп-меню можно изменить значение статуса на “Оплачен”.
-   Новые записи в таблице должны появляться через API-метод, через который будут приходить значения для соответствующих полей в таблице. API должно содержать базовую защиту по токену.

**Требования:**

-   Backend: PHP + mysql
-   Front: Vue + Vuetify
-   Срок выполнения: 1 день

**Для оценки результата:** развернуть административную панель на собственном сервере и домене, чтобы можно было открыть и протестировать панель в рабочем режиме; 

# Результат:
Приложение доступно по адресу: https://payouts-production-996c.up.railway.app/

Для создания выплаты - POST по адресу:
https://payouts-production-996c.up.railway.app/api/payouts

Формат отправляемого JSON:
```
{
    "username": "natalie.schroeder",
    "details": "Ut aspernatur ducimus velit esse quidem dolor et. Nobis rem dolorem nihil vitae. Totam dolorum corrupti voluptatum sapiente.",
    "amount": 139790.04,
    "currency": "KZT"
} 
```

Ну и нужно проставить хэдеры:
```
Content-Type: application/json
Accept: application/json
token: <суперсекретныйтокен>
```


# Замечания

Так ну довольно толковое и интересное задание. Я, правда, никогда не работал с Vuetify, но думаю с Buefy они очень похожи.

Несколько моментов, которые хочу уточнить:

-   Поле "статус заявки" у нас строковое, но значения по факту фиксированные. Поэтому я подумал, что будет лучше создать для него Enum и кастовать в него как валидацию, так и поле в модели. Наверняка появятся и другие виды статусов.
-   Про авторизацию - в ТЗ указано только про авторизацию API-методов, создающих новые записи. Поэтому извините, но я прикинусь чётко исполняющим валенком и напишу маленькую миддлвару с проверкой токена из env-файла, чтобы не реализовывать полную аутентификацию :) Да, это как бы оставит метод изменения выплаты открытым для свободного пользования, но это же тестовое.
- У Vuetify наверняка куча встроенных классов внутри, но так как я с ним никогда не работал, к этому ещё прикручен Tailwind с префиксами для небольшой стилизации.

# TODO:

-   [x] Сделать миграцию и модель для выплат
-   [x] Сделать фабрику для создания выплат пачкой
-   [x] Сделать API-метод для создания выплат
-   [x] Защитить API-метод миддлварой с проверкой по токену
-   [x] Прикрутить InertiaJS
-   [x] Прикрутить Vuetify
-   [x] Вывести список выплат
-   [x] Засунуть реквизиты в алерт
-   [x] Реализовать селект в поле статуса
-   [x] Реализовать отправку изменения статуса на сервер
-   [x] Загрузить на railway
-   [] test

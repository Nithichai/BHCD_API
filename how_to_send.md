/user-info/check/id
{
    "data" : {
        "id" : YOUR_LINE_ID
    }
}

/user-info/new
{
    "data" : {
        "id" : YOUR_LINE_ID,
        "firstname" : ...,
        "lastname" : ...,
        "phone" : ...,
        "email" : ...,
        "career" : ...,
        "birthday" : ....
    }
}

/user-info/update/id
{
    "data" : {
        "id" : YOUR_LINE_ID,
        "firstname" : ...,
        "lastname" : ...,
        "phone" : ...,
        "email" : ...,
        "career" : ...,
        "birthday" : ....
    }
}

/user-info/delete/id
{
    "data" : {
        "id" : YOUR_LINE_ID
    }
}

----------------------------

/user-line/new
{
    "data" : {
        "id" : YOUR_LINE_ID,
        "esp" : YOUR_ESP_ID
    }
}

/user-line/check/esp
{
    "data" : {
        "esp" : YOUR_ESP_ID
    }
}

/user-line/check/id-esp
{
    "data" : {
        "id" : YOUR_LINE_ID,
        "esp" : YOUR_ESP_ID
    }
}

/user-line/delete/id-esp
{
    "data" : {
        "id" : YOUR_LINE_ID,
        "esp" : YOUR_ESP_ID
    }
}

/user-line/delete/id
{
    "data" : {
        "esp" : YOUR_ESP_ID
    }
}

----------------------------

/device/new
{
    "data" : {
        "espname" : YOUR_ESP_ID,
        "deviceid" : YOUR_ESP_ID
    }
}

/device/check/espname
{
    "data" : {
        "espname" : YOUR_ESP_ID
    }
}

/device/check/deviceid
{
    "data" : {
        "deviceid" : YOUR_ESP_ID
    }
}

/device/update
{
    "data" : {
        "espname" : YOUR_ESP_ID,
        "password" : PASSWORD
    }
}

----------------------------

/device-info/new/onlyid
{
    "data" : {
        "deviceid" : YOUR_ESP_ID,
        "password" : PASSWORD
    }
}

/device-info/check/deviceid
{
    "data" : {
        "deviceid" : YOUR_ESP_ID
    }
}

/device-info/list/deviceid-name
-

/device-info/update/id
{
    "data" : {
        "deviceid" : YOUR_ESP_ID,
        "name": ... ,
        "sex": ... ,
        "height": ... ,
        "weight": ... ,
        "disease": ... ,
        "phone": ... ,
        "birthday": ... ,
        "address": ... ,
    }
}

/device-info/delete/id
{
    "data" : {
        "deviceid" : YOUR_ESP_ID
    }
}

----------------------------

/health-info/new
{
    "data" : {
        "id" : YOUR_LINE_ID,
        "esp" : YOUR_ESP_ID,
        "hbp" : ... ,
        "lbp" : ... ,
        "hr" : ...
    }
}

/health-info/check/id-esp
{
    "data" : {
        "id" : YOUR_LINE_ID,
        "esp" : YOUR_ESP_ID
    }
}

----------------------------

/user-line-device-info/check/esp
"data" : {
    "esp" : YOUR_ESP_ID
}
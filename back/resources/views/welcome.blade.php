<?php
?>
<title>Api Subversum</title>

API GET calls (add to subversum.space/api):<br>
/workers<br> - tokenized
/planets<br>
/resources<br>
/buildings<br>
/regions<br>
/continents<br>
/res_map<br>
/buildings_map<br>
/workers_map<br>
/user_regions/{user} - get users regions with resources<br>
/items<br>
/drones</br

<br>
POST methods<br>
<b>/api/login</b><br>
body:<br>
    email=lgrimes@example.net<br>
    password=password<br>
<b>/api/logout</b><br>
<b>/api/register</b><br>
body:<br>
    name=name<br>
    email=lgrimes@example.net<br>
    password=password<br>
    password_confirmation=password<br><br>
<b>DATABASE MANAGMENT</b> - <a href="https://subversum.space/adminer">https://subversum.space/adminer </a><br>
system: PostgreSQL </br>
server: pgsql</br>
username: sail</br>
password: password</br>
database: back</br></br>

<br>
Database structure <br>
<img width="70%" height="90%" src='https://user-images.githubusercontent.com/30046232/180787434-90a18ed3-5cb8-4389-93b4-c2f018bcee38.png'></img>

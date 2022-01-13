# PHP BASIC APPLICATION TO MANAGE AN EMPLOYEES LIST
<a href="#instructions">Go to proyect instruction</a>
## Application main points

1. Login and logout with a json file as user storage
2. Controlled user session set to 10 minutes
3. Show data from a JSON in a JS Grid
4. Pagination of the data configured by the grid
5. Employees CRUD Create Read Delete and Update with a json file as employees storage
6. Employee page with employee detail
7. External web service to get employees images
8. Employee avatar through web service images

### File structure

This file structure has a specific purpose. So you have to implement all the required over it. Later when we get to OPP and MySQL we will refactor the project to get it more sophisticated, modern and cleaner. Please take care of it!!

```
assets/
resources/
src/
 /library
```

- Assets contains html, css, js & images
- Css just css files.
- Resources folder contains users.json and employees.json
- Src folder contains PHP files which contain HTML or JS
- Src/library folder contains PHP files that contain just PHP


## External libraries

We installed the libraries in node_modules with npm. Used the Terminal.

- [Bootstrap](https://getbootstrap.com/)
- [Bootstrap icons](https://icons.getbootstrap.com/)
- [JSGrid](http://js-grid.com/)

## Images Web Service for the extra feature

As we explained in the pdf document of this project we will use [this images api](https://uifaces.co/)

This web service in the version free that is which we are going to use has limitations. Five request per minute or thirty in an hour.
So if you want to develop this extra feature it would be cool to have a mocked response to develop at ease. So for this purpose we left in `resources/` folder a file called images_mock which can be used to the implementation of the extra feature once you have your code running well you need to remove this mock and to connect directly with the web service.

[Read the doc!](https://uifaces.co/api-docs)

## Curl

In php we interact with HTTP web services through cUrl or client URL.  
This is also a command in Unix systems. We are going to give you an over view in order to familiarise with it and then use it in the application for the extra feature.

To play a little with it, You can create a script in the root folder of your web server and with these request we have here to try make GET, POST. PUT and DELETE request against this super cool service which ables to developer to post and get data from what we call a request bin.  
[ReqBin ](https://reqbin.com/curl)

#### Basic knowledge

```
<?php
curl_init();      // initializes a session
curl_setopt();    // changes the session behavior setting options
curl_exec();      // executes the started session
curl_close();     // closes the session and deletes data made by curl_init();
```

#### Adding headers to request

```
curl_setopt($curlHandler, CURLOPT_HTTPHEADER, array(
 'Header-Key: Header-Value', 'X-API-KEY: 5d17e5de89a3e35d3902c4d667534'));
```

#### Getting error messages from cUrl

```
$curlHandler = curl_init('https://hostname.com/resource/');
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);

if(curl_exec($curlHandler) === false)
{
 echo 'Curl error: ' . curl_error($curlHandler); //gets last cUrl error as a string
}
```

#### Get Request

```
<?php

$curlHandler = curl_init();

curl_setopt($curlHandler, CURLOPT_URL, 'https://hostname.com/resource');
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);

$apiResponse = curl_exec($curlHandler);
curl_close($curlHandler);

$decodedResponse = json_decode($apiResponse);

```

#### Post Request

```
<?php

$postData = [
 'parameter1' => 'foo', 'parameter2' => 'bar'];

$curlHandler = curl_init('http://hostname.com/api/resource');
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $postData);
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);// saying cUrl to return the response in the cUrl exec call

$apiResponse = curl_exec($curlHandler);
curl_close($curlHandler);

$decodedResponse = json_decode($apiResponse);

```

#### Post Request

```
<?php

$postData = [
 'parameter1' => 'foo', 'parameter2' => 'bar'];

$curlHandler = curl_init('http://hostname.com/api/resource');
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $postData);
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);// saying cUrl to return the response in the cUrl exec call

$apiResponse = curl_exec($curlHandler);
curl_close($curlHandler);

$decodedResponse = json_decode($apiResponse);

```

#### Delete Request

```
$curlHandler = curl_init('http://hostname.com/api/resource');
curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, 'DELETE');// Setting HTTP verb that will by used for the request

$apiResponse = curl_exec($curlHandler);
$httpCode = curl_getinfo($curlHandler, CURLINFO_HTTP_CODE);// Getting http response code
curl_close($curlHandler);

$decodedResponse = json_decode($apiResponse);
```

#### All together

```
$postData = [
 'parameter1' => 'foo', 'parameter2' => 'bar'];

$curlHandler = curl_init('http://hostname.com/api/resource');
curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $postData);
curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, true);// saying cUrl to return the response in the cUrl exec call

$apiResponse = curl_exec($curlHandler);
if (curl_errno($curlHandler)) {
 $errorMessage = curl_error($curlHandler);
 //throw error}
curl_close($curlHandler);

$decodedResponse = json_decode($apiResponse);
```
## <h1 id="instructions"> Project Instructions</h1>

#### Installed frameworks:
<ul>
    <li>Jquery -> part of the code is wrote in jquery, because jsgrid conditions.</li>
    <li>Bootstrap -> The styles in this project are done by using bootstrap framework.</li>
    <li>JsGrid -> The purpose of this project is: work with the employees.json (update, delete, etc). To do the html structure we use the jsgrid.</li>
</ul>
<cite>I recommend you to check the paths in html to ensure all is ok</cite>

#### How project works:

Index.php : Here is the login page. To access, you have to introduce the following values (without quotes) :
    email-> "admin@assemblerschool.com" 
    password ->"123456"
The session will have a duration of 10 minutes.

header.html -> We did a template of the header, and imported to the rest of the php files, like dashboard and employees.

Dashboard.php -> The main page, you can work with the employees in this page, if you click one of the employees, the page will redirect you to employees.php, the rest you can do it in the page without refreshing (we've done it with fetchs in js).

Employees.php -> Information of the user, you can edit the information if you want.








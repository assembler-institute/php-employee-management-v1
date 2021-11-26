`#html` `#css` `#php` `#bootstrap` `#javascript` `#jquery` `#jsgrid`

# Employee Management

This project is based on a employee manager, which allows users to perform CRUD operations over a database of employees, saved in a json file. The application makes use of user sessions, encrypted passwords and the use of external web servers to get employees avatars.

## Installation

Clone the repository.

```
 git clone https://github.com/sanadriu/php-employee-management-v1.git
```

Install dependencies.

```
 npm install
```

If you are not going to use XAMPP, ensure that **PROJECT_FOLDER** constant is **null** and run the next command to serve the PHP application:

```
  php -S localhost:3000
```

Otherwise, if you are going to introduce the project in **htdocs** folder, specify the name of the folder for **PROJECT_FOLDER** constant.

In order to use fetch avatars, you will have to uncomment **extension=curl** in **php.ini** file. Otherwise, PHP will fail.

## Technologies used

- HTML
- CSS
- PHP
- Javascript
- Jquery
- jsGrid
- Bootstrap

# Project goal

- Improve knowledge of session variables in PHP.

- Learn to create a login page.

- Handle the session throughout all pages.

- Learn to connect with external Web Services.

- Learn to handle encrypted data.

- Improve knowledge of reading and writing JSON files.

- Improve knowledge of AJAX.

- Learn to work with a predefined structure.

## API Reference

#### Get all items

```http
  GET https://uifaces.co/api/
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `api_key` | `string` | **Required**. Your API key |

## 🔗 Authors

- [@Adrián](https://github.com/sanadriu)
- [@Antonio](https://github.com/AntonioCopete)

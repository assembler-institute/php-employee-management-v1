`#html` `#css` `#js` `#php` `#master-in-software-engineering`

# PHP Employee Manager v1 <!-- omit in toc -->

> This current repository contains an employee manager that uses Manager and Controller PHP files to make API requests and load data to a JSGrid and to forms.

> This app also alows to CRUD (Create Read Update Delete) employees both in Dashboard and Employee's page.

## Index <!-- omit in toc -->

- [Project key points](#project-key-points)
- [Folder structure](#folder-structure)
- [Built with](#built-with)
- [Resources](#resources)
- [TODO](#todo)
- [Bugs](#bugs)
- [Contributors](#contributors)

## Project key points

1. Login and logout with a json file as user storage
2. Controlled user session set to 10 minutes
3. Show data from a JSON in a JS Grid
4. Pagination of the data configured by the grid
5. Employees CRUD Create Read Delete and Update with a json file as employees storage
6. Employee page with employee detail
7. External web service to get employees images
8. Employee avatar through web service images

## Folder structure

This file structure is a first step to the MVC file structure so keep in mind that the workflow should follow the current logic (especially in php files with Managers & Controllers).

```bash

repo
 ├── assets
 │     ├── css
 │     ├── html
 │     └── js
 │         ├── dashboard.js (JsGrid)
 │         └── (Javascript functionalities)
 ├── node_modules
 ├── resources
 ├── .gitignore
 ├── index.php
 └── src
      ├── dashboard.php
      ├── employee.php
      └── library
           └── (Managers & Controllers)

```

- Assets contains html, css, js & images
- Css just css files.
- Resources folder contains users.json and employees.json
- Src folder contains PHP files which contain HTML or JS
- Src/library folder contains PHP files that contain just PHP

## Built with

\* HTML

\* CSS

\* JS (jQuery)

\* PHP

## Resources

### PHP

- [Decode JSON file / json_decode()](https://www.php.net/manual/es/function.json-decode.php)
- [Encode JSON file / json_encode()](https://www.php.net/manual/es/function.json-encode.php)
- [Sort array ascending / asort()](https://www.php.net/manual/es/function.asort.php)
- [Get content from file / file_get_contents()](https://www.php.net/manual/es/function.file-get-contents.php)
- [Put content to file / file_put_contents()](https://www.php.net/manual/es/function.file-put-contents.php)
- [Check hashed password / password_verify()](https://www.php.net/manual/es/function.password-verify.php)

### Docs 👀

- [JsGrid Documentation](http://js-grid.com/docs/)

### Libraries

- [Bootstrap](https://getbootstrap.com/)
- [jQuery](https://jquery.com/)
- [JsGrid](http://js-grid.com/)

## TODO 🤝

- Add photo API functionality.
- Responsive design.

## Bugs 🚨

- Bootstrap alerts might appear when hard reload pages.

## Contributors ✨

👤 [Marc Solà](https://github.com/MarcSola)

👤 [Jon Garcia](https://github.com/jonCroatanUto)

👤 [Ricard Garcia](https://github.com/Ricard-Garcia)

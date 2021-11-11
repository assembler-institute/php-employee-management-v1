let db = [
    {
        "id": "1",
        "name": "Rack",
        "lastName": "Lei",
        "email": "jackon@network.com",
        "gender": "man",
        "city": "San Jone",
        "streetAddress": "126",
        "state": "CA",
        "age": "24",
        "postalCode": "394221",
        "phoneNumber": "7383627627"
    },
    {
        "id": "2",
        "name": "John",
        "lastName": "Doe",
        "email": "jhondoe@foo.com",
        "gender": "man",
        "city": "New York",
        "streetAddress": "89",
        "state": "WA",
        "age": "34",
        "postalCode": "09889",
        "phoneNumber": "1283645645"
    },
    {
        "id": "3",
        "name": "Leila",
        "lastName": "Mills",
        "email": "mills@leila.com",
        "gender": "woman",
        "city": "San Diego",
        "streetAddress": "55",
        "state": "CA",
        "age": "29",
        "postalCode": "098765",
        "phoneNumber": "9983632461"
    },
    {
        "id": 4,
        "name": "Richard",
        "lastName": "Desmond",
        "email": "dismond@foo.com",
        "gender": "man",
        "age": 30,
        "streetAddress": "90",
        "city": "Salt lake city",
        "state": "UT",
        "postalCode": "457320",
        "phoneNumber": "90876987654"
    },
    {
        "id": 5,
        "name": "Susan",
        "lastName": "Smith",
        "email": "susanmith@baz.com",
        "gender": "woman",
        "age": 28,
        "streetAddress": "43",
        "city": "Louisville",
        "state": "KNT",
        "postalCode": "445321",
        "phoneNumber": "224355488976"
    },
    {
        "id": 6,
        "name": "Brad",
        "lastName": "Simpson",
        "email": "brad@foo.com",
        "gender": "man",
        "age": 40,
        "streetAddress": "128",
        "city": "Atlanta",
        "state": "GEO",
        "postalCode": "394221",
        "phoneNumber": "6854634522"
    },
    {
        "id": 7,
        "name": "Neil",
        "lastName": "Walker",
        "email": "walkerneil@baz.com",
        "gender": "man",
        "age": 42,
        "streetAddress": "1",
        "city": "Nashville",
        "state": "TN",
        "postalCode": "90143",
        "phoneNumber": "45372788192"
    },
    {
        "id": 8,
        "name": "Robert",
        "lastName": "Thomson",
        "email": "jackon@network.com",
        "gender": "man",
        "age": 24,
        "streetAddress": "126",
        "city": "New Orleans",
        "state": "LU",
        "postalCode": "63281",
        "phoneNumber": "91232876454"
    }
]



// var json = (function () {
//     var json=$.ajax({
//         'type': "GET",
//         'url': "../src/library/employeeController.php",
//         'dataType': "json"
//     }).then(function (data) {
//         ;
//     });
//     return json;
// })();

// console.log(json);





// aqui van las diferentes acciones con ajax  CRUD


// let json = $.ajax({
//     "type": "GET",
//     "url": "../resources/employees.json",
//     'dataType': "json",

// }).done(function (response) {
//     return response

// });

// console.log(json)
console.log(db)

$("#jsGrid").jsGrid({
    height: "300px",
    width: "100%",

    autoload: true,
    paging: true,
    pageLoading: true,
    inserting: true,
    filtering: true,
    sorting: true,
    pageSize: 15,
    pageIndex: 1,
    paging: true,
    pageSize: 15,
    pageButtonCount: 5,
    // controller: 
    // {
    //     // loadData: function (filter) {
    //     //     console.log(filter)
    //         // return db
    //     // }
    // }


    // deleteConfirm: "Do you really want to delete the client?",

    // controller: {
    //     loadData: function (filter) {
    //         return $.ajax({
    //             type: "GET",
    //             url: "../resources/employees.json",
    //             dataType: "json",
    //             data: filter,
    //         });
    //     },
    //     insertItem: function (item) {
    //         return $.ajax({
    //             type: "POST",
    //             url: "../resources/employees.json",
    //             data: item,
    //             dataType: "json",
    //             success: function (data) {
    //                 console.log(data);

    //             });
    //     },
    // aqui van las diferentes acciones con ajax  CRUD

    fields: [{
        name: "id",
        type: "text",
        visible: false,
        css: 'bordersAndBackground'
    },
    {
        name: "name",
        title: "Name",
        type: "text",
        width: 100,
        validate: "required",
        css: 'bordersAndBackground',
        headercss: 'backgroundHeader'

    },
    {
        name: "email",
        title: "Email",
        type: "text",
        width: 150,
        validate: [
            "required",
            {
                message: "Please put a valid email address",
                validator: function (value, item) {
                    return /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(value);
                },
            }
        ],
        css: 'bordersAndBackground',
        headercss: 'backgroundHeader'

    },

    {
        name: "age",
        title: "Age",
        type: "text",
        width: 50,
        css: 'backgroundRed',
        validate: {
            validator: function (value) {
                if (value >= 18 && value < 80) {
                    return true;
                }
            },
            message: function (value, item) {
                return "The client age should be between 0 and 80. Entered age is \"" + value + "\" is out of specified range.";
            },
            param: [18, 80]
        },
        css: 'bordersAndBackground',
        headercss: 'backgroundHeader'

    },
    {
        name: 'streetAddress',
        title: 'Address',
        type: 'text',
        width: '100',
        headercss: 'backgroundHeader',
        validate: 'required',
        css: 'bordersAndBackground'
    },
    {
        name: 'city',
        title: 'City',
        type: 'text',
        width: '100',
        validate: 'required',
        headercss: 'backgroundHeader',
        css: 'bordersAndBackground'
    },
    {
        name: 'state',
        title: 'State',
        type: 'text',
        width: '50',
        headercss: 'backgroundHeader',
        validate: 'required',
        css: 'bordersAndBackground'
    },
    {
        name: 'postalCode',
        title: 'Postal Code',
        type: 'text',
        headercss: 'backgroundHeader',
        width: '100',
        validate: {
            validator: function (value) {
                if (value.length < 10 && value > 0) {
                    return true;
                }
            },
            message: "Please enter a valid postal code",
        },
        css: 'bordersAndBackground'
    },
    {
        name: 'phoneNumber',
        title: 'Phone Number',
        type: 'text',
        headercss: 'backgroundHeader',
        width: '100',
        validate: {
            validator: function (value, item) {
                if (value.length < 20) {
                    return true;
                }
            },
            message: "Please enter a valid phone number",
        },
        css: 'bordersAndBackground',
    },
    {
        type: "control",
    },
    ],



});

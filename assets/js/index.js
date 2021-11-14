

const dataPath = "../resources/employees.json";
const controllerEmpl = "./library/employeeController.php";

$.getJSON(dataPath).done(function (employeesData) {
    $("#jsGrid").jsGrid({
        data: employeesData,
        width: "100%",
        height: "auto",
        inserting: true,
        editing: false,
        sorting: true,
        paging: true,
        pageSize: 10,
        pageButtonCount: 3,
        filtering: false,
        autoload: true,
        // rowClick: function (args) {
        //     selectedItem = args.item;
        //     window.location = "../src/library/employeeController.php?ID=" + selectedItem.id;
        // },
        // deleteConfirm:"This action will delete the employee from the system. Are you sure?",

        controller: {
            insertItem: function (item) {
                return $.ajax({
                    type: "POST",
                    url: controllerEmpl,
                    // data: JSON.stringify({ 'data': item }),
                    success: function (data) {
                        console.log(data)
                    }
                })
            },

            deleteItem: function (item) {

                return $.ajax({
                    type: "GET",
                    url: controllerEmpl,
                    data: item,
                });
            },

            updateItem: function (item) {
                return $.ajax({
                    type: "GET",
                    url: controllerEmpl,
                    data: item,
                });
            }
        },
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
            // validate: [
            //     "required",
            //     {
            //         message: "Please put a valid email address",
            //         validator: function (value, item) {
            //             return /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/.test(value);
            //         },
            //     }
            // ],
            css: 'bordersAndBackground',
            headercss: 'backgroundHeader'

        },

        {
            name: "age",
            title: "Age",
            type: "text",
            width: 50,
            css: 'backgroundRed',
            // validate: {
            //     validator: function (value) {
            //         if (value >= 18 && value < 80) {
            //             return true;
            //         }
            //     },
            //     message: function (value, item) {
            //         return "The client age should be between 18 and 80. Entered age is \"" + value + "\" is out of specified range.";
            //     },
            //     param: [18, 80]
            // },
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
            //     validate: {
            //         validator: function (value) {
            //             if (value.length < 10 && value > 0) {
            //                 return true;
            //             }
            //         },
            //         message: "Please enter a valid postal code",
            //     },
            css: 'bordersAndBackground'
        },
        {
            name: 'phoneNumber',
            title: 'Phone Number',
            type: 'text',
            headercss: 'backgroundHeader',
            width: '100',
            // validate: {
            //     validator: function (value, item) {
            //         if (value.length < 20) {
            //             return true;
            //         }
            //     },
            //     message: "Please enter a valid phone number",
            // },
            css: 'bordersAndBackground',
        },
        {
            type: "control",
        },
        ],

    });
});
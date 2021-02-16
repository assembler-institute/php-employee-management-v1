const init = () => {
    axios.get('http://127.0.0.1/php-employee-management-v1/resources/employees.json').then(({ data }) => {

        console.log('hello');

        $("#jsGrid").jsGrid({
        width: "100%",
        height: "400px",

        inserting: true,
        editing: false,
        sorting: true,
        paging: true,

        data,

        fields: [
            { name: "Id", type: "number", width: 50 },
            { name: "Name", type: "text", width: 150, validate: "required" },
            { name: "Last name", type: "text", width: 150, validate: "required" },
            { name: "Email", type: "text", width: 200 },
            { name: "Age", type: "number", width: 50 },
            { name: "Phone number", type: "number", width: 50 },
            { type: "control", editButton: false }
        ]
});
        });
        }

$(init);
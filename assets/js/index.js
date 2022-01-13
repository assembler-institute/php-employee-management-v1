var a;
window.addEventListener('DOMContentLoaded', async () => {
    a = await empleados();

    $('#Grid').jsGrid({
        width: '100%',
        height: 'auto',

        editing: true,
        sorting: true,
        inserting: true,
        paging: true,

        pageSize: 10,
        pageButtonCount: 3, // numero de paginas que veras

        data: a,

        fields: [
            { name: 'id'},
            { name: 'name', type: 'text', title: 'Name' },
            { name: 'email', type: 'text', title: 'Email' },
            { name: 'age', type: 'number', title: 'Age' },
            { name: 'streetAddress', type: 'number', title: 'Street No.' },
            { name: 'city', type: 'text', title: 'City' },
            { name: 'state', type: 'text', title: 'State' },
            { name: 'postalCode', type: 'number', title: 'Postal Code' },
            { name: 'phoneNumber', type: 'number', title: 'Phone Number' },
            {
                type: 'control',
                rowClick: true,
                modeSwitchButton: true,
                editButton: true
            }
        ],

        rowClick: function name(item) {
            window.location.assign('./employee.php?id=' + item.item.id);
        },
        onItemDeleted: function name(args) {
            // console.log(args.item);
        },
        onItemInserted: function name(args) {
            
            $.ajax({
                method: 'POST',
                url: './library/employeeController.php?add',   // ????????????? ERICK ????? porque tenho que por ADD ??????
                data: args.item,
                success: function (pi) {
                    // console.log(pi);
                    console.log(pi);
                }
            });
        },

        controller: {
            // insertItem: async function name(item) {
            //   const response = await fetch('./library/employeeController.php?add',
            //   { method: 'POST', body : JSON.stringify(item),
            //    headers: {'Content-Type': 'application/json'}});
            //         const data =  await response.json();
            //         return data;
            // },
            // deleteItem: function name(item) {
            //   console.log(item.item.id);
            // },
            // updateItem: async function name(item) {
            //   var formData = new FormData();
            //   formData.append('id', item.id);
            //   formData.append('name', item.name);
            //   formData.append('lastName', item.lastName);
            //   formData.append('email', item.email);
            //   formData.append('age', item.age);
            //   formData.append('gender', item.gender);
            //   formData.append('city', item.city);
            //   formData.append('state', item.state);
            //   formData.append('streetAddress', item.streetAddress);
            //   formData.append('phoneNumber', item.phoneNumber);
            //   formData.append('postalCode', item.postalCode);
            //   const response = await fetch('./library/employeeController.php?edit='+item.id,
            //   { method: 'POST', body :formData});
            // },
        }
    });
});

async function empleados() {
    const response = await fetch('./library/employeeController.php?employees');
    const data = await response.json();
    return data;
}

async function eliminarEmpleados(id) {
    const response = await fetch(
        './library/employeeController.php?delete=' + id,
        {
            method: 'POST',
            body: a
        }
    );
    const data = await response.json();
    return data;
}

async function eliminarEmpleados(conte) {
    const response = await fetch('./library/employeeController.php?post=', {
        method: 'POST',
        body: a
    });
    const data = await response.json();
    return data;
}

// setInterval(async () => {
//     const response = await fetch("./library/sessionHelper.php")
//     // const data = await response.json()
//     console.log(response)
//     // return data
// }, 1000);



$(window).ready(function(){

        $.ajax({
            url: '../src/library/employeeController.php',
            type: 'get',
            success: function(data){
                let employees = JSON.parse(data);
                let template = '';
                let id = 0;
                console.log(employees);
                employees.forEach(employee => {
                    
                    template = `
                    <tr empId="${id+=1}" class="">
                        <th scope="row" class="employee-data">${id}</th>
                        <td class="employee-data">${employee.name}</td>
                        <td class="employee-data">${employee.email}</td>
                        <td class="employee-data">${employee.age}</td>
                        <td class="employee-data">${employee.streetAddress}</td>
                        <td class="employee-data">${employee.city}</td>
                        <td class="employee-data">${employee.state}</td>
                        <td class="employee-data">${employee.postalCode}</td>
                        <td >${employee.phoneNumber}</td>
                        <td class="delete"><span class="material-icons">
                        delete
                        </span></td>
                    <tr>
                `;
                $('tbody').append(template);
                
                });
            }
        });



        //DELETE REQUEST

        $(document).on('click', '.delete', (function() {
            let element = $(this)[0].parentElement;
            console.log(element)
            let id = $(element).attr('empId');
            console.log(id)
            $.ajax({
                url: '../src/library/employeeDelete.php',
                type: 'post',
                data: {id},
                success: function(data) {
                    console.log(data);
                }
            })
        }));


        // NEW EMPLOYEE REQUEST

        $(document).on('click', '.add', (function() {
            let element = $(this)[0];
            console.log(element);
            const template = `<tr class="input-bar">
                                <th scope="col">id</th>
                                <th scope="col"><input type="text" size="10"></th>
                                <th scope="col"><input type="email" size="15"></th>
                                <th scope="col"><input type="number" size="2" maxlength="2" class="input-age"></th>
                                <th scope="col"><input type="text" class="input-street"></th>
                                <th scope="col"><input type="text" class="input-city"></th>
                                <th scope="col"><input type="text" class="input-state"></th>
                                <th scope="col"><input type="number" class="input-postalCode"></th>
                                <th scope="col"><input type="number" class="input-phone"></th>
                                <th scope="col" class="new-button">Create</th>
                            </tr>`
            $('tbody').prepend(template);
        }))


        

        $(document).on('click', '.employee-data', (function() {
            window.location = './employee.php'
        }))

    });
// })
    // const table = {
    //     template: `
    //         <th scope="row">1</th>
    //         <td>Mark</td>
    //         <td>Otto</td>
    //         <td>@mdo</td>
    //         <td>@mdo</td>
    //         <td>@mdo</td>
    //         <td>@mdo</td>
    //         <td>@mdo</td>
    //         <td>@mdo</td>
    //         <td>@mdo</td>
    //     `
    // };




    // var clients = [
    //     { "Name": "Otto Clay", "Age": 25, "Country": 1, "Address": "Ap #897-1459 Quam Avenue", "Married": false },
    //     { "Name": "Connor Johnston", "Age": 45, "Country": 2, "Address": "Ap #370-4647 Dis Av.", "Married": true },
    //     { "Name": "Lacey Hess", "Age": 29, "Country": 3, "Address": "Ap #365-8835 Integer St.", "Married": false },
    //     { "Name": "Timothy Henson", "Age": 56, "Country": 1, "Address": "911-5143 Luctus Ave", "Married": true },
    //     { "Name": "Ramona Benton", "Age": 32, "Country": 3, "Address": "Ap #614-689 Vehicula Street", "Married": false }
    // ];

    // var countries = [
    //     { Name: "", Id: 0 },
    //     { Name: "United States", Id: 1 },
    //     { Name: "Canada", Id: 2 },
    //     { Name: "United Kingdom", Id: 3 }
    // ];
 
    // $("#jsGrid").jsGrid({
    //     width: "100%",
    //     height: "400px",
 
    //     inserting: true,
    //     editing: true,
    //     sorting: true,
    //     paging: true,
 
    //     data: clients,
 
    //     fields: [
    //         { name: "Name", type: "text", width: 150, validate: "required" },
    //         { name: "Email", type: "text", width: 150 },
    //         { name: "Age", type: "number", width: 50 },
    //         { name: "Street No", type: "number", items: countries, valueField: "Id", textField: "Name" },
    //         { name: "Married", type: "checkbox", title: "Is Married", sorting: false },
    //         { type: "control" }
    //     ]
    // });

// });
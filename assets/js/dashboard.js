import {renderTemplate} from '../js/render.js'

$(window).on('load', function(){
                                            
        $.ajax({                                                // First we do the request to load the data
            url: '../src/library/employeeController.php',       // And display the data in the table.
            type: 'get',
            success: function renderTemplate(data){
                let employees = JSON.parse(data);
                let template = '';
                let counter = 0;
                console.log(employees);
                employees.forEach(employee => {
                    
                    template = `
                    <tr empId="${employee.id}" counter="${counter+=1}"class="">
                        <th scope="row" class="employee-data">${counter}</th>
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
            $.ajax({                                                // We do the ajax request to delete the employee.
                url: '../src/library/employeeDelete.php',           
                type: 'post',
                data: {id},
                success: function(data) {                           // We get back the data without the employee.
                    let newEmployees = JSON.parse(data);            // and we create the template and display the new data.
                    console.log(newEmployees);
                    let template = '';
                    let counter = 0;
                    alert('Are you sure you want to delete this employee?');
                    $("tbody > *:not('.input-bar')").remove();
                    newEmployees.forEach(employee => {
                    
                        template = `
                        <tr empId="${employee.id}" counter="${counter+=1}" class="">
                            <th scope="row" class="employee-data">${counter}</th>
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
            })
        }));


        // NEW EMPLOYEE REQUEST

            //First we put a toggle on the form '+' button.

            $(document).on('click', '.add', function(){
                if($('.input-bar').is(":hidden")){
                    $('.add').html('close')
                } else {
                    $('.add').html('+')
                }
                $('.input-bar').toggle();

                    
            });

            
            $('form').submit(function(e){                   // We get the form data
                let formData = $('form').serializeArray();  
                let data = {};                              // Convert the data to an object
                $( formData ).each(function(index, obj){
                    data[obj.name] = obj.value; 
                    e.preventDefault();
                });
                console.log(data);                          // We send the data to the php file.
                $.ajax({
                    url: '../src/library/newEmployee.php',
                    data: data,
                    type: 'post',
                    success: function renderTemplate(data){     // With the data we get back we
                        let employees = JSON.parse(data);      // create a template and display it on the table.
                        let template = '';
                        let counter = 0;
                        $("tbody > *:not('.input-bar')").remove();


                        employees.forEach(employee => {
                            
                            template = `
                            <tr empId="${employee.id}" counter="${counter+=1}"class="">
                                <th scope="row" class="employee-data">${counter}</th>
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
            });

            
        //EMPLOYEE VIEW AND UPLOAD DATA

        $(document).on('click', '.employee-data', (function() {
            window.location = './employee.php'
            console.log($(this)[0].parentElement);
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
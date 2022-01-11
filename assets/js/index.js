// import { Grid, h } from 'gridjs';


var tabla = document.getElementById("Grid");



new gridjs.Grid({
    columns: [
        'Id',
        'Name',
        'Last Name',
        'Email',
        'Gender',
        'City',
        'Street Address',
        'State',
        'Age',
        'Postal Code',
        'Phone Number',
        'edit',
        {
            name: 'Actions',
            formatter: (cell, row) => {
                return h(
                    'button',
                    {
                        className:
                            'py-2 mb-4 px-4 border rounded-md text-white bg-blue-600',
                        onClick: () =>
                            alert(
                                `Editing "${row.cells[0].data}" "${row.cells[1].data}"`
                            )
                    },
                    'Edit'
                );
            }
        }
    ],
    server: {
        url: "../resources/employees.json",
        then: data => data.map(card =>{
            
            let aedi=document.createElement("a");
            let edi=document.createElement("button");
            aedi.href="./employee.php?id="+card.id;
            aedi.innerText="e";
            edi.id=card.id;
            edi.appendChild(aedi)
            let del=document.createElement("button");
            let adel=document.createElement("a");
            adel.href=""
            del.id=card.id;
            adel.innerText="d"
            del.appendChild(adel)
            return [card.id, card.name, card.lastName,card.email,card.gender,card.city,card.streetAddress,card.state,card.age,card.postalCode,card.phoneNumber,edi,del]
        } )
      }
}).render(tabla)



function hola(){

}



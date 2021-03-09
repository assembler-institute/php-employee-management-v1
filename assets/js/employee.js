$(window).on('load', function(){

    const id = $('body').attr('data-id');
    console.log(id);

        $.ajax({
            url: '../src/library/editEmployee.php',
            type: 'post',
            data: {id},
            success: function(data) {
                
                let employee = JSON.parse(data);
                console.log(employee);
                $('.name-input').val(employee.name);
                $('.lastName-input').val(employee.lastName);
                $('.email-input').val(employee.email);
                $('.gender-input').val(employee.gender);
                $('.city-input').val(employee.city);
                $('.streetAddress-input').val(employee.streetAddress);
                $('.age-input').val(employee.age);
                $('.state-input').val(employee.state);
                $('.postalCode-input').val(employee.postalCode);
                $('.phoneNumber-input').val(employee.phoneNumber);
            }
        })

        $('form').submit(function(e){                   // We get the form data
            let formData = $('form').serializeArray();  
            let data = {};  
            
            console.log(formData);   
            e.preventDefault();                         // Convert the data to an object
            $( formData ).each(function(index, obj){
                data[obj.name] = obj.value; 
                
                
            });
            
        });
})
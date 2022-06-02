async function getEmployees() {
    try {
        const response = await fetch('../resources/employees,json');
        console.log(response);
    } catch (error) {
        
    }
}
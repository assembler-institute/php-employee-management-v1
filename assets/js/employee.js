const updateEmployeeButton = document.getElementById('updateEmployeeButton');
updateEmployeeButton.addEventListener('click', ()=>{
    Swal.fire({
        icon: 'success',
        title: 'The employee has been updated',
        showConfirmButton: false,
        timer: 1500
      })
})
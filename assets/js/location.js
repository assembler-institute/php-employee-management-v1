function locationUrl(){
    var loc = location.pathname;
    console.log(loc)
    const lastSegmentOfUrl = loc.substring(loc.lastIndexOf('/'));
    const dashPage = $('#dashPage');
    const employeesPage = $('#employeesPage');

    console.log(lastSegmentOfUrl);

    
    if(lastSegmentOfUrl == 'dashboard.php'){
        dashPage.addClass('active')
    } else {
        employeesPage.addClass('active')
    }
}

window.onload = locationUrl();

//   window.onload = () => {
//     locationUrl();
//     console.log('content loaded')
//   }
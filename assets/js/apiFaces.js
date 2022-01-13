
window.addEventListener("DOMContentLoaded", async (e)=> {
   let getImages = await getImage(0, 5);
   printImages(JSON.parse(getImages));
})

function getImage(start, end){
    let avatars =   $.ajax({
          url: `./library/employeeController.php?startImage=${start}&&endImage=${end}`,
        })
return avatars
    }

 function printImages(array){
let carousel = document.getElementById("imgCarousel")
for (let index = 0; index < array.length; index++) {
    carousel.insertAdjacentHTML("beforeend", `<img src='${array[index].image_url}'>`)
    
 }
}
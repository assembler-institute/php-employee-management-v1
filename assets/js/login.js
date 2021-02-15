import { avatar } from "./avatarClass.js";

let mainAvatarImage ='';
let eyesClosedImage ='';

window.onload = () => {
    const myAvatar = new avatar();
    myAvatar.randomize();
    mainAvatarImage = myAvatar.getAvatar({eyes: 'squint', mouth: 'smile'});
    eyesClosedImage = myAvatar.getAvatar({eyes: 'closed', mouth: 'serious'});
    document.getElementById( 'image' ). innerHTML = mainAvatarImage;
  };
  


// focus password listeners
const $password = document.getElementById('password');
const $image = document.getElementById( 'image' );
$password.addEventListener('focusin', function(){
    $image.innerHTML = eyesClosedImage;
});

$password.addEventListener('focusout', function(){
    $image.innerHTML = mainAvatarImage;
});
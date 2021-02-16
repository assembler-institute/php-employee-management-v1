import { printMainAvatar, printResults, printColors } from "./avatarModal.js";

let avatar;

export function avatarModalListeners(myAvatar, onClose) {
  avatar = myAvatar;
  generateRandomAvatarListener();
  changeAvatarOptionListener();
  changeAvatarPropertyListener();
  changeAvatarColorsListener();
  changeAvatarHairColorsListener();
  closeModalListeners(onClose);
}

function removeAvaarModalListeners() {
  removeChangeAvatarOptionListener();
  removeChangeAvatarPropertyListener();
  removeChangeAvatarColorsListener();
  removeChangeAvatarHairColorsListener();
  removeCloseModalListeners();
}

function closeModalListeners(onClose) {
  const $modalBackground = document.getElementById("avatarModalBackground");
  $modalBackground.addEventListener("click", function (event) {
    const target = event.target;
    if (
      target.classList.contains("avatarModal__background") ||
      target.classList.contains("avatarModal__close")
    ) {
      onClose(avatar.getProperties());
      removeAvaarModalListeners();
      closeAvatarModal();
    }
  });
}

function removeCloseModalListeners() {
  const $modalBackground = document.getElementById("avatarModalBackground");
  $modalBackground.removeEventListener("click", function (event) {
    const target = event.target;
    if (
      target.classList.contains("avatarModal__background") ||
      target.classList.contains("avatarModal__close")
    ) {
      closeAvatarModal();
      removeAvaarModalListeners();
    }
  });
}

function changeAvatarOptionListener() {
  const avatarOptions = document.getElementById("avatarOptions");
  avatarOptions.addEventListener("change", function (event) {
    printResults(avatar, event.target.value);
    printColors(avatar, event.target.value);
  });
}

function generateRandomAvatarListener() {
  const avatarOptions = document.getElementById("avatarOptions");
  const randomButton = document.getElementById("avatarRandom__button");
  randomButton.addEventListener("click", () => {
    avatar.randomize();
    printMainAvatar(avatar);
    printResults(avatar, avatarOptions.value);
    printColors(avatar, avatarOptions.value);
  })
}

function removeChangeAvatarOptionListener() {
  const avatarOptions = document.getElementById("avatarOptions");
  avatarOptions.removeEventListener("change", function (event) {
    printResults(avatar, event.target.value);
    printColors(avatar, event.target.value);
  });
}

function changeAvatarPropertyListener() {
  const avatarModalResults = document.getElementById("avatarModalResults");
  avatarModalResults.addEventListener("click", changeMainAvatarPropertyByClick);
}

function removeChangeAvatarPropertyListener() {
  const avatarModalResults = document.getElementById("avatarModalResults");
  avatarModalResults.removeEventListener(
    "click",
    changeMainAvatarPropertyByClick
  );
}

function changeAvatarColorsListener() {
  const avatarModalColors = document.getElementById("avatarModalColors");
  avatarModalColors.addEventListener("click", changeMainAvatarPropertyByClick);
}

function removeChangeAvatarColorsListener() {
  const avatarModalColors = document.getElementById("avatarModalColors");
  avatarModalColors.removeEventListener(
    "click",
    changeMainAvatarPropertyByClick
  );
}

function changeAvatarHairColorsListener() {
  const avatarModalHairColors = document.getElementById(
    "avatarModalHairColors"
  );
  avatarModalHairColors.addEventListener(
    "click",
    changeMainAvatarPropertyByClick
  );
}

function removeChangeAvatarHairColorsListener() {
  const avatarModalHairColors = document.getElementById(
    "avatarModalHairColors"
  );
  avatarModalHairColors.removeEventListener(
    "click",
    changeMainAvatarPropertyByClick
  );
}

function changeMainAvatarPropertyByClick(event) {
  const target = event.target;
  const avatarOptions = document.getElementById("avatarOptions");
  if (
    target.classList.contains("avatarModal__colors__button") ||
    target.classList.contains("avatarModal__results__button")
  ) {
    const property = target.dataset.property;
    const value = target.dataset.value;
    avatar.changeProperty(property, value === 'undefined' ? undefined : value);
    printMainAvatar(avatar);
    printResults(avatar, avatarOptions.value);
    printColors(avatar, avatarOptions.value);
  }
}

function closeAvatarModal() {
  const $modal = document.getElementById("avatarModalBackground");
  $modal.remove();
}

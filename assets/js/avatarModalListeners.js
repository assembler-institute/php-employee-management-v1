import { printMainAvatar, printResults } from "./avatarModal.js";

let avatar;

export function avatarModalListeners(myAvatar) {
  avatar = myAvatar;
  changeAvatarOptionListener();
  changeAvatarPropietyListener();
  changeAvatarColorsListener();
  changeAvatarHairColorsListener();
  closeModalListeners();
}

function removeAvaarModalListeners() {
  removeChangeAvatarOptionListener();
  removeChangeAvatarPropietyListener();
  removeChangeAvatarColorsListener();
  removeChangeAvatarHairColorsListener();
  removeCloseModalListeners();
}

function closeModalListeners() {
  const $modalBackground = document.getElementById("avatarModalBackground");
  $modalBackground.addEventListener("click", function (event) {
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
    printResults(event.target.value, avatar);
  });
}

function removeChangeAvatarOptionListener() {
  const avatarOptions = document.getElementById("avatarOptions");
  avatarOptions.removeEventListener("change", function (event) {
    printResults(event.target.value, avatar);
  });
}

function changeAvatarPropietyListener() {
  const avatarModalResults = document.getElementById("avatarModalResults");
  avatarModalResults.addEventListener("click", changeMainAvatarPropietyByClick);
}

function removeChangeAvatarPropietyListener() {
  const avatarModalResults = document.getElementById("avatarModalResults");
  avatarModalResults.removeEventListener(
    "click",
    changeMainAvatarPropietyByClick
  );
}

function changeAvatarColorsListener() {
  const avatarModalColors = document.getElementById("avatarModalColors");
  avatarModalColors.addEventListener("click", changeMainAvatarPropietyByClick);
}

function removeChangeAvatarColorsListener() {
  const avatarModalColors = document.getElementById("avatarModalColors");
  avatarModalColors.removeEventListener(
    "click",
    changeMainAvatarPropietyByClick
  );
}

function changeAvatarHairColorsListener() {
  const avatarModalHairColors = document.getElementById(
    "avatarModalHairColors"
  );
  avatarModalHairColors.addEventListener(
    "click",
    changeMainAvatarPropietyByClick
  );
}

function removeChangeAvatarHairColorsListener() {
  const avatarModalHairColors = document.getElementById(
    "avatarModalHairColors"
  );
  avatarModalHairColors.removeEventListener(
    "click",
    changeMainAvatarPropietyByClick
  );
}

function changeMainAvatarPropietyByClick(event) {
  const target = event.target;
  if (
    target.classList.contains("avatarModal__colors__button") ||
    target.classList.contains("avatarModal__results__button")
  ) {
    const propiety = target.dataset.propiety;
    const value = target.dataset.value;
    avatar.changePropiety(propiety, value);
    printMainAvatar(avatar);
  }
}

function closeAvatarModal() {
  const $modal = document.getElementById("avatarModalBackground");
  $modal.remove();
}

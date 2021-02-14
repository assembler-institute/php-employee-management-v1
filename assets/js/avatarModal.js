import { Avataaars } from "./avataaars.js";
import { avatar } from "./avatarClass.js";
import { avatarModalListeners } from "./avatarModalListeners.js";
import { customColor, optionsWithBlank } from "./avatarOptions.js";

export function createAvatarModal(propieties) {
  const myAvatar = new avatar(propieties);

  const $modal = `
    <div id="avatarModalBackground" class="avatarModal__background">
        <div id="avatarModal" class="avatarModal">
            <button id="avatarModalClose" class="avatarModal__close material-icons">cancel</button>
            <div id="avatarModalImage" class="avatarModal__image"></div>
            <select name="avatarOptions" id="avatarOptions"> </select>
            <div id="avatarModalResults" class="avatarModal__results"></div>
            <div id="avatarModalColors" class="avatarModal__colors" style="display: none;"></div>
            <div id="avatarModalHairColors" class="avatarModal__hairColors" style="display: block;"></div>
        </div>
    </div>`;

  document.getElementById("employee").innerHTML += $modal;

  printSelectOptions();
  printMainAvatar(myAvatar);
  printResults(Object.keys(Avataaars.paths)[0], myAvatar);

  avatarModalListeners(myAvatar);
}

function printSelectOptions() {
  const $select = document.getElementById("avatarOptions");
  Object.keys(Avataaars.paths).forEach((option) => {
    $select.innerHTML += `<option value="${option}">${option}</option>`;
  });
}

export function printResults(optionName, myAvatar) {
  const avatarResults = document.getElementById("avatarModalResults");
  avatarResults.innerHTML = "";
  if (optionsWithBlank[optionName]) {
    let options = myAvatar.getPropieties();
    options.width = 100;
    options[optionName] = null;
    const $button = `<button id="${optionName}-none" class="avatarModal__results__button" data-propiety="${optionName}" data-value="null">
                        ${Avataaars.create(options)}
                    </button>`;
    avatarResults.innerHTML += $button;
  }
  for (const type of Object.keys(Avataaars.paths[optionName])) {
    let options = myAvatar.getPropieties();
    options.width = 100;
    options[optionName] = type;
    const $button = `<button id="${
      optionName + "-" + type
    }" class="avatarModal__results__button" data-propiety="${optionName}" data-value="${type}"> ${Avataaars.create(
      options
    )} </button>`;
    avatarResults.innerHTML += $button;
  }
  printColors(optionName);
}

function printColors(optionName) {
  const colorResults = document.getElementById("avatarModalColors");
  const hairColorsResults = document.getElementById("avatarModalHairColors");

  if (customColor[optionName] != undefined && optionName != "facialHair") {
    const propietyName = customColor[optionName].name;
    let colorPallete = "palette";
    colorResults.innerHTML = `<p>Colors:</p>`;
    if (Avataaars.colors[propietyName] != undefined) {
      colorPallete = propietyName;
    }

    printColorsInNode(colorPallete, colorResults, propietyName);
  } else {
    colorResults.style.display = "none";
  }

  if (optionName == "top" || optionName == "facialHair") {
    if (optionName == "top") {
      optionName = "hair";
    }
    const propietyName = customColor[optionName].name;
    hairColorsResults.innerHTML = `<p>Hair colors:</p>`;
    printColorsInNode("hair", hairColorsResults, propietyName);
  } else {
    hairColorsResults.style.display = "none";
  }

  function printColorsInNode(colorPallete, node, propietyName) {
    const colors = Object.keys(Avataaars.colors[colorPallete]);
    for (const colorName of colors) {
      const color = Avataaars.colors[colorPallete][colorName];

      const $button = `<button id="${colorName}" class="avatarModal__colors__button" style="background-color:${color};" data-propiety="${propietyName}" data-value="${colorName}"></button>`;

      node.innerHTML += $button;

      node.style.display = "block";
    }
  }
}

export function printMainAvatar(myAvatar) {
  let propieties = myAvatar.getPropieties();
  propieties.width = 300;
  propieties.height = 300;
  document.getElementById("avatarModalImage").innerHTML = Avataaars.create(
    propieties
  );
}

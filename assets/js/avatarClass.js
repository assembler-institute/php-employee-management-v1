import { Avataaars } from './avataaars.js';
import { colorProperties } from './avatarOptions.js';

export class avatar {
	properties = {	
		background: undefined,
		skin: 'tanned',
		top: 'eyepatch',
		hairColor: 'auburn',
		hatColor: 'blue02',
		accessories: undefined,
		accessoriesColor: 'black',
		facialHair: 'default',
		facialHairColor: 'auburn',
		clothing: 'shirtCrewNeck',
		clothingGraphic: 'pizza',
		clothingColor: 'black',
		eyes: 'default',
		eyebrows: 'defaultNatural',
		mouth: 'default'
	};

	constructor(properties) {
		if (properties) {
			this.properties = properties;
		}
	}

	getAvatar = (properties = {}) => {
		let newProperties = {...this.properties}
		Object.entries(properties).forEach(([key, value]) => newProperties[key] = value)
		return Avataaars.create(newProperties);
	}

	getProperty = (optionName) => {
		return this.properties[optionName];
	}

	changeProperty = (propertyName, value) => {
		if (value != 'null') {
			this.properties[propertyName] = value;
		} else {
			delete this.properties[propertyName];
		}
	};

	randomize = () => {
		for(const property in this.properties) {
			if(Avataaars.paths[property]) {
				const availableOptions = Object.keys(Avataaars.paths[property]);
				const randomIndex = getRandomInt(0, availableOptions.length-1);
				this.properties[property] = availableOptions[randomIndex];
			}
			if(colorProperties[property]) {
				const availableOptions = Object.keys(Avataaars.colors[colorProperties[property]]);
				const randomIndex = getRandomInt(0, availableOptions.length-1);
				this.properties[property] = availableOptions[randomIndex];
			}
		}

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min)) + min;
		}
	}
}

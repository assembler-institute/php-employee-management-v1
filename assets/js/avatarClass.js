export class avatar{
    background= '#3aafa9';
    propieties = {
        skin : 'tanned',
        top : 'shortWaved',
        hairColor : 'auburn',
        hatColor : 'blue02',
        accessories : 'none',
        accessoriesColor : 'black',
        facialHair : 'none',
        facialHairColor : 'auburn',
        clothing : 'shirtCrewNeck',
        clothingGraphic : 'pizza',
        clothingColor : 'black',
        eyes : 'default',
        eyebrows : 'defaultNatural',
        mouth : 'default'
    }

    constructor( propieties ) {
        if( propieties !== null ){
            this.propieties = propieties;
        }
        console.log(this.propieties);
      }

    getPropieties = () => {
        return {
            skin : this.propieties.skin,
            top : this.propieties.top,
            hairColor : this.propieties.hairColor,
            hatColor : this.propieties.hatColor,
            accessories : this.propieties.accessories,
            accessoriesColor : this.propieties.accessoriesColor,
            facialHair : this.propieties.facialHair,
            facialHairColor : this.propieties.facialHairColor,
            clothing : this.propieties.clothing,
            clothingGraphic : this.propieties.clothingGraphic,
            clothingColor : this.propieties.clothingColor,
            eyes : this.propieties.eyes,
            eyebrows : this.propieties.eyebrows,
            mouth : this.propieties.mouth,
            background : this.background
        }
    }

    changePropiety = ( propietyName, value) => {
        if(value != 'null'){
            this.propieties[ propietyName ] = value;
        }else{
            delete this.propieties[ propietyName ];
        }
    }

    changeAllPropieties = ( propieties ) => {
        this.propieties = propieties;
    }

}
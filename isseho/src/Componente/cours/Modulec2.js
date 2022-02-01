import React, {useEffect, useState} from "react"
import '../../Style/Cours/Modulec2.css'

function Modulec2({matieres, niveaux, cours, setCoursFiltre ,coursFiltre}) {
    console.log(matieres);

    useEffect(() => {
        setCoursFiltre(cours);
    },[]);

    console.log(coursFiltre);

    let filtrerMatieres = [];
    let filtrerNiveaux = [];
    let filtrerResult = [];

    function Compare(filtreM, filtreN){
        for (let i = 0; i < filtreM.length; i++) {
            for (let j = 0; j < filtreN.length; j++) {
                if(filtreM[i] === filtreN[j]){
                    filtrerResult.push(filtreN[j]);
                }
            }
        }
        return filtrerResult;
    }

    function Filtre(){
        console.log("COUCOU");
        if(document.getElementById('listMatiere').value !== "all"){
            cours.map((cour) => {
                if (document.getElementById('listMatiere').value === cour.matieres.nom) {

                    filtrerMatieres.push(cour);
                }
            })
            console.log("MATIERES");
            console.log(filtrerMatieres);
        }

        if(document.getElementById('listNiveaux').value !== "all"){
            cours.map((cour) => {
                if (document.getElementById('listNiveaux').value === cour.niveau.nom) {

                    filtrerNiveaux.push(cour);
                }
            })
            console.log("NIVEAUX");
            console.log(filtrerNiveaux);
        }

        if(filtrerMatieres.length === 0 && filtrerNiveaux.length === 0){
            console.log("ABRA");
            setCoursFiltre(cours);
        }
        else if(filtrerMatieres.length !== 0 && filtrerNiveaux.length === 0){
            console.log("CADABRA");
            setCoursFiltre(filtrerMatieres);
            console.log(coursFiltre);
        }
        else if(filtrerMatieres.length === 0 && filtrerNiveaux.length !== 0){
            console.log("FETUS");
            setCoursFiltre(filtrerNiveaux);
            console.log(coursFiltre);
        }
        else{
            console.log("DELETUS");
            setCoursFiltre(Compare(filtrerMatieres,filtrerNiveaux));
        }
    }

    function TOTO(){
        console.log("TOTO" + document.getElementById('list').value);
    }
    return (
  
        <div className="input_container_b">

            <div className='input_m'>
                <div className="label_input">
                <label className="label_m">Matière</label>
                <select id='listMatiere' className="select_m" onChange={Filtre} defaultValue="all">
                    <option value="all">Filtrer par matière</option>
                    {matieres.map((matiere) => (
                        <option value = {matiere.nom}>{matiere.nom}</option>
                        )) }
                </select>
                </div>
                
                <div className="label_input">
                <label className="label_m" >Niveau</label>
                <select id='listNiveaux' className="select_m" onChange={Filtre} defaultValue="all">
                    <option value="all">Filtrer par niveaux</option>
                    {niveaux.map((niveau) => (
                            <option value = {niveau.nom}>{niveau.nom}</option>
                        )) }
                </select>
                </div>
                
                <div className="label_input">
                <label className="label_m">Professeur</label>
                <select className="select_m">
                    <option value="">Choisir un Professeur </option>
                    <option value="dog">Gérard</option>
                    <option value="cat">Delphine</option>
                    <option value="hamster">Isabelle</option>
                    <option value="parrot">Mamoude</option>
                    <option value="spider">Yoric</option>
                </select>
                </div>
            </div>

        </div>

  
    )
  }
  
  export default Modulec2;
  

        
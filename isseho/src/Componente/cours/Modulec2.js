import React from "react"
import '../../Style/Cours/Modulec2.css'

function Modulec2({matieres, niveaux }) {
    console.log(matieres);

    let filtrer;

    /*function Filtre(cours){
        if(document.getElementById('list').value !== "all"){
            cours.map((cour) => {
                if (document.getElementById('list').value === cour.matieres.nom) {

                    filtrer.push(cour);
                }
            })
            setCoursFiltre(filtrer);
        }
        else{
            setCoursFiltre(cours)
        }
    }*/

    function TOTO(){
        console.log("TOTO" + document.getElementById('list').value);
    }
    return (
  
        <div className="input_container_b">

            <div className='input_m'>
                <div className="label_input">
                <label className="label_m">Matière</label>
                <select id='list' className="select_m" onChange={TOTO}>
                    <option value="all">Filtrer par matière</option>
                    {matieres.map((matiere) => (
                        <option value = {matiere.nom}>{matiere.nom}</option>
                        )) }
                </select>
                </div>
                
                <div className="label_input">
                <label className="label_m" >Niveau</label>
                <select className="select_m">
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
  

        
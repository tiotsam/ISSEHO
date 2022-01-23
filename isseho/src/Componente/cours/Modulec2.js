import React from "react"
import '../../Style/Cours/Modulec2.css'

function Modulec2() {
    return (
  
        <div className="input_container_b">

            <div className='input_m'>
                <div className="label_input">
                <label className="label_m">Matière</label>
                <select className="select_m">
                    <option value="">Choisir une matière</option>
                    <option value="dog">Français</option>
                    <option value="cat">Mathématique</option>
                    <option value="hamster">Histoire</option>
                    <option value="parrot">Géographie</option>
                    <option value="spider">Anglais</option>
                    <option value="goldfish">Italien</option>
                </select>
                </div>
                
                <div className="label_input">
                <label className="label_m" >Niveau</label>
                <select className="select_m">
                    <option value="">Choisir un niveau</option>
                    <option value="dog">Primaire</option>
                    <option value="cat">Collègue</option>
                    <option value="hamster">Lycée</option>
                    <option value="parrot">Licence</option>
                    <option value="spider">Master</option>
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
  

        
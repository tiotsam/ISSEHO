import React from 'react';
import Cartedata from './Cartedata';
import '../Style/Carte.css'

function Carte({cours}) {

  console.log(cours);
  console.log(cours.cours.length);
  function formatDateHeure(date, date2) {
    date = new Date(date);
    date2 = new Date(date2);
    var retour = date.toLocaleDateString() +" " + "Debut: " + date.getUTCHours() + "h" + "   Fin: "  + date2.getUTCHours() +"h";
    return retour;
}

  let showCours = [];

  cours.forEach(cour => {
    showCours.push(<Cartedata img={cour.Auteur.infos.imageUser} matiere={cour.matieres.nom}
                              nomAuteur={cour.Auteur.infos.nom + " " + cour.Auteur.infos.prenom}
                              information={formatDateHeure(cour.dateDebut, cour.dateFin)}
                              src={cour.matieres.image}/>)
  });
  
console.log(showCours);
    return (
      <div className='cards' >
        
        <h1 className='titre_text'>Soutiens Scolaire</h1>
        <h5 className='soustitre_text'>PLATEFORME SOLIDAIRE DE PARTAGE DES COMPÉTENCES</h5>
        <div className='cards__container'>
          <div className='cards__wrapper'>
            <ul className='cards__items'>
              {showCours}
            </ul>
          </div>
        </div>
      </div>
    );
  }
  
  export default Carte;
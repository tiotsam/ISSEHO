import React from 'react';
import Cartedata from './Cartedata';
import '../Style/Cours/CoursRecherche.css'

export default function CarteRecherche({cours}){

    function formatDateHeure(date, date2) {
        date = new Date(date);
        date2 = new Date(date2);
        var retour = date.toLocaleDateString() +" " + "Debut: " + date.getUTCHours() + "h" + "   Fin: "  + date2.getUTCHours() +"h";
        return retour;
    }

    let showCours = [];
    for (let i = 0; i < cours.length; i++) {
        showCours.push(<Cartedata img={cours[i].Auteur.infos.imageUser} matiere={cours[i].matieres.nom}
                                  nomAuteur={cours[i].Auteur.infos.nom + " " + cours[i].Auteur.infos.prenom}
                                  information={formatDateHeure(cours[i].dateDebut, cours[i].dateFin)}
                                  src={cours[i].matieres.image}/>)
    }

    return(
    <div className='cards__container'>
        <div className='cards__wrapper'>
            <div className='coursGrid'>
                {showCours}
            </div>
        </div>
    </div>
    );
}
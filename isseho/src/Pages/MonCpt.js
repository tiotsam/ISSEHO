import React, { useEffect, useState } from 'react';
import FichePerso from '../Componente/FichePerso';
import Mail from '../Componente/Mail';
import '../Style/MonCpt.css';
import GridLayout from "react-grid-layout";

export default function MonCpt() {

  const [user, setUser] = useState('');
  const [isLoaded, setisLoaded] = useState(false);

  const layout = [
    { i: "1", x: 0, y: 0, w: 1, h: 2 },
    { i: "2", x: 1, y: 0, w: 3, h: 2, minW: 2, maxW: 4 },
    { i: "3", x: 4, y: 0, w: 1, h: 2 }
  ];


  useEffect(() => {

    const getUser = async () => {

      // On récupère l'id du user connecté
      let userId = JSON.parse(sessionStorage.getItem('user')).id;

      let opt = {
        method: 'GET',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + sessionStorage.getItem('token')
        },
      }

      const respUser = await fetch(process.env.REACT_APP_URL + '/users/' + userId, opt);

      if (respUser.status === 200) {

        const retourUser = await respUser.json();

        // On formate la date en dd/mm/yyyy
        let dateToFormat = new Date(retourUser.infos.birthDate);
        let dateFormat = String(dateToFormat.getDate()).padStart(2, '0') + '/' + String(dateToFormat.getMonth() + 1).padStart(2, '0') + '/' + dateToFormat.getFullYear();
        retourUser.infos.birthDate = dateFormat;

        setUser(retourUser);
        console.log(user);
        setisLoaded(true);
      }

    }

    return getUser();
  }, []);


  if (!isLoaded) {
    return <div className='pageMonCpt'><div className='topBar' /><p className='chargement'>Loading.....</p></div>
  } else {
    return (
      // <div className='pageMonCpt'>
      //   <div className='topBar'/>
      //     <div className='containerCptBoard'>
      //       {/* Fiche User  */}
      //       <div className='ficherUser'>
      //         <FichePerso nom={user.infos.nom} prenom={user.infos.prenom} mail={user.email} adrs={user.infos.rue} dpt={user.infos.departement} ville={user.infos.ville} birthdate={user.infos.birthDate} role={user.roles[1]} />
      //       </div>
      //       {/* Messagerie */}

      //       <div className='messagerie'>
      //         {
      //           user.messages.forEach(message => {
      //             <Mail auteur={message.auteur == null ? '' : message.auteur } destinataire={message.destinataire == null ? '' : message.destinataire} objet={message.objet} contenu={message.contenu} dateEnvoi={message.dateEnvoi} />
      //           })
      //         }
      //       </div>

      //     </div>
      // </div>

      <div className='pageMonCpt'>
        <div className='topBar'/>
          <div className='containerCptBoard'>
            <GridLayout
              className="layout"
              layout={layout}
              cols={12}
              rowHeight={30}
              width={1920}
            >
              <FichePerso key="1" nom={user.infos.nom} prenom={user.infos.prenom} mail={user.email} adrs={user.infos.rue} dpt={user.infos.departement} ville={user.infos.ville} birthdate={user.infos.birthDate} role={user.roles[1]} />
              <div className='carte' key="2">b</div>
              <div className='carte' key="3">c</div>
            </GridLayout>
          
          </div>
      </div>
    )
  }
}

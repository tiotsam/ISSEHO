import React, { useEffect, useState } from 'react';
import FichePerso from '../Componente/FichePerso';
import Mail from '../Componente/Mail';
import '../Style/MonCpt.css';
import GridLayout from "react-grid-layout";

export default function MonCpt() {

  const [user, setUser] = useState('');
  const [isLoaded, setisLoaded] = useState(false);
  const [messages, setMessages] = useState([]);

  const layout = [
    { i: "1", x: 0, y: 0, w: 2.5, h: 15 , minW: 2.5 , minH: 15 , maxW: 2.5 , maxH: 15},
    { i: "2", x: 2.6, y: 0, w: 9.2, h: 8 },
    { i: "3", x: 2.6, y: 9, w: 9.2, h: 7 },
    { i: "4", x: 0, y: 15, w: 2, h: 5.5 }
  ];


  useEffect(() => {

    const getUser = async () => {

      // On récupère l'id du user connecté
      let userId = JSON.parse(localStorage.getItem('user')).id;

      let opt = {
        method: 'GET',
        headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + localStorage.getItem('token')
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
        setMessages(afficheMessages(user.messages));
      }

    } 

    return getUser();
  }, []);

  const afficheMessages = (messages)=>{
    console.log('longueur tabMsg : '+ messages.length);
    let afficheMsg = []
    if(messages.length === 0){
      afficheMsg.push(
        <div>Vous n'avez pas de messages</div>
      )
    }else{
      if(messages.length === 1){
        afficheMsg.push(
          <Mail objet={user.messages[0].objet} contenu={user.messages[0].contenu} dateEnvoi={user.messages[0].dateEnvoi} />
        ) 
      }else{
        messages.forEach(message => {
         afficheMsg.push(
            <Mail objet={message.objet} contenu={message.contenu} dateEnvoi={message.dateEnvoi} />
          ) 
        });
      }
    }

    return afficheMsg;
  }

  console.log(user.messages);

  if (!isLoaded) {
    return <div className='pageMonCpt'><div className='topBar' /><p className='chargement'>Loading.....</p></div>
  } else {
    return (
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
              <div key="1" className='ficheUser'>
                <FichePerso nom={user.infos.nom} prenom={user.infos.prenom} mail={user.email} adrs={user.infos.rue} dpt={user.infos.departement} ville={user.infos.ville} birthdate={user.infos.birthDate} role={user.roles[1]} />
              </div>

              <div className='carte' key="2">Calendrier</div>
              <div key="3" className='messagerie'>
              <img className='topImg' src={require("../assets/mail.jpg")}/>
                {messages}
              </div>
              <div className='carte' key="4">Enfants</div>
            </GridLayout>
          
          </div>
      </div>
    )
  }
}

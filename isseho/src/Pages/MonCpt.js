import React, { useEffect, useState } from 'react';
import FichePerso from '../Componente/FichePerso';
import Mail from '../Componente/Mail';
import '../Style/MonCpt.css';

export default function MonCpt() {
  const [user, setUser] = useState('');
  const [isLoaded, setisLoaded] = useState(false);

  useEffect( async () => {

    // On récupère l'id du user connecté
    let userId = JSON.parse(sessionStorage.getItem('user')).id;

    let opt = {
      method: 'GET',
      headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
      },
  }

  const respUser = await fetch(process.env.REACT_APP_URL + '/users/' + userId, opt);

  if(respUser.status === 200){

    setUser(await respUser.json());
    console.log(user);
    setisLoaded(true);
  }

  }, []);
  

  if (!isLoaded){
    return <div className='pageMonCpt'><div className='topBar'/><p className='chargement'>Loading.....</p></div>
  }else{
    return (
      <div className='pageMonCpt'>
        <div className='topBar'/>
          <div className='containerCptBoard'>
            
            <FichePerso nom={user.infos.nom} prenom={user.infos.prenom} mail={user.email} adrs={user} />
            <Mail />

          </div>
      </div>
    )
  }
}

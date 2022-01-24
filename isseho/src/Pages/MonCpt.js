import React, { useEffect, useState } from 'react';
import FichePerso from '../Componente/FichePerso';
import Mail from '../Componente/Mail';
import '../Style/MonCpt.css';

export default function MonCpt() {
  const [user, setUser] = useState('');
  const [isLoaded, setisLoaded] = useState(false);

  useEffect(() => {

    // On récupère l'id du user connecté
    let userId = JSON.parse(sessionStorage.getItem('user')).id;
    console.log(userId);
  }, []);
  

  if (!isLoaded){
    return <div className='pageMonCpt'><div className='topBar'/><p className='chargement'>Loading.....</p></div>
  }else{
    return (
      <div className='pageMonCpt'>
        <div className='topBar'/>
          <div className='containerCptBoard'>
            
            <FichePerso />
            <Mail />

          </div>
      </div>
    )
  }
}

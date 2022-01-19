import React from 'react';
import Carte from '../Componente/Carte';
import Elmhome from '../Componente/Elmhome';
import HeaderSection from '../Componente/HeaderSection';
import Infobarre from '../Componente/Infobarre';
import '../Style/App.css';



function Home() {
    return (

        <>
          <HeaderSection/>
          <Infobarre />
          <Carte />
          <Elmhome/>
        </>
    );
};

export default Home;

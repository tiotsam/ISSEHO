import React from 'react';
import Carte from '../Componente/Carte';
import Element from '../Componente/Element';
import HeaderSection from '../Componente/HeaderSection';
import '../Style/App.css';



function Home() {
    return (

        <>
          <HeaderSection/>
          <Carte />
          <Element/>
        </>
    );
};

export default Home;

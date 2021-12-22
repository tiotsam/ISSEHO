import React from 'react';
import Carte from '../Componente/Carte';
import Footer from '../Componente/Footer';
import HeaderSection from '../Componente/HeaderSection';
import '../Style/App.css';



function Home() {
    return (

        <>
          <HeaderSection/>
          <Carte />
          <Footer/>
        </>
    );
};

export default Home;

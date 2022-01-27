import React, { useEffect, useState }  from 'react';
import Carte from '../Componente/Carte';
import Elmhome from '../Componente/Elmhome';
import HeaderSection from '../Componente/HeaderSection';
import Infobarre from '../Componente/Infobarre';
import '../Style/App.css';
import '../Style/Home.css'



function Home() {

  const [cours, setcours] = useState("");
  const [nbprof, setnbprof] = useState("");
  const [nbcours, setnbcours] = useState("");
  const [nbenfant, setnbenfant] = useState("");
  const [isLoaded, setisLoaded] = useState(false);
  const [isLoadedCarte, setisLoadedCarte] = useState(false);


  useEffect(() => {
  
    const getdata = async () => {
    let optionGet = {
      method: "GET",

      //header option de requête souvent des info de sécurité
      headers: {
        'Accept': 'application/json',
        'Content-Type': 'application/json'
        //  'Authorization': 'Bearer' + localStorage.getItem('token')
      },
    }

    const respcours = await fetch(process.env.REACT_APP_URL + '/cours/home', optionGet);
    const respnbcours = await fetch(process.env.REACT_APP_URL + '/cours/countCours', optionGet);
    const respnbprof = await fetch(process.env.REACT_APP_URL + '/users/countProf', optionGet);
    const respnbenfant = await fetch(process.env.REACT_APP_URL + '/users/countEnfant', optionGet);

    if (respnbcours.status === 200) {
      setnbcours(await respnbcours.json());
      console.log(nbcours)
    }

    if (respnbprof.status === 200) {
      setnbprof(await respnbprof.json());
      console.log(nbprof)
    }

    if (respnbenfant.status === 200) {
      setnbenfant(await respnbenfant.json());
      console.log(nbenfant)
    }

    if (respcours.status === 200) {
      console.log("sa marche")
      setcours(await respcours.json());
      setisLoadedCarte(true);
    }

    if (respnbprof.status === 200 
      && respnbenfant.status === 200 
      && respnbcours.status === 200) {
      setisLoaded(true);
    }
  }
  return getdata();
  }, []);
  
 

    return (

    <>
      <HeaderSection />
      {isLoaded && <Infobarre nbcours={nbcours} nbprof={nbprof} nbenfant={nbenfant} />}
      {!isLoaded && <Infobarre nbcours="0" nbprof="0" nbenfant="0" />}
      {isLoadedCarte && <Carte cours={cours} />}
      {!isLoadedCarte && <div className='load_fixe'> Loading... </div>}

      <Elmhome />
    </>
  )

}

export default Home

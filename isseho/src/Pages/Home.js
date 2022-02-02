import React, { useEffect, useRef, useState } from 'react';
import Carte from '../Componente/Carte';
import Elmhome from '../Componente/Elmhome';
import HeaderSection from '../Componente/HeaderSection';
import Infobarre from '../Componente/Infobarre';
import '../Style/App.css';
import '../Style/Home.css'
import lottie from 'lottie-web'
import Loader from '../Componente/Loader';



function Home() {

  const [cours, setcours] = useState("");
  const [nbprof, setnbprof] = useState("");
  const [nbcours, setnbcours] = useState("");
  const [nbenfant, setnbenfant] = useState("");
  const [isLoaded, setisLoaded] = useState(false);
  const [isLoadedCarte, setisLoadedCarte] = useState(false);
  const containerload = useRef(null)


  useEffect(() => {

    lottie.loadAnimation({
      container: containerload.current,
      renderer: 'svg',
      loop: true,
      autoplay: true,
      animationData: require('../assets/boy.json')
    })

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

      const respcours = await fetch(process.env.REACT_APP_URL_CUSTO + 'cours/home', optionGet);
      const respnbcours = await fetch(process.env.REACT_APP_URL_CUSTO + 'cours/countCours', optionGet);
      const respnbprof = await fetch(process.env.REACT_APP_URL_CUSTO + 'users/countProf', optionGet);
      const respnbenfant = await fetch(process.env.REACT_APP_URL_CUSTO + 'users/countEnfant', optionGet);

      if (respnbcours.status === 200) {
        setnbcours(await respnbcours.json());
      }
      
      if (respnbprof.status === 200) {
        setnbprof(await respnbprof.json());
      }
      
      if (respnbenfant.status === 200) {
        setnbenfant(await respnbenfant.json());
      }
      
      if (respcours.status === 200) {
        setcours(await respcours.json());

        cours.cours.forEach(cour => {
          console.log(cour);
        });
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
    
    
    
    // console.log(cours)
    // console.log(nbprof)
    // console.log(nbenfant)
    // isLoaded ? console.log(nbcours.cours[0][1]) : console.log('nb cours en chargement');
    return (
      
      <>
      <HeaderSection />
      {isLoaded && <Infobarre nbcours={nbcours.cours[0][1]} nbprof={nbprof.user[0][1]} nbenfant={nbenfant.user[0][1]} />}
      {!isLoaded && <Infobarre nbcours="0" nbprof="0" nbenfant="0" />}
      {isLoadedCarte && <Carte cours={cours.cours} />}
      {!isLoadedCarte && <div className='container_load'>
        <div className='wrapper_load'>
          <Loader/>
        </div></div>}
      <Elmhome />
    </>
  )

}

export default Home

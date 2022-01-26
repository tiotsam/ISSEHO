import React, {useEffect, useState} from 'react'
import HeaderCours from '../Componente/cours/HeaderCours';
import Modulec1 from '../Componente/cours/Modulec1';
import Modulec2 from '../Componente/cours/Modulec2'
import Modulec3 from '../Componente/cours/Modulec3';
import Cartedata from "../Componente/Cartedata";
import CarteRecherche from "../Componente/CarteRecherche";



export default function Cours() {

    const [cours, setCours] = useState("");
    const [isLoaded, setisLoaded] = useState(false);
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

    function formatDateHeure(date, date2) {
        date = new Date(date);
        date2 = new Date(date2);
        var retour = date.toLocaleDateString() +" " + "Debut: " + date.getUTCHours() + "h" + "   Fin: "  + date2.getUTCHours() +"h";
        return retour;
    }

    useEffect( () => {

        const getCours = async () => {

        let coursGet = {
            method: "GET",
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + localStorage.getItem('token')
            },
        }

        const respCours = await fetch(process.env.REACT_APP_URL + '/cours', coursGet);


        if (respCours.status === 200) {
            console.log("YOYO");
            setCours(await respCours.json());
            setisLoaded(true);
        }
    }
    return getCours();
    }, []);


        return (
            <>
                <HeaderCours/>
                <Modulec1/>
                <Modulec2/>
                { !isLoaded && <p className='chargement'>Loading.....</p>}

                { isLoaded && <CarteRecherche cours={cours}/>


                }


            </>
        )

}
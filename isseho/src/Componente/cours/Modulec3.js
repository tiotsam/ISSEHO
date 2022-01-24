import React from "react"
import '../../Style/Cours/Modulec3.css'
import Cartedata from "../Cartedata.js";

function Modulec3() {
    return (
    
                <div className="card_search">
                    <div className="container_cc">
                        <ul className='cards__items'>
                            <Cartedata
                                src={require('../../assets/inscription.jpg')}
                                img={require('../../assets/prof1.jpg')}
                                Nom='Frédéric Pi'
                                information='Mardi 15 janvier 2022 - 16h'
                                matiere='Mathématique'
                                place='1/5'
                                path='/'
                            />

                            <Cartedata
                                src={require('../../assets/inscription.jpg')}
                                img={require('../../assets/prof2.jpeg')}
                                Nom='Marine marechal'
                                information='Mercredi 16 janvier 2022 - 14h'
                                matiere='Français'
                                place='3/5'
                                path='/'
                            />
                        </ul>
                        <ul className='cards__items'>
                            <Cartedata
                                src={require('../../assets/inscription.jpg')}
                                img={require('../../assets/prof3.jpg')}
                                Nom='Albert Bibot'
                                information='Jeudi 1 janvier 2022 - 15h'
                                matiere='Histoire'
                                place='2/5'
                                path='/'
                            />
                            <Cartedata
                                src={require('../../assets/inscription.jpg')}
                                img={require('../../assets/prof4.jpg')}
                                Nom='Richard Lords'
                                information='Vendredi 18 janvier 2022 - 14h30'
                                matiere='Anglais'
                                place='4/5'
                                path='/'
                            />
                        </ul>
                    </div>
                </div>
    )
}

export default Modulec3;
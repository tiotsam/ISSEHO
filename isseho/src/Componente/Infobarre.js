import React from 'react'
import '../Style/Infobarre.css'

function Infobarre({nbrcours, nbrprof,nbrenfant}) {



    return (
        <div className='container_infobarre'>
            <div className='infobarre_wrapper'>
                <div className='info_col'>
                    <img className='infobarre_logo' src={require('../assets/logo.gif')} alt="loading..." />
                    <span className='info_span'>{nbrcours}</span>
                </div>
                <div className='info_col'>
                    <img className='infobarre_logo' src={require('../assets/logo1.gif')} alt="loading..." />
                    <span className='info_span'>{nbrprof}</span>
                </div> 
                <div className='info_col'>
                    <img className='infobarre_logo' src={require('../assets/logo2.gif')} alt="loading..." />
                    <span className='info_span'>{nbrenfant}</span>
                </div>
            </div>
        </div>
    )
}

export default Infobarre

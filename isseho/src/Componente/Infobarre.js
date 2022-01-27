import React from 'react'
import '../Style/Infobarre.css'

function Infobarre({nbcours, nbprof,nbenfant}) {



    return (
        <div className='container_infobarre'>
            <div className='infobarre_wrapper'>
                <div className='info_col'>
                    <img className='infobarre_logo' src={require('../assets/logo.gif')} alt="loading..." />
                    <span className='info_span'>{nbcours}</span>
                </div>
                <div className='info_col'>
                    <img className='infobarre_logo' src={require('../assets/logo1.gif')} alt="loading..." />
                    <span className='info_span'>{nbprof}</span>
                </div> 
                <div className='info_col'>
                    <img className='infobarre_logo' src={require('../assets/logo2.gif')} alt="loading..." />
                    <span className='info_span'>{nbenfant}</span>
                </div>
            </div>
        </div>
    )
}

export default Infobarre

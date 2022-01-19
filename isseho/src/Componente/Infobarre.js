import React from 'react'
import '../Style/Infobarre.css'

function Infobarre({nbrprof, nbrcours,nbrelev}) {



    return (
        <div className='container_infobarre'>
            <div className='infobarre_wrapper'>
                <div className='info_col'>
                    <img className='infobarre_logo' src={require('../assets/logo.gif')} alt="loading..." />
                    <span className='info_span'>250</span>
                </div>
                <div className='info_col'>
                    <img className='infobarre_logo' src={require('../assets/logo1.gif')} alt="loading..." />
                    <span className='info_span'>25</span>
                </div> 
                <div className='info_col'>
                    <img className='infobarre_logo' src={require('../assets/logo2.gif')} alt="loading..." />
                    <span className='info_span'>582</span>
                </div>
            </div>
        </div>
    )
}

export default Infobarre

import React from 'react'
import '../Style/App.css';
import HeaderPropos from '../Componente/Apropos/HeaderPropos';
import Module1 from '../Componente/Apropos/Module1';
import Module2 from '../Componente/Apropos/Module2';




function Apropos() {
    return (
        <div>
         <HeaderPropos />
         <Module1 />
         <Module2 />
        </div>
    )
}

export default Apropos

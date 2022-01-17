import React from 'react';
import { Link } from 'react-router-dom';

function Cartedata({path,img,matiere,Nom, information,place,src}) {
  return (
    < div className='cards__item'>
      
        <Link className='cards__item__link' to={path}>
        <img 
          className='cards_item_profil'
          alt='profile'
          src={img} />
           <img
              className='cards__item__img'
              alt='Background'
              src={src}
            />
          <figure className='cards__item__pic-wrap' data-category={place}>
        
          
          </figure>

          <div className='cards__item__info'>
            <h5 className='cards__item__text'>{Nom}</h5>
            <br></br>
            <h5 className='cards_item_matiere'>{matiere}</h5>
            <h6 className='cards__item__description'>{information}</h6>
          </div>
        </Link>
    </div>
  );
}

export default Cartedata;
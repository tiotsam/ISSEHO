import React from 'react';
import { IoSchoolSharp } from 'react-icons/io5';


function Cartedata({ path, img, matiere, Nom, information, place, src }) {
  return (
    < div className='cards__item'>

      <img
        className='cards__item__img'
        alt='Background'
        src={src}
      />
      <img
        className='cards_item_profil'
        alt='profile'
        src={img} />

      {/* <figure className='cards__item__pic-wrap' data-category={place}>
    
          </figure> */}

      <div className='cards__item__info'>
        <div className='cards_item_left'>
          <h5 className='cards__item__text'>{Nom}</h5>
          <br></br>
          <h5 className='cards_item_matiere'>{matiere}</h5>
          <h6 className='cards__item__description'>{information}</h6>
        </div>

        <div className='cards_item_right'>
          <button className='button_cards'>Reserver</button>
          <div className='cards_item_icon'>
            <IoSchoolSharp className='icon' />
            <IoSchoolSharp className='icon' />
            <IoSchoolSharp className='icon' />
            <IoSchoolSharp className='icon' />
            <IoSchoolSharp className='icon' />
          </div>

        </div>
      </div>
    </div>
  );
}

export default Cartedata;
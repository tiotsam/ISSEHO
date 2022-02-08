import React, { useEffect, useState } from 'react';
import '../Style/Mail.css';
import { BiMailSend } from "react-icons/bi";
import { RiDeleteBin6Line } from "react-icons/ri";
import { MdOutlineQuestionAnswer } from "react-icons/md";


export default function Mail({messages}) {
  
  console.log('messagerie');
  console.log(messages);

  const [boiteR, setboiteR] = useState([]);
  const [boiteE, setboiteE] = useState([]);
  const [mails, setmails] = useState([]);
  const [isOpen, setisOpen] = useState(false);
  const [rcptActive, setrcptActive] = useState(true);
  const [envActive, setenvtActive] = useState(false);
  const [redacActive, setredacActive] = useState(false);
  
  useEffect(() => {
    
    let boiteRcpt = [];
    let boiteEnvoi = [];

    messages.map((message)=>{
      // console.log('id : '+ message.Auteur.id);
      // console.log(message.destinataire);
      // console.log(message.objet);
      // console.log(message.contenu);

      if(JSON.parse(localStorage.getItem('user')).id == message.Auteur.id){
        boiteEnvoi.push(message);
      }
      else{
        boiteRcpt.push(message);
      }
    })
    setboiteR(boiteRcpt);
    setboiteE(boiteEnvoi);
    afficheMail(boiteRcpt,true);

  }, []);

  const deleteMail = (idMail)=>{

    console.log('mail à delete :'+idMail);
  }

  const afficheMail = (mails, isReception )=>{

    // tableau d'affichage des mails
    let affichage = [];
    
    
    affichage.push(
      <div className="topBarMail">
        <div className="topBarElement">Objet :</div>
        <div className="topBarElement">{isReception ? 'Expéditeur :' : 'Destinataires :'}</div>
        <div className="topBarElement">Date :</div>
      </div>
    )
    
    mails.map( (mail , key)=>{
      
      // Nom et prenom du destinataire ou de l'auteur
      let cible ="";

      if(isReception){
        cible = firstMaj(mail.Auteur.infos.prenom) +' '+ firstMaj(mail.Auteur.infos.nom);
      }else{
        if(mail.destinataire.length == 1){

          cible = firstMaj(mail.destinataire[0].infos.prenom) +' '+ firstMaj(mail.destinataire[0].infos.nom);
        }else{
          mail.destinataire.forEach(dest => {
            cible += firstMaj(dest.infos.prenom) + ' ' + firstMaj(dest.infos.nom) + ', ';
          });
        }
      }

      affichage.push(
        <div className="topMail">
            <div className="topBarElement">{mail.objet}</div>
            <div className="topBarElement">{cible}</div>
            <div className="topBarElement">{mail.dateEnvoi}</div>
            <MdOutlineQuestionAnswer type="button" onClick={()=>repondMail(mail.contenu)}/>
            <RiDeleteBin6Line type="button" onClick={()=>deleteMail(mail.id)} />
        </div>
      )
    })

    setmails(affichage);
  }

  const repondMail = (oldMail)=>{
    console.log(oldMail);
  }

  const sendMail = (e)=>{
    e.preventDefaault();
    console.log(e);
  }

  const redactMail = ()=>{
    console.log("J'écris un mail");
    let affichage = []

    affichage.push(
      <div className="redacMail">
        <form className='form-mail' onSubmit={sendMail}> 
          <div className='headerRedacMail'>
            <div className="colGauche">
              <input type="text" className='champ-mail' name='dest' id='dest' placeholder='Entrer un destinataire' />
              <input type="text" className='champ-mail' name='obj' id='obj' placeholder='Objet du message' />
            </div>
            <div className="colDroite">
              <input type="submit" value="Envoyer" />
              <button type='submit'>
              <BiMailSend className='envoi-mail' onClick={()=>sendMail()} />            
              </button>
            </div>
          </div>
          <textarea name="contenu" id="contenu" className='contenuMail' placeholder="Ecrire le mail"></textarea>

        </form>
      </div>
    )

    setmails(affichage);
  }

  const firstMaj = (string)=>{
    string = string[0].toUpperCase() + string.slice(1);
    return string;
  }
  
  console.log(boiteR);
  console.log(boiteE);
  return (
    <div className='mail'>
      <div className="menuMail">
        <input type="button" className={rcptActive ? 'btnMessagerieActive' : 'btnMessagerie'} value="Boite Récéption" onClick={()=>{setenvtActive(false);
                                                                                                                                    setrcptActive(true);
                                                                                                                                    setredacActive(false); 
                                                                                                                                    afficheMail(boiteR,true)}} />
        <input type="button" className={envActive ? 'btnMessagerieActive' : 'btnMessagerie'} value="Boite Envoi" onClick={()=>{ setenvtActive(true);
                                                                                                                                setrcptActive(false);
                                                                                                                                setredacActive(false); 
                                                                                                                                afficheMail(boiteE,false) }}/>
        <input type="button" className={redacActive ? 'btnMessagerieActive' : 'btnMessagerie'} value="Ecrire un mail" onClick={()=>{
                                                                                                                                    setenvtActive(false);
                                                                                                                                    setrcptActive(false);
                                                                                                                                    setredacActive(true); 
                                                                                                                                    redactMail()}} />
      </div>
      <div className="mailAffiche">
       {mails}
      </div>
        
    </div>)
}

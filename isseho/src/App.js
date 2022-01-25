import React, { useState } from 'react';
import Navbar from './Componente/Navbar';

import { BrowserRouter, Routes, Route } from 'react-router-dom';

import './Style/App.css';
import Home from './Pages/Home';
import Cours from './Pages/Cours';
import Inscription from './Pages/Inscription';
import Apropos from './Pages/Apropos';
import Footer from './Componente/Footer';
import Login from './Pages/Login';
import { hasAuthenticated } from './services/AuthService';
import MonCpt from './Pages/MonCpt';
import Recherche from './Pages/Recherche';
import '/node_modules/react-grid-layout/css/styles.css';
import '/node_modules/react-resizable/css/styles.css';

function App() {

  const [isAuthenticated, setisAuthenticated] = useState(hasAuthenticated());
  
  return (
    <>
      <BrowserRouter>
      <Navbar isAuthenticated={isAuthenticated} setisAuthenticated={setisAuthenticated}/>
        <Routes>
        <Route exact path='/' element={<Home />}></Route>
        <Route exact path='/cours' element={<Cours />}></Route>
        <Route exact path='/a-propos' element={<Apropos />}></Route>
        <Route exact path='/inscription' element={<Inscription setisAuthenticated={setisAuthenticated}/>}></Route>
        <Route exact path='/login' element={<Login setisAuthenticated={setisAuthenticated}/>}  ></Route>
        <Route exact path='/MonCpt' element={<MonCpt />}  ></Route>
        <Route exact path='/search' element={<Recherche />}  ></Route>
        <Route path='*' element={<Home />}  ></Route>
        </Routes>
      <Footer />
    </BrowserRouter>
    </>
  );
}


export default App;

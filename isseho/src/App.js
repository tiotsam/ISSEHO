import React from 'react';
import Navbar from './Componente/Navbar';

import { BrowserRouter, Routes, Route } from 'react-router-dom';

import './Style/App.css';
import Home from './Pages/Home';
import Cours from './Pages/Cours';
import Inscription from './Pages/Inscription';
import Apropos from './Pages/Apropos';


function App() {
  return (
    <>
      <BrowserRouter>
      <Navbar/>
        <Routes>
        <Route exact path='/' element={<Home />}></Route>
        <Route exact path='/cours' element={<Cours />}></Route>
        <Route exact path='/a-propos' element={<Apropos />}></Route>
        <Route exact path='/inscription' element={<Inscription />}></Route>
        </Routes>
    </BrowserRouter>
    </>
  );
}


export default App;

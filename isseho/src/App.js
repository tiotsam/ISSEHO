import React from 'react';
import Navbar from './Componente/Navbar';
import {BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import './Style/App.css'


function App() {
  return (
    <>
      <Router>
        <Navbar />
  
        <Routes>
            <Route path="/" exact />
        </Routes>
      </Router>
    </>
  )
}

export default App

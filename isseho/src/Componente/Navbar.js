import React from 'react';
import './Style/Navbar.css';





function Navbar() {
    return (
        <>
            <nav className="Navbar">
                <div className="navbar-container">
                <Link to="/" className="navbar-logo">
                    isseho logo
                </Link>
                
                </div>
            </nav>
        </>
    )
}

export default Navbar

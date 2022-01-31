import React, { useEffect, useState } from 'react';
import Cartedata from './Cartedata';
import '../Style/Cours/CoursRecherche.css'
import ReactPaginate from "react-paginate";
import '../Style/Cours/Pagination.css'

export default function CarteRecherche({ cours }) {


    function Items({ currentItems }) {
        return (
            <>
                {currentItems &&
                    currentItems.map((item) => (
                        <Cartedata img={item.Auteur.infos.imageUser} matiere={item.matieres.nom}
                            nomAuteur={item.Auteur.infos.nom + " " + item.Auteur.infos.prenom}
                            information={formatDateHeure(item.dateDebut, item.dateFin)}
                            src={item.matieres.image} />
                    ))}
            </>
        );
    }

    function formatDateHeure(date, date2) {
        date = new Date(date);
        date2 = new Date(date2);
        var retour = date.toLocaleDateString() + " " + "Debut: " + date.getUTCHours() + "h" + "   Fin: " + date2.getUTCHours() + "h";
        return retour;
    }

    function PaginatedItems({ itemsPerPage }) {
        // We start with an empty list of items.
        const [currentItems, setCurrentItems] = useState(null);
        const [pageCount, setPageCount] = useState(0);
        // Here we use item offsets; we could also use page offsets
        // following the API or data you're working with.
        const [itemOffset, setItemOffset] = useState(0);

        useEffect(() => {
            // Fetch items from another resources.
            const endOffset = itemOffset + itemsPerPage;
            console.log(`Loading items from ${itemOffset} to ${endOffset}`);
            setCurrentItems(cours.slice(itemOffset, endOffset));
            setPageCount(Math.ceil(cours.length / itemsPerPage));
        }, [itemOffset, itemsPerPage]);

        // Invoke when user click to request another page.
        const handlePageClick = (event) => {
            const newOffset = (event.selected * itemsPerPage) % cours.length;
            console.log(
                `User requested page number ${event.selected}, which is offset ${newOffset}`
            );
            setItemOffset(newOffset);
        };

        return (
            <div className='wrapper_paginate'>
                
                <Items currentItems={currentItems} />
                <div className='page_page'>
                    <ReactPaginate
                        breakLabel="..."
                        nextLabel="next >"
                        onPageChange={handlePageClick}
                        pageRangeDisplayed={5}
                        pageCount={pageCount}
                        previousLabel="< previous"
                        renderOnZeroPageCount={null}
                    />
                </div>
            </div>
        );
    }

    return (
        <div className='cards__container__recherche' >
            <div className='cards__container'>
                <div className='cards__wrapper'>
                    <div className='coursGrid'>
                        <PaginatedItems itemsPerPage={6} />
                    </div>
                </div>
            </div>

        </div>
    );
}
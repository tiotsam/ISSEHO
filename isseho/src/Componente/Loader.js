import React, { useEffect, useRef } from 'react';
import  lottie from 'lottie-web'
import '../Style/Loader.css'

function Loader() {

    const containerload = useRef(null)

    useEffect(() => {


        lottie.loadAnimation({
            container: containerload.current,
            renderer: 'svg',
            loop: true,
            autoplay: true,
            animationData: require('../assets/boy.json')
        })

        return () => {
            ;
        };
    }, []);


    return (

        <div className='containerload' ref={(containerload)} >
            <h2 className='text_loading'>Loading...</h2>
        </div>
    );
}

export default Loader;

import React from 'react';
import ReactDOM from 'react-dom';
import Carousel from 'react-bootstrap/Carousel';

import img1 from '/storage/addons/product1.jpg';
import img2 from '/storage/addons/product2.jpg';
import img3 from '/storage/addons/product3.jpg';

function SliderPromoParm({  }) {
    
   const items = [
        { key:'1', alt:'jeden', captionTitle:'title1', caption:"pierwszy obrazek",src: '/storage/addons/product1.jpg'},
        { key:'2', alt:'dwa', captionTitle:'title2', caption:"drugi obrazek",src: '/storage/addons/product2.jpg'},
        { key:'3', alt:'trzy', captionTitle:'title3', caption:"trzeci obrazek",src: '/storage/addons/product3.jpg'}
      ];
        
    return (
        <Carousel>
        {
        items.map(item => (<Carousel.Item key="{item.id}">
            <img 
                className="d-block w-100"
                src={item.src}
                alt={item.alt}
            />
            <Carousel.Caption key="{item.id}">
                <h3>{item.captionTitle}</h3>
                <p>{item.caption}</p>
            </Carousel.Caption>
        </Carousel.Item>))
        }        
      </Carousel>
    )    };


export default SliderPromoParm;

if (document.getElementById('SliderPromoParm')) {
    ReactDOM.render(<SliderPromoParm />, document.getElementById('SliderPromoParm'));
}

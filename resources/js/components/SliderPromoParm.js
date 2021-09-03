import React from 'react';
import ReactDOM from 'react-dom';
import Carousel from 'react-bootstrap/Carousel';


function SliderPromoParm() {   





    const obj = [
        { id:'1', alt:'jeden', captionTitle:'title1', caption:'pierwszy obrazek',src: '/storage/addons/product1.jpg'},
        { id:'2', alt:'dwa', captionTitle:'title2', caption:'drugi obrazek',src: '/storage/addons/product2.jpg'},
        { id:'3', alt:'trzy', captionTitle:'title3', caption:'trzeci obrazek',src: '/storage/addons/product3.jpg'}
      ];
    //items = JSON.stringify(items_);    
    //  items = '[{"id":"1","alt":"jeden","captionTitle":"title 1a","caption":"pierwszy obrazek","src":"\/storage\/addons\/product1.jpg"},{"id":"2","alt":"dwa","captionTitle":"title 2a","caption":"drugi obrazek","src":"\/storage\/addons\/product2.jpg"},{"id":"3","alt":"trzy","captionTitle":"title 3a","caption":"trzykoty obrazek","src":"\/storage\/addons\/product3.jpg"}]';
   // const obj = JSON.parse(items);
    
    return (
        <Carousel>
        {
        obj.map(item => (<Carousel.Item key={item.id.toString()}>
            <img 
                className="d-block w-100"
                src={item.src}
                alt={item.alt}
            />
            <Carousel.Caption >
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

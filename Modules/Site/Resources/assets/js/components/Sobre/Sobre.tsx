import React from 'react';
import './styles.scss';
function Sobre() {
  return (
    <section className='sobreSection'>
        <section className="cabecalho">
            <h1>Sobre</h1>
        </section>
        <section className="conteudo">
            <h1>Fictio, o seu site de noticias falsas</h1>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit.
                Nullam id dolor id nibh ultricies vehicula ut id elit.
                Nullam id dolor id nibh ultricies vehicula ut id elit.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, dolorum!
            </p>
        </section>
    </section>
  );
}
export default Sobre;
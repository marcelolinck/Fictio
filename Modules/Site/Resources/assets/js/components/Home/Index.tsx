import React from 'react';
import './styles.scss';
// @ts-ignore
import imgTeste from './imgteste.jpg';
import {Container, Child } from 'teapotcss';
function Home() {
    return (
        <section className="homeSection">
            <section className="cabecalho">
                <h1>Noticias</h1>
            </section>
            <section className="noticiaDestaqueWrapper">
                <div className='decoracaoFundo'></div>
                <div className='noticiaDestaque'>
                    <div className='noticiaDestaqueImg'>
                        <img src={imgTeste}/>
                    </div>
                    
                    <div className='noticiaDestaqueTexto'>
                        <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum obcaecati natus vitae voluptates non.</h1>
                        
                        {/* <button>Ver mais</button> */}
                    </div>
                    
                </div>
            </section>
            <section className='noticiasDestaqueMulti'>
                <div className='cabecalhoDestaque'>
                    <span role="h3">Lorem</span>
                </div>
                <div className="decoracaoNoticiasDestaque"></div>
                    <Container 
                        columns={'auto'}
                        gap='10px'
                        className="conteudoDestaque">
                        {[...Array(5)].map((item, index) =>
                            <Child key={index}>
                                <a className="cardNoticia hoverMargin">
                                    <img src={imgTeste}></img>
                                    <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, repellendus.</h3>
                                </a>
                            </Child>
                        )}
                    </Container>
            </section>
            <section className='noticiasDestaqueMulti'>
                <div className='cabecalhoDestaque'>
                    <span role="h3">Lorem</span>
                </div>
                <div className="decoracaoNoticiasDestaque"></div>
                    <Container 
                        columns={'auto'}
                        gap='10px'
                        className="conteudoDestaque">
                        {[...Array(5)].map((item, index) =>
                            <Child key={index}>
                                <a className="cardNoticia hoverMargin">
                                    <img src={imgTeste}></img>
                                    <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, repellendus.</h3>
                                </a>
                            </Child>
                        )}
                    </Container>
            </section>
        </section>
    );
}
export default Home;
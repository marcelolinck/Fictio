import React from 'react';
import './styles.scss';
// @ts-ignore
import imgTeste from './imgteste.jpg';
import {Container, Child } from 'teapotcss';
import axios from 'axios';
import {useState, useEffect} from 'react';
function Home({noticia, ...props}) {    
    const [data, setData] = useState([]);
    useEffect(() => {
        axios.get('/api/noticias/tags', 
        {
            params: {
                tags:["Lorem"]
            }
        }).then((res)=>{
            setData(res.data);
        })
    }, []);
        
    return (
        <section className="homeSection">
            <section className="cabecalho">
                <h1>Noticias</h1>
            </section>
            <section className="noticiaDestaqueWrapper">
                <div className='decoracaoFundo'></div>
                <a className='noticiaDestaque' href={`noticia/${noticia.id}`}>
                    <div className='noticiaDestaqueImg'>
                        <img src={noticia.imagem}/>
                    </div>
                    
                    <div className='noticiaDestaqueTexto'>
                        <h1>{noticia.titulo}</h1>
                    </div>
                    
                </a>
            </section>
            <section className='noticiasDestaqueMulti'>
                <div className='cabecalhoDestaque'>
                    <span role="h3">Lorem</span>
                </div>
                <div className="decoracaoNoticiasDestaque"></div>
                    <Container 
                        columns={'auto'}
                        gap='10px'
                        className="conteudoDestaque"
                    >
                        {data.map((item, index) =>
                            <Child key={index}>
                                <a className="cardNoticia hoverMargin"  href={`/noticia/${item.id}`}>
                                    <img src={item.fotos[0].noticia_foto_patch}></img>
                                    <h3>{item.titulo}</h3>
                                </a>
                            </Child>
                        )}
                    </Container>
            </section>
            {/* <section className='noticiasDestaqueMulti'>
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
            </section> */}
        </section>
    );
}
export default Home;
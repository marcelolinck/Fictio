import React from 'react';
import './styles.scss';
import {Container, Child } from 'teapotcss';
import axios from 'axios';
import {useState, useEffect} from 'react';
function Home({noticiaTratada, noticiasTagDestaque, ...props}) {    
    const [data, setData] = useState([]);
    const noticia = noticiaTratada

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
            {noticiasTagDestaque.map((tag, index)=>
                <section className='noticiasDestaqueMulti' key={index}>
                    <div className='cabecalhoDestaque'>
                        <span role="h3">{tag.tag}</span>
                    </div>
                    <div className="decoracaoNoticiasDestaque"></div>
                        <Container 
                            columns={'auto'}
                            gap='10px'
                            className="conteudoDestaque"
                        >
                            {tag.noticias.map((noticia, index) =>
                                <Child key={index}>
                                    <a className="cardNoticia hoverMargin"  href={`/noticia/${noticia.id}`}>
                                        <img src={noticia.imagem}></img>
                                        <h3>{noticia.titulo}</h3>
                                    </a>
                                </Child>
                            )}
                        </Container>
                </section>
            )}
        </section>
    );
}
export default Home;
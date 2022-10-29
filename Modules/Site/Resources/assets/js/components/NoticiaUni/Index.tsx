/* import react */
import React, {useRef, useState, useEffect} from 'react';
// @ts-ignore
import imgTeste from './imgsPlaceholder/imgteste.jpg';
// @ts-ignore
import mario from './imgsPlaceholder/mario.png';
// @ts-ignore
import sonic from './imgsPlaceholder/sonico.png';
// @ts-ignore
import luigi from './imgsPlaceholder/luigi.png';
// @ts-ignore
import tails from './imgsPlaceholder/tails.png';
// @ts-ignore
import knuckles from './imgsPlaceholder/knucles.png';
// @ts-ignore
import bowser from './imgsPlaceholder/bowser.png';
// @ts-ignore
import shadow from './imgsPlaceholder/shadow.png';


import './styles.scss';
import {Container, Child} from 'teapotcss';
import { LoremIpsum } from "lorem-ipsum";
import Comentario from './Template/Comentario/Comentario';
import moment from 'moment';

function NoticiaUni({noticia, ...props}){
    const tituloRef = useRef<HTMLDivElement>(null);
    const sugestoesRef = useRef<HTMLHeadingElement>(null);
    type CSSVarName = `--${Uncapitalize<string>}`;
    interface CSSvars{
        [key:CSSVarName]:string|number|undefined;
    }
    const [tituloHeight, setTituloHeight] = useState<number>(0);
    const [sugestoesHeight, setSugestoesHeight] = useState<number>(0);
    useEffect(()=>{
        setTituloHeight(tituloRef.current!.clientHeight);
        setSugestoesHeight(sugestoesRef.current!.clientHeight);
    },[tituloRef.current, sugestoesRef.current]);
    useEffect(()=>{
        window.addEventListener('resize', ()=>{
            setTituloHeight(tituloRef.current!.clientHeight);
            setSugestoesHeight(sugestoesRef.current!.clientHeight);
        })
        /* data is a constant with a random moment() date */
        
    },[])
    function randomDate(){
        const data = moment().subtract(Math.floor(Math.random()*100), 'days');
        const dataFormatada = data.format('DD/MM/YYYY') as `${number}/${number}/${number}`;
        return dataFormatada;
        

    }
    const lorem = new LoremIpsum({
        sentencesPerParagraph: {
          max: 8,
          min: 4
        },
        wordsPerSentence: {
          max: 16,
          min: 4
        }
      });
    const styleCards:CSSvars = {
        "--tituloTopo": tituloHeight + "px",
        "--sugestoesTopo": sugestoesHeight + "px"
    }
    const imagens = [mario, sonic, luigi, tails, knuckles, bowser, shadow];
    function randimg(){
        return imagens[Math.floor(Math.random() * imagens.length)];
    }
    console.log(noticia)
    return(
    <>
        <section className='cabecalho'>
            <h1>Categoria</h1>
        </section>
        <section className="wrapperNoticiaUni">
            <section className='wrapperNoticiaUniMain'>
                <section className='tituloWrapper' ref={tituloRef} >
                    <h1>{noticia.titulo}</h1>
                </section>
                <section className='conteudoNoticia'>
                    <div className="imgWrapper">
                        <img src={noticia.imagem}/>
                    </div>
                    <div className='conteudoTexto'>
                        <p>{noticia.texto}</p>
                    </div>

                    <div className="comentarios">
                        <h2>Comentários</h2>
                        <ul className="listaComentarios">
                            {noticia.comentarios.map((_:any,i:number) => 
                                <Comentario
                                    key={i}
                                    cod={i}
                                    nome={_.user.name}
                                    texto={_.descricao}
                                    //likes={Math.floor(Math.random() * 100)}
                                    img={randimg()}
                                    data={moment(_.created_at).format('DD/MM/YYYY')}
                                />
                            )}
                        </ul>
                    </div>


                    <Container columns={'auto'} className="cardsAbaixoResponsivo">
                        {[...Array(3)].map((e, i) => 
                            <a key={i} className="cardNoticia hoverMenor cardNoticiaSugestao">
                                <img src={imgTeste}></img>
                                <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, repellendus.</h3>
                            </a>
                        )}
                    </Container>
                </section>
            </section>
            <section className='sugestoesNoticia' style={styleCards}>
                <h2 ref={sugestoesRef}>Sugestões</h2>
                <div className='sugestoesNoticiaConjunto'>           
                    {[...Array(3)].map((e, i) => 
                        <a key={i} className="cardNoticia hoverMenor cardNoticiaSugestao">
                            <img src={imgTeste}></img>
                            <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores, repellendus.</h3>
                        </a>
                    )}
                </div>
            </section>
        </section>
    </>
    );
}
export default NoticiaUni;
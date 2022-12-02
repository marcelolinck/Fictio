/* import react */
import React, {useRef, useState, useEffect} from 'react';
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
/* import './tailwind.css' */
import st from './classes'
import {Container, Child} from 'teapotcss';
/* import Comentario from './Template/Comentario/Comentario'; */
/* import moment from 'moment';
import axios from 'axios'; */
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
    },[])
    const styleCards:CSSvars = {
        "--tituloTopo": tituloHeight + "px",
        "--sugestoesTopo": sugestoesHeight + "px"
    }
    return(
    <>
        <section className='cabecalho'>
            <h1>Noticia</h1>
        </section>
        <section className="wrapperNoticiaUni flex">
            <section className='wrapperNoticiaUniMain flex items-center flex-col'>
                <section className='tituloWrapper flex justify-center w-full' ref={tituloRef} >
                    <h1 className="2-full">{noticia.titulo}</h1>
                </section>
                <section className={st.conteudoNoticia}>
                    <div className="imgWrapper flex justify-center">
                        <img className='w-full h-auto' src={noticia.imagem}/>
                    </div>
                    <div className='conteudoTexto w-full px-2 text-base mb-5'>
                        <div dangerouslySetInnerHTML={
                            {__html: noticia.texto}
                        }
                        ></div>
                    </div>


                    <Container columns={'auto'} className="cardsAbaixoResponsivo justify-center">
                        {noticia.sugestoes.map((e, i) => 
                            <a key={i} className="cardNoticia hoverMenor cardNoticiaSugestao h-auto" href={`/noticia/${e.id}`}>
                                <img src={e.fotos[0] ? e.fotos[0].noticia_foto_path : "https://via.placeholder.com/150"}/>
                                <h3>{e.titulo}</h3>
                            </a>
                        )}
                    </Container>
                </section>
            </section>
            <section className='sugestoesNoticia relative -sm:hidden' style={styleCards}>
                <h2 ref={sugestoesRef}>Sugestões</h2>
                <div className='sugestoesNoticiaConjunto flex flex-col'>
                    {noticia.sugestoes.map((e, i) => 
                        <a key={i} className="cardNoticia hoverMenor cardNoticiaSugestao h-auto" href={`/noticia/${e.id}`}>
                            <img src={e.fotos[0] ? e.fotos[0].noticia_foto_path : "https://via.placeholder.com/150"}/>
                            <h3>{e.titulo}</h3>
                        </a>
                    )}
                </div>
            </section>
        </section>
    </>
    );
}
export default NoticiaUni;
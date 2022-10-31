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
import Comentario from './Template/Comentario/Comentario';
import moment from 'moment';
import axios from 'axios';
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
   
    const styleCards:CSSvars = {
        "--tituloTopo": tituloHeight + "px",
        "--sugestoesTopo": sugestoesHeight + "px"
    }
    const imagens = [mario, sonic, luigi, tails, knuckles, bowser, shadow];
    function randimg(){
        return imagens[Math.floor(Math.random() * imagens.length)];
    }
    async function criarComentario(e){
        e.preventDefault();
        const form = e.target;
        const data:any = new FormData(form);
        //const logar = Object.fromEntries(data);
        //console.log(logar);
        axios.post('/api/newComentario', data).then((res)=>{

        })

        form.reset();
    }
    return(
    <>
        <section className='cabecalho'>
            <h1>Noticia</h1>
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
                        <form className="adicionarComentario" onSubmit={criarComentario}>
                            <h3>Adicionar Comentario</h3>
                            <textarea name='texto'></textarea>
                            <button>Enviar</button>
                        </form>
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
                        {noticia.sugestoes.map((e, i) => 
                            <a key={i} className="cardNoticia hoverMenor cardNoticiaSugestao" href={`/noticia/${e.id}`}>
                                <img src={e.fotos[0].noticia_foto_patch}></img>
                                <h3>{e.titulo}</h3>
                            </a>
                        )}
                    </Container>
                </section>
            </section>
            <section className='sugestoesNoticia' style={styleCards}>
                <h2 ref={sugestoesRef}>Sugestões</h2>
                <div className='sugestoesNoticiaConjunto'>           
                    {noticia.sugestoes.map((e, i) => 
                        <a key={i} className="cardNoticia hoverMenor cardNoticiaSugestao" href={`/noticia/${e.id}`}>
                            <img src={e.fotos[0].noticia_foto_patch}></img>
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
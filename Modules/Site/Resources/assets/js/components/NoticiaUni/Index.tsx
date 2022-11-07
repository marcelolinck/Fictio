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
        axios.post('/api/newComentario', data).then((res)=>{

        })

        form.reset();
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
                    <div className='conteudoTexto w-full px-2 text-base'>
                        <p>{noticia.texto}</p>
                    </div>

                    <div className="comentarios w-full">
                        <h2 className={st.h2Comentarios}>Comentários</h2>
                        <form className="adicionarComentario flex flex-col" onSubmit={criarComentario}>
                            <h3 className="mb-0">Adicionar Comentario</h3>
                            <textarea name='texto' className='w-full border border-black p-2 h-36'>
                            </textarea>
                            <button className={st.botao}>
                                <span>Enviar</span>
                            </button>
                        </form>
                        <ul className={st.listaComentarios}>
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


                    <Container columns={'auto'} className="cardsAbaixoResponsivo justify-center">
                        {noticia.sugestoes.map((e, i) => 
                            <a key={i} className="cardNoticia hoverMenor cardNoticiaSugestao h-auto" href={`/noticia/${e.id}`}>
                                <img src={e.fotos[0] && e.fotos[0].noticia_foto_patch}/>
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
                            <img src={e.fotos[0]&&e.fotos[0].noticia_foto_patch}/>
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
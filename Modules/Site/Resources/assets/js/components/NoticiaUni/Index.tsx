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

function NoticiaUni(){
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
    return(
    <>
        <section className='cabecalho'>
            <h1>Categoria</h1>
        </section>
        <section className="wrapperNoticiaUni">
            <section className='wrapperNoticiaUniMain'>
                <section className='tituloWrapper' ref={tituloRef} >
                    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae, natus!</h1>
                </section>
                <section className='conteudoNoticia'>
                    <div className="imgWrapper">
                        <img src={imgTeste}/>
                    </div>
                    <div className='conteudoTexto'>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odit blanditiis iure magni obcaecati sunt animi voluptatibus sint placeat sit quidem ab, vitae, aut quae expedita recusandae? Harum voluptate ducimus iure reprehenderit nihil obcaecati fugit soluta! Inventore quibusdam adipisci, fugiat repudiandae esse accusamus aperiam fuga dolores eaque mollitia natus quas doloribus, tempore aliquid sequi expedita dolore doloremque vitae temporibus. Perspiciatis est cupiditate quo necessitatibus veritatis, sit recusandae, nam qui quaerat aut molestiae esse reprehenderit nemo excepturi quisquam culpa vitae harum distinctio aliquam atque sequi nesciunt assumenda dolorem minima. Corporis blanditiis id laudantium! Maxime commodi eum quod voluptatem nobis minus voluptas quidem, nulla expedita? Dolorem tenetur at sequi consectetur, est quisquam quo, non repellat obcaecati temporibus blanditiis officia. Dicta dolores ducimus eos officia accusantium velit? Exercitationem, quidem? Perferendis praesentium voluptatem eum, quis necessitatibus repellat repellendus facilis, illo harum saepe distinctio porro. Magni beatae minima, nemo corporis asperiores porro nulla quas reiciendis voluptatum! Harum iure, consequatur qui officia ipsam id! Doloremque, placeat! Molestias mollitia accusantium ea excepturi, officiis atque beatae. Repudiandae quaerat debitis porro perspiciatis inventore quas pariatur ipsa harum, incidunt quo nulla voluptatum possimus voluptate et ex adipisci. Aliquid, vel officiis dolor porro quod minima illo vero quibusdam! Deleniti expedita dicta voluptatum accusamus magnam fugiat rerum aut illum provident quisquam, suscipit autem ad! Doloribus nobis iste qui quisquam non dolores natus nam reiciendis quis placeat officiis quam, itaque perferendis maiores, in, voluptate deserunt vero esse numquam illo minus laboriosam tenetur. Iste voluptate temporibus voluptas quasi eligendi consequuntur ipsam optio corrupti sint ut assumenda possimus harum, fuga eaque adipisci incidunt. Consequuntur sapiente dignissimos optio asperiores alias libero illo modi eius quos rerum impedit nihil nostrum ex doloribus ut iure fugiat est distinctio, ipsum quisquam ad eveniet sint. Voluptatem, minima debitis ipsum magni iure enim saepe suscipit asperiores et, fugiat adipisci numquam ducimus cum veniam id quisquam fuga dolorum, voluptate similique quo. Laborum tenetur, consequuntur id ullam maxime cupiditate temporibus saepe! Vel consequuntur fugit eius! Tempora velit odit ipsa quasi dolorum nobis id repudiandae necessitatibus doloribus consectetur ullam voluptate dicta, provident iste dignissimos atque dolores alias laboriosam nostrum? Alias deleniti et, error perferendis tempore minus sed iste, facere soluta, accusamus quae sapiente sunt tenetur. Corrupti unde natus cum eos, repellat quos dolores. Autem, assumenda! Ipsam nisi vero officia consequuntur eaque accusantium animi eos excepturi esse laboriosam deserunt voluptate temporibus amet, sint aperiam possimus. Eum maiores debitis provident aut dolore eaque fugiat velit hic quibusdam saepe maxime, incidunt distinctio odio libero sunt eveniet laudantium pariatur blanditiis soluta corrupti obcaecati temporibus repellendus tempora tempore! Dignissimos nihil facere ad possimus nisi ea placeat laboriosam quae pariatur magni et, iusto sed, laborum fugit, aliquam alias corrupti tempora quas molestiae. Quos nam ullam officia fugiat repellat voluptatem ab maiores et nostrum, optio ex praesentium distinctio nisi laboriosam iure sint in facere possimus repellendus illo sunt minima iste impedit. Harum eligendi maiores culpa laudantium! Numquam minima, officia eligendi odio aliquid debitis omnis ut id ipsum corrupti, nobis sit accusantium, iusto dolorum voluptatibus? Error magni similique magnam nemo laborum, ratione eius!</p>
                    </div>

                    <div className="comentarios">
                        <h2>Comentários</h2>
                        <ul className="listaComentarios">
                            {[...Array(15)].map((_,i) => 
                                <Comentario
                                    key={i}
                                    cod={i}
                                    nome={lorem.generateWords(2)}
                                    texto={lorem.generateSentences(3)}
                                    likes={Math.floor(Math.random() * 100)}
                                    img={randimg()}
                                    data={randomDate()}
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
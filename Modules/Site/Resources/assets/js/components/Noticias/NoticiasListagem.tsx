import React, {useState,useEffect} from 'react'
import {Container, Child } from 'teapotcss';
import axios from 'axios'
import './styles.scss'
function NoticiasListagem() {
    const [data, setData] = useState([]);
    const [fullData, setFullData] = useState([]);
    const [busca, setBusca] = useState('');
    const [perPages, setPerPages] = useState(1);
    async function chamadoAPI() {
        axios.get(`/api/noticias`, {
            params: {
                perPage: perPages * 10,
                search: busca
            }
        })
        .then(({data}) => {
            setFullData(data)
            setData(data.data)
        })
        .catch(console.log)
        
    }
    function avancarPag(){
        // @ts-ignore
        if(perPages + 1 <= fullData.last_page){
            setPerPages(perPages + 1)
        }
    }
    useEffect(() => {
        chamadoAPI()
    },[busca, perPages])
    async function handleSubmit(e){
        e.preventDefault();
        await chamadoAPI();
        return false;
    }
    
    return (

        <section className='noticiasSection'>
            <section className="cabecalho">
                <h1>Noticias</h1>
            </section>
            <div className="campoPesquisar">
                <form onSubmit={handleSubmit}>
                    <input type="search" name="pesquisa" id="" placeholder='Pesquise Aqui' value={busca} onChange={({target})=>{setBusca(target.value)}}/>
                </form>
                
            </div>
            <Container 
                columns={'auto'}
                gap='9px'
                className="cardsNoticia container items-center justify-center mx-auto"
            >
                {data?.map((noticia, index) =>
                    <Child key={index}>
                        <a className="cardNoticia"  href={`/noticia/1`}>
                            <img src={noticia.fotos[0] ? noticia.fotos[0].noticia_foto_path:'https://picsum.photos/200/300'}/>
                            <h3>{noticia.titulo}</h3>
                        </a>
                    </Child>
                )}
            </Container>
            <div className="w-full flex items-center p-2">
                {/* @ts-ignore */}
                {fullData?.last_page > 1 && fullData?.last_page > perPages && 
                    <button onClick={avancarPag} className="mx-auto bg-neutral-200 rounded p-2 hover:bg-neutral-300 transition-colors">Carregar Mais</button>
                }

            </div>
            

           
        </section>
    )
}
export default NoticiasListagem
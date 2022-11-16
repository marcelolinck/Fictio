import React from 'react'
import {Container, Child } from 'teapotcss';
import './styles.scss'
function NoticiasListagem() {
  return (
    <section className='noticiasSection'>
        <section className="cabecalho">
            <h1>Noticias</h1>
        </section>
        <div className="campoPesquisar">
            <form>
                <input type="search" name="pesquisa" id="" placeholder='Pesquise Aqui'/>
            </form>
            
        </div>
        <Container 
            columns={'auto'}
            gap='10px'
            className="conteudoDestaque container items-center justify-center mx-auto"
        >
            {Array.from({length:10}).map((noticia, index) =>
                <Child key={index}>
                    <a className="cardNoticia hoverMargin"  href={`/noticia/1}`}>
                        <img src="https://picsum.photos/200/300"></img>
                        <h3>lorem, ipsum</h3>
                    </a>
                </Child>
            )}
        </Container>
        
    </section>
  )
}
export default NoticiasListagem
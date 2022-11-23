import React from 'react';
import './styles.scss';
function Sobre() {
  return (
    <section className='sobreSection'>
        <section className="cabecalho">
            <h1>Sobre</h1>
        </section>
        <section className="conteudo">
            <h2>Fictio, o seu site de noticias falsas</h2>
            <p>
                Fictio é um site de noticias falsas, criado pelos alunos <b>João Victor Silva Matheus</b> e <b>Marcelo Alves Linck</b> do centro universitário <b>Unifasipe</b> 
                para fins de estudo. A idéia do site surgiu quase que como uma forma de comédia para os alunos, mas acabou se tornando um projeto sério.
                Sendo posteriormente usado como um projeto interdisciplinar, que, na instituição que nós estudamos, é um projeto feito todos os semestres posteriores ao primeiro, 
                que consiste em fazer um projeto com o conteúdo aprendido ao longo do curso, e então, documentar o mesmo e apresentar para os professores.
            </p>
            <p>
                A disciplina de projeto interdisciplinar é, normalmente, uma disciplina individual, esse semestre, porém, foi feita em dupla.
                O projeto Fictio consistiu em fazer um site, usando primariamente o <b>React</b> para o front-end, e o <b>Laravel</b> para o back-end.
                A idéia do Fictio é de postar noticias falsas e normalmente absurdas que foram escritas como se fossem verdadeiras por fins cômicos.
                É totalmente contra a idéia inicial do projeto de realmente espalhar desinformação, o real objetivo é de fazer com que as pessoas deem uma boa risada
                com as noticias postadas no site.
            </p>
            <p>
                O projeto é open-source, ou seja, qualquer pessoa pode clonar o projeto e fazer o que quiser com ele, seja para fins de estudo, ou para fins comerciais.
                O repositório do projeto está em: <a href="https://github.com/marcelolinck/Fictio" target='_blank'>https://github.com/marcelolinck/Fictio</a>
            </p>
            <h3 className='mt-auto'>Boas risadas</h3>
        </section>
    </section>
  );
}
export default Sobre;
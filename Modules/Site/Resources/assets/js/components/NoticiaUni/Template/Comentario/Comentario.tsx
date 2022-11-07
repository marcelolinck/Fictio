import React, {useState} from 'react'
import {LikeOutlined, WarningOutlined, CalendarOutlined} from '@ant-design/icons';
import moment from 'moment';

import './styles.scss';
import st from './classes'

interface props extends React.HTMLAttributes<HTMLLIElement>{
    nome: string,
    img: string,
    texto: string,
    likes?: number,
    cod: number,
    data: string,
}
function Comentario({nome, img, texto, likes, cod, data, ...props}:props){
    return(
        <li className={"comentario" + st.comentario} {...props}>
            <div className={"esquerda "+st.esquerda}>
                <img src={img}/>
            </div>
            <div className={st.direita}>
                <h4 className='mb-4'>{nome}</h4>
                <p className='mb-0'>{texto}</p>
                <div className={"botoes "+st.botao}>
                    <div className="mr-auto flex items-center gap-[5px]">
                        <CalendarOutlined />
                        <span>{data}</span>
                    </div>
                    <button className={st.botao + st.denuncia}>
                        <WarningOutlined />
                        <span>Denunciar</span>
                    </button>
                </div>
            </div>
        </li>
    )
}
export default Comentario
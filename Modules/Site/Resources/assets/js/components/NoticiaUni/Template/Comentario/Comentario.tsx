import React, {useState} from 'react'
import {LikeOutlined, WarningOutlined, CalendarOutlined} from '@ant-design/icons';
import moment from 'moment';

import './styles.scss';
// @ts-ignore
import styles from './styles.module.scss';

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
        <li className="comentario" {...props}>
            <div className="esquerda">
                <img src={img}/>
            </div>
            <div className="direita">
                <h4>{nome}</h4>
                <p>{texto}</p>
                <div className="botoes">
                    <div className="dataCampo">
                        <CalendarOutlined />
                        <span>{data}</span>
                    </div>
                    <button className="btnDenunciar">
                        <WarningOutlined />
                        <span>Denunciar</span>
                    </button>
                    {
                        likes && 
                        <button className="btnLike">
                            <LikeOutlined />
                            <span>{likes}</span>
                        </button>
                    }
                </div>
            </div>
        </li>
    )
}
export default Comentario
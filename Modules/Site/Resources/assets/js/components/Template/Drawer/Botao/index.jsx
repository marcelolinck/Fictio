/* import link from router */
//import {Link} from 'react-router-dom';
//import { BotaoWrapper } from './Styles.ts';
import './styles.scss'
function Botao({nome, link}){
    return(
        <button className="btnWrapper">
            <a href={link}>
                {nome}
            </a>
        </button>
    )
}
export default Botao;
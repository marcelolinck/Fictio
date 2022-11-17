/* import link from router */
//import {Link} from 'react-router-dom';
//import { BotaoWrapper } from './Styles.ts';
import './styles.scss'
function Botao({nome, link, className,target, ...props}){
    return(
        <button className={"btnWrapper "+className} {...props}>
            <a href={link} target={target}>
                {nome}
            </a>
        </button>
    )
}
export default Botao;
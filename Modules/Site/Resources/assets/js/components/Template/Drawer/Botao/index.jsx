/* import link from router */
import {Link} from 'react-router-dom';
import { BotaoWrapper } from './Styles.ts';
function Botao({nome, link}){
    return(
        <BotaoWrapper>
            <a href={link}>
                {nome}
            </a>
        </BotaoWrapper>
    )
}
export default Botao;
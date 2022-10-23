/* import link from router */
import {Link} from 'react-router-dom';
import { BotaoWrapper } from './Styles.ts';
function Botao({nome, link}){
    return(
        <BotaoWrapper>
            <Link to={link}>
                {nome}
            </Link>
        </BotaoWrapper>
    )
}
export default Botao;
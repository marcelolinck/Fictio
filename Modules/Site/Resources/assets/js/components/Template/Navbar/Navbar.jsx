//import { Navbarra } from './Styles.js';
import { useState, useEffect } from 'react';
import { SearchOutlined, MenuOutlined} from '@ant-design/icons';
import { Input } from 'antd';
import CaixaBuscas from './Template/CaixaBuscas';
import axios from 'axios'
import st from './classes'
import './styles.scss'
function Navbar({setDrawer}){
    const [scroll, setScroll] = useState(0);
    useEffect(() => {
        /* if scroll is  not on top, alert */
        window.onscroll = function() {
            setScroll(window.pageYOffset);
        };
        
    })
    const [ areaPesquisa, setAreaPesquisa ] = useState(false);
    const [ animacaoMorrer, setAnimacaoMorrer ] = useState(false);
    function matarPesquisa(){
        setAnimacaoMorrer(true);
            setTimeout(() => {
                setAnimacaoMorrer(false);
                setAreaPesquisa(false);
            }, 300);
    }
    function botaoPesquisar(e){
        if(!areaPesquisa){
            setAreaPesquisa(true);
        }
        else{
            matarPesquisa()
        }
    }
    function minMax(num, min, max){
        if(num > min) return min;
        if(num < max) return max;
        return num 
    }

    const styles = {
        "--scroll": scroll,
        "--tamanho": minMax(scroll, 55, 65)+"px",
        "--blur": scroll > 55 ? '0px' : '5px',
        "--corFundo": scroll > 55 ? 'rgba(0,0,0,0.9)' : 'black',
        "--fontSize": "calc(var(--tamanho) - 20px)"
    }
    const [ busca, setBusca ] = useState('');
    const [ resultados, setResultados ] = useState([]);
    async function handleChange({target}){
        setBusca(target.value);
        if(target.value.length > 0){
            const res = await axios.get('/api/busca/', {
                params: {
                    busca: target.value
                }
            })
            setResultados(res.data)
        }
    }
    return(
            <nav scroll={scroll} className={st.navBar} style={styles} >
                <nav className={st.nav}>
                    <button className={st.btnUtilidades} onClick={()=>setDrawer(true)}>
                        <MenuOutlined />
                    </button>
                    <a href="/" className='logoTipo' aria-label='logo'>Fictio</a>
                    <button className={st.btnUtilidades} onClick={botaoPesquisar}>
                        <SearchOutlined id="btnPesquisar"/>
                    </button>
                    {areaPesquisa &&
                        <div id='wrapperInput' className={`wrapperInput ${st.wrapperInput} ${animacaoMorrer?'animacaoMorrerInput':''}`}>
                            <input placeholder='Pesquisar' id='inputPesquisar' value={busca} onChange={handleChange} />
                        </div>
                    }
                    {(areaPesquisa && busca.length > 0) &&
                        <CaixaBuscas resultados={resultados} />
                    }
                </nav>
            </nav>
    )
}
export default Navbar;
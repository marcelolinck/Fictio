//import { Navbarra } from './Styles.js';
import { useState, useEffect } from 'react';
import { SearchOutlined, MenuOutlined} from '@ant-design/icons';
import { Input } from 'antd';
import './styles.scss'
function Navbar({setDrawer}){
    const [scroll, setScroll] = useState(0);
    useEffect(() => {
        /* if scroll is  not on top, alert */
        window.onscroll = function() {
            setScroll(window.pageYOffset);
            matarPesquisa();
        };
        /* onclick, check if the click is on wrapperInput, if not, alert */
        
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
        "--fontSize": "calc(var(--tamanho) - 5px)"

    }
        
    
/*     const styles2 = {
        "--scroll": scroll,
        "--tamanho": minMax(scroll, 55, 65)}+"px"
        
        
    } */
    return(
            <nav scroll={scroll} className="navBar" style={styles} >
                <nav>
                    <button className='btnAbrirGaveta' onClick={()=>setDrawer(true)}>
                        <MenuOutlined />
                    </button>
                    <a href="/" className='logoTipo' aria-label='logo'>Fictio</a>
                    <button className='btnPesquisar' onClick={botaoPesquisar}>
                        <SearchOutlined id="btnPesquisar"/>
                    </button>
                    {areaPesquisa &&
                        <div id='wrapperInput' className={`wrapperInput ${animacaoMorrer?'animacaoMorrerInput':''}`}>
                            <Input placeholder='Pesquisar' id='inputPesquisar'/>
                        </div>
                    }
                </nav>
            </nav>
    )
}
export default Navbar;
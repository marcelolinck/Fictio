import { Navbarra } from './Styles.js';
import { useState, useEffect } from 'react';
import { SearchOutlined, MenuOutlined} from '@ant-design/icons';
import { Input } from 'antd';
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
        /* else, wait for animation to end, then set it to false */
        else{
            matarPesquisa()
        }
    }
    return(
        <>
            <Navbarra scroll={scroll}>
                <nav>
                    <button className='btnAbrirGaveta' onClick={()=>setDrawer(true)}>
                        <MenuOutlined />
                    </button>
                    <div className='logoTipo' aria-label='logo'>Fictio</div>
                    <button className='btnPesquisar' onClick={botaoPesquisar}>
                        <SearchOutlined id="btnPesquisar"/>
                    </button>
                    {areaPesquisa &&
                        <div id='wrapperInput' className={`wrapperInput ${animacaoMorrer?'animacaoMorrerInput':''}`}>
                            <Input placeholder='Pesquisar' id='inputPesquisar'/>
                        </div>
                    }
                </nav>
            </Navbarra>
        </>
    )
}
export default Navbar;
import Navbar from './components/Navbar/Navbar.jsx';
import Conteudo from './components/Conteudo/Index.jsx';
import Drawer from './components/Drawer/Index.jsx';
import {useState, useEffect} from 'react';
function Raiz(){
    const [drawerState, setDrawerState] = useState(false);
    return(
        <Conteudo>
            <Drawer aberto={drawerState} setDrawer={setDrawerState}/>
            <Navbar setDrawer={setDrawerState}/>
            <div style={{height:'140vh'}}></div>
            
        </Conteudo>
        
    )
}
export default Raiz;
import './globalstyles.scss';
import Navbar from './components/Template/Navbar/Navbar.jsx';
import Conteudo from './components/Template/Conteudo/Index.jsx';
import Drawer from './components/Template/Drawer/Index.jsx';
import Footer from './components/Template/Footer/Index.jsx';
import {useState, useEffect} from 'react';
import Home from './components/Home/Index';
import NoticiaUni from './components/NoticiaUni/Index.tsx';
/* react router stuff */
import {
    BrowserRouter,
    Routes,
    Route,
  } from "react-router-dom";
function Raiz(){
    const [drawerState, setDrawerState] = useState(false);
    return(
        <Conteudo>
            <BrowserRouter>
                <Drawer aberto={drawerState} setDrawer={setDrawerState}/>
                <Navbar setDrawer={setDrawerState}/>
                    <Routes>
                        <Route path='/' exact element={<Home/>}/>
                        <Route path='/home' element={<Home/>}/>
                        <Route path='/noticiaUni' element={<NoticiaUni/>}/>
                    </Routes>
                {/* <div style={{height:'140vh'}}></div> */}
                <Footer />
            </BrowserRouter>

            
        </Conteudo>
        
    )
}
export default Raiz;
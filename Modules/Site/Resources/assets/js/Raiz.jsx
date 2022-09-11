import Navbar from './components/Template/Navbar/Navbar.jsx';
import Conteudo from './components/Template/Conteudo/Index.jsx';
import Drawer from './components/Template/Drawer/Index.jsx';
import Footer from './components/Template/Footer/Index.jsx';
import {useState, useEffect} from 'react';
import Home from './components/Home/Index.jsx';
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
            <Drawer aberto={drawerState} setDrawer={setDrawerState}/>
            <Navbar setDrawer={setDrawerState}/>
            {/* <div style={{height:'140vh'}}></div> */}
            <BrowserRouter>
                <Routes>
                    <Route path='/' exact component={<Home/>}/>
                </Routes>
            </BrowserRouter>

            <Footer />
            
        </Conteudo>
        
    )
}
export default Raiz;
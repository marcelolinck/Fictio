import React, {useState} from 'react'
import Navbar from  '../Template/Navbar/Navbar'
import Drawer from '../Template/Drawer/Index.jsx';
import Footer from '../Template/Footer/Index.jsx';

function Layout({children, ...props}){
    const [drawerState, setDrawerState] = useState(false);
    return(
    <>
        <Drawer aberto={drawerState} setDrawer={setDrawerState}/>
        <Navbar setDrawer={setDrawerState}/>
            {children}
        <Footer/>
    </>
    )
}
export default Layout
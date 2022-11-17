import { Button, Drawer} from 'antd';
import { ConfigProvider } from 'antd';

import React, { useState, useEffect } from 'react';
/* import antd css */
/* import 'antd/dist/antd.css'; */
import Botao from './Botao/index.jsx';
import './styles.scss';
import './drawer.scss';

const Gaveta = ({aberto, setDrawer}) => {
  const[tela, setTela] = useState(0);
  useEffect(() => {
    setTela(window.screen.width);
    window.onresize = () => {
      setTela(window.screen.width);
    };
  }, []);

  const onClose = () => {
    setDrawer(false);
  };
  return (
    <ConfigProvider>
      <Drawer
        title="Menu"
        placement={'left'}
        closable={true}
        onClose={onClose}
        open={aberto}
        key={'left'}
        width={tela>=400?377:tela-20}
        bodyStyle={{padding:0, backgroundColor:'rgb(25, 25, 25)', display:"flex", flexDirection:"column", overflow:"hidden"}}
        headerStyle={{backgroundColor:'rgb(25, 25, 25)', color:'white'}}
        className='gaveta'
      >
        <Botao nome="Home" link="/" />
        <Botao nome="Noticias" link="/noticias" />
        <Botao nome="Sobre" link="/sobre" />
        <Botao nome="Github" link="https://github.com/marcelolinck/Fictio" className="mt-auto" target="_blank"/>
        {/* <Botao nome="Noticia unica" link="/noticiaUni" /> */}
      </Drawer>
    </ConfigProvider>
  );
};

export default Gaveta;
import { Button, Drawer} from 'antd';
import { ConfigProvider } from 'antd';

import React, { useState, useEffect } from 'react';
/* import antd css */
import 'antd/dist/antd.css';
import Botao from './Botao/index.jsx';
import './styles.scss';

const Gaveta = ({aberto, setDrawer}) => {
  const[tela, setTela] = useState(0);
  useEffect(() => {
    /* onScreen resize and onload, setTeala as width of screen */
    window.onload = () => {
      setTela(window.screen.width);
    };
    window.onresize = () => {
      setTela(window.screen.width);
    };
  });


  const showDrawer = () => {
    setDrawer(true);
  };

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
        bodyStyle={{padding:0, backgroundColor:'rgb(25, 25, 25)'}}
        headerStyle={{backgroundColor:'rgb(25, 25, 25)', color:'white'}}
        className='gaveta'
        
        
      >
        <Botao nome="Home" link="/" />
        <Botao nome="Noticias" link="/" />
        <Botao nome="Sobre" link="/" />
        <Botao nome="Noticia unica" link="/noticiaUni" />
      </Drawer>
    </ConfigProvider>
  );
};

export default Gaveta;
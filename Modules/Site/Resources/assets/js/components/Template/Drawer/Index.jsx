import { Button, Drawer} from 'antd';
import React, { useState, useEffect } from 'react';
/* import antd css */
import 'antd/dist/antd.css';
import Botao from './Botao/index.jsx';

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
    <>
      <Drawer
        title="Menu"
        placement={'left'}
        closable={true}
        onClose={onClose}
        open={aberto}
        key={'left'}
        width={tela>=400?378:tela-20}
        bodyStyle={{padding:0}}
        /* extra={
          <Button type="primary" onClick={onClose}>
            Fechar
          </Button>
        } */
      >
        <Botao nome="Home" link="/" />
        <Botao nome="Noticias" link="/" />
        <Botao nome="Sobre" link="/" />
        <Botao nome="Noticia unica" link="/noticiaUni" />
        {/* <p>Conteudo maneiro</p>
        <p>Conteudo maneiro</p>
        <p>Conteudo maneiro</p>
        <p>Conteudo maneiro</p> */}
      </Drawer>
    </>
  );
};

export default Gaveta;
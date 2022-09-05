import { Button, Drawer} from 'antd';
import React, { useState, useEffect } from 'react';
/* import antd css */
import 'antd/dist/antd.css';

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
        visible={aberto}
        key={'left'}
        width={tela>=400?378:tela-20}
        /* extra={
          <Button type="primary" onClick={onClose}>
            Fechar
          </Button>
        } */
      >
        <p>Conteudo maneiro</p>
        <p>Conteudo maneiro</p>
        <p>Conteudo maneiro</p>
        <p>Conteudo maneiro</p>
      </Drawer>
    </>
  );
};

export default Gaveta;
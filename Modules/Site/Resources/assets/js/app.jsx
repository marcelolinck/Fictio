/* import './bootstrap'; */
import React from 'react';
import { createRoot } from 'react-dom/client'
import Raiz from './Raiz';


// o elemento container é o elemento que vai receber o componente
// seu valor inicial é nulo (falsy)
// quando o documento carregar, ele vai se tornar a raiz, e renderizar o componente <App />
// depois, a cada mudança nos arquivos, ele iriá re-renderizar, ao invés de se tornar a raiz novamente
let container = null;
const elementoRaiz = document.getElementById('root')
document.addEventListener('DOMContentLoaded', () => {
  if (!container) {
    container = elementoRaiz;
    const root = createRoot(container)
    root.render(
        <Raiz />
    );
  }
});

    

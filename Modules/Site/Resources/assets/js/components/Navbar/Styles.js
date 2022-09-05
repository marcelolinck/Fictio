import styled from 'styled-components';

function minMax(num, min, max){
    if(num > min) return min;
    if(num < max) return max;
    return num
 
    
}
export const Navbarra = styled.header`
    --tamanho: ${props => minMax(props.scroll, 55, 65)}px;
    --corFundo: ${props => props.scroll > 55 ? 'rgba(0,0,0,0.9)' : 'black'};
    --blur: ${props => props.scroll > 55 ? '0px' : '5px'};
    --tempoAnimacao: 0.2s;
    will-change: backdrop-filter;
    backdrop-filter: blur(var(--blur));
    background-color:var(--corFundo);
    display: flex;
    align-items: center;
    width: 100%;
    height: var(--tamanho);
    transition: 
        height var(--tempoAnimacao) ease-in-out, 
        background-color var(--tempoAnimacao) ease-in-out,
        backdrop-filter var(--tempoAnimacao) ease-in-out;
        ;
    position: fixed;
    top: 0;
    nav{
        width: 100%;
        display: flex;
        align-items: center;
        padding: 10px;
        .logoTipo{
            color: white;
            font-size: ${props => props.ativo ? "calc(var(--tamanho) - 25px)" : 'calc(var(--tamanho) - 5px)'};
            transition: font-size var(--tempoAnimacao) ease-in-out;
            margin-left: auto;
            margin-right: auto;
        }
        .btnAbrirGaveta{
            background-color:transparent;
            height:35px;
            width:35px;
            cursor: pointer;
            border:none;
            outline:1px solid transparent;
            svg{
                color: white;
                width:25px;
                height:25px;
            }
        }
        .btnPesquisar{
            background-color:transparent;
            height:35px;
            width:35px;
            border:none;
            outline:1px solid transparent;
            cursor: pointer;
            svg{
                color: white;
                width:25px;
                height:25px;
            }
        }
        .wrapperInput{
            display: flex;
            height:100%;
            align-items: center;
            position:absolute;
            right:50px;
            @keyframes slideIn{
                from{
                    transform: translateX(calc(100% + 50px));
                }
                to{
                    transform: translateX(0%);
                }
            }
            animation: slideIn var(--tempoAnimacao) forwards;
        }
        .animacaoMorrerInput{
            @keyframes slideOut{
                from{
                    transform: translateX(0%);
                }
                to{
                    transform: translateX(calc(100% + 50px));
                }
            }
            animation: slideOut var(--tempoAnimacao) forwards;
        }
    }
    `
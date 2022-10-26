import styled from 'styled-components';

export const ConteudoWrapper = styled.section`
    min-height: 100vh;
    max-width: 100vw;
    /* overflow-y: scroll; */
    padding-top: 60px;
    display: flex;
    flex-direction: column;
    
    ::-webkit-scrollbar {
        width: 6px;
    }
    
    /* Track */
    ::-webkit-scrollbar-track {
        background: #000000;
    }
    
    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: rgb(133, 133, 133);
    }
    
    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
`
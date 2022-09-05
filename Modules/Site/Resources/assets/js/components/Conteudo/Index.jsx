import { ConteudoWrapper } from "./Styles";
function Conteudo({ children }) {
    return (
        <ConteudoWrapper>
            {children}
        </ConteudoWrapper>
    );
}
export default Conteudo;

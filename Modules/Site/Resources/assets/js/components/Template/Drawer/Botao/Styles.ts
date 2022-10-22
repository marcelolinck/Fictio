import styled from "styled-components";
export const BotaoWrapper = styled.button`
    width: 100%;
    height: 40px;
    position: relative;
    background-color: #1f1f1f;

    border:0;
    border-bottom: 1px solid #ffffff14;
    border-top: 1px solid #ffffff14;
    transition: background-color 0.2s;
    &:after{
        content: "";
        transition: background-color 0.3s ease;
        position: absolute;
        height: 100%;
        width: 5px;
        right: 0;
        top: 0;
        background-color:transparent
    }
    &:hover{
        background-color: rgb(36, 36, 36);
        &::after{
            background-color: #ffffffff;
        }
    }
    a{
        display: flex;
        align-items: center;
        justify-content: flex-start;
        height: 100%;
        width: 100%;
        padding: 5px;
        color: white;
        &:hover{
            color: white;
            text-decoration: none;
        }
    }
`
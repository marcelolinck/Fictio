interface classes {
    [key: string]: string;
}
const classes: classes = {
    botao: `
        w-20 h-8 p-2 ml-auto mb-2 bg-black text-white flex justify-center items-center
        hover:bg-slate-800 transition-colors duration-300 rounded
    `,
    conteudoNoticia: "conteudoNoticia w-full gap-[40px] flex flex-col justify-center items-center [&>*]:w-full",


}
export default classes;
import React, { useEffect } from "react";
function CaixaBuscas({resultados}) {
    //function to get a random hash
    useEffect(()=>{
        console.log(resultados);
    },[])

    function randHash() {
        return Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);
    }
    return (
        <div className="p-2 gap-2 rounded-b-md flex h-60 flex-col w-96 -xs:w-full -xs:h-96 absolute caixaBuscas bg-neutral-900 bg-opacity-90  overflow-y-auto overflow-x-hidden [&>*]:flex-shrink-0">
            {resultados.length > 0 ?
                <>
                    {resultados.map((noticia, i) =>
                        <a href={"/noticia/"+noticia.id} key={randHash()} className="cardBusca rounded-md w-full h-20 bg-neutral-800 flex hover:opacity-100 opacity-90 transition-all duration-50 cursor-pointer">
                            <div className="imgWrapper w-1/3 h-full bg-neutral-600 flex justify-center items-center">
                                <img className="w-full h-full object-cover" src={noticia.fotos[0]?noticia.fotos[0].noticia_foto_path:''}/>
                            </div>
                            <div className="infoWrapper w-2/3 h-full flex flex-col justify-center items-start p-2  [&>*]:text-white">
                                <p className="titulo text-md font-bold">{noticia.titulo.slice(0,50)}{noticia.titulo.length > 50 && "..."}</p>
                                

                                <p className="text-sm">{noticia.corpo}</p>
                            </div>
                        </a>
                    )}
                    {resultados.length >= 5 &&
                        <a href="" className="verMais w-full p-2 text-white bg-black text-center hover:bg-neutral-900">
                            Ver mais
                        </a>
                    }
                </>
                :
                <div className="flex justify-center items-center w-full h-full">
                    <h3 className="text-white text-lg">Nenhuma notícia encontrada</h3>
                </div>
            }
        </div>
    );
}
export default CaixaBuscas;
<style>
    .display-vitrine-categoria{
        display: grid;
        width: 1200px;
        height: 552px;
        margin: 40px auto;
        overflow: hidden;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-template-rows: 50px 600px 600px;
        grid-template-areas: "title title title title" "banner banner vitrine vitrine" "banner banner vitrine vitrine";
    }
    .display-vitrine-categoria .titulo-vitrine{
        color: #6abd45;
        font-size: 32px;
        width: 100%;
        height: 50px;
        margin: 0px;
        grid-area: title;
    }
    .display-vitrine-categoria .botao{
        display: block;
        background-color: #155c3c;
        color: #fff;
        width: 100px;
        height: 25px;
        line-height: 25px;
        margin: 0 auto;
        text-decoration: none;
        text-align: center;
        border-radius: 5px;
    }
    .display-vitrine-categoria .botao:hover{
        background-color: #10462e;
        transform: scale(1.1);
    }
    .display-vitrine-categoria .banner{
        position: relative;
        overflow: hidden;
        grid-area: banner;
        height: 500px;
    }
    .display-vitrine-categoria .banner img{
        width: 100%;
        transition: .2s;
    }
    .display-vitrine-categoria .banner img:hover{
        transform: scale(1.05);
        opacity: .9;
    }
    .display-vitrine-categoria .banner .botao{
        position: absolute;
        bottom: 20px;
        margin: 0 auto;
        left: 0;
        right: 0;
    }
    .display-vitrine-categoria .display-produtos{
        border: 1px solid #00be36;
        grid-area: vitrine;
        overflow: hidden;
        height: 498px;
    }
    .display-vitrine-categoria .product-box{
        text-align: center;
        padding: 10px;
    }
    .display-vitrine-categoria a{
        display: block;
        margin: 0px;
        text-decoration: none;
    }
    .display-vitrine-categoria .product-box img{
        width: 100%;
        overflow: hidden;
        transition: .2s;
    }
    .display-vitrine-categoria .product-box img:hover{
        opacity: .8;
        transform: scale(1.1);
    }
    .display-vitrine-categoria .product-box .title{
        position: relative;
        z-index: 10;
        margin: 0px;
        font-size: 16px;
        color: #333;
    }
    .display-vitrine-categoria .product-box .title:hover{
        color: #6abd45;
    }
    .display-vitrine-categoria .product-box .price{
        color: #00be36;
        margin: 10px;
        font-size: 18px;
        font-weight: bold;
        white-space: nowrap;
    }
    .display-vitrine-categoria .full-product .product-image{
        width: auto;
        height: 350px;
    }
    .display-vitrine-categoria .half-product{
        display: grid;
        grid-template-areas: "a b";
        grid-template-columns: auto auto;
    }
    .display-vitrine-categoria .half-product .product-image{
        width: auto;
        height: 350px;
    }
    .display-vitrine-categoria .smalls-and-large{
        display: grid;
        grid-template-areas: "a b";
        grid-template-columns: auto auto;
    }
    .display-vitrine-categoria .smalls-and-large .product-box:first-child{
        grid-area: a;
        grid-row: 1 / span 2;
    }
    .display-vitrine-categoria .smalls-and-large .product-box:first-child .product-image{
        width: auto;
        height: 350px;
    }
    .display-vitrine-categoria .smalls-and-large .product-box{
        grid-area: b;
        grid-row: 1;
    }
    .display-vitrine-categoria .smalls-and-large .product-box:last-child{
        grid-row: 2;
    }
    .display-vitrine-categoria .smalls-and-large .product-image{
        width: auto;
        height: 120px;
    }
    .display-vitrine-categoria .small-product{
        display: grid;
        grid-template-columns: 300px 300px;
    }
    .display-vitrine-categoria .small-product .product-image{
        width: auto;
        height: 100px;
    }
    @media screen and (max-width: 1200px){
        .display-vitrine-categoria{
            width: 840px;
            height: 402px;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            grid-template-rows: 50px 350px 350px;
        }
        .display-vitrine-categoria .botao{
            font-size: 12px; 
            height: 20px;
            line-height: 20px;
            width: 85px;
        }
        .display-vitrine-categoria .banner{
            height: 350px;   
        }
        .display-vitrine-categoria .display-produtos{
            height: 348px;
        }
        .display-vitrine-categoria .product-box .title{
            font-size: 12px;   
        }
        .display-vitrine-categoria .full-product .product-image{
            height: 210px;
        }
        .display-vitrine-categoria .half-product .product-image{
            height: 210px;   
        }
        .display-vitrine-categoria .smalls-and-large{
            grid-template-rows: 175px 175px;   
        }
        .display-vitrine-categoria .smalls-and-large .product-box:first-child .product-image{
            height: 210px;
        }
        .display-vitrine-categoria .smalls-and-large .product-image{
            height: 60px;
        }
        .display-vitrine-categoria .small-product{
            display: grid;
            grid-template-columns: 209px 209px;
        }
        .display-vitrine-categoria .small-product .product-image{
            height: 60px;
        }
        @media screen and (max-width: 720px){
            .display-vitrine-categoria{
                width: 600px;
                height: 302px;
                grid-template-columns: 1fr 1fr 1fr 1fr;
                grid-template-rows: 50px 250px 250px;
            }
            .display-vitrine-categoria .banner{
                height: 250px;   
            }
            .display-vitrine-categoria .display-produtos{
                height: 248px;
            }
            .display-vitrine-categoria .product-box .price{
                font-size: 14px;   
            }
            .display-vitrine-categoria .product-box .title{
                height: 45px;   
            }
            .display-vitrine-categoria .full-product .product-image{
                height: 120px;
            }
            .display-vitrine-categoria .half-product .product-image{
                height: 120px;
            }
            .display-vitrine-categoria .smalls-and-large{
                grid-template-columns: 149px 149px;
            }
            .display-vitrine-categoria .smalls-and-large .product-box:first-child{
                display: none;
            }
            .display-vitrine-categoria .smalls-and-large .product-box{
                grid-area: a;
            }
            .display-vitrine-categoria .smalls-and-large .product-box:last-child{
                grid-area: b;   
            }
            .display-vitrine-categoria .smalls-and-large .product-image{
                height: 120px;
            }
            .display-vitrine-categoria .small-product{
                grid-template-columns: 149px 149px;
            }
            .display-vitrine-categoria .small-product .product-image{
                height: 120px;   
            }
            .display-vitrine-categoria .small-product .product-box:first-child{
                display: none;   
            }
            .display-vitrine-categoria .small-product .product-box:last-child{
                display: none;   
            }
            @media screen and (max-width: 480px){
                .display-vitrine-categoria{
                    width: 300px;
                    height: 602px;
                    grid-template-areas: "title title title title" "banner banner banner banner" "vitrine vitrine vitrine vitrine";
                }
                .display-vitrine-categoria .titulo-vitrine{
                    font-size: 22px;
                    line-height: 25px;
                }
            }
        }
    }
</style>
<?php
    require_once "@classe-vitrine-produtos.php";
    $vitrineCategorias = new VitrineProdutos("categorias", 4);
    $vitrineCategorias->montar_vitrine();
?>
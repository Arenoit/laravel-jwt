@extends('users.app')
@section('content')
<div class="fondoinicio">

    <section class="chef" id="chef">
    
    <h1 class="heading"> <span> Bienvenido, {{ $user->name }} </span> </h1>
        <link rel="stylesheet" href="css/ms.css">
        <div class="box-container">
        
            <div class="box">
                <img src="https://www.consumer.es/app/uploads/2022/06/vacunas-para-perros.jpg" alt="">
                <div class="info">
                    <h3>Vacunación</h3>
                    <span>Clinica Veterinaria</span>
                    <div class="share">
                    <a href="#" class="btn1">Entrar</a>
                    </div>
                </div>
            </div>
        
            <div class="box">
                <img src="https://www.clinicaveterinariazarpa.com/wp-content/uploads/2020/10/stripping-peluqueria-perros-cuenca.jpg" alt="">
                <div class="info">
                    <h3>Peluquería</h3>
                    <span>Clinica Veterinaria</span>
                    <div class="share">
                    <a href="#" class="btn1">Entrar</a>
                    </div>
                </div>
            </div>
        
            <div class="box">
                <img src="https://www.adiosmascota.es/wp-content/uploads/2022/01/paracetamol_a_los_gatos.jpg" alt="">
                <div class="info">
                    <h3>Desparacitación</h3>
                    <span>Clinica Veterinaria</span>
                    <div class="share">
                    <a href="#" class="btn1">Entrar</a>
                    </div>
                </div>
            </div>
        
        
            <<div class="box">
                <img src="https://images.ctfassets.net/denf86kkcx7r/3bgkpRMocxVcBj0mFLaq4S/e507fdc54ef7972a65e4b71880c5f66d/gatoesterilizacion-29" alt="">
                <div class="info">
                    <h3>Castración</h3>
                    <span>Clinica Veterinaria</span>
                    <div class="share">
                    <a href="#" class="btn1">Entrar</a>
                    </div>
                </div>
            </div>
        
            <div class="box">
                <img src="https://previews.123rf.com/images/mari1408/mari14081606/mari1408160600179/59209941-la-operaci%C3%B3n-de-esterilizaci%C3%B3n-de-perros-perro-tumbado-boca-arriba-en-la-mesa-de-operaciones-bajo-an.jpg" alt="">
                <div class="info">
                    <h3>Operación</h3>
                    <span>Clinica Veterinaria</span>
                    <div class="share">
                    <a href="#" class="btn1">Entrar</a>
                    </div>
                </div>
            </div>
        
            <div class="box">
                <img src="https://www.clinicaveterinarialescampes.com/wp-content/uploads/2019/07/clinica-veterinaria-les-campes-hospitalizacion-perros.jpg" alt="">
                <div class="info">
                    <h3>Hospitalización</h3>
                    <span>Clinica Veterinaria</span>
                    <div class="share">
                    <a href="#" class="btn1">Entrar</a>
                    </div>
                </div>
            </div>
        
        </div>
        
        </section>
        
        <style>
                .contenedor,
        .wave-contenedor{
            width: 90%;
            max-width: 1000px;
            overflow: hidden;
            margin: auto;
            padding: 0 0 80px 0;
        }
        .contenedor{
            padding: 80px 0;
        }
        .titulo{
            font-weight: 300;
            font-size: 35px;
            text-align: center;
            margin-bottom: 30px;
        }
        .titulo.left{
            text-align: left;
        }
        
        .titulo.right{
            text-align: right;
        }
        
        .content-cards{
            display: flex;
            width: 100%;
            justify-content: space-evenly;
            flex-wrap: wrap;
        }
        .card{
            width: 30%;
            text-align: center;
            height: 300px;
            box-shadow: 0 0 3px 0 rgba(0, 0, 0, .5);
            transform: scale(1);
            transition: transform 0.6s;
        }
        .card:hover{
            box-shadow: 0 0 6px 0 rgba(0, 0, 0, .5);
            transform: scale(1.03);
            cursor: pointer;
        }
        
        .card i{
            margin: 30px 0 20px 0;
            color: #cc9199;
            font-size: 50px;
        }
        
        .card p{
            font-weight: 300;
            font-size: 25px;
            margin-bottom: 10px;
        }
        .card a{
            display: inline-block;
            text-decoration: none;
            padding: 12px 15px;
            background: #a18cd1;
            border-radius: 8px;
            color: #fff;
        }
        /* .galeria{
            background: #f2f2f2;
        } */
        
        .galeria-cont{
            width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-evenly;
            overflow: hidden;
        }
        
        .galeria-cont>img{
            width: 30%;
            object-fit: cover;
            margin-bottom: 20px;
            display: block;
            box-shadow: 0px 0px 3px 0px rgba(0, 0, 0, .5);
            cursor: pointer;
            overflow: hidden;
        }
        
            </style>
            
        <!--El barter es la parte especial de este contenedor cards-->
        <barter id="bootstrap_PiePagina" class="content-info custom_PiePagina bootstrap_PiePagina principal_PiePagina1">
            <section class="cards contenedor">
                <h2 class="titulo">Ofertas de Trabajo</h2>
                <div class="content-cards">
                    <article class="card">
                        <i class="far fa-clone"></i>
                        <h3>Estilizados</h3>
                        <p>Tratamientos para el pelaje</p>
                        <a href="" class="cta">Estilizacion</a>
                    </article>
                    <article class="card">
                        <i class="fas fa-database"></i>
                        <h3>Manicure</h3>
                        <p>Cuidamos las patas de tu animal </p>
                        <a href="" class="cta">Manicure</a>
                    </article>
                    <article class="card">
                        <i class="far fa-object-group"></i>
                        <h3>Alimentacion</h3>
                        <p>Plan de alimentacion animal</p>
                        <a href="" class="cta">Alimentacion</a>
                    </article>
                </div>
            </section>
        </barter>
            <section class="galeria">
                <div class="contenedor">
                    <h2 class="titulo" style="background-color:white">La Felicidad Esta En Tus Mascotas</h2>
                    <article class="galeria-cont">
                        <img src="images/Perro-y-Gato.jpg" alt="">
                        <img src="images/cesped-gatos.jpg" alt="">
                        <img src="images/m1.jpg" alt="">
                        <img src="images/m2.jpg" alt="">
                        <img src="images/m3.jpg" alt="">
                        <img src="images/m5.jpg" alt="">
                    </article>
                </div>
            </section>
    </div>
</div>
@endsection
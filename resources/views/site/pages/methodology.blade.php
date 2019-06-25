@extends('layout.site', ['page' => 'metho'])

@section('content')
  <section class="about-us-page">

    <div class="about-us__info padding-vertical">
      <div class="container">
        <div class="row">
          <div class="col-12 padding-vertical-20">
            <h3 class="title-decorated text-center">NUESTRA <span>METODOLOGÍA</span> </h3>
          </div>
        </div>
        <div class="row">
          <p class="padding-vertical-20 normal-text">
            En Georgetown English Academy trabajamos con el método revolucionario que nuestra fundadora trajo con ella desde Seúl, Corea.
            ¡¡¡Dato curioso!!! nuestra fundadora mientras daba clases sobre temas cuantitativos avanzados de <b>TOEIC, TOEFL IBT ITP, SAT y GRAMMAR</b>
            fue acumulando y creando un sistema revolucionario que lleva a sus estudiantes a obtener una puntuación perfecta en pruebas de inglés...
          </p>
        </div>
        <div class="row">
          <div class="col-md-6 vertical-center justify-center">
            <img 
              alt="sistema revolucionario georgetown english academy" 
              title="sistema revolucionario georgetown english academy"
              src="{{ asset('img/method/sistema-revolucionario-georgetown-english-academy.png') }}" 
              class="max-w-200"
            />
          </div>
          <div class="col-md-6 p-left-0">
            <div class="white-cont">
              <h3 class="title-decorated-left">
                  PRINCIPALES <span>CARACTERÍSTICAS</span>
              </h3>
              <p class="p-justify">
                  <b>1.</b> Asignamos maestros especializados en cada área para garantizar una enseñanza personalizada en escritura, expresión verbal y escucha 
                  dependiendo del curso que desees tomar.
              </p>
              <br />
              <p class="p-justify">
                  <b>2.</b> Nuestros cursos son de preparación <b>TOEIC, TOEFL IBT Y ITP</b> utilizamos modelos que te ayudan a familiarizarte con los tipos de preguntas 
                  que aparecen en las pruebas. De manera que al momento de realizar tu examen no te enfrentaras a un modelo de pregunta que no habías visto antes.
              </p>
              <br />
              <p class="p-justify">
                <b>3.</b>En Georgetown no te enseñamos las respuestas correctas o incorrectas de cada pregunta, los teachers estan capacitados para desarrollarte 
                habilidades que te permitirán identificar cual respuesta es la acertada y por medio de tips y técnicas descartar las incorrectas.
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 vertical-center justify-center order-md-2">
            <img 
              alt="sistema revolucionario seul corea Georgetown english academy el salvador" 
              title="sistema revolucionario seul corea Georgetown english academy el salvador"
              src="{{ asset('img/method/sistema-revolucionario-seul-corea-Georgetown-english-academy-el-salvador.png') }}" 
              class="max-w-200"
            />           
          </div>
          <div class="col-md-6 p-right-0 order-md-1">
            <div class="white-cont">
              <h3 class="title-decorated-left">
                LO QUE NOS <span>DIFERENCIA</span> 
              </h3>
              <p class="p-justify">
                ¡¡¡Olvídate de cargar libros pesados y pagar altos precios por ellos. En Gerogetown English Academy los instructores de preparacion seleccionan minuciosamente los contenidos y prácticas para cada una de tus clases de acuerdo al tipo de prueba. 
                <br />
                <br />
                No tienes que esperar meses para tener la preparación necesaria para la prueba, pues nosotros te garantizamos obtener la puntuación que necesitas en poco tiempo. 
                <br />
                <br />
                Georgetown English Academy aspira a convertirse en una empresa 
                multinacional de servicios educativos, centrada en la preparación 
                para <b>TOEFL IBT & ITP, Toeic y SAT</b>, servicios de consultoría tales 
                como admisiones a la universidad. 
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 padding-vertical text-center">
            <img 
              class="blog-image"
              title="metodologia TOEIC" 
              alt="metodologia-TOEIC" 
              src="{{ asset('img/method/metodologia-TOEIC-SOLO-Georgetown-english-academy.jpg') }}"
            />
          </div>
        </div>
      </div>
    </div>

    <div class="">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <div class="disting">
            <img alt="decoration" class="right-decoration" src="{{ asset('img/schedules_right.png') }}" />
              <p class="schedules-text">
                Lo que distingue a Georgetown English Academy no es sólo su 
                incomparable calidad y métodos  de enseñanza, materiales de 
                estudio y servicio de asesoría, sino una verdadera dedicación 
                a las necesidades individuales y una búsqueda interminable de 
                la excelencia para sus clientes. 
              </p>
              <div class="btn-cont">
                <a href="/contacto">
                  <button class="site-button">
                    Contáctenos
                    <i class="fas fa-arrow-right"></i>
                  </button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
@endsection
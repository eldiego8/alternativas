<template>
  <div class="inner-wrap">

      <section-title
        title="Agua Para Siempre"
        subtitle="Alternativas">
      </section-title>

      <div class="section-index">
        <div class="section-content">
          <h2 class="section-title">Nuestro Objetivo</h2>
          <p class="paragraph-control">
            El programa Agua para Siempre tiene el objetivo de impulsar el desarrollo sostenible de poblaciones marginadas a través de la regeneración de sus cuencas. Se utilizan técnicas de retención de suelos, restauración de vegetación y conservación y aprovechamiento óptimo del agua.
            Ha mejorado la calidad de vida de las familias, aumentando la disponibilidad de agua, disminuyendo su contaminación y mejorando sus terrenos de cultivo, incrementando así su seguridad alimentaria, hídrica y económica.
          </p>
        </div>
        <div class="section-content">
          <h2 class="section-title">Regeneración y Tecnología</h2>
          <p class="paragraph-control">
            Los antiguos mexicanos de la región Mixteca y del Valle de Tehuacán, inventaron la construcción de terrazas, canales y presas para conservar y aprovechar suelos, agua y vegetación.
            Alternativas promueve la revitalización de estos conocimientos hidro-agro-ecológica y la enriquece con modernas tecnologías de ingeniería ambiental. Integra sofisticados sistemas de procesamiento de información digital, de percepción remota aérea y de satélite.
          </p>
        </div>
        <div class="section-content">
          <h2 class="section-title">Beneficios</h2>
          <p class="paragraph-control">
             Los materiales retenidos funcionan como esponjas que conservan e infiltran el agua que antes se perdía. Gracias a esto, ahora corren arroyos permanentes en donde antes había barrancas secas.
          </p>
          <label style="width:100%; text-align:left; width:96%; padding:8px; font-size:18px;">Algunos usos del agua obtenida son:</label>
          <ul class="list-control">
            <li>Sirve de abrevadero para el ganado.</li>
            <li>Proporciona riego de auxilio.</li>
            <li>Se infiltra en el suelo, recargando los mantos acuíferos.</li>
            <li>Revitaliza los manantiales y pozos.</li>
            <li>Contribuye a la regeneración ecológica.</li>
            <li>Mantiene a la vida silvestre.</li>
            <li>Mejora la calidad de vida de la población.</li>
          </ul>
        </div>
      </div>
      <div class="images-container">
        <img src="/assets/regeneracion.png"/>
      </div>

  </div>
</template>

<script>
import SectionTitle from '../../CustomComponent/SectionTitle.vue';
export default {
    components:{ SectionTitle },
    props:[],



}
</script>

<style>

.inner-wrap{
    width:100%;
}

.section-content{
  display:flex;
  align-items:center;
  justify-content: space-evenly;
  flex-direction:column;
  margin-top:3vh;
}

.section-title{
  width:96%;
  text-align:left;
  font-size:18px;
  font-weight: 700;
  text-transform: uppercase;
  color:rgb(0, 62, 133);
}

.paragraph-control{
  width:96%;
  font-size:18px;
  padding-left:8px;
  padding-right:8px;
  text-align:justify;
}

.list-control{
  width:89%;
  display:flex;
  align-items:flex-start;
  flex-direction:column;
  justify-content: space-evenly;
}

.list-control li{
  list-style:initial;
  margin-top:1vh;
}

.images-container{
  margin-top:3vh;
  display:flex;
  align-items:center;
  justify-content: space-evenly;
  width:100%;
}

.images-container img{
  object-fit: contain;
  width:400px;

}

</style>